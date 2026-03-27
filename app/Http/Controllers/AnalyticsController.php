<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\WpOrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WhatsappStore;
use App\Models\Subscription;
use App\Models\ProductCategory;
use App\Models\WpStoreTemplate;
use Illuminate\Support\Facades\DB;
use App\Models\WpSocialLinks;
use App\Models\WhatsappStoreProduct;
use App\Http\Requests\WpProductBuyRequest;
use App\Repositories\WhatsappStoreRepository;
use App\Http\Requests\CreateWhatsappStoreRequest;
use App\Http\Requests\UpdateWhatsappStoreRequest;
use App\Models\Product;
use App\Models\Template;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Log;
use App\Models\SubSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Jobs\FireAndForgetHttpRequest;


class AnalyticsController extends AppBaseController
{
    
    public $secretKey = "encryptdatasecretkey";
    public $method = "AES-256-CBC";
    public $baseUrl = "https://backend.vcardking.com/analyticsdemo/api";

    public function __construct()
    {
        
    }

    // Encrypt Data
    public function encryptData($data)
    {
        try {
            $stringData = is_string($data) ? $data : json_encode($data);
    
            // Generate salt
            $salt = openssl_random_pseudo_bytes(8);
            $salted = '';
            $dx = '';
    
            // Key and IV derivation (same as CryptoJS OpenSSL KDF)
            while (strlen($salted) < 48) {
                $dx = md5($dx . $this->secretKey . $salt, true);
                $salted .= $dx;
            }
    
            $key = substr($salted, 0, 32); // 256-bit key
            $iv  = substr($salted, 32, 16); // 128-bit IV
    
            // Encrypt
            $encrypted = openssl_encrypt($stringData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    
            // Add "Salted__" header so CryptoJS can decrypt
            return base64_encode("Salted__" . $salt . $encrypted);
        } catch (\Exception $e) {
            \Log::error("Error in encryption: " . $e->getMessage());
            return "";
        }
    }
    
    public function decryptData($encryptedData)
    {
        try {
            $data = base64_decode($encryptedData);
    
            // Extract salt
            $salt = substr($data, 8, 8);
            $cipherText = substr($data, 16);
    
            $salted = '';
            $dx = '';
    
            // Derive key and IV
            while (strlen($salted) < 48) {
                $dx = md5($dx . $this->secretKey . $salt, true);
                $salted .= $dx;
            }
    
            $key = substr($salted, 0, 32);
            $iv  = substr($salted, 32, 16);
    
            // Decrypt
            $decrypted = openssl_decrypt($cipherText, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    
            return $decrypted;
        } catch (\Exception $e) {
            \Log::error("Error in decryption: " . $e->getMessage());
            return null;
        }
    }
    
    public function checkStatus($id)
    {
        $subSession = SubSession::find($id);
    
        if (!$subSession || $subSession->status !== 'active') {
            return response()->json([
                'status' => 'error',
                'message' => 'Sub-session not found or inactive'
            ], 404);
        }
    
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $subSession->id,
                'status' => $subSession->status,
                'last_seen_at' => $subSession->last_seen_at,
            ]
        ], 200);
    }
    
    private function fireAndForgetPut($url, $data)
    {
        try {
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
    
            // Fire and forget (don't wait for response)
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOSIGNAL, true);
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100); // 100ms timeout
            curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
                return strlen($data); // discard output immediately
            });
    
            curl_exec($ch);
            
            curl_close($ch);
        } catch (\Exception $e) {
            \Log::error("FireAndForget cURL exception: " . $e->getMessage());
        }
    }
    
    private function fireAndForgetNewPost($url, $data)
    {
        try {
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
    
            // Fire and forget (don't wait for response)
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOSIGNAL, true);
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100); // 100ms timeout
            curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
                return strlen($data); // discard output immediately
            });
    
            curl_exec($ch);
            
            curl_close($ch);
        } catch (\Exception $e) {
            \Log::error("FireAndForget cURL exception: " . $e->getMessage());
        }
    }
    
   private function fireAndForgetPost($url, $data)
    {
         try {
            $urlParts = parse_url($url);
            $scheme = $urlParts['scheme'] ?? 'http';
            $host = $urlParts['host'];
            $port = $urlParts['port'] ?? ($scheme === 'https' ? 443 : 80);
            $path = ($urlParts['path'] ?? '/') . (isset($urlParts['query']) ? '?' . $urlParts['query'] : '');
    
            $payload = json_encode($data);
    
            // Open socket (ssl:// for HTTPS)
            $fp = fsockopen(($scheme === 'https' ? 'ssl://' : '') . $host, $port, $errno, $errstr, 1);
            if ($fp) {
                $out = "POST $path HTTP/1.1\r\n";
                $out .= "Host: $host\r\n";
                $out .= "Content-Type: application/json\r\n";
                $out .= "Content-Length: " . strlen($payload) . "\r\n";
                $out .= "Connection: Close\r\n\r\n";
                $out .= $payload;
    
                fwrite($fp, $out);
                fclose($fp); // <-- Immediately close: fire-and-forget
            }
        } catch (\Exception $e) {
            \Log::error("FireAndForget HTTP exception: " . $e->getMessage());
        }
    }
    
    public function endInactiveSubSessions(Request $request)
    {
        $threshold = Carbon::now()->subSeconds(30);
        
        $subSessionData = [];

        $inactiveSessions = SubSession::where('status', 'active')
            ->where('last_seen_at', '<', $threshold)
            ->get();
        
        SubSession::where('status', 'active')
            ->where('last_seen_at', '<', $threshold)
            ->update(['status' => 'ended']);

        foreach ($inactiveSessions as $session) {
            
            if($session->session_type){
                $subSessionData[] = (object) [
                    'sub_session_id' => $this->decryptData($session->sub_session_id),
                    'activity_type' => $session->session_type ?? 'NA', // Assuming 'session_type' is the field you want
                ];    
            }else{
                $subSessionData[] = (object) [
                    'sub_session_id' => $this->decryptData($session->sub_session_id)
                ];
            }
            
            
            
            $session->delete();
        }
        
        $data = [
            'sub_session_data' => $subSessionData,
        ];

        $encryptedPayload = $this->encryptData($data);
    
        $url = $this->baseUrl . "/analytics/sub-sessions/bulk-end";
    
        // Fire & forget call
        $this->fireAndForgetPost($url, ["data" => $encryptedPayload]);
    
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }
    
    public function endInactiveProductInquiry(Request $request)
    {
        $threshold = Carbon::now()->subSeconds(30);
        
        $subSessionData = [];

        
            
        
                foreach ($request->sub_session_id as $id) {
                    $subSessionData[] = (object) [
                        'sub_session_id' => $this->decryptData($id),
                        'activity_type' => 'inquiry',
                    ];
                }
            
        
        $data = [
            'sub_session_data' => $subSessionData,
        ];

        $encryptedPayload = $this->encryptData($data);
    
        $url = $this->baseUrl . "/analytics/sub-sessions/bulk-end";
    
        // Fire & forget call
        $this->fireAndForgetPost($url, ["data" => $encryptedPayload]);
    
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }
    
    public function endInactiveProductInquiryNew($sessionIds)
    {
        $threshold = Carbon::now()->subSeconds(30);
        
        $subSessionData = [];

        
            
        
                foreach ($sessionIds as $id) {
                    $subSessionData[] = (object) [
                        'sub_session_id' => $this->decryptData($id),
                        'activity_type' => 'inquiry',
                    ];
                }
            
        
        $data = [
            'sub_session_data' => $subSessionData,
        ];

        $encryptedPayload = $this->encryptData($data);
    
        $url = $this->baseUrl . "/analytics/sub-sessions/bulk-end";
    
        // Fire & forget call
        $this->fireAndForgetPost($url, ["data" => $encryptedPayload]);
    
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }

    
    public function endSubSession(Request $request)
    {
        if (ob_get_length()) {
            ob_end_clean();
        }
        
        \Log::info('🔥 endSubSession hit', [
        'raw' => $request->getContent(),
        'all' => $request->all(),
        'ip' => $request->ip(),
        'time' => now()->toDateTimeString(),
    ]);
    
        // Try to get input normally
        $subSessionId = $request->input('sub_session_id');
    
        // If empty, try parsing raw body (for sendBeacon)
        if (!$subSessionId) {
            $raw = $request->getContent();
            $decoded = json_decode($raw, true);
            $subSessionId = $decoded['sub_session_id'] ?? null;
        }
    
        // Log everything for debugging
        Log::info('endSubSession called', [
            'raw' => $request->getContent(),
            'parsed' => $request->all(),
            'sub_session_id' => $subSessionId,
            'ip' => $request->ip(),
            'time' => now()->toDateTimeString(),
        ]);
    
        if (!$subSessionId) {
            return response()->json([
                "status" => "error",
                "message" => "No sub_session_id provided"
            ], 400);
        }
    
        $data = ['sub_session_id' => $subSessionId];
        $encryptedPayload = $this->encryptData($data);
    
        $url = $this->baseUrl . "/analytics/sub-sessions/end";
    
        // Fire & forget call
        $this->fireAndForgetPost($url, ["data" => $encryptedPayload]);
    
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }
    
    // Function to call API (example: main-sessions)
    public function createMainSession(Request $request)
    {
        try {
        $storeId = $request->store_id;
        $mainSessionId = $request->main_session_id ?? null;

        // Build payload
        $payload = [
            "store_id" => $storeId,
        ];
        if ($mainSessionId) {
            $payload["main_session_id"] = $this->decryptData($mainSessionId);
        }

        // Encrypt payload
        $encryptedPayload = $this->encryptData($payload);

        $postData = [
            "data" => $encryptedPayload,
        ];

        // API URL with base
        $url = $this->baseUrl . "/analytics/main-sessions/";

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
    
            $transformed = [
                "sc_id" => $mainSessionId && $data['id'] == $this->decryptData($mainSessionId) ? $mainSessionId : $this->encryptData($data['id']), // encrypt session id
                "userdetails" => [
                    "name" => $data['name'] ?? null,
                    "phone" => $data['phone'] ?? null,
                    "email" => $data['email'] ?? null,
                    "address" => $data['address'] ?? null,
                    "country_code" => $data['country_code'] ?? null,
                ]
            ];
    
            return response()->json($transformed, 200);
        }
    
        // Default fallback
        return response()->json([
            "status" => $httpCode,
            "response" => $decodedResponse
        ], $httpCode);
        
        } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Failed to update offer text.',
            'error' => $e->getMessage(),
        ], 500);
        }
    }
    
    public function createSubSession(Request $request)
    {
        try {
        $storeId = $request->store_id;
        $mainSessionId = $request->main_session_id ?? null;
        $subSessionId = $request->sub_session_id ?? null;

        // Build payload
        $payload = [
            "store_id" => $storeId,
        ];

        if ($mainSessionId) {
            $payload["main_session_id"] = $mainSessionId;
        }
    

        // Encrypt payload
        $encryptedPayload = $this->encryptData($payload);

        $postData = [
            "data" => $encryptedPayload,
        ];

        // API URL with base
        $url = $this->baseUrl . "/analytics/sub-sessions/";

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
            $id = $subSessionId && $data['id'] == $this->decryptData($subSessionId) ? $subSessionId : $this->encryptData($data['id']);
            $transformed = [
                "sb_sc_id" => $id, // encrypt session id
            ];
    
            return response()->json($transformed, 200);
        }
    
        // Default fallback
        return response()->json([
            "status" => $httpCode,
            "response" => $decodedResponse
        ], $httpCode);
        
        } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Failed to update offer text.',
            'error' => $e->getMessage(),
        ], 500);
        }
    }
    
    public function startProductSubSession(Request $request){
        try {
            $storeId = $request->store_id;
            $productId = $request->product_id;
            $mainSessionId = $request->main_session_id ?? null;
            $subSessionId = $request->sub_session_id ?? null;
            $productSubsessionId =  $request->product_session_id ?? null;
    
            // Build payload
            $payload = [
                "product_id" => $productId,
                "main_session_id" => $this->decryptData($mainSessionId),
                "sub_session_id" => $this->decryptData($subSessionId),
            ];
    
            // Encrypt payload
            $encryptedPayload = $this->encryptData($payload);
    
            $postData = [
                "data" => $encryptedPayload,
            ];
    
            // API URL with base
            $url = $this->baseUrl . "/analytics/sub-session-activity/product-view";
    
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

                $id = $productSubsessionId && $data['id'] == $this->decryptData($productSubsessionId) ? $productSubsessionId : $this->encryptData($data['id']);
        
                $transformed = [
                    "p_sc_id" => $id, // encrypt session id
                ];

                return response()->json($transformed, 200);
            }
        
            // Default fallback
            return response()->json([
                "status" => $httpCode,
                "response" => $decodedResponse
            ], $httpCode);
            
            } catch (\Exception $e) {
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to update offer text.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function startProductInqSubSession(Request $request){
        try {
            $storeId = $request->store_id;
            $productId = $request->product_id;
            $quantity = $request->quantity;
            $mainSessionId = $request->main_session_id ?? null;
            $subSessionId = $request->sub_session_id ?? null;
    
            // Build payload
            $payload = [
                "product_id" => $productId,
                "quantity" => $quantity,
                "main_session_id" => $this->decryptData($mainSessionId),
                "sub_session_id" => $this->decryptData($subSessionId),
            ];
            
    
            // Encrypt payload
            $encryptedPayload = $this->encryptData($payload);
    
            $postData = [
                "data" => $encryptedPayload,
            ];
    
            // API URL with base
            $url = $this->baseUrl . "/analytics/sub-session-activity/product-inquiry";
    
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
        
                $transformed = [
                    "p_sc_id" => $this->encryptData($data['id']), // encrypt session id
                ];
        
                return response()->json($transformed, 200);
            }
        
            // Default fallback
            return response()->json([
                "status" => $httpCode,
                "response" => $decodedResponse
            ], $httpCode);
            
            } catch (\Exception $e) {
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to update offer text.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function updateProductInqSubSession(Request $request){
        try {
            $productId = $request->product_id;
            $quantity = $request->quantity;
            $subSessionId = $request->inq_session_id ?? null;
    
            // Build payload
            $payload = [
                "product_id" => $productId,
                "quantity" => $quantity,
                "sub_session_id" => $this->decryptData($subSessionId),
            ];
            
            // Encrypt payload
            $encryptedPayload = $this->encryptData($payload);
    
            $postData = [
                "data" => $encryptedPayload,
            ];
    
            // API URL with base
            $url = $this->baseUrl . "/analytics/sub-session-activity/update-product-inquiry-quantity";
    
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
        
                $transformed = [
                    "p_sc_id" => true, // encrypt session id
                ];
        
                return response()->json($transformed, 200);
            }
        
            // Default fallback
            return response()->json([
                "status" => $httpCode,
                "response" => $decodedResponse
            ], $httpCode);
            
            } catch (\Exception $e) {
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to update offer text.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function updateMainSession($apiUrl, $payload)
    {
        
        if (ob_get_length()) {
            ob_end_clean();
        }
        
        $encryptedPayload = $this->encryptData($payload);

        $url = $this->baseUrl . "/" . $apiUrl;

        // Fire & forget call
        $this->fireAndForgetPut($url, ["data" => $encryptedPayload]);

        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }
    
    public function apiProductSync($apiUrl, $payload){
        if (ob_get_length()) {
            ob_end_clean();
        }
        
        $encryptedPayload = $this->encryptData($payload);
        
        $url = $this->baseUrl . "/" . $apiUrl;
        
        Log::info("Product Sync Fired: {$payload['action']}", ['id' => $payload['id'], 'url' => $url]);
        
        $this->fireAndForgetNewPost($url, ["data" => $encryptedPayload]);
        
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }
    
    
    
private function fireAndForgetProductSync(array $payload): void
{
    try {
        // Encrypt the payload using the existing method
        $encryptedPayload = $this->encryptData($payload);

        $url = $this->baseUrl . '/analytics/products/create-update-delete';
        
        $postData = [
            "data" => $encryptedPayload,
        ];
        $payloadJson = json_encode($postData);

        // --- Start Fire-and-Forget GET with JSON Body ---
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // Set the custom request method to GET
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        
        // Use the CURLOPT_POSTFIELDS for the JSON body
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadJson);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payloadJson)
        ]);

        // Fire and forget settings
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100); // 100ms timeout
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
            return strlen($data); // discard output immediately
        });

        curl_exec($ch);

        if (curl_errno($ch)) {
            Log::error("FireAndForgetProductSync cURL Error: " . curl_error($ch));
        }

        curl_close($ch);
        // --- End Fire-and-Forget GET with JSON Body ---

        Log::info("Product Sync Fired: {$payload['action']}", ['id' => $payload['id'], 'url' => $url]);

    } catch (\Exception $e) {
        Log::error("FireAndForgetProductSync cURL exception: " . $e->getMessage(), ['payload' => $payload]);
    }
}


/**
 * Handles the external API call for product actions (create, update, delete).
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\JsonResponse
 */
public function syncProductAction(Request $request)
{
    // 1. Get required parameters from the request
    $productId = $request->input('id');
    $action = $request->input('action');
    $storeAlias = $request->input('store_alias'); // <<< FETCING DYNAMICALLY

    // 2. Validate all three required parameters
    if (empty($productId) || empty($storeAlias) || !in_array($action, ['create', 'update', 'delete'])) {
        return response()->json([
            "status" => "error",
            "message" => "Missing or invalid 'id', 'action', or 'store_alias' parameter."
        ], 400);
    }

    // 3. Prepare the payload
    $payload = [
        "id" => (int) $productId,
        "action" => $action,
        "store_alias" => $storeAlias // <<< USING THE DYNAMIC VALUE
    ];

    // 4. Fire the API call
    $this->fireAndForgetProductSync($payload);

    // 5. Return an immediate success response
    return response()->json([
        "status" => "success",
        "message" => "Product sync request for '{$action}' fired.",
        "product_id" => $productId,
        "store_alias" => $storeAlias,
    ], 200);
}


    public function productAction(int $productId, string $action, string $storeAlias)
    {
        // The API endpoint, derived from your curl command
        $apiUrl = 'https://backend.vcardking.com/analyticsdemo/api/analytics/products/create-update-delete';
        

        // 1. Construct the data payload as required by the third-party API
        $data = [
            'id' => $productId,
            'action' => $action,
            'store_alias' => $storeAlias,
        ];

        try {
            // 2. Use Laravel's HTTP Client facade
            // The ::post() method automatically sets the 'Content-Type: application/json' header.
            $response = Http::post($apiUrl, $data);

            // 3. Check if the API call was successful (HTTP status 2xx)
            if ($response->successful()) {
                // Log the success for internal monitoring
                \Log::info('Product action synced successfully with third-party analytics.', ['product_id' => $productId, 'action' => $action]);
                
                return response()->json([
                    'message' => "Product synchronization successful for action: {$action}.",
                    'api_response' => $response->json(), // Return the API's response body
                ], 200);
            }

            // 4. Handle unsuccessful API responses (e.g., 4xx or 5xx status codes)
            \Log::error('Third-Party Analytics API call failed.', [
                'status' => $response->status(),
                'body' => $response->body(),
                'request_data' => $data
            ]);

            // Return a failure response using the status code returned by the third-party service
            return response()->json([
                'message' => 'Product synchronization failed: Third-party service returned an error.',
                'status' => $response->status(),
                'error_details' => $response->json() ?? $response->body()
            ], $response->status());

        } catch (Exception $e) {
            // 5. Handle client-side exceptions (e.g., network issues, timeouts, DNS errors)
            \Log::critical('Analytics API Connection Error.', [
                'error' => $e->getMessage(),
                'request_data' => $data
            ]);

            return response()->json([
                'message' => 'A critical network or connection error occurred while syncing with analytics.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
public function apiSync($apiUrl, $payload){
        if (ob_get_length()) {
            ob_end_clean();
        }
        
        $url = $this->baseUrl . "/" . $apiUrl;
    
        // Initialize cURL
        $ch = curl_init($url);

        // Set options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload,JSON_UNESCAPED_UNICODE));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json','Content-Length: ' . strlen(json_encode($payload, JSON_UNESCAPED_UNICODE))]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100); // 100ms timeout
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
            return strlen($data); // discard output immediately
        });

        // Execute request
        curl_exec($ch);
        curl_close($ch);
        
        \Log::info('AnalyticsController: Starting process for user.',[$payload]);
        
        return response()->json([
            "status" => "success",
            "message" => "Update request fired"
        ], 200);
    }    

    public function apiSyncPut($apiUrl, $payload){
        $url = $this->baseUrl . "/" . $apiUrl;
         \Log::info('AnalyticsController: Starting process for user1.',[$apiUrl]);
        try {
             \Log::info('AnalyticsController: Starting process for user2.',[$payload]);
            $response = Http::timeout(2)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->put($url, $payload);
                 \Log::info('AnalyticsController: Starting process for user3.',[$payload]);

            if ($response->successful()) {
                \Log::info('AnalyticsController: Starting process for user4.',[$payload]);
                \Log::info('API PUT Success', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'payload' => $payload
                ]);

            } else {
                \Log::info('AnalyticsController: Starting process for user5.',[$payload]);
                \Log::error('API PUT Failed', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'payload' => $payload
                ]);

            }
            \Log::info('AnalyticsController: Starting process for user6.',[$payload]);

            return response()->json([
                "status" => "success",
                "http_code" => $response->status()
            ]);

        } catch (\Exception $e) {

            \Log::error('API PUT Exception', [
                'message' => $e->getMessage(),
                'payload' => $payload
            ]);

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }
    

}
