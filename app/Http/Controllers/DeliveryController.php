<?php

namespace App\Http\Controllers;

use App\Models\WpOrder;
use App\Services\DelcaperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends AppBaseController {
    protected $delcaperService;

    // Hardcoded Pickup Addresses as requested
    protected $pickupAddresses = [
        '1' => [
            "name" => "Jay namkeenn",
            "phone" => "9033042120",
            "email" => "jaynamkin@gmail.com",
            "address1" => "Lajamni Chowk, Gopinath Society",
            "address2" => "Mota Varchha",
            "zip" => "394101",
            "state" => "Gujarat",
            "city" => "Surat",
              "latitude" => 21.23836,
            "longitude" => 72.88655
        ],
    
        '2' => [
            "name" => "Jay namkeenn",
            "phone" => "9033042120",
            "email" => "jaynamkin@gmail.com",
            "address1" => "5, Sai Krupa Society, Simada Gam,",
            "address2" => "Nana Varachha,",
            "zip" => "395006",
            "state" => "Gujarat",
            "city" => "Surat",
            "latitude" => 21.223815319449354, 
            "longitude" => 72.89483935058313
        ]
    ];

    public function __construct(DelcaperService $delcaperService)
    {
        $this->delcaperService = $delcaperService;
    }

    public function pushOrderToDelcaper(Request $request, WpOrder $wpOrder)
    {
        // 1. Validate Form Inputs
        $request->validate([
            'order_id' => 'required',
            'pickup_location_id' => 'required',
            'shipping_name' => 'required',
            'shipping_phone' => 'required',
            'shipping_address1' => 'required',
            'shipping_zip' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
        ]);

        $wpOrder->load(['products.product']);

        // 2. Prepare Line Items
        $lineItems = [];
        $itemWeight = 0; // Default
        foreach ($wpOrder->products as $detail) {


    

    $itemWeight += 500 * (int)$detail->qty;

            $lineItems[] = [
                "name" => $detail->product->name ?? 'Item',
                "price" => (float)$detail->product->selling_price * (int)$detail->qty,
                "weight" => 500 * (int)$detail->qty,
                "quantity" => (int)$detail->qty,
                "sku" => (string)($detail->id),
                "unitPrice" => (float)$detail->product->selling_price
            ];
        }

        // 3. Prepare Shipping Address (From FORM Input, NOT Database)
        $shippingAddress = [
            "name" => $request->shipping_name,
            "phone" => $request->shipping_phone,
            "email" => $request->shipping_email ?? "",
            "address1" => $request->shipping_address1,
            "address2" => $request->shipping_address2 ?? "",
            "city" => $request->shipping_city,
            "state" => $request->shipping_state,
            "country" => $request->shipping_country ?? "India",
            "zip" => $request->shipping_zip,
            "latitude" => (float)$request->shipping_latitude,
            "longitude" => (float)$request->shipping_longitude
        ];

        // 4. Build API Payload
        $payload = [
            "orderId" => (string)$wpOrder->id,
            "currency" => "INR",
            "amount" => (float)$wpOrder->grand_total,
            "weight" => (int)$itemWeight,
            "paymentType" => 'ONLINE',
            "paymentStatus" => 'PAID',
            "remarks" => "Handle with care",
            "orderCreatedAt" => $wpOrder->created_at->toIso8601String(),
            "lineItems" => $lineItems,
            "pickupAddress" => $this->pickupAddresses[$request->pickup_location_id], // Selects from the array above
            "shippingAddress" => $shippingAddress,
            "returnableOrder" => false,
            "channelCode" => "API",
            "deliveryPromise" => "",
            "orderSubtype" => "FORWARD",
            "length" => (int)$request->length,
            "height" => (int)$request->height,
            "width" => (int)$request->width
        ];
        

        try {
            

            $apiResponse = $this->delcaperService->pushOrder($payload);
            // --- UPDATE START: Save shipperOrderId to Database ---
            
            // Check if API returned success status (200) and has data
            // Depending on your Service implementation, $apiResponse might be an array or object.
            // Using array access here based on standard JSON decoding.
            if (isset($apiResponse['status']) && $apiResponse['status'] == 200) {
                
                $shipperOrderId = $apiResponse['data']['awbNumber'] ?? null;

                if ($shipperOrderId) {
                    // Update the order model
                    // MAKE SURE you have a 'shipper_order_id' column in your 'orders' table
                    $wpOrder->update(['shipping_tracking_id' => $shipperOrderId]);
                }
            }
            // --- UPDATE END ---            
            
            return response()->json(['success' => true, 'data' => $apiResponse]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    
     public function deliveryService(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order_id' => 'required|exists:orders,id',
                'delivery_service_name' => 'required|string|max:255',
                'third_party_delivery_tracking_id' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false, 
                    'message' => $validator->errors()->first()
                ], 422);
            }

            $order = Order::findOrFail($request->order_id);

            if ($order->order_status == 'delivered') {
                return response()->json([
                    'success' => false,
                    'message' => translate('cannot_update_delivered_order')
                ], 400);
            }

            $order->delivery_type = 'third_party_delivery';
            $order->delivery_service_name = $request->delivery_service_name;
            $order->third_party_delivery_tracking_id = $request->third_party_delivery_tracking_id;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => translate('delivery_information_updated_successfully'),
                'data' => [
                    'delivery_service_name' => $order->delivery_service_name,
                    'tracking_id' => $order->third_party_delivery_tracking_id,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function trackOrder($id)
    {
        try {
            $apiResponse = $this->delcaperService->trackOrder($id);
    
            return response()->json(['success' => true, 'data' => $apiResponse['data']]);
    
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}