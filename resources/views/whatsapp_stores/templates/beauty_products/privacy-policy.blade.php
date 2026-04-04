<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8" />

    <title>{{ $whatsappStore->store_name }} </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <script>
        if(window.location.href.includes("seller-zone-surat")){
            window.location.href = "https://sellerzones.com/"
        }
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('pwa/1.json') }}">

    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/beauty-products.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
    
    
    
    @if ( $whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif
    
    <style>

    
    .badgeBottom {
        display: inline-block;
        padding: .35em .65em;
        font-size: .75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        margin-bottom: 44px;
        margin-left: 38px;
        border-radius: .25rem;
    }

    .footer-link {
        color: #f1f1f1;
        text-decoration: none;
        margin: 0 5px;
        font-size: 14px;
    }
    
    .footer-link:hover {
        text-decoration: underline;
        color: #ffffff;
    }

    
    </style>
    
    @include('whatsapp_stores.templates.beauty_products.commoncss')    
    
</head>

<body>
     <nav class="navbar navbar-expand-lg px-50 position-relative">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center gap-3">

                        @if (request()->getHost() === 'staging.vcardking.com') 

                        <a class="navbar-brand p-0 m-0"
                            href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}">
                        @else

                        <a class="navbar-brand p-0 m-0"
                            href="{{ route('whatsapp.store.show') }}">
                        @endif


                            <img src="{{ $whatsappStore->logo_url }}" alt="logo"
                                class="w-100 h-100 object-fit-cover" loading="lazy" />
                        </a>

                        @if (request()->getHost() === 'staging.vcardking.com') 
                        <span class="fw-6 fs-18"><a
                                href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}"
                                style="color: #212529 ">{{ $whatsappStore->store_name }}</a></span>
                        @else
                        <span class="fw-6 fs-18"><a
                                href="{{ route('whatsapp.store.show') }}"
                                style="color: #212529 ">{{ $whatsappStore->store_name }}</a></span>
                        @endif                        

                    </div>

                    <div class="d-flex align-items-center gap-lg-4 gap-sm-3 gap-2">
                        
                         @if($whatsappStore->id != 396 && $whatsappStore->id != 322)
                        <button
                            class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                            id="addToCartViewBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.0048 9.03985C20.0048 9.27694 19.9106 9.50433 19.7429 9.67198C19.5753 9.83964 19.3479 9.93382 19.1108 9.93382C18.8737 9.93382 18.6463 9.83964 18.4787 9.67198C18.311 9.50433 18.2168 9.27694 18.2168 9.03985V7.2519C18.2168 6.38254 17.8715 5.54879 17.2567 4.93406C16.642 4.31934 15.8083 3.97399 14.9389 3.97399C14.0696 3.97399 13.2358 4.31934 12.6211 4.93406C12.0063 5.54879 11.661 6.38254 11.661 7.2519V9.03985C11.661 9.27694 11.5668 9.50433 11.3992 9.67198C11.2315 9.83964 11.0041 9.93382 10.767 9.93382C10.5299 9.93382 10.3025 9.83964 10.1349 9.67198C9.96723 9.50433 9.87305 9.27694 9.87305 9.03985V7.2519C9.87305 5.90835 10.4068 4.61982 11.3568 3.66979C12.3068 2.71976 13.5954 2.18604 14.9389 2.18604C16.2825 2.18604 17.571 2.71976 18.521 3.66979C19.471 4.61982 20.0048 5.90835 20.0048 7.2519V9.03985Z"
                                    fill="#292929" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23.6898 10.6489L24.6434 24.9525C24.6674 25.3188 24.616 25.6862 24.4924 26.0318C24.3688 26.3775 24.1756 26.6942 23.9249 26.9623C23.6741 27.2304 23.371 27.4442 23.0343 27.5905C22.6977 27.7369 22.3346 27.8127 21.9675 27.8132H7.90939C7.54218 27.813 7.17892 27.7375 6.84209 27.5913C6.50526 27.445 6.20204 27.2312 5.95119 26.963C5.70034 26.6948 5.5072 26.378 5.38374 26.0322C5.26028 25.6864 5.20912 25.3189 5.23342 24.9525L6.187 10.6489C6.23235 9.97006 6.534 9.33384 7.03086 8.86907C7.52771 8.40431 8.18262 8.14575 8.86296 8.14575H21.0139C21.6942 8.14575 22.3491 8.40431 22.846 8.86907C23.3428 9.33384 23.6445 9.97006 23.6898 10.6489ZM17.9017 13.4238C17.6351 13.984 17.2153 14.4571 16.6909 14.7884C16.1664 15.1197 15.5588 15.2955 14.9384 15.2955C14.3181 15.2955 13.7105 15.1197 13.186 14.7884C12.6615 14.4571 12.2417 13.984 11.9752 13.4238C11.9248 13.3177 11.854 13.2227 11.7668 13.144C11.6797 13.0653 11.5779 13.0045 11.4673 12.9652C11.3566 12.9258 11.2393 12.9086 11.1221 12.9146C11.0048 12.9206 10.8899 12.9496 10.7838 13C10.6778 13.0504 10.5827 13.1212 10.504 13.2084C10.4253 13.2955 10.3646 13.3973 10.3252 13.508C10.2859 13.6186 10.2687 13.7359 10.2747 13.8532C10.2807 13.9704 10.3097 14.0854 10.3601 14.1914C10.7706 15.0583 11.4188 15.7908 12.2293 16.3037C13.0398 16.8166 13.9793 17.0889 14.9384 17.0889C15.8976 17.0889 16.837 16.8166 17.6475 16.3037C18.458 15.7908 19.1062 15.0583 19.5168 14.1914C19.5672 14.0854 19.5962 13.9704 19.6022 13.8532C19.6082 13.7359 19.591 13.6186 19.5516 13.508C19.5123 13.3973 19.4515 13.2955 19.3728 13.2084C19.2942 13.1212 19.1991 13.0504 19.093 13C18.987 12.9496 18.872 12.9206 18.7548 12.9146C18.6375 12.9086 18.5202 12.9258 18.4096 12.9652C18.2989 13.0045 18.1972 13.0653 18.11 13.144C18.0229 13.2226 17.9521 13.3177 17.9017 13.4238Z"
                                    fill="#292929" />
                            </svg>
                            <span
                                class="position-absolute  start-100 translate-middle badge rounded-pill bg-danger product-count-badge"
                                style="font-size: 12px; padding: 3px 6px;top: 7px;">
                            </span>
                        </button>
                        @endif

                    </div>
                </div>
            </nav>    
    <div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        <div class="bg-vector bg-vector-1">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-1.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-2">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-6.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-3">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-3.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-4">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-2.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-5">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-4.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-6">
            <img src="{{ asset('assets/img/whatsapp_stores/beauty_products/bg-vector-5.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div>
       
                
                
<div class="container mt-4 d-flex flex-column align-items-center justify-content-start" style="min-height: 50vh;">
    <h2 class="text-center mb-2" style="font-weight: 600;">Privacy Policy</h2>
    <hr style="width: 80px; border-top: 3px solid #000; margin-bottom: 25px;">

    <div class="about-us-content text-start" style="max-width: 800px; padding: 10px 10px;margin-bottom: 80px;">
         {!! $whatsappStore->privacy_policy !!}
    </div>
</div>                
                
            
        </div>
        {{-- Pwa support --}}
        @if (isset($enable_pwa) && $enable_pwa == 1 && !isiOSDevice())
            <div class="mt-0">
                <div class="pwa-support d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="text-start pwa-heading">{{ __('messages.pwa.add_to_home_screen') }}</h1>
                        <p class="text-start pwa-text text-dark fs-16 fw-5">{{ __('messages.pwa.pwa_description') }} </p>
                        <div class="text-end d-flex">
                            <button id="installPwaBtn"
                                class="pwa-install-button w-50 mb-1 btn">{{ __('messages.pwa.install') }}
                            </button>
                            <button
                                class= "pwa-cancel-button w-50  pwa-close btn btn-secondary mb-1 {{ getLocalLanguage() == 'ar' ? 'me-2' : 'ms-2' }}">{{ __('messages.common.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @include('whatsapp_stores.templates.order_modal')
        @if($whatsappStore->id == 1151 || $whatsappStore->id == 1407 || $whatsappStore->id == 1591)
            @include('whatsapp_stores.templates.ready_rasoi.cart_modal')
        @else
            @include('whatsapp_stores.templates.cart_modal')
        @endif
        @include('whatsapp_stores.templates.beauty_products.quantity_modal')
        @include('whatsapp_stores.templates.beauty_products.size_modal')

    </div>
 @include('whatsapp_stores.templates.footee-common-view')        
        <div id="addToCartBottomViewBtn" style="position: fixed;right: 16px;{{ $whatsappStore->id == 208 ? 'bottom: 165px;' : 'bottom: 95px;'}}">
            <button style="background-color: #ffffff; border: none;border-radius: 15px;height: 50px;min-width: 50px;width: 50px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);"
                            class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                            id="addToCartViewBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.0048 9.03985C20.0048 9.27694 19.9106 9.50433 19.7429 9.67198C19.5753 9.83964 19.3479 9.93382 19.1108 9.93382C18.8737 9.93382 18.6463 9.83964 18.4787 9.67198C18.311 9.50433 18.2168 9.27694 18.2168 9.03985V7.2519C18.2168 6.38254 17.8715 5.54879 17.2567 4.93406C16.642 4.31934 15.8083 3.97399 14.9389 3.97399C14.0696 3.97399 13.2358 4.31934 12.6211 4.93406C12.0063 5.54879 11.661 6.38254 11.661 7.2519V9.03985C11.661 9.27694 11.5668 9.50433 11.3992 9.67198C11.2315 9.83964 11.0041 9.93382 10.767 9.93382C10.5299 9.93382 10.3025 9.83964 10.1349 9.67198C9.96723 9.50433 9.87305 9.27694 9.87305 9.03985V7.2519C9.87305 5.90835 10.4068 4.61982 11.3568 3.66979C12.3068 2.71976 13.5954 2.18604 14.9389 2.18604C16.2825 2.18604 17.571 2.71976 18.521 3.66979C19.471 4.61982 20.0048 5.90835 20.0048 7.2519V9.03985Z"
                                    fill="#292929" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23.6898 10.6489L24.6434 24.9525C24.6674 25.3188 24.616 25.6862 24.4924 26.0318C24.3688 26.3775 24.1756 26.6942 23.9249 26.9623C23.6741 27.2304 23.371 27.4442 23.0343 27.5905C22.6977 27.7369 22.3346 27.8127 21.9675 27.8132H7.90939C7.54218 27.813 7.17892 27.7375 6.84209 27.5913C6.50526 27.445 6.20204 27.2312 5.95119 26.963C5.70034 26.6948 5.5072 26.378 5.38374 26.0322C5.26028 25.6864 5.20912 25.3189 5.23342 24.9525L6.187 10.6489C6.23235 9.97006 6.534 9.33384 7.03086 8.86907C7.52771 8.40431 8.18262 8.14575 8.86296 8.14575H21.0139C21.6942 8.14575 22.3491 8.40431 22.846 8.86907C23.3428 9.33384 23.6445 9.97006 23.6898 10.6489ZM17.9017 13.4238C17.6351 13.984 17.2153 14.4571 16.6909 14.7884C16.1664 15.1197 15.5588 15.2955 14.9384 15.2955C14.3181 15.2955 13.7105 15.1197 13.186 14.7884C12.6615 14.4571 12.2417 13.984 11.9752 13.4238C11.9248 13.3177 11.854 13.2227 11.7668 13.144C11.6797 13.0653 11.5779 13.0045 11.4673 12.9652C11.3566 12.9258 11.2393 12.9086 11.1221 12.9146C11.0048 12.9206 10.8899 12.9496 10.7838 13C10.6778 13.0504 10.5827 13.1212 10.504 13.2084C10.4253 13.2955 10.3646 13.3973 10.3252 13.508C10.2859 13.6186 10.2687 13.7359 10.2747 13.8532C10.2807 13.9704 10.3097 14.0854 10.3601 14.1914C10.7706 15.0583 11.4188 15.7908 12.2293 16.3037C13.0398 16.8166 13.9793 17.0889 14.9384 17.0889C15.8976 17.0889 16.837 16.8166 17.6475 16.3037C18.458 15.7908 19.1062 15.0583 19.5168 14.1914C19.5672 14.0854 19.5962 13.9704 19.6022 13.8532C19.6082 13.7359 19.591 13.6186 19.5516 13.508C19.5123 13.3973 19.4515 13.2955 19.3728 13.2084C19.2942 13.1212 19.1991 13.0504 19.093 13C18.987 12.9496 18.872 12.9206 18.7548 12.9146C18.6375 12.9086 18.5202 12.9258 18.4096 12.9652C18.2989 13.0045 18.1972 13.0653 18.11 13.144C18.0229 13.2226 17.9521 13.3177 17.9017 13.4238Z"
                                    fill="#292929" />
                            </svg>

                            <div
                                class="position-absolute product-count-badge count-product badgeBottom rounded-pill bg-danger">

                            </div>

            </button>
        </div>
        @if($whatsappStore->id == 208)
         <a href="https://t.me/SellerZonewholesalers" target="_blank" style="position: fixed;right: 15px;bottom: 98px; z-index: 100;">
            <img src="https://staging.vcardking.com/assets/images/telegram.png" style="height: 52px;width: 52px;">
        </a>
        @endif
  @if($whatsappStore->id == 1088)        
    <a id="whatsappGifNew" href="tel:+9106523926" style="position: fixed;right: 10px;bottom: 28px;">
        <img src="https://staging.vcardking.com/uploads/call_icon.png" style="height: 59px;width: 59px;">
    </a>     
 @else     
    <a id="whatsappGif" href="https://wa.me/917984847580" target="_blank" style="position: fixed;right: 10px;bottom: 28px; z-index: 100;">
        <img src="https://staging.vcardking.com/uploads/whatsapp.gif" style="height: 59px;width: 59px;">
    </a>
@endif 
    <a href="" id="whatsappUrlLink" style="visibility: hidden"></a>
</body>
<script>
    let vcardAlias = "{{ $whatsappStore->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let lang = "{{ getLocalLanguage() ?? 'en' }}";
</script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ asset('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/whatsapp_store_template.js') }}?v={{ time() }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(e) {
        let wpRegionCode = $("#wpRegionCode").val();
        let whatsappNumber = $("#whatsappNo").val();
        let recipientPhone = `${wpRegionCode}${whatsappNumber}`;
        $("#whatsappGif").attr("href",`https://wa.me/${recipientPhone}`);
    });
    document.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function() {
            const selectedLang = item.getAttribute("data-lang");
            const selectedFlag = item.querySelector("img").src;
            const selectedText = item.textContent.trim();
            document.getElementById(
                    "dropdownMenuButton"
                ).innerHTML =
                `<img src="${selectedFlag}" class="flag" alt="flag"  loading="lazy"> ${selectedText}`;
        });
    });
</script>
<script>
    let deferredPrompt = null;
    window.addEventListener("beforeinstallprompt", (event) => {
        /* event.preventDefault(); */
        deferredPrompt = event;
        document.getElementById("installPwaBtn").style.display = "block";
    });
    document.getElementById("installPwaBtn").addEventListener("click", async () => {
        if (deferredPrompt) {
            deferredPrompt.prompt();
            await deferredPrompt.userChoice;
            deferredPrompt = null;
        }
    });
</script>


</html>
