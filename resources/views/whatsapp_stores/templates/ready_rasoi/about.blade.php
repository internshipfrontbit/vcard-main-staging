<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8" />

    <title>{{ $whatsappStore->store_name }} </title>

    @php
                            $socialIcons = [
                                'facebook'  => '<i class="fa-brands fa-facebook-f"></i>',
                                'instagram' => '<i class="fa-brands fa-instagram"></i>',
                                'youtube'   => '<i class="fa-brands fa-youtube"></i>',
                                'tumblr'    => '<i class="fa-brands fa-tumblr-square"></i>',
                                'reddit'    => '<i class="fa-brands fa-reddit-alien"></i>',
                                'linkedin'  => '<i class="fa-brands fa-linkedin"></i>',
                                'whatsapp'  => '<i class="fa-brands fa-whatsapp"></i>',
                                'pinterest' => '<i class="fa-brands fa-pinterest"></i>',
                                'tiktok'    => '<i class="fa-brands fa-tiktok"></i>',
                            ];
                        @endphp

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

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#f2e8de',
                        magenta: '#d50170',
                        yellowAccent: '#feff03',
                        deepCharcoal: '#1a1a1a'
                    },
                    borderRadius: {
                        '4xl': '2rem',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f2e8de; scroll-behavior: smooth; }
        
        .premium-shadow { box-shadow: 0 20px 40px -15px rgba(213, 1, 112, 0.15); }
        .hover-scale { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .hover-scale:hover { transform: scale(1.05); }
        
        /* Indian Motif Pattern Background */
        .indian-pattern {
            background-image: url('https://staging.vcardking.com/assets/img/whatsapp_stores/readyrasoi/bg-vector-2.png');
            background-size: 400px;
            background-repeat: repeat;
            opacity: 0.04;
        }

        .vector-float {
            position: absolute;
            pointer-events: none;
            z-index: 0;
            opacity: 0.6;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f2e8de; }
        ::-webkit-scrollbar-thumb { background: #d50170; border-radius: 10px; }
    </style>

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
       @include('whatsapp_stores.templates.ready_rasoi.common_header')
    <div class="main-content mw-100 mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        
        <div>
         
                
                
<div class="container mt-4 d-flex flex-column align-items-center justify-content-start md:pt-28 pt-24" style="min-height: 50vh;">
    <h1 class="text-center mb-2" style="font-weight: 600;">About Us</h1>
    <hr style="width: 80px; border-top: 3px solid #000; margin-bottom: 25px;">

    <div class="about-us-content text-start" style="max-width: 800px; padding: 10px 10px;margin-bottom: 80px;">
         {!! $whatsappStore->about_us !!}
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
        @include('whatsapp_stores.templates.ready_rasoi.order_modal')
        @include('whatsapp_stores.templates.ready_rasoi.cart_modal')
        @include('whatsapp_stores.templates.beauty_products.quantity_modal')
        @include('whatsapp_stores.templates.beauty_products.size_modal')

        
    </div>
 @include('whatsapp_stores.templates.ready_rasoi.common_footer')     
        <div id="addToCartBottomViewBtn" style="z-index: 9999999;position: fixed;right: 16px;{{ $whatsappStore->id == 208 ? 'bottom: 165px;' : 'bottom: 95px;'}}">
            <button style="background-color: #ffffff; border: none;border-radius: 15px;height: 50px;min-width: 50px;width: 50px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);"
                            class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                            id="addToCartViewBtn">
                            <i class="fa-solid fa-cart-shopping text-xl"></i>

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
