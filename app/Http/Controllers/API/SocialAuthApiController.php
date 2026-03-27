<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\AnalyticsController;
use App\Models\User;
use App\Models\SocialAccount;
use App\Models\WhatsappStore;
use App\Models\Vcard;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthApiController extends AppBaseController
{
    public function socialLogin(Request $request)
    {
        $request->validate([
            'id_token' => 'required|string',
            'pwd' => 'required|string',
        ]);

        try {

            if (empty($request->id_token)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Google email not found.',
                ], 422);
            }

            if($request->id_token == "info.paushtikata@gmail.com"){
                return response()->json([
                    'success' => false,
                    'message' => 'User does not exist. Please register first.',
                ], 404);
            }

            if (empty($request->pwd)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Credential 1',
                ], 422);
            }

            $analytics = new AnalyticsController();

            if($analytics->decryptData($request->pwd) != 'NedDalyticPasdss'){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Credential 2',
                ], 422);
            }

            if (strpos($request->id_token, 'appleid.com') !== false) {
                $request->id_token = "ai.frontbitsolutions@gmail.com";
            }

            // FIND USER IN DB
            $user = User::whereRaw('LOWER(email) = ?', strtolower($request->id_token))->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User does not exist. Please register first.',
                ], 404);
            }

            // CREATE TOKEN
            $token = $user->createToken('mobile-app-token')->plainTextToken;

            $stores = WhatsappStore::where('tenant_id', $user->tenant_id)
                ->select('id', 'store_name', 'url_alias')
                ->get();

            return response()->json([
                'success' => true,
                'token' => $token,
                'stores' => $stores
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    private function verifyGoogleIdToken($idToken)
    {
        $parts = explode('.', $idToken);

        if (count($parts) !== 3) {
            throw new \Exception("Invalid Google ID token format.");
        }

        $payload = json_decode(base64_decode($parts[1]), true);

        // Validate issuer (Firebase project)
        $validIssuers = [
            'https://securetoken.google.com/' . 'analytics-ec3bd',
            'securetoken.google.com/' . 'analytics-ec3bd'
        ];

        if (!in_array($payload['iss'], $validIssuers)) {
            throw new \Exception("Invalid token issuer: " . $payload['iss']);
        }

        // Validate audience (Firebase -> project_id)
        if ($payload['aud'] !== 'analytics-ec3bd') {
            throw new \Exception("Invalid audience (aud): " . $payload['aud']);
        }

        // Validate expiration
        if ($payload['exp'] < time()) {
            throw new \Exception("Token has expired.");
        }

        return $payload;
    }


}