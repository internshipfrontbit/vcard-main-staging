<?php

namespace App\Http\Controllers;

use App\Models\WpOrder;
use Laracasts\Flash\Flash;
use App\Models\WpOrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WhatsappStore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\WhatsappStoreProduct;
use App\Http\Requests\WpProductBuyRequest;
use App\Http\Requests\UpdateWhatsappProductRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Requests\CreateWhatsappStoreProductRequest;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Barryvdh\DomPDF\Facade\Pdf;
use Razorpay\Api\Api;
use App\Models\Subscription;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Session;

class WhatsappStoreProductController extends AppBaseController
{
    public function store(CreateWhatsappStoreProductRequest $request)
    {
        $input = $request->all();

        if (!empty($input['alias'])) {
            $store = WhatsappStore::where('url_alias', $input['alias'])->firstOrFail();
            $input['whatsapp_store_id'] = $store->id;
            $input['tenant_id'] = $store->tenant_id;
        } else {
            $store = WhatsappStore::findOrFail($input['whatsapp_store_id']);
        }
        
        if ($store->tenant_id != getLogInTenantId()) {
            return $this->sendError('Unauthorized.');
        }    

        $plan = Subscription::whereTenantId($store->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
             return $this->sendError('Trial expired or payment not completed',401);
        }

        
        $input['whatsapp_store_id'] = $store->id;
        unset($input['alias']);
        
        // Define limits per whatsapp_store_id
        $limit550 = [741, 689];
        $limit500 = [125, 114];
        $limit1000 = [345, 208, 1488];
        $limit1550 = [691];
        $limit650 = [];
        $limit100 = [364, 382, 503, 520, 564, 584,308, 752, 1014, 651, 966, 1234, 1238, 1277];
        $limit250 = [392, 425, 77, 970, 530];        
        $limit220 = [346];
        $limit150 = [128, 363, 652, 738, 376, 982, 1263];
        $limit200 = [322,1241,151];
        $limit80 = [210];
        $limit2 = [99];

        $unlimited = false;

        if($plan->plan_id == 24){
            $unlimited = true;
        }

        // Determine the max limit
        if (in_array($input['whatsapp_store_id'], $limit550)) {
            $maxLimit = 550;
        } elseif (in_array($input['whatsapp_store_id'], $limit500)) {
            $maxLimit = 500;
        } elseif (in_array($input['whatsapp_store_id'], $limit650)) {
            $maxLimit = 650;
        } elseif (in_array($input['whatsapp_store_id'], $limit2)) {
            $maxLimit = 2;
        } elseif (in_array($input['whatsapp_store_id'], $limit150)) {
            $maxLimit = 150;
        } elseif (in_array($input['whatsapp_store_id'], $limit80)) {
            $maxLimit = 80;
        } elseif (in_array($input['whatsapp_store_id'], $limit100)) {
            $maxLimit = 100;
        } elseif (in_array($input['whatsapp_store_id'], $limit250)) {
            $maxLimit = 250;
        } elseif (in_array($input['whatsapp_store_id'], $limit220)) {
            $maxLimit = 220;
        } elseif (in_array($input['whatsapp_store_id'], $limit200)) {
            $maxLimit = 200;
        } elseif (in_array($input['whatsapp_store_id'], $limit1000)) {
            $maxLimit = 1000;
        } elseif (in_array($input['whatsapp_store_id'], $limit1550)) {
            $maxLimit = 1550;
        }else {
            $maxLimit = 50;
        }

        if($unlimited == false){
            // Check current product count
            $productCount = WhatsappStoreProduct::where('whatsapp_store_id', $input['whatsapp_store_id'])->count();
        
            if ($productCount >= $maxLimit) {
                throw new UnprocessableEntityHttpException("You can add a maximum of {$maxLimit} products for this WhatsappStore.");
            }
        }else{
            $productCount = WhatsappStoreProduct::where('whatsapp_store_id', $input['whatsapp_store_id'])->count();
        
            if ($productCount >= 2400) {
                throw new UnprocessableEntityHttpException("You can add a maximum of 2400 products for this WhatsappStore.");
            }
        }
            
    
        $product = WhatsappStoreProduct::create($input);
    
        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            if ($input['whatsapp_store_id'] == 71 || $input['whatsapp_store_id'] == 128 || $input['whatsapp_store_id'] == 322 || $input['whatsapp_store_id'] == 344 || $input['whatsapp_store_id'] == 280 || $input['whatsapp_store_id'] == 564 || $input['whatsapp_store_id'] == 681 || $input['whatsapp_store_id'] == 676 || $input['whatsapp_store_id'] == 682 || $input['whatsapp_store_id'] == 1083 || $input['whatsapp_store_id'] == 1502) {
                // Special case: allow max 3 images, remove oldest if needed
                foreach ($images as $image) {
                    $product->refresh();
                    if ($product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 3) {
                        $product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $product->refresh();
                    }
    
                    $product->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }else if($input['whatsapp_store_id'] == 327 || $input['whatsapp_store_id'] == 346 || $input['whatsapp_store_id'] == 406 || $input['whatsapp_store_id'] == 600 || $input['whatsapp_store_id'] == 41 || $input['whatsapp_store_id'] == 738 || $input['whatsapp_store_id'] == 927 || $input['whatsapp_store_id'] == 806 || $input['whatsapp_store_id'] == 530 || $input['whatsapp_store_id'] == 982 || $input['whatsapp_store_id'] == 990 || $input['whatsapp_store_id'] == 1158 || $input['whatsapp_store_id'] == 348 || $input['whatsapp_store_id'] == 1437 || $input['whatsapp_store_id'] == 1588 || $input['whatsapp_store_id'] == 1497) { 
                 foreach ($images as $image) {
                    $product->refresh();
                    if ($product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 2) {
                        $product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $product->refresh();
                    }
    
                    $product->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }else if($input['whatsapp_store_id'] == 118 || $input['whatsapp_store_id'] == 396 || $input['whatsapp_store_id'] == 424) {
                // Special case: allow max 3 images, remove oldest if needed
                foreach ($images as $image) {
                    $product->refresh();
                    if ($product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 6) {
                        $product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $product->refresh();
                    }
    
                    $product->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 865 || $input['whatsapp_store_id'] == 1557) {
                // Special case: allow max 3 images, remove oldest if needed
                foreach ($images as $image) {
                    $product->refresh();
                    if ($product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 4) {
                        $product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $product->refresh();
                    }
    
                    $product->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 208 || $input['whatsapp_store_id'] == 77 || $input['whatsapp_store_id'] == 908 || $input['whatsapp_store_id'] == 1209 || $input['whatsapp_store_id'] == 1241 || $input['whatsapp_store_id'] == 1323) {
                // Special case: allow max 3 images, remove oldest if needed
                foreach ($images as $image) {
                    $product->refresh();
                    if ($product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 5) {
                        $product->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $product->refresh();
                    }
    
                    $product->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else {
                // Default behavior: just add the first image (or override)
                if (count($images) > 0) {
                    // Optionally remove previous images
                    $product->clearMediaCollection(WhatsappStoreProduct::PRODUCT_IMAGES);
    
                    $product->addMedia($images[0])->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }
        }

        $whatsappStore = WhatsappStore::where('id', $input['whatsapp_store_id'])->where('tenant_id', getLogInTenantId())->first();        

        $data = [
            'id' => $product->id,
            'action' => 'create',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/products/create-update-delete", $data);  
    
        return $this->sendSuccess(__('messages.flash.wp_product_create'));
    }

    public function edit(WhatsappStoreProduct $wpStoreProduct)
    {
        $access = $wpStoreProduct->tenant_id == getLogInTenantId();
        if (!$access) {
            return $this->sendError('Unauthorized.');
        }
        $wpStoreProduct->load(['currency', 'category']);

        return $this->sendResponse($wpStoreProduct, 'Product retrieved successfully.');
    }

    public function editApi(Request $request, $alias, $productId)
    {
        // Find tenant from alias
        $tenant = WhatsappStore::where('url_alias', $alias)->where('tenant_id', getLogInTenantId())->first();

        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }
    
        if (!$tenant) {
            return $this->sendError('Store not found.', 404);
        }
    
        // Get product for this tenant
        $wpStoreProduct = WhatsappStoreProduct::where('id', $productId)
            ->where('tenant_id', $tenant->tenant_id)
            ->with(['currency', 'category'])
            ->first();
    
        if (!$wpStoreProduct) {
            return $this->sendError('Product not found.', 404);
        }
    
        return $this->sendResponse($wpStoreProduct, 'Product retrieved successfully.');
    }
    
    public function getStoreProducts(Request $request, $alias)
    {
        // Find whatsapp store by alias
        $store = WhatsappStore::where('url_alias', $alias)->where('tenant_id', getLogInTenantId())->first();

        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
           return $this->sendError('Trial expired or payment not completed',401);
        }
    
        if (!$store) {
            return $this->sendError('Store not found.', 404);
        }
    
        // Get paginated products with relations
        $products = WhatsappStoreProduct::where('whatsapp_store_id', $store->id)
            ->with(['currency', 'category', 'media']) // eager load
            ->orderByDesc('created_at')
            ->paginate($request->get('per_page', 10)); // default 10 per page
    
        return $this->sendResponse($products, 'Products retrieved successfully.');
    }
    
    public function getCategoriesAndCurrencies($alias)
    {
        // Find whatsapp store by alias
        $whatsappStore = \App\Models\WhatsappStore::where('url_alias', $alias)->where('tenant_id', getLogInTenantId())->first();

        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }
    
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }
    
        // Get product categories for this store
        $productsCategories = \App\Models\ProductCategory::where('whatsapp_store_id', $whatsappStore->id)
            ->pluck('name', 'id')
            ->toArray();
    
        // Get all currencies
        $currencies = \App\Models\Currency::all();
        $currencyList = [];
        foreach ($currencies as $currency) {
            $currencyList[$currency->id] = $currency->currency_icon . ' - ' . $currency->currency_name;
        }
    
        return $this->sendResponse([
            'categories' => $productsCategories,
            'currencies' => $currencyList
        ], 'Categories and currencies retrieved successfully.');
    }
    
    public function updateProduct(Request $request, $storeAlias, $productId)
    {
        // Find WhatsApp store by alias
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();


        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 401);
        }

        if (!$whatsappStore) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found.'
            ], 404);
        }
    
        // Find product
        $wpStoreProduct = WhatsappStoreProduct::where('id', $productId)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();
    
        if (!$wpStoreProduct) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }
    
        // Check tenant
        if ($wpStoreProduct->tenant_id != $whatsappStore->tenant_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 403);
        }
    
        // Update product fields
        $input = $request->all();
        $wpStoreProduct->update($input);
    
        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            if ($wpStoreProduct->whatsapp_store_id == 71 || $input['whatsapp_store_id'] == 128 || $input['whatsapp_store_id'] == 322 || $input['whatsapp_store_id'] == 280 || $input['whatsapp_store_id'] == 564 || $input['whatsapp_store_id'] == 681 || $input['whatsapp_store_id'] == 676 || $input['whatsapp_store_id'] == 682 || $input['whatsapp_store_id'] == 1083) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 3) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }else if($input['whatsapp_store_id'] == 327 || $input['whatsapp_store_id'] == 346 || $input['whatsapp_store_id'] == 406 || $input['whatsapp_store_id'] == 600 || $input['whatsapp_store_id'] == 41 || $input['whatsapp_store_id'] == 738 || $input['whatsapp_store_id'] == 927 || $input['whatsapp_store_id'] == 806 || $input['whatsapp_store_id'] == 530 || $input['whatsapp_store_id'] == 982 || $input['whatsapp_store_id'] == 990 || $input['whatsapp_store_id'] == 1158 || $input['whatsapp_store_id'] == 348  || $input['whatsapp_store_id'] == 1437 || $input['whatsapp_store_id'] == 1588 || $input['whatsapp_store_id'] == 1497) {
                 foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 2) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 118 || $input['whatsapp_store_id'] == 392 || $input['whatsapp_store_id'] == 396 || $input['whatsapp_store_id'] == 424) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 6) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 865 || $input['whatsapp_store_id'] == 1557) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 4) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 208 || $input['whatsapp_store_id'] == 77 || $input['whatsapp_store_id'] == 908 || $input['whatsapp_store_id'] == 1209 || $input['whatsapp_store_id'] == 1241 || $input['whatsapp_store_id'] == 1323) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 5) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else {
                // Default behavior: replace with first image
                if (count($images) > 0) {
                    $wpStoreProduct->clearMediaCollection(WhatsappStoreProduct::PRODUCT_IMAGES);
    
                    $wpStoreProduct->addMedia($images[0])->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.',
            'data' => $wpStoreProduct
        ]);
    }
    

    public function updateBulkProduct(Request $request, $storeAlias){
        // Find WhatsApp store by alias
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();


        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 401);
        }

        if (!$whatsappStore) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found.'
            ], 404);
        }

        $input = $request->all();

        if($input['action'] == 'update_stock'){

           $products = json_decode($input['products'], true);

           // Prepare CASE query parts
           $caseStatements = [];
           $ids = [];

           foreach ($products as $product) {
                if (!isset($product['product_id']) || !isset($product['quantity'])) {
                    continue;
                }

                $productId = (int) $product['product_id'];
                $quantity = (int) $product['quantity'];

                $ids[] = $productId;
                $caseStatements[] = "WHEN id = {$productId} THEN {$quantity}";
            }

            $ids = array_unique($ids);
            $caseSql = implode(' ', $caseStatements);
            $idsString = implode(',', $ids);

            // Single bulk update query
            DB::statement("
                UPDATE whatsapp_store_products
                SET available_stock = CASE
                    {$caseSql}
                    ELSE available_stock
                END
                WHERE id IN ({$idsString})
                AND tenant_id = ?
            ", [getLogInTenantId()]);

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully.'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.'
        ]);
    }

    public function destroyProduct($storeAlias, $productId)
    {
        // Find WhatsApp store by alias
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();

        $plan = Subscription::whereTenantId(getLogInTenantId())->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 401);
        }

        if (!$whatsappStore) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found.'
            ], 404);
        }
    
        // Find product
        $product = WhatsappStoreProduct::where('id', $productId)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }
    
        // Check tenant
        if ($product->tenant_id != $whatsappStore->tenant_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 403);
        }
    
        // Check if product has pending or dispatched orders
        $hasOrders = $product->ordersItems()
            ->whereHas('wpOrder', function ($query) {
                $query->whereIn('status', [\App\Models\WpOrder::PENDING, \App\Models\WpOrder::DISPATCHED]);
            })->exists();
    
        if ($hasOrders) {
            return response()->json([
                'success' => false,
                'message' => 'Product has pending or dispatched orders and cannot be deleted.'
            ], 422);
        }
    
        try {
            // Delete product images
            $product->clearMediaCollection(\App\Models\WhatsappStoreProduct::PRODUCT_IMAGES);
    
            // Delete product
            $product->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function update(WhatsappStoreProduct $wpStoreProduct, UpdateWhatsappProductRequest $request)
    {
        if ($wpStoreProduct->tenant_id != getLogInTenantId()) {
            return $this->sendError('Unauthorized.');
        }
    
        $input = $request->all();
        $wpStoreProduct->update($input);
    
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            if ($wpStoreProduct->whatsapp_store_id == 71 || $input['whatsapp_store_id'] == 128 || $input['whatsapp_store_id'] == 322 || $input['whatsapp_store_id'] == 280 || $input['whatsapp_store_id'] == 564 || $input['whatsapp_store_id'] == 681 || $input['whatsapp_store_id'] == 676 || $input['whatsapp_store_id'] == 682 || $input['whatsapp_store_id'] == 1083) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 3) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }else if($input['whatsapp_store_id'] == 327 || $input['whatsapp_store_id'] == 346 || $input['whatsapp_store_id'] == 406 || $input['whatsapp_store_id'] == 600 || $input['whatsapp_store_id'] == 41 || $input['whatsapp_store_id'] == 738 || $input['whatsapp_store_id'] == 927 || $input['whatsapp_store_id'] == 530 || $input['whatsapp_store_id'] == 806 || $input['whatsapp_store_id'] == 982 || $input['whatsapp_store_id'] == 990 || $input['whatsapp_store_id'] == 1158 || $input['whatsapp_store_id'] == 348 || $input['whatsapp_store_id'] == 1437 || $input['whatsapp_store_id'] == 1588 || $input['whatsapp_store_id'] == 1497) {
                 foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 2) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 118 || $input['whatsapp_store_id'] == 392 || $input['whatsapp_store_id'] == 396 || $input['whatsapp_store_id'] == 424) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 6) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 208 || $input['whatsapp_store_id'] == 77 || $input['whatsapp_store_id'] == 908  || $input['whatsapp_store_id'] == 1209 || $input['whatsapp_store_id'] == 1241 || $input['whatsapp_store_id'] == 1323) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 5) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else if($input['whatsapp_store_id'] == 865 || $input['whatsapp_store_id'] == 1557) {
                // Special case: rolling image behavior
                foreach ($images as $image) {
                    $wpStoreProduct->refresh();
                    if ($wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->count() >= 4) {
                        $wpStoreProduct->getMedia(WhatsappStoreProduct::PRODUCT_IMAGES)->first()->delete();
                        $wpStoreProduct->refresh();
                    }
    
                    $wpStoreProduct->addMedia($image)->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            } else {
                // Default behavior: replace with first image
                if (count($images) > 0) {
                    $wpStoreProduct->clearMediaCollection(WhatsappStoreProduct::PRODUCT_IMAGES);
    
                    $wpStoreProduct->addMedia($images[0])->toMediaCollection(
                        WhatsappStoreProduct::PRODUCT_IMAGES,
                        config('app.media_disc')
                    );
                }
            }
        }

        $whatsappStore = WhatsappStore::where('id', $wpStoreProduct->whatsapp_store_id)->where('tenant_id', getLogInTenantId())->first();        

        $data = [
            'id' => $wpStoreProduct->id,
            'action' => 'update',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/products/create-update-delete", $data);
    
        return $this->sendSuccess(__('messages.flash.wp_product_update'));
    }


    public function destroy($id)
    {
        $product = WhatsappStoreProduct::findOrFail($id);

        try {

            $isDelete = $product->ordersItems()->whereHas('wpOrder', function ($query) {
                $query->whereIn('status', [WpOrder::PENDING, WpOrder::DISPATCHED]);
            })->exists();

            if ($isDelete) {
                return $this->sendError('Product has orders.');
            }

            if ($product->tenant_id != getLogInTenantId()) {
                return $this->sendError('Unauthorized.');
            }

            $product->clearMediaCollection(WhatsappStoreProduct::PRODUCT_IMAGES);
            $product->delete();

        $whatsappStore = WhatsappStore::where('id', $product->whatsapp_store_id)->where('tenant_id', getLogInTenantId())->first();        

        $data = [
            'id' => $product->id,
            'action' => 'delete',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/products/create-update-delete", $data);     

            return $this->sendSuccess('Product deleted successfully.');
        } catch (\Exception $e) {

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function destroyMedia($id)
    {
        $media = Media::findOrFail($id);

        if ($media->model_type != WhatsappStoreProduct::class) {
            return $this->sendError('Unauthorized.');
        }

        $media->delete();

        return $this->sendSuccess(__('messages.flash.product_image_delete'));
    }


    public function productBuy(WpProductBuyRequest $request)
    {
        if ($request->ajax()) {
            // ✅ Log Entry
            

            try {
                setLocalLang($request->language);

                $alias = $request->url_alias;
                $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
                if (!$whatsappStore) {
                    
                    abort(404);
                }

                $products = json_decode($request->input('products'), true);
                $grandTotal = 0;

                // 1. Calculate Total & Check Stock
                foreach ($products as $product) {
                    $storeProduct = WhatsappStoreProduct::find($product['id']);
                    if (!$storeProduct || $storeProduct->available_stock < $product['qty']) {
                        
                        return $this->sendError(__('messages.flash.product_out_of_stock', ['name' => $storeProduct->name]));
                    }
                    $grandTotal += $product['qty'] * $storeProduct->selling_price;
                }

                // 2. Apply Discount
                $discountAmount = 0;
                if ($whatsappStore->dis_perc != 0) {
                    $mobileDiscountSettings = json_decode($model->mobile_discount_settings, true);

                    $finalDiscount = $whatsappStore->dis_perc;

                    if (!empty($mobileDiscountSettings)) {
                         foreach ($mobileDiscountSettings as $item) {
                            if ($item['mobile'] == $userMobile) {

                                // If discount is 0 → no discount
                                if ((float)$item['discount'] === 0.0) {
                                    $finalDiscount = 0;
                                } else {
                                    $finalDiscount = (float)$item['discount'];
                                }

                                break; // stop loop once found
                            }
                        }
                    }else{
                        $discountAmount = ($grandTotal * $finalDiscount) / 100;
                        $grandTotal = $grandTotal - $discountAmount;
                    }
                }

                 if ($request->filled('coupon_code')) {
                    $response = Http::withHeaders([
                    'store_id' => $whatsappStore->id
                    ])->post('https://backend.vcardking.com/analytics/api/analytics/coupons/apply', [
                        'coupon_code'  => $request->coupon_code,
                        'order_amount' => $grandTotal
                    ]);

                    if ($response->successful()) {
                        $couponData = $response->json();

                        if (isset($couponData['data']['final_amount'])) {
                            $request->merge([
                                'discount_amount'=> ($grandTotal - $couponData['data']['final_amount'])
                            ]);
                        }
                    }
                 }


                if ($whatsappStore->id == 1463) {

                    if(!$request->pincode){
                        return $this->sendError("Pincode is required for this store.");
                    }

                    $pincode = strval($request->pincode);
                    $prefix = substr($pincode, 0, 2);

                    $stateRanges = [
                        "11" => "Delhi",
                        "12" => "Haryana",
                        "13" => "Haryana",
                        "14" => "Punjab",
                        "15" => "Punjab",
                        "16" => "Chandigarh",
                        "17" => "Himachal Pradesh",
                        "18" => "Jammu & Kashmir",
                        "19" => "Jammu & Kashmir",
                        "20" => "Uttar Pradesh",
                        "21" => "Uttar Pradesh",
                        "22" => "Uttar Pradesh",
                        "23" => "Uttar Pradesh",
                        "24" => "Uttarakhand",
                        "25" => "Uttarakhand",
                        "26" => "Uttarakhand",
                        "27" => "Uttar Pradesh",
                        "28" => "Uttar Pradesh",
                        "30" => "Rajasthan",
                        "31" => "Rajasthan",
                        "32" => "Rajasthan",
                        "33" => "Rajasthan",
                        "34" => "Rajasthan",
                        "36" => "Gujarat",
                        "37" => "Gujarat",
                        "38" => "Gujarat",
                        "39" => "Gujarat",
                        "40" => "Maharashtra",
                        "41" => "Maharashtra",
                        "42" => "Maharashtra",
                        "43" => "Maharashtra",
                        "44" => "Maharashtra",
                        "45" => "Madhya Pradesh",
                        "46" => "Madhya Pradesh",
                        "47" => "Madhya Pradesh",
                        "48" => "Chhattisgarh",
                        "49" => "Chhattisgarh",
                        "50" => "Telangana",
                        "51" => "Telangana",
                        "52" => "Andhra Pradesh",
                        "53" => "Andhra Pradesh",
                        "56" => "Karnataka",
                        "57" => "Karnataka",
                        "58" => "Karnataka",
                        "59" => "Karnataka",
                        "60" => "Tamil Nadu",
                        "61" => "Tamil Nadu",
                        "62" => "Tamil Nadu",
                        "63" => "Tamil Nadu",
                        "64" => "Tamil Nadu",
                        "67" => "Kerala",
                        "68" => "Kerala",
                        "69" => "Kerala",
                        "70" => "West Bengal",
                        "71" => "West Bengal",
                        "72" => "West Bengal",
                        "73" => "West Bengal",
                        "74" => "West Bengal",
                        "75" => "Odisha",
                        "76" => "Odisha",
                        "77" => "Odisha",
                        "78" => "Assam",
                        "79" => "Assam",
                        "80" => "Bihar",
                        "81" => "Bihar",
                        "82" => "Bihar",
                        "83" => "Jharkhand",
                        "84" => "Jharkhand",
                        "85" => "Jharkhand",
                        "90" => "Army Postal Service",
                        "91" => "Army Postal Service",
                        "92" => "Army Postal Service",
                        "93" => "Army Postal Service",
                        "94" => "Army Postal Service",
                        "95" => "Army Postal Service",
                        "96" => "Army Postal Service",
                        "97" => "Army Postal Service",
                        "98" => "Army Postal Service",
                        "99" => "Army Postal Service"
                    ];

                    $state = $stateRanges[$prefix] ?? "Unknown State";
                    if($state == "Gujarat")
                    {
                        $grandTotal = $grandTotal + 50; // Add delivery charge   
                    }else{
                        if($state == "Unknown State"){
                            return $this->sendError("Invalid pincode.");
                        }
                        $grandTotal = $grandTotal + 70; // Add delivery charge
                    }
                        
                }

                // 3. Determine Payment Method
                $selectedPayment = $request->payment_method ?? "cash";
                
                if (($whatsappStore->wp_razorpay_enabled == 1 || $whatsappStore->wp_phonepe_enabled == 1) && empty($request->payment_method)) {
                    $selectedPayment = 'online';
                }

               

                // ---------------------------------------------------------
                // OPTION A: RAZORPAY
                // ---------------------------------------------------------
                if ($whatsappStore->wp_razorpay_enabled == 1 && $selectedPayment == "online" && $whatsappStore->id != 1142) {
                    
                

                    $api = new Api($whatsappStore->wp_razorpay_key, $whatsappStore->wp_razorpay_secret);
                    $total = $grandTotal * 100; // in paise

                    $razorpayOrder = $api->order->create([
                        'receipt'         => Str::upper(Str::random(10)),
                        'amount'          => $total,
                        'currency'        => 'INR',
                        'payment_capture' => 1
                    ]);

                    return response()->json([
                        'success'  => true,
                        'payment'  => true,
                        'gateway'  => 'razorpay',
                        'razorpay' => [
                            'order_id'    => $razorpayOrder['id'],
                            'key'         => $whatsappStore->wp_razorpay_key,
                            'amount'      => $total,
                            'currency'    => 'INR',
                            'name'        => $whatsappStore->name,
                            'description' => 'Order Payment',
                        ],
                        'orderData' => $request->all()
                    ]);
                }

                // ---------------------------------------------------------
                // OPTION B: PHONEPE
                // ---------------------------------------------------------
                if ($whatsappStore->wp_razorpay_enabled == 1 && $selectedPayment == "online" && $whatsappStore->id == 1142) {
                    
                    

                    // 1. Get Access Token


                    // 1. Get Token (Ensure this function returns the raw token string)
                    $accessToken = $this->getPhonePeAccessToken($whatsappStore, $request->env_type ?? 'production');
                    
                    if (!$accessToken) {
                        
                        return $this->sendError("Payment initialization failed (Auth).");
                    }
                    
                    // 2. Prepare Payload
                    $merchantTransactionId = "WP" . Str::random(6) . time();
                    $amountPaise = $grandTotal * 100;

                    $redirectUrl =  url('/payment-success') . '?tr_id=' . $merchantTransactionId;
                    
                    $payload = [
                        // FIX: V2 Checkout API uses 'merchantOrderId', not 'merchantTransactionId'
                        'merchantOrderId' => $merchantTransactionId, 
                        'amount' => $amountPaise,
                        'paymentFlow' => [
                            'type' => 'PG_CHECKOUT',
                            'message' => 'Payment message used for collect requests',
                            'merchantUrls' => [
                                'redirectUrl' => $redirectUrl
                            ]
                        ]
                    ];
                    
                  
                    //  UAT 'https://api-preprod.phonepe.com/apis/pg-sandbox' 
                    $baseUrl = 'https://api.phonepe.com/apis/pg' ; // Double check Prod URL for V2, sometimes it is different
                    
                    // 4. Call Create Payment API
                    // FIX: Use 'O-Bearer' schema explicitly
                    $response = Http::withToken($accessToken, 'O-Bearer') 
                        ->post("$baseUrl/checkout/v2/pay", $payload);
                    
                    if ($response->successful()) {
                        $data = $response->json();
                     
                    
                        // FIX: Verify path to URL in response structure (V2 might differ from V1)
                        $instrumentUrl =  $data['redirectUrl'] ?? null;
                    

                        if ($instrumentUrl) {
                            
                            
                            return response()->json([
                                'success' => true,
                                'payment' => true,
                                'gateway' => 'phonepe',
                                'phonepe' => [
                                    'redirect_url' => $instrumentUrl,
                                    'merchant_transaction_id' => $merchantTransactionId
                                ],
                                'orderData' => $request->all()
                            ]);
                        }
                    } else {
                       
                       
                    }
                    
                    return $this->sendError("PhonePe init failed: " . $response->body());
                }

                // Else -> Place standard COD order
               
                return $this->placeWpOrder($request, $products, $whatsappStore);

            } catch (\Exception $e) {
                return $this->sendError($e->getMessage());
            }
        }
    }

    public function finalizeOrder(Request $request)
    {


        $alias = $request->url_alias;
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if (!$whatsappStore) {
            abort(404);
        }


    if($request->razorpay_order_id && $request->razorpay_signature != "phonepe-payment"){
            // ✅ Verify Razorpay signature
        $generatedSignature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
            $whatsappStore->wp_razorpay_secret
        );

        if ($generatedSignature !== $request->razorpay_signature) {
            return $this->sendError("Payment verification failed.");
        }
    }



        // ✅ Parse products
        $products = json_decode($request->input('products'), true);
        if (!$products || !is_array($products)) {
            return $this->sendError("Products data missing.");
        }

        // ✅ Place order
        $orderResponse = $this->placeWpOrder($request, $products, $whatsappStore);

        if ($orderResponse->original['success']) {
            $wpOrder = $orderResponse->original['data'];

            // ✅ Update Razorpay payment info
            
            if( $request->razorpay_order_id){
            $wpOrder->razorpay_order_id   = $request->razorpay_order_id;
            $wpOrder->razorpay_payment_id = $request->razorpay_payment_id;
            $wpOrder->payment_status      = 'PAID';            
            }

            $wpOrder->save();

            return $this->sendResponse($wpOrder, 'Order placed successfully.');
        }

        return $this->sendError("Order creation failed after payment.");
    }


    private function placeWpOrder($request, $products, $whatsappStore)
    {
        DB::beginTransaction();
        try {
            $input = $request->except('products');
            $orderID = Str::upper(Str::random(8));
            $input['order_id'] = $orderID;

                
                if($whatsappStore->id == 721 || $whatsappStore->id == 41 || $whatsappStore->id == 424){
                    if($input['grand_total'] < $whatsappStore->minimum_order_amount){
                        $input['courier_charges'] = $whatsappStore->courier_charge;
                        $input['grand_total'] = $input['grand_total'] + $whatsappStore->courier_charge;
                    }else{
                        $input['courier_charges'] = 0;
                    }
                }


            if ($whatsappStore->id == 3) {
                $input['courier_charges'] = $whatsappStore->courier_charge;
                $input['grand_total'] = $input['grand_total'] + $whatsappStore->courier_charge;
            }

            $discountAmount = 0;

                    if ($whatsappStore->dis_perc != 0) {
                        $discountAmount = ($input['grand_total'] * $whatsappStore->dis_perc) / 100;
                        $input['grand_total'] = $input['grand_total'] - $discountAmount;
                    }

                    $input['dis_amt'] = $discountAmount;

            if ($request->filled('discount_amount')) {
                $input['grand_total'] = $input['grand_total'] - $request->discount_amount;
                $input['dis_amt'] = $request->discount_amount;
            }

             if ($request->filled('coupon_code')) {
                $input['coupon_code'] = $request->coupon_code;
            }

            $wpOrder = WpOrder::create($input);

            $sessionIds = [];

            foreach ($products as $product) {
                WpOrderItem::create([
                    'wp_order_id' => $wpOrder->id,
                    'product_id'  => $product['id'],
                    'price'       => $product['price'],
                    'qty'         => $product['qty'],
                    'total_price' => $product['total_price'],
                    'size'        => $product['size'] ?? '',
                    'color'       => $product['color'] ?? '',
                    'attribute'       => $product['attribute'] ?? '',
                    'offer_text'       => $product['offer_text'] ?? ''
                ]);

                // Store session_id in array if exists
                        if (isset($product['session_id'])) {
                            $sessionIds[] = $product['session_id'];
                        }

                $storeProduct = WhatsappStoreProduct::find($product['id']);
                if ($storeProduct) {
                    $storeProduct->available_stock -= $product['qty'];
                    $storeProduct->save();
                }
            }

              DB::commit();

                $alias = $request->url_alias;
                

                

                $datacreate = [
                    'name' => $input["name"],
                    'email' => null,
                    'country_code' => $input["region_code"],
                    'phone' => $input["phone"],
                    'address' => $input["address"]
                ];
                
              
              $analyticsNew = new AnalyticsController();

              $mainsessionId = $analyticsNew->decryptData($request->input("sc_id"));
                $datam = [
                    'id' => $wpOrder->id,
                    'action' => 'create',
                    'store_alias' => $alias,
                    'main_session_id' => $mainsessionId
                ];

              $encodedId = urlencode($analyticsNew->decryptData($request->input("sc_id")));
              
             
            
              $analyticsNew->apiSyncPut("analytics/main-sessions/".$encodedId, $datacreate);

               

              $analyticsNew->apiSync("analytics/orders/operations", $datam);   

              $analyticsNew->endInactiveProductInquiryNew($sessionIds);


            $wpOrder->load(['products.product.currency']);
            return $this->sendResponse($wpOrder, 'Order Created Successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateSessionUserData(Request $request){
        $input = $request->all();

        $analyticsNew = new AnalyticsController();

        $datacreate = [
            'name' => $input["name"],
            'email' => null,
            'country_code' => $input["region_code"],
            'phone' => $input["phone"],
            'address' => null
        ];

        $encodedId = urlencode($analyticsNew->decryptData($request->input("sc_id")));
              
        $analyticsNew = new AnalyticsController();

        $analyticsNew->apiSyncPut("analytics/main-sessions/".$encodedId, $datacreate);
        
        return $this->sendResponse([], 'Order Created Successfully.');
    }

private function getPhonePeAccessToken($store, $env = 'uat')
{
    Log::info("WpOrder: Requesting PhonePe Token");

    // Define Base URLs
    // UAT 'https://api-preprod.phonepe.com/apis/pg-sandbox';
    $baseUrl = 'https://api.phonepe.com/apis/identity-manager';
    
    // ($env === 'uat') 
        // ? 'https://api-preprod.phonepe.com/apis/pg-sandbox' 
        // : 'https://api.phonepe.com/apis/identity-manager';
        

    
    $url = "$baseUrl/v1/oauth/token";

    try {
        $response = Http::asForm()->post($url, [
            'client_id'      => $store->wp_razorpay_key, // Consider moving to config('phonepe.client_id')
            'client_secret'  => $store->wp_razorpay_secret, // Consider moving to config('phonepe.client_secret')
            'client_version' => '1',
            'grant_type'     => 'client_credentials',
        ]);
        
         Log::info("WpOrder: PhonePe Token response" , [ 'body'   => $response->body()]);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['access_token'];
            

            // 4. Save to Cache (Subtract 60s to be safe)
           Session::put('phonepe_token', $token);

            Log::info("WpOrder: New PhonePe Token Cached");
            return $token;
        } else {
            Log::error("WpOrder: PhonePe Token Error", [
                'status' => $response->status(),
                'body'   => $response->body()
            ]);
        }
    } catch (\Exception $e) {
        Log::error("WpOrder: PhonePe Token Exception", ['msg' => $e->getMessage()]);
    }

    return null;
}


public function paymentSuccessPage(Request $request)
{
    Log::info('PhonePe: Incoming Request', ['input' => $request->all()]);

    $input = $request->all();
    $paymentData = [];

    // 1. Try to get data from PhonePe POST (Standard way)
    if (isset($input['response'])) {
        $paymentData = json_decode(base64_decode($input['response']), true);
    } 
    
    // 2. FAILSAFE: If POST failed, check for 'tr_id' in the URL (The fix!)
    if (empty($paymentData) || empty($paymentData['data']['merchantTransactionId'])) {
        
        // Use input() to get the parameter from the URL
        $urlTransactionId = $request->input('tr_id');

        if ($urlTransactionId) {
            Log::info('PhonePe: Success! Recovered ID from URL', ['id' => $urlTransactionId]);
            
            // Reconstruct the data so your View works
            $paymentData = [
                'code' => 'PAYMENT_PENDING', 
                'merchantTransactionId' => $urlTransactionId,
                'data' => [
                    'merchantTransactionId' => $urlTransactionId
                ]
            ];
        } else {
            Log::error('PhonePe: Critical - No ID found in POST or URL.');
        }
    }

    return view('whatsapp_stores.payment_success', compact('paymentData'));
}

public function verifyPhonePePayment(Request $request)
{
    $transactionId = $request->transaction_id;


           $accessToken = Session::get('phonepe_token');
           

        // UAT   https://api-preprod.phonepe.com/apis/pg-sandbox'
        $baseUrl =  'https://api.phonepe.com/apis/pg' ;
           
        $url = "$baseUrl/checkout/v2/order/$transactionId/status";


         $response = Http::withToken($accessToken, 'O-Bearer') 
            ->get($url);

        if ($response->successful()) {
            $data = $response->json();
            
            
            if($data['state'] == "FAILED"){
                  return response()->json([

                'success' => false,

                'status' => 'FAILED'

            ]);
            }else{
              return response()->json([
                'success' => true,
                'status' => 'PAYMENT_SUCCESS',
                'amount' => $data['amount'] / 100 // Convert paise to rupees
            ]);   
            }
            
           
        }

    
        return 'FAILED';


}


    public function showOrder(WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }
        $plan = Subscription::whereTenantId($wpOrder->wpStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }
        $wpOrder->load(['products.product']);

        if($wpOrder->wp_store_id == 208 || $wpOrder->wp_store_id == 424 || $wpOrder->wp_store_id == 1488){
            $wpOrder->available_products = WhatsappStoreProduct::where('whatsapp_store_id', $wpOrder->wp_store_id)
            ->where('available_stock', '>', 0)
            ->get();   
        }

        return $this->sendResponse($wpOrder, 'Order retrieved successfully.');
    }

    public function updateOrderStatus(Request $request, WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }

        $status = $request->input('status');

        $wpOrder->update(['status' => $status]);
        if ($status == WpOrder::CANCELLED) {
            $wpOrderItem  = WpOrderItem::where('wp_order_id', $wpOrder->id)->first();
            $storeProduct = WhatsappStoreProduct::find($wpOrderItem->product_id);
            if ($storeProduct) {
                $storeProduct->available_stock += $wpOrderItem['qty'];
                $storeProduct->save();
            }
        }

        $wpOrder->load(['products.product.currency', 'wpStore:id,url_alias']);

        $baseUrl = config('app.url');

        $whatsappStore = WhatsappStore::where('id', $wpOrder->wp_store_id)->where('tenant_id', getLogInTenantId())->first();
        
        $data = [
            'id' => $wpOrder->id,
            'action' => 'update_order_status',
            'store_alias' => $whatsappStore->url_alias,
            'status'=> $wpOrder->status
        ];        

        $analyticsNew = new AnalyticsController();
        $analyticsNew->apiSync("analytics/orders/operations", $data);

        return $this->sendResponse([$wpOrder, $baseUrl], 'Order status updated successfully.');
    }

    public function updateOrderStatusApi(Request $request, WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }

        $plan = Subscription::whereTenantId($wpOrder->wpStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $status = $request->input('status');

        $wpOrder->update(['status' => $status]);
        if ($status == WpOrder::CANCELLED) {
            $wpOrderItem  = WpOrderItem::where('wp_order_id', $wpOrder->id)->first();
            $storeProduct = WhatsappStoreProduct::find($wpOrderItem->product_id);
            if ($storeProduct) {
                $storeProduct->available_stock += $wpOrderItem['qty'];
                $storeProduct->save();
            }
        }

        $wpOrder->load(['products.product.currency', 'wpStore:id,url_alias']);

        $baseUrl = config('app.url');

        return $this->sendResponse([$wpOrder, $baseUrl], 'Order status updated successfully.');
    }

    public function createOnlinePaymentIntent(Request $request){
        try {
            $alias = $request->url_alias;
            $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
            if (!$whatsappStore) {      
                    abort(404);
            }

            $products = $request->input('products');
            $grandTotal = 0;

            foreach ($products as $product) {
                $storeProduct = WhatsappStoreProduct::find($product['product_id']);
                if (!$storeProduct || $storeProduct->available_stock < $product['qty']) {    
                    return $this->sendError(__('messages.flash.product_out_of_stock', ['name' => $storeProduct->name]));
                }
                $grandTotal += $product['qty'] * $storeProduct->selling_price;
            }


            if ($request->filled('coupon_code')) {

                $response = Http::withHeaders([
                    'store_id' => $whatsappStore->id
                ])->post('https://backend.vcardking.com/analytics/api/analytics/coupons/apply', [
                    'coupon_code'  => $request->coupon_code,
                    'order_amount' => $grandTotal
                ]);

                if ($response->successful()) {
                    $couponData = $response->json();

                    if (isset($couponData['data']['final_amount'])) {
                        $grandTotal = $couponData['data']['final_amount'];
                    }
                }
            }

            $gst = $grandTotal * 0.05;

            // Add GST to total
            $grandTotal = $grandTotal + $gst;

            

            $api = new Api($whatsappStore->wp_razorpay_key, $whatsappStore->wp_razorpay_secret);
            $total = $grandTotal * 100; // in paise

            $razorpayOrder = $api->order->create([
                'receipt'         => Str::upper(Str::random(10)),
                'amount'          => $total,
                'currency'        => 'INR',
                'payment_capture' => 1
            ]);

            return response()->json([
                'success'  => true,
                'payment'  => true,
                'gateway'  => 'razorpay',
                'razorpay' => [
                    'order_id'    => $razorpayOrder['id'],
                    'key'         => $whatsappStore->wp_razorpay_key,
                    'amount'      => $total,
                    'currency'    => 'INR',
                    'name'        => $whatsappStore->name,
                    'description' => 'Order Payment',
                ],
                'orderData' => $request->all()
            ]);

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function apiProductBuy(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $input = $request->except('products');
            $products = $request->input('products');
            $alias = $request->url_alias;
    
            $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
            if (!$whatsappStore) {
                return response()->json([
                    'success' => false,
                    'message' => 'Store not found.',
                ], 404);
            }
    
            foreach ($products as $product) {
                $storeProduct = WhatsappStoreProduct::find($product['id']);
                if (!$storeProduct || $storeProduct->available_stock < $product['qty']) {
                    return response()->json([
                        'success' => false,
                        'message' => __('messages.flash.product_out_of_stock', ['name' => $storeProduct->name ?? 'Product']),
                    ], 422);
                }
            }
    
            $orderID = Str::upper(Str::random(8));
            $input['order_id'] = $orderID;
    
            $wpOrder = WpOrder::create($input);
    
            foreach ($products as $product) {
                WpOrderItem::create([
                    'wp_order_id' => $wpOrder->id,
                    'product_id' => $product['id'],
                    'price' => $product['price'],
                    'qty' => $product['qty'],
                    'total_price' => $product['total_price'],
                ]);
    
                // Update product stock
                $storeProduct = WhatsappStoreProduct::find($product['id']);
                if ($storeProduct) {
                    $storeProduct->available_stock -= $product['qty'];
                    $storeProduct->save();
                }
            }
    
            DB::commit();
    
            $wpOrder->load(['products.product.currency']); // Eager loading
    
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully.',
                'data' => $wpOrder,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Order failed: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function updateInvoiceDetails(Request $request, WpOrder $wpOrder){
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }
        
        DB::beginTransaction();
        try {
            if ($request->type === 'ADVANCE_INVOICE') {
            // ✅ Only update advance invoice fields
            if (!empty($request->advance_payment)) {
            $wpOrder->advance_payment = $request->advance_payment;
            }
            $wpOrder->notes = $request->notes;
            $wpOrder->save();
            
            DB::commit();

            } else {
            // 1. Update the main order totals
            $wpOrder->grand_total = $request->grand_total;
            $wpOrder->auto_charges = $request->auto_charges;
            $wpOrder->courier_charges = $request->courier_charges;
            if (!empty($request->advance_payment)) {
                $wpOrder->advance_payment = $request->advance_payment;
            }
            $wpOrder->notes = $request->notes;
            $wpOrder->save();
    
            // 2. Remove products
            if ($request->has('remove_products') && is_array($request->remove_products)) {
                WpOrderItem::where('wp_order_id', $wpOrder->id)
                    ->whereIn('id', $request->remove_products)
                    ->delete();
            }
    
            // 3. Add new products
            if ($request->has('added_products') && is_array($request->added_products)) {
                foreach ($request->added_products as $productData) {
                    WpOrderItem::create([
                        'wp_order_id' => $wpOrder->id,
                        'product_id' => $productData['product_id'],
                        'price' => $productData['price'],
                        'qty' => $productData['qty'],
                        'total_price' => $productData['total_price'],
                        'size' => $productData['size'] ?? '',
                        'color' => $productData['color'] ?? '',
                    ]);
                }
            }
    
            // 4. Update existing products
            if ($request->has('products') && is_array($request->products)) {
                foreach ($request->products as $productData) {
                    if (isset($productData['id'])) {
                        $orderItem = WpOrderItem::find($productData['id']);
                        if ($orderItem && $orderItem->wp_order_id == $wpOrder->id) {
                            $orderItem->price = $productData['price'] ?? $orderItem->price;
                            $orderItem->qty = $productData['qty'] ?? $orderItem->qty;
                            $orderItem->total_price = $productData['total_price'] ?? $orderItem->total_price;
                            $orderItem->save();
                        }
                    }
                }
            }
    
            DB::commit();
        }
    
            $wpOrder->load(['products.product.currency', 'wpStore:id,url_alias']);
            $baseUrl = config('app.url');
    
            return $this->sendResponse([$wpOrder, $baseUrl], 'Invoice updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Failed to update invoice details.', $e->getMessage());
        }
    }
    
    public function updateOrderPaymentStatus(Request $request, WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }

        $status = $request->input('status');

        $wpOrder->update(['payment_status' => $status]);

        $wpOrder->load(['products.product.currency', 'wpStore:id,url_alias']);

        $baseUrl = config('app.url');

        $whatsappStore = WhatsappStore::where('id', $wpOrder->wp_store_id)->where('tenant_id', getLogInTenantId())->first();
        
        
        $data = [
            'id' => $wpOrder->id,
            'action' => 'update_payment_status',
            'store_alias' => $whatsappStore->url_alias,
            'payment_status'=> $wpOrder->payment_status
        ];        

        $analyticsNew = new AnalyticsController();
        $analyticsNew->apiSync("analytics/orders/operations", $data); 

        return $this->sendResponse([$wpOrder, $baseUrl], 'Order Payment status updated successfully.');
    }

    public function updateOrderPaymentStatusApi(Request $request, WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }

        $plan = Subscription::whereTenantId($wpOrder->wpStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $status = $request->input('status');

        $wpOrder->update(['payment_status' => $status]);

        $wpOrder->load(['products.product.currency', 'wpStore:id,url_alias']);

        $baseUrl = config('app.url');

        return $this->sendResponse([$wpOrder, $baseUrl], 'Order Payment status updated successfully.');
    }
    
    public function downloadInvoice(WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }
        $wpOrder->load(['products.product']);
        
        $pdf = Pdf::loadView('invoices.wp_order', compact('wpOrder'));

        return $pdf->download("Invoice-{$wpOrder->id}.pdf");
    }

    public function generateShippingInvoice(WpOrder $wpOrder)
    {
        $access = $wpOrder->wpStore->tenant_id == getLogInTenantId();
        if (!$access) {
            Flash::error(__('Unauthorized.'));
            return redirect()->back();
        }
        $wpOrder->load(['products.product']);
        
        $pdf = Pdf::loadView('invoices.shipping_label', compact('wpOrder'));

        $width = 5.3 * 72;  // 381.6 points
        $height = 3 * 72;   // 216 points

        $customPaper = [0, 0, $width, $height]; 

        $pdf->setPaper($customPaper, 'portrait');

        return $pdf->stream('shipping-invoice-' . $wpOrder->id . '.pdf');
    }

    public function wp_api_index(Request $request)
    {
        $query = WpOrder::with('wpStore');

        if ($request->has('wp_store_id')) {
            $query->where('wp_store_id', $request->wp_store_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search (by order_id, name, phone)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Sorting
        if ($request->filled('sort_by') && $request->filled('sort_order')) {
            $query->orderBy($request->sort_by, $request->sort_order);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return response()->json($query->paginate($request->get('per_page', 10)));
    }
    
    public function wp_api_show($id)
    {
        $order = WpOrder::with('wpStore')->findOrFail($id);
        return response()->json($order);
    }

    public function wp_api_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wp_store_id' => 'required|exists:wp_stores,id',
            'order_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string',
            'payment_status' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $order = WpOrder::create($validator->validated());

        return response()->json($order, 201);
    }
    
    public function wp_api_update(Request $request, $id)
    {
        $order = WpOrder::findOrFail($id);

        $order->update($request->only([
            'name',
            'phone',
            'status',
            'payment_status'
        ]));

        return response()->json($order);
    }
    
    public function wp_api_destroy($id)
    {
        $order = WpOrder::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
    
    public function wp_api_bulkUpdateStatus(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array',
            'status' => 'required|string',
        ]);

        WpOrder::whereIn('id', $request->order_ids)
            ->update(['status' => $request->status]);

        return response()->json(['message' => 'Orders updated successfully']);
    }

    public function appOrder(Request $request)
    {
        $url_alias = $request->input('store_alias');
        $productId = $request->input('product_id');
        
        $data = [
            'store_alias'=> $url_alias,
            'status' => 0, 
            'payment_status' => "UNPAID",  //UNPAID
            'payment_method'=> "Cash",
            'name' => "",
            'phone' => "",
            'region_code' => "",
            'address' => "",
            'pincode' => "",
            'notes' => "",
            'products' => [
                [
                    'product_id' => $productId,
                    'quantity'   => 1
                ],
            ], 

        ];        

        $analyticsNew = new AnalyticsController();
        $analyticsNew->apiSync("analytics/orders/whatsaap-order", $data); 

        return response()->json(['message' => '']);
    }
    


    
  
}
