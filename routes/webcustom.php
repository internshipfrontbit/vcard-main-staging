<?php

use App\Http\Middleware\XSS;
use App\Models\WhatsappStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\WhatsappStoreController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\WhatsappStoreProductController;

$customDomains = [
    'clothpilot.com' => 'beauty-shop',
    'buynowonline.in' => 'buy-now-online-store',
    'shiningaura.in' => 'shiningaura',
    'royalfabricbags.in' => 'royal-fabric-bags',
    'pandadicreation.com' => 'pandadi-creation',
    'sellerzones.com' => 'seller-zone-surat',
    'mrgadgetswala.in' => 'mr-gadgets-wala',
    'vmkherbal.in' => 'vmk-herbal',
    'lokaride.com' => 'lokaride-taxi',
    'thehowlingwolf.shop' => 'the-howling-wolf',
    'pihaaru.com' => 'pihaaru',
    'jaynamkin.com' => 'jay-namkin',
    'vasoyatours.com' => 'vasoya-tours',
    'aurayaluxury.in' => 'aurayaluxury',
    'afixo.in' => 'afixo-care-home',
    'swadeshajjeevanstore.in' => 'swadeshaj-jeevann',
    'litugadget.in' => 'my-bajarangi-mobile',
    'dhurviflora.in' => 'dhurviflora',
    'akdfashion.in' => 'akdfashion',
    'supplementworld.in' => 'supplementhub',
    'pavitramfoods.com' => 'pavitram-foods',
    'hereandnow.org.in' => 'here-and-now',
    'resparckindia.com' => 'resparck-india',
    'divinelightholistic.com' => 'divine-light-holistic-healing-centre',
    'khaokhilao.ca' => 'khao-khilao',
    'aromaticlight.com' => 'aromaticlight',
    'cosweek.in' => 'celebrity',
    'bahariyafarm.com' => 'bahariyafarm',
    'forwardtwins.com' => 'forward-twins',
    'kazor.in' => 'kazor.lux.in',
    'ksgfreshveg.store' => 'ksgfresh-veg',
    'ssflourmilljali.in' => 'super-shakti-enterprise',
    'microvedaofficial.com' => 'microveda',
    'akshram.in' => 'aksharam',
    'goyriz.com' => 'goyriz-fashion',
    'jahalaurigin.com' => 'jahal-aurigin',
    'tatamdiamondandjewellery.com' => 'tatam-diamond-and-jewellery',
    'infinityglaas.com' => 'infinity-glass',
    'parthsamvardhanorganic.com' => 'parth-samvardhan-organic-oil',
    'haresh.shop' => 'jaymatajiredimed',
    'airvix.in' =>'velvixenterprise',
    'vedasri.store' => 'vedasri-store',
    'indianartgallary.com' => 'ms-handicraft',
    'radhewellness.com' => 'radhewellness',
    'bestbite.world' => 'timenova',
    'readyrasoi.com' => 'readyrasoi',
    'jinalnayaabcollection.com' => 'jinal-nayaab-collections',
    'leevacreation.com' => 'leeva-creation',
    'vasudharaagri.com' => 'vasudhara-agri',
    'shreeshaamtelecom.com' => 'shreeshaamtelecom.com',
    'subzeeq.com' => 'subzee-q',
    'allindiacab.com' => 'all-india-cab-service',
    'nityafashion.in' => 'nitya-fashion',
    'kesarihealthybites.com' => 'kesari-healthy-bites',
    'gj03i.naturalnest.in' => 'nngj03i',
    'krupasjewellery.com' => 'krupas-jewellery',
    'wowtrend.in' => 'wow-trend',
    'fosvex.in' => 'fosvex.in'
];

$currentDomain = request()->getHost();

if (isset($customDomains[$currentDomain])) {
    $alias = $customDomains[$currentDomain];

    Route::domain($currentDomain)->middleware('language')->group(function () use ($alias) {
        Route::get('/', [WhatsappStoreController::class, 'show'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.show');

        Route::get('/products/{categoryId?}', function ($categoryId = null) use ($alias) {
            $controller = app()->make(WhatsappStoreController::class);
            return $controller->showProducts($alias, $categoryId);
        })->name('whatsapp.store.products');

        Route::get('/product-details/{id}', function ($id = null) use ($alias) {
            $controller = app()->make(WhatsappStoreController::class);
            return $controller->productDetails($alias, $id);
        })->name('whatsapp.store.product.details');

        Route::post('/product-buy', [WhatsappStoreProductController::class, 'productBuy'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.product.buy');

        Route::get('/about-us', [WhatsappStoreController::class, 'about'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.about');

        Route::get('/privacy-policy', [WhatsappStoreController::class, 'privacyPolicy'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.privacy');

        Route::get('/terms-conditions', [WhatsappStoreController::class, 'termsConditions'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.terms');

        Route::get('/shipping-payment-policy', [WhatsappStoreController::class, 'shippingPaymentPolicy'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.shipping');

        Route::get('/refunds-cancellation', [WhatsappStoreController::class, 'refundsCancellation'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.refunds');

        Route::get('/contact-us', [WhatsappStoreController::class, 'contactUs'])
            ->defaults('alias', $alias)
            ->name('whatsapp.store.contactUs');

        Route::post('whatsapp-store/finalize-order', [WhatsappStoreProductController::class, 'finalizeOrder'])->name('whatsapp.store.finalize.order');
        
    Route::any('/payment-success', [WhatsappStoreProductController::class, 'paymentSuccessPage'])
        ->defaults('alias', $alias)
        ->withoutMiddleware([VerifyCsrfToken::class]);
        
    Route::post('/whatsapp-store/verify-phonepe-payment', [WhatsappStoreProductController::class, 'verifyPhonePePayment']);
    
    Route::post('/apply-coupon-code-store', [AnalyticsController::class, 'applyCouponCode']);

    Route::post('/fetch-main-session', [AnalyticsController::class, 'createMainSession']);
    Route::post('/fetch-sub-session', [AnalyticsController::class, 'createSubSession']);
    Route::post('/apply-coupon-code-store', [AnalyticsController::class, 'applyCouponCode']);
    Route::post('/start-product-sub-session', [AnalyticsController::class, 'startProductSubSession']);
    Route::post('/start-product-inq-sub-session', [AnalyticsController::class, 'startProductInqSubSession']);
    Route::post('/end-product-inq-sub-session', [AnalyticsController::class, 'endInactiveProductInquiry']);
    Route::post('/update-product-inquiry-session', [AnalyticsController::class, 'updateProductInqSubSession']);
        
    });
}
