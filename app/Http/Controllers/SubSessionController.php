<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;        
use App\Models\SubSession;         
use Illuminate\Support\Facades\Log; 
use Carbon\Carbon;                

class SubSessionController extends AppBaseController
{
    public function heartbeat(Request $request)
    {
        $analyticsNew = new AnalyticsController();

        // Get sub_session_id from request body
        $subSessionId = $request->input('sub_session_id');
        $mainSessionId = $request->input('main_session_id');
        $storeId = $request->input('store_id');
        
        $productSubSessionId = $request->input('product_sub_session_id');
        
        if (!$subSessionId) {
            $decoded = json_decode($request->getContent(), true);
            $subSessionId = $decoded['sub_session_id'] ?? null;
        }
        
        if(!$productSubSessionId){
            $decoded = json_decode($request->getContent(), true);
            $productSubSessionId = $decoded['product_sub_session_id'] ?? null;
        }

        if (!$subSessionId) {
            return response()->json(['status' => 'error', 'message' => 'sub_session_id missing'], 400);
        }

        if (!$mainSessionId) {
            return response()->json(['status' => 'error', 'message' => 'sub_session_id missing'], 400);
        }
        
        $payload = [
            "sub_sessions_ids" => [$analyticsNew->decryptData($subSessionId)],
            "sub_sessions_activity_ids" => [],
        ];

        if($productSubSessionId){
            $payload["sub_sessions_activity_ids"] = [$analyticsNew->decryptData($productSubSessionId)];
        }

        if ($mainSessionId) {
            $payload["main_session_id"] = $analyticsNew->decryptData($mainSessionId);
        }            

        $encryptedPayload = $analyticsNew->encryptData($payload);

        $postData = [
            "data" => $encryptedPayload,
        ];

            // API URL with base
            $url = $analyticsNew->baseUrl . "/analytics/sub-sessions/bulk-update";

            // Call API using cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json"
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if (curl_errno($ch)) {
                Log::error("cURL Error: " . curl_error($ch));
            }

            curl_close($ch);

            $decodedResponse = json_decode($response, true);

            // Transform response if success
            if ($httpCode === 200 && isset($decodedResponse['data'])) {
                $data = $decodedResponse['data'];
            }    else{
                Log::error("cURL Error: " . "Failed to create sub-session. HTTP Code: " . $httpCode . " Response: " . $response);
            }
        
        return response()->json(['status' => 'ok']);
    }
}