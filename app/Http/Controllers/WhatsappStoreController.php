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


class WhatsappStoreController extends AppBaseController
{
    private WhatsappStoreRepository $whatsappStoreRepository;

    public function __construct(WhatsappStoreRepository $whatsappStoreRepository)
    {
        $this->whatsappStoreRepository = $whatsappStoreRepository;
    }

    public function index(Request $request)
    {
        $partName = $request->part;

        if($partName === null){
            return view('whatsapp_stores.index');
        }

        return view('whatsapp_stores.create', compact('partName'));
    }

    public function apiShowProducts(Request $request, $alias, $categoryId = null)
    {
        $whatsappStore = WhatsappStore::with('template')->where('url_alias', $alias)->first();
    
        if (!$whatsappStore) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    
        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 403);
        }
    
        // Social links
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }
    
        // Categories
        $categories = $whatsappStore->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'image_url' => $category->image_url,
            ];
        });
    
        // Products with optional category filter and pagination
        $productsQuery = $whatsappStore->products()->latest();
    
        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }


        $limit = $whatsappStore->id == 1258 ? 1000 : $limit = 10;
    
        $products = $productsQuery->paginate($limit); // Change per_page if needed
    
        $productsTransformed = $products->getCollection();
        
        $whatsappStore->makeHidden(['is_payment_enable', 'razor_secret', 'razor_key']);

        $record = DB::table('wp_youtube_embeded')
                    ->where('wp_store_id', $whatsappStore->id)
                    ->first();

        $youtube_links = [];

        if ($record && $record->youtube_links) {
            $youtube_links = json_decode($record->youtube_links, true);
        }

        // Return array of YouTube embed URLs
        // Optionally convert to embed links here if you stored normal URLs

        $embedLinks = [];
        foreach($youtube_links as $link){
            $embedLinks[] = $this->convertToEmbedUrl($link);
        }
    
        return response()->json([
            'whatsappStore' => $whatsappStore,
            'category_id' => $categoryId,
            'socialLinks' => $socialLinks,
            'categories' => $categories,
            'video_urls' => $embedLinks,
            'products' => [
                'data' => $productsTransformed,
                'pagination' => [
                    'total' => $products->total(),
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                ],
            ],
        ]);
    }

    public static function convertToEmbedUrl($url)
    {
        $videoId = null;

        // Match various YouTube URL formats
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            $videoId = $matches[1];
        }

        if ($videoId) {
            return "https://www.youtube.com/embed/" . $videoId;
        }

        return $url; // fallback if parsing fails
    }

    public function apiProductDetails($alias, $id)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if (!$whatsappStore) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    
        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired'], 403);
        }
    
        $product = WhatsappStoreProduct::with('category')
            ->where('id', $id)
            ->where('whatsapp_store_id', $whatsappStore->id)
            ->first();
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        
        $whatsappStore->makeHidden(['is_payment_enable', 'razor_secret', 'razor_key']);
    
        return response()->json([
            "product_data" => $product,
            'store' => $whatsappStore
        ]);
    }

    public function store(CreateWhatsappStoreRequest $request)
    {
        $input = $request->all();

        $whatsappStore = $this->whatsappStoreRepository->store($input);

        Flash::success(__('messages.flash.whatsapp_store_create'));

        return redirect(route('whatsapp.stores.edit', [$whatsappStore->id]));
    }

    public function storeAPI(CreateWhatsappStoreRequest $request)
    {
        dd('here');

        $storeNew = WhatsappStore::where('url_alias', 'meet-test-ip-store')->first();

        $request["tenant_id"] = getLogInTenantId();

        if($storeNew){
            return response()->json([
                'success' => false,
                'message' => 'Store already exists. Please choose a different one.',
            ], 201);
        }

        $stores = WhatsappStore::where('tenant_id', getLogInTenantId())->first();
            
        if($stores){
            return response()->json([
                'success' => false,
                'message' => 'You have already created a store.',
            ], 400);
        }

        $input = $request->all();

        $whatsappStore = $this->whatsappStoreRepository->store($input);

        return response()->json([
            'success' => true,
            'message' => 'Store created successfully.',
            'data' => $whatsappStore
        ], 201);
    }

    public function edit(WhatsappStore $whatsappStore, Request $request)
    {
        $isWhatsappStoreAllowed = getPlanFeature(getCurrentSubscription()->plan)['whatsapp_store'];

        if(!$isWhatsappStoreAllowed){
            abort(404);
        }

        $access = $whatsappStore->tenant_id == getLogInTenantId();

        if(!$access){
            abort(404);
        }
            
        $partName = ($request->part === null) ? 'basics' : $request->part;

        $templates = WpStoreTemplate::all()->pluck('path','id')->toArray();

        $productsCategories = ProductCategory::where('whatsapp_store_id', $whatsappStore->id)->pluck('name', 'id')->toArray();

        $setting = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
        
        if (!$setting) {
            // define all keys with empty strings
            $setting = (object) [
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'reddit'    => '',
                'tumblr'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }



        return view('whatsapp_stores.edit', compact('whatsappStore', 'partName', 'productsCategories','templates','setting'));
    }

    public function show(Request $request, $alias)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();

        if($whatsappStore === null){
            abort(404);
        }
        
         $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')
        ->first();
        
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
                abort(404);
        }
        
        // Check if 'wp' query parameter exists and store in session
        if ($request->has('wp')) {
            session(['wp' => $request->query('wp')]);
        }
        
        $this->applyWpSessionLogic($whatsappStore);
        
        $user = User::whereTenantId($whatsappStore->tenant_id)->first();
        $userId = $user->id;
        $enable_pwa = getUserSettingValue('enable_pwa', $userId);
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();

        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }
        return view('whatsapp_stores.templates.'.$whatsappStore->template->name.'.index', compact('whatsappStore', 'enable_pwa','socialLinks'));
    }

    public function update(WhatsappStore $whatsappStore,UpdateWhatsappStoreRequest $request)
    {
        $input = $request->all();

        $whatsappStore = $this->whatsappStoreRepository->update($whatsappStore, $input);

        $data = [
            'store_alias' => $whatsappStore->url_alias,
        ];
                
        $analytics = new AnalyticsController();
        $analytics->apiSync("analytics/stores/store-sync-new", $data);

        Flash::success(__('messages.flash.whatsapp_store_update'));

        return redirect(route('whatsapp.stores.edit', [$whatsappStore->id]));
    }
    
    public function updateSocialLinks(Request $request)
    {
        $request->validate([
            'wp_store_id' => 'required|exists:whatsapp_stores,id',
            // optionally validate URLs
            'website' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'tumblr' => 'nullable|string|max:255',
            'reddit' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'pinterest' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'snapchat' => 'nullable|string|max:255',
        ]);
    
        $data = $request->only([
            'website',
            'twitter',
            'facebook',
            'instagram',
            'youtube',
            'tumblr',
            'reddit',
            'linkedin',
            'whatsapp',
            'pinterest',
            'tiktok',
            'snapchat',
        ]);
    
        $social = WpSocialLinks::where('wp_store_id', $request->wp_store_id)->first();
    
        if ($social) {
            // Update existing
            $social->update($data);
        } else {
            // Create new
            $data['wp_store_id'] = $request->wp_store_id;
            $social = WpSocialLinks::create($data);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Social links saved successfully.',
            'data' => $social,
        ]);
    }


    public function updateYoutubeEmbeded(Request $request)
        {
            // Validate request (allow empty list)
            $request->validate([
                'wp_store_id' => 'required|integer',
                'youtube_links' => 'nullable|array',
                'youtube_links.*' => 'nullable|string',
            ]);
        
            $wp_store_id = $request->wp_store_id;
            $final_links = $request->youtube_links; // whatever is currently shown in frontend
        
            // Convert to JSON
            $linksJson = json_encode($final_links);
        
            // Update if exists, else create
            \DB::table('wp_youtube_embeded')->updateOrInsert(
                ['wp_store_id' => $wp_store_id],
                [
                    'youtube_links' => $linksJson,
                    'updated_at' => now(),
                    'created_at' => now(), // or keep old created_at if you prefer
                ]
            );
        
            return response()->json([
                'success' => true,
                'message' => 'YouTube links updated successfully.'
            ]);
        }

public function updateOfferText(Request $request, $whatsappStore)
{
    $request->validate([
        'offer_text' => 'nullable|string|max:255',
        'youtube_banner_url' => 'nullable|string|max:256',
        'footer_text' => 'nullable|string',
        'extra_cover_img.*' => 'nullable|image|mimes:jpeg,png,jpg|max:3024',        
    ]);

    DB::beginTransaction();

    try {
        $store = WhatsappStore::findOrFail($whatsappStore);

        $updateData = [
            'offer_text' => $request->offer_text,
            'youtube_banner_url' => $request->youtube_banner_url,
            'footer_text' => $request->footer_text,
        ];

        if ($request->filled('minimum_order_amount')) {
            $updateData['minimum_order_amount'] = $request->minimum_order_amount;
        }

        if ($request->filled('courier_charge')) {
            $updateData['courier_charge'] = $request->courier_charge;
        }

        if ($request->filled('dis_perc')) {
            $updateData['dis_perc'] = $request->dis_perc;
        }

        $store->update($updateData);

        // OPTIONAL: clear existing images if replacing all
        if ($request->has('clear_extra_cover_images')) {
            $store->clearMediaCollection(WhatsappStore::EXTRA_COVER_IMAGES);
        }

        // Upload new images (appends to existing if not clearing)
        if ($request->hasFile('extra_cover_img')) {
            foreach ($request->file('extra_cover_img') as $image) {
                $store->addMedia($image)
                    ->toMediaCollection(WhatsappStore::EXTRA_COVER_IMAGES);
            }
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'New fetures updated successfully.',
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Failed to update offer text.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function deleteExtraCoverImage($id)
{
    // Find the media record
    $media = Media::find($id);

    if (!$media) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    // Delete file & DB record
    $media->delete();

    return response()->json(['message' => 'Image deleted successfully.']);
}


public function updateCustmizeTheme(Request $request, $whatsappStore)
{
    $request->validate([
        'is_full_screen' => 'nullable|in:0,1', // ✅ make sure it’s 0/1
        'is_auto_scroll' => 'nullable|string|max:255',
        'product_gride' => 'nullable|string|max:255',
        'image_show' => 'nullable|string|max:255',        
    ]);

    DB::beginTransaction();

    try {
        $store = WhatsappStore::findOrFail($whatsappStore);
        
         $isFullScreen = (int) $request->input('is_full_screen', 0); // ✅ FIX      

        $store->update([
            'is_auto_scroll' => $request->is_auto_scroll,
             'is_full_screen' => $isFullScreen, // ✅ always 0/1
             'product_gride' => $request->product_gride,
            'image_show' => $request->image_show,
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Customized theme update successfully.',
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Failed to update customized theme.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function wpTemplateSEOUpdate(WhatsappStore $whatsappStore, Request $request)
    {
        $data = $request->only([
            'template_id',
            'site_title',
            'home_title',
            'meta_keyword',
            'meta_description',
            'google_analytics',
        ]);

        $whatsappStore->update($data);

        return $this->sendSuccess(__('messages.flash.whatsapp_store_update'));
    }




public function updateWPPages(Request $request, $whatsappStore)
{
    $request->validate([
        'about_us' => 'nullable|string',
        'privacy_policy' => 'nullable|string',
        'terms_conditions' => 'nullable|string',
        'shipping_payment_policy' => 'nullable|string',
        'refunds_cancellation' => 'nullable|string',
        'contact-us' => 'nullable|string',
    ]);

    \DB::table('whatsapp_stores')
        ->where('id', $whatsappStore)
        ->update([
            'about_us' => $request->about_us,
            'privacy_policy' => $request->privacy_policy,
            'terms_conditions' => $request->terms_conditions,
            'shipping_payment_policy' => $request->shipping_payment_policy,
            'refunds_cancellation' => $request->refunds_cancellation, 
            'contact_us' =>  $request->contact_us, 
            'updated_at' => now(),
        ]);

    return response()->json([
        'success' => true,
        'message' => 'Pages updated successfully.'
    ], 200);
}

public function updatePaymentConfig(Request $request, $whatsappStore)
{
    $request->validate([

        'wp_razorpay_enabled' => 'nullable|in:0,1', // ✅ make sure it’s 0/1
        'wp_razorpay_key' => 'nullable|string',
        'wp_razorpay_secret' => 'nullable|string',    
        'payment_methods' => 'nullable|string',  
        
    ]);

    DB::beginTransaction();

    try {
        $store = WhatsappStore::findOrFail($whatsappStore);
        
          $wpRazorpayEnabled = (int) $request->input('wp_razorpay_enabled', 0); // ✅ FIX     
          

        $store->update([
            
            'wp_razorpay_enabled' => $wpRazorpayEnabled,
            'wp_razorpay_key' => $request->wp_razorpay_key,
            'wp_razorpay_secret' => $request->wp_razorpay_secret,   
            'payment_methods' => $request->payment_methods,   
          
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Payment config updated successfully.',
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Failed to update payment config.',
            'error' => $e->getMessage(),
        ], 500);
    }
}



public function infoPage(){
  return view('whatsapp_stores.infopage'); 
}

public function qrcodePage(){
  return view('whatsapp_stores.qrcodepage'); 
}

public function partnerPage(){
  return view('whatsapp_stores.partnerpage'); 
}


public function about($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.about', compact('whatsappStore', 'socialLinks'));
}

public function privacyPolicy($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.privacy-policy', compact('whatsappStore', 'socialLinks'));
}

public function termsConditions($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.terms-conditions', compact('whatsappStore', 'socialLinks'));
}

public function shippingPaymentPolicy($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.shipping-payment-policy', compact('whatsappStore', 'socialLinks'));
}

public function refundsCancellation($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.refunds-cancellation', compact('whatsappStore', 'socialLinks'));
}

public function contactUs($alias)
{
    $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    if (!$whatsappStore) {
        abort(404);
    }

    $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    if (!$socialLinks) {
        $socialLinks = (object)[
            'website'   => '',
            'twitter'   => '',
            'facebook'  => '',
            'instagram' => '',
            'youtube'   => '',
            'tumblr'    => '',
            'reddit'    => '',
            'linkedin'  => '',
            'whatsapp'  => '',
            'pinterest' => '',
            'tiktok'    => '',
            'snapchat'  => '',
        ];
    }

    return view('whatsapp_stores.templates.' . $whatsappStore->template->name . '.contact-us', compact('whatsappStore', 'socialLinks'));
}

   
    

    public function destroy($id)
    {
        $whatsappStore = WhatsappStore::findOrFail($id);

        if($whatsappStore->tenant_id != getLogInTenantId()){
            return $this->sendError('Unauthorized.');
        }

        $whatsappStore->clearMediaCollection(WhatsappStore::LOGO);
        $whatsappStore->clearMediaCollection(WhatsappStore::COVER_IMAGE);
        $whatsappStore->delete();

        return $this->sendSuccess(__('messages.flash.whatsapp_store_delete'));
    }

    public function wpTemplateUpate(WhatsappStore $whatsappStore, Request $request)
    {

        $whatsappStore->update(['template_id' => $request->template_id]);

        return $this->sendSuccess(__('messages.flash.whatsapp_store_update'));

    }

    public function showProducts($alias,$categoryId = null)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if(!$whatsappStore){
            abort(404);
        }

        $template = $whatsappStore->template->name;
        if($whatsappStore === null){
            abort(404);
        }
        
         $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')
        ->first();
        
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
                abort(404);
        }
        
         $this->applyWpSessionLogic($whatsappStore);
        
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();

        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }
        
        return view('whatsapp_stores.templates.'.$template.'.products',compact('whatsappStore','categoryId','socialLinks'));
    }

    public function productDetails($alias, $id)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
        if (!$whatsappStore) {
            abort(404);
        }
        
         $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')
        ->first();
        
      if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
                abort(404);
        }
        
        $product = WhatsappStoreProduct::where('id', $id)->whereHas('whatsappStore', function ($query) use ($whatsappStore) {
            $query->where('id', $whatsappStore->id);
        })->first();

        if (!$product) {
            abort(404);
        }
        
         $this->applyWpSessionLogic($whatsappStore);

        $template = $whatsappStore->template->name;
        
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();

        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }

        return view('whatsapp_stores.templates.' . $template . '.product-details', compact('whatsappStore', 'product','socialLinks'));
    }
    
    private function applyWpSessionLogic(&$whatsappStore)
    {
        if ($whatsappStore->id === 1488) {
            $this->checkPageAuth();
        }
        // Apply the 'wp' session logic for whatsapp_no and region_code if store ID is 236
        if ($whatsappStore->id === 322) {
            $map = [
                97 => '8866997797',
                35 => '8866997735',
                28 => '8866997728'
            ];
    
            // Get wp key from session or fallback to default if not set
            $wpKey = session('wp');
            $whatsappNumber = $map[$wpKey] ?? '8866997797';
            $regionCode = '91'; // Assuming region code stays as '91'
    
            // Modify the whatsappStore object with the new values
            $whatsappStore->whatsapp_no = $whatsappNumber;
            $whatsappStore->region_code = $regionCode;
        } elseif ($whatsappStore->id === 396) {
            $map = [
                95 => '9099300095',
                71 => '9313130271'
            ];
    
            // Get wp key from session or fallback to default if not set
            $wpKey = session('wp');
            $whatsappNumber = $map[$wpKey] ?? '9099300095';
            $regionCode = '91'; // Assuming region code stays as '91'
    
            // Modify the whatsappStore object with the new values
            $whatsappStore->whatsapp_no = $whatsappNumber;
            $whatsappStore->region_code = $regionCode;
        } elseif ($whatsappStore->id === 376) {
            $map = [
                'rondebosch' => '644122722',
                'claremont' => '642828280',
                'george' => '619472862'
            ];
    
            // Get wp key from session or fallback to default if not set
            $wpKey = session('wp');
            $whatsappNumber = $map[$wpKey] ?? '644122722';
            $regionCode = '27'; // Assuming region code stays as '91'
    
            // Modify the whatsappStore object with the new values
            $whatsappStore->whatsapp_no = $whatsappNumber;
            $whatsappStore->region_code = $regionCode;
        } elseif ($whatsappStore->id === 1087) {
            $map = [
                73 => '8347369873',
                82 => '9624168282'
            ];
    
            // Get wp key from session or fallback to default if not set
            $wpKey = session('wp');
            $whatsappNumber = $map[$wpKey] ?? '8347369873';
            $regionCode = '91'; // Assuming region code stays as '91'
    
            // Modify the whatsappStore object with the new values
            $whatsappStore->whatsapp_no = $whatsappNumber;
            $whatsappStore->region_code = $regionCode;
        } elseif ($whatsappStore->id === 1443) {
            $map = [
                74 => '7439320072',
                99 => '9903229434'
            ];
    
            // Get wp key from session or fallback to default if not set
            $wpKey = session('wp');
            $whatsappNumber = $map[$wpKey] ?? '9903229434';
            $regionCode = '91'; // Assuming region code stays as '91'
    
            // Modify the whatsappStore object with the new values
            $whatsappStore->whatsapp_no = $whatsappNumber;
            $whatsappStore->region_code = $regionCode;
        }
    } 

    public function apiShow($alias)
    {
        $whatsappStore = WhatsappStore::with(['categories', 'products' => function ($query) {
            $query->latest()->take(8);
        }, 'template'])->where('url_alias', $alias)->first();
    
        if ($whatsappStore === null) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    
        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 403);
        }
    
        $user = User::whereTenantId($whatsappStore->tenant_id)->first();
        $userId = $user->id;
        $enable_pwa = getUserSettingValue('enable_pwa', $userId);
    
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    
        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }
        
        $whatsappStore->makeHidden(['is_payment_enable', 'razor_secret', 'razor_key']);
        $record = DB::table('wp_youtube_embeded')
                    ->where('wp_store_id', $whatsappStore->id)
                    ->first();

        $youtube_links = [];

        if ($record && $record->youtube_links) {
            $youtube_links = json_decode($record->youtube_links, true);
        }

        // Return array of YouTube embed URLs
        // Optionally convert to embed links here if you stored normal URLs

        $embedLinks = [];
        foreach($youtube_links as $link){
            $embedLinks[] = $this->convertToEmbedUrl($link);
        }
        return response()->json([
            'whatsappStore' => $whatsappStore,
            'socialLinks' => $socialLinks,
            'video_urls' => $embedLinks,
            'categories' => $whatsappStore->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image_url' => $category->image_url, // assuming it's an accessor
                ];
            }),
            'latest_products' => $whatsappStore->products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'net_price' => $product->net_price, // adjust based on your model
                    'selling_price' => $product->selling_price, // adjust based on your model
                    'image_url' => $product->images_url, // assuming you have this
                ];
            }),
        ]);
    }

    public function apiShowNew($alias)
    {
        $whatsappStore = WhatsappStore::where('url_alias', $alias)->first();
    
        if ($whatsappStore === null) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    
        $plan = Subscription::whereTenantId($whatsappStore->tenant_id)->orderByDesc('id')->first();
    
        if (
            $plan &&
            $plan->payment_type === null &&
            now()->diffInMinutes($plan->created_at) > 30
        ) {
            return response()->json(['message' => 'Trial expired or payment not completed'], 403);
        }
    
        $socialLinks = WpSocialLinks::where('wp_store_id', $whatsappStore->id)->first();
    
        if (!$socialLinks) {
            $socialLinks = (object)[
                'website'   => '',
                'twitter'   => '',
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'tumblr'    => '',
                'reddit'    => '',
                'linkedin'  => '',
                'whatsapp'  => '',
                'pinterest' => '',
                'tiktok'    => '',
                'snapchat'  => '',
            ];
        }
        
        $whatsappStore->makeHidden(['is_payment_enable', 'razor_secret', 'razor_key']);
    
        return response()->json([
            'whatsappStore' => $whatsappStore,
            'socialLinks' => $socialLinks
        ]);
    }

    public function updateDropdownOptions(Request $request, $id)
    {
        $store = \App\Models\WhatsappStore::find($id);

        // 1. DECODE: Convert Text to Array manually
        $settings = json_decode($store->dropdown_settings, true);
        
        // Default structure if empty
        if (!is_array($settings)) {
            $settings = ['materials' => [], 'brands' => []];
        }

        // 2. LOGIC: Add Items
        // A. Add Material
        if ($request->action_type == 'add_material') {
            if (!isset($settings['materials'])) $settings['materials'] = [];
            if (!in_array($request->value, $settings['materials'])) {
                $settings['materials'][] = $request->value;
            }
        }
        // B. Add Brand
        elseif ($request->action_type == 'add_brand') {
            if (!isset($settings['brands'])) $settings['brands'] = [];
            if (!isset($settings['brands'][$request->value])) {
                $settings['brands'][$request->value] = []; 
            }
        }
        // C. Add Model
        elseif ($request->action_type == 'add_model') {
            $brand = $request->parent_value;
            if (isset($settings['brands'][$brand])) {
                $settings['brands'][$brand][] = $request->value;
            }
        }

        // 3. ENCODE: Convert Array back to Text
        $store->dropdown_settings = json_encode($settings);
        $store->save();

        return back()->with('success', 'Option Added Successfully');
    }

    public function deleteDropdownOption(Request $request, $id)
    {
        $store = \App\Models\WhatsappStore::find($id);
        
        // 1. DECODE
        $settings = json_decode($store->dropdown_settings, true);
        if (!is_array($settings)) return back(); // Safety check

        $type = $request->type;
        $value = $request->value;

        // 2. LOGIC: Remove Items
        if ($type == 'material') {
            $settings['materials'] = array_values(array_diff($settings['materials'], [$value]));
        } 
        elseif ($type == 'brand') {
            unset($settings['brands'][$value]);
        } 
        elseif ($type == 'model') {
            $brand = $request->parent;
            if (isset($settings['brands'][$brand])) {
                $settings['brands'][$brand] = array_values(array_diff($settings['brands'][$brand], [$value]));
            }
        }

        // 3. ENCODE
        $store->dropdown_settings = json_encode($settings);
        $store->save();

        return back()->with('success', 'Option Deleted');
    }     


    public function updateThemeSettings(Request $request, $id)
    {
        $store = \App\Models\WhatsappStore::find($id);

        // 1. Update Direct Columns (Toggles)
        // If the checkbox is checked, request has the key. If not, set to 0 or "false".
        
        $store->is_full_screen = $request->has('is_full_screen') ? 1 : 0;
        
        $store->is_auto_scroll = $request->has('is_auto_scroll') ? "true" : "false"; 
        
        $store->product_gride = $request->has('product_gride') ? 1 : 0;
        $store->image_show = $request->has('image_show') ? 1 : 0;
        

        // 2. Update JSON Theme Settings (Color)
        // Decode existing settings first so we don't lose other data in that JSON
        $existingSettings = json_decode($store->theme_settings, true) ?? [];
        
        // Update the color
        $existingSettings['wp_show_order_form'] = $request->wp_show_order_form;

        // Encode back to JSON
        $store->theme_settings = json_encode($existingSettings);

        // Save changes
        $store->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function checkPageAuth()
    {
        if (!session()->get('page_authenticated')) {
            redirect()->route('whatsappstore.auth.login')->send();
            exit;
        }
    }

    public function updateShipping(Request $request){
        
    }

    public function showLogin(Request $request){
        return view('whatsapp_stores.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if ($request->password === '9624509307') {
            session(['page_authenticated' => true]);

            return redirect()->route('whatsapp.store.show', [
                'alias' => 'jay-namkeen-and-sweet'
            ]);
        }

        return back()->with('error', 'Invalid Password');
    }

    public function logout()
    {
        session()->forget('page_authenticated');
        return redirect()->route('whatsappstore.auth.login');
    }

}
