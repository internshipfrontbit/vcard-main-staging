<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\WhatsappStore;
use App\Models\Subscription;

class ProductCategoryController extends AppBaseController
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        $input = $request->all();
        $productCategory = ProductCategory::create([
            'name' => $input['name'],
            'position_set' => $input['position_set'],
            'whatsapp_store_id' => $input['whatsappStoreId'],
        ]);

        if ($request->hasFile('image')) {
            $productCategory->addMedia($input['image'])->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        $whatsappStore = WhatsappStore::where('id', $input['whatsappStoreId'])->where('tenant_id', getLogInTenantId())->first();        

        $data = [
            'id' => $productCategory->id,
            'action' => 'create',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/categories/create-update-delete", $data);

        return $this->sendSuccess(__('messages.flash.product_category_create'));
    }

    public function storeByAlias(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024',
            'store_alias' => 'required|string', // new: store alias from API
        ]);

        $whatsappStore = WhatsappStore::where('url_alias', $request->store_alias)->where('tenant_id', getLogInTenantId())->first();
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }

        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $input = $request->all();

        $productCategory = ProductCategory::create([
            'name' => $input['name'],
            'position_set' => $input['position_set'] ?? 0,
            'whatsapp_store_id' => $whatsappStore->id,
            'tenant_id' => $whatsappStore->tenant_id,
        ]);

        if ($request->hasFile('image')) {
            $productCategory->addMedia($request->file('image'))->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        return $this->sendSuccess('Product category created successfully.', $productCategory);
    }
    
    public function showByAlias($storeAlias, $categoryId)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }

        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $productCategory = ProductCategory::where('id', $categoryId)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();

        if (!$productCategory) {
            return $this->sendError('Category not found.', 404);
        }

        return $this->sendResponse($productCategory, 'Product category retrieved successfully.');
    }
    
    public function updateByAlias(Request $request, $storeAlias, $categoryId)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }

        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $productCategory = ProductCategory::where('id', $categoryId)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();

        if (!$productCategory) {
            return $this->sendError('Category not found.', 404);
        }

        $request->validate([
            'name' => 'required|string',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $productCategory->clearMediaCollection(ProductCategory::IMAGE);
            $productCategory->addMedia($request->file('image'))->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        $productCategory->update([
            'name' => $input['name'],
            'position_set' => $input['position_set'] ?? $productCategory->position_set,
        ]);

        return $this->sendSuccess('Product category updated successfully.', $productCategory);
    }
    
    public function destroyByAlias($storeAlias, $categoryId)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }

        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }

        $productCategory = ProductCategory::where('id', $categoryId)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();

        if (!$productCategory) {
            return $this->sendError('Category not found.', 404);
        }

        if ($productCategory->products()->exists()) {
            return $this->sendError('Category in use and cannot be deleted.', [], 422);
        }

        $productCategory->clearMediaCollection(ProductCategory::IMAGE);
        $productCategory->delete();

        return $this->sendSuccess('Product category deleted successfully.');
    }
    
    public function listByAlias($storeAlias, Request $request)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $storeAlias)->where('tenant_id', getLogInTenantId())->first();
        if (!$whatsappStore) {
            return $this->sendError('Store not found.', 404);
        }

        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return $this->sendError('Trial expired or payment not completed',401);
        }
    
        // Get pagination parameters
        $perPage = $request->get('per_page', 10); // Default 10 per page
        $page = $request->get('page', 1);
    
        $categories = ProductCategory::where('whatsapp_store_id', $whatsappStore->id)
            ->withCount('products')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    
        return $this->sendResponse($categories, 'Product categories retrieved successfully.');
    }

    public function edit(ProductCategory $productCategory)
    {
        $access = $productCategory->tenant_id == getLogInTenantId();
        if(!$access){
            return $this->sendError('Unauthorized.');
        }
        $productCategory->loadCount('products');

        return $this->sendResponse($productCategory, 'Product category retrieved successfully.');
    }

    

    public function update(ProductCategory $productCategory, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $access = $productCategory->tenant_id == getLogInTenantId();

        if(!$access){
            return $this->sendError('Unauthorized.');
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $productCategory->clearMediaCollection(ProductCategory::IMAGE);
            $productCategory->addMedia($input['image'])->toMediaCollection(
                ProductCategory::IMAGE,
                config('app.media_disc')
            );
        }

        $productCategory->update([
            'name' => $input['name'],
            'position_set' => $input['position_set'],
        ]);


        $whatsappStore = WhatsappStore::where('id', $input['whatsappStoreId'])->where('tenant_id', getLogInTenantId())->first();        

        $data = [
            'id' => $productCategory->id,
            'action' => 'update',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/categories/create-update-delete", $data);

        return $this->sendSuccess(__('messages.flash.product_category_update'));
    }

    public function show(ProductCategory $productCategory)
    {
        $access = $productCategory->tenant_id == getLogInTenantId();
        if(!$access){
            return $this->sendError('Unauthorized.');
        }

        return $this->sendResponse($productCategory, 'Product category retrieved successfully.');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);

        if($productCategory->tenant_id != getLogInTenantId()){
            return $this->sendError('Unauthorized.');
        }

        if ($productCategory->products()->exists()) {
            return $this->sendError('Product category in use.');
        }

        $productCategory->clearMediaCollection(ProductCategory::IMAGE);
        $productCategory->delete();

        $whatsappStore = WhatsappStore::where('id', $productCategory->whatsapp_store_id)->where('tenant_id', getLogInTenantId())->first();

        $data = [
            'id' => $productCategory->id,
            'action' => 'delete',
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/categories/create-update-delete", $data);
               
        return $this->sendSuccess('Product category deleted successfully.');
    }

    
}
