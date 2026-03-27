<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Exception;

class DelcaperService
{
    protected $baseUrl = 'https://apis.delcaper.com';

    // protected $baseUrl = 'https://qaapis.delcaper.com'; //sendbox

    /**
     * MAIN ENTRY POINT
     */
    public function pushOrder($payload)
    {
        // 1. Get Token (If not in session, this calls Login automatically)
        $accessToken = $this->getValidToken();

        // 2. Try Push Order
        $response = $this->makePushRequest($accessToken, $payload);

        // 3. If 401 Unauthorized (Token Expired)
        if ($response->status() === 401) {
            
            // A. Try Refresh Token
            $newAccessToken = $this->attemptRefreshToken();

            // B. If Refresh Failed (e.g. Refresh token also expired), Force Login
            if (!$newAccessToken) {
                $newAccessToken = $this->login();
            }

            // C. Retry Push Order with NEW Token
            $response = $this->makePushRequest($newAccessToken, $payload);
        }

        // 4. Return Final Response
        if ($response->successful()) {
            return $response->json();
        }

        throw new Exception("API Failed: " . $response->body());
    }

    /**
     * Helper: Make the actual HTTP request
     */
    protected function makePushRequest($token, $payload)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/fulfillment/public/seller/order/push-order', $payload);
    }

    /**
     * Helper: Get Token from Session OR Login if missing
     */
    protected function getValidToken()
    {
        if (Session::has('delcaper_access_token')) {
            return Session::get('delcaper_access_token');
        }

        // If no token in session, Login immediately
        return $this->login();
    }

    /**
     * API: Login
     * Generates tokens and saves to session.
     */
    protected function login()
    {
        $response = Http::post($this->baseUrl . '/auth/login', [
            "email" => "jaynamkin@gmail.com",
            "password" => "Jaynamkeen@123",
            "vendorType" => "SELLER"
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            // Extract tokens (adjust keys if data is wrapped in 'data')
            $accessToken = $data['data']['accessToken'] ?? $data['accessToken'] ?? null;
            $refreshToken = $data['data']['refreshToken'] ?? $data['refreshToken'] ?? null;

            if ($accessToken) {
                Session::put('delcaper_access_token', $accessToken);
                Session::put('delcaper_refresh_token', $refreshToken);
                return $accessToken;
            }
        }

        throw new Exception("Login Failed: " . $response->body());
    }

    /**
     * API: Refresh Token
     * Returns new token string OR false if failed.
     */
    protected function attemptRefreshToken()
    {
        $refreshToken = Session::get('delcaper_refresh_token');

        // If we don't even have a refresh token, we can't refresh.
        if (!$refreshToken) {
            return false;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $refreshToken
        ])->get($this->baseUrl . '/auth/refresh-token');

        if ($response->successful()) {
            $data = $response->json();
            $newAccessToken = $data['data']['accessToken'] ?? $data['accessToken'] ?? null;

            if ($newAccessToken) {
                Session::put('delcaper_access_token', $newAccessToken);
                return $newAccessToken;
            }
        }

        // If refresh failed (e.g. status 401 or 403), return false
        return false;
    }
    

// Inside App\Services\DelcaperService

    public function trackOrder($shipperOrderId)
    {
        // Ensure you have the base URL set in your .env or config
        // URL: https://qaapis.delcaper.com/fulfillment/public/seller/order/order-tracking/{id}
        
        $url = $this->baseUrl ."/fulfillment/public/seller/order/order-tracking/{$shipperOrderId}";
    
        // Assuming you are using Http facade (Illuminate\Support\Facades\Http)
        // Add headers if your API requires authentication tokens
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Content-Type' => 'application/json',
            // 'Authorization' => 'Bearer ' . $this->apiKey, // Uncomment if needed
        ])->get($url);
    
        if ($response->successful()) {
            return $response->json();
        }
    
        throw new \Exception('Failed to track order: ' . $response->body());
    }
}