<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

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
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        if(window.location.href.includes("seller-zone-surat")){
            window.location.href = "https://sellerzones.com/"
        }
    </script>
    <title>{{ __('messages.whatsapp_stores_templates.product_listing') }} | {{ $whatsappStore->store_name }}</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/beauty-products.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />

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


    
    @if ( $whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif


 @include('whatsapp_stores.templates.beauty_products.commoncss')

    @livewireStyles
    @if($whatsappStore->id == 71)
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6WTJBE79W1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-6WTJBE79W1');
        </script>
    @endif
    
        <style>
    .aspect-ratio-box {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 ratio = 9 / 16 * 100 */
        overflow: hidden;
    }
    
    .aspect-ratio-box video,
    .aspect-ratio-box img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
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
    </style>
    

    
    <style>
    
        .aspect-ratio-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
       }
       
       .item-img img{
            height: 200px !important;
            aspect-ratio: unset !important;
        }
        
        .items-section .item-card .item-img img {
    height: 200px !important;
    aspect-ratio: unset !important;
}

        
        .object-fit-cover {
    object-fit: contain;
}


     .new-marquee-wrapper {
         width: 100%;
        overflow: hidden;
        background: #fff;
        color: #494747;
        font-weight: 600;
        padding: 6px 0;
        font-size: 14px;
        box-sizing: border-box;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .new-marquee-content {
      display: flex;
      width: max-content;
      animation: scroll 60s linear infinite;
    }

    .new-marquee-text {
      white-space: nowrap;
      padding-right: 50px; /* optional space between messages */
    }

    .max-w-8xl {
        max-width: 100rem;
    }
    
    @keyframes scroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    } 

    /* Hide Scrollbar but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }



    </style>
    
</head>

<body>
    
            @include('whatsapp_stores.templates.ready_rasoi.common_header')

    <div class="container flex justify-between items-center mt-16 md:pt-16 pt-10">
                <h2 class="md:text-4xl text-2xl font-extrabold aos-init aos-animate" data-aos="fade-right">Explore Our Menu</h2>
            </div>

            <div class="container flex overflow-x-auto gap-4 pb-0 no-scrollbar pt-4">
                
                @foreach ($whatsappStore->categories as $category)
                 @if (request()->getHost() === 'staging.vcardking.com') 
                    <a class="" href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}">
                @else
                    <script>
                        function setCategory(id){
                            let urlObj = new URL(window.location.href);
                            urlObj.pathname = "/products";
                            urlObj.searchParams.set("category", id);
                            window.location.href = urlObj.toString();
                        }
                    </script>
                    <a class="" onclick="setCategory({{ $category->id }})" href="javascript:void(0)">
                @endif
                        <div class="min-w-[200px] sm:min-w-[240px] bg-white border border-rr-border rounded-2xl p-4 flex items-center gap-4 shadow-sm hover:shadow-md hover:border-rr-magenta transition-all group h-20">
                            <div class="w-10 h-10 flex items-center justify-center">
                                <img src="{{ $category->image_url }}" alt="Hair" class="w-full h-full object-contain group-hover:scale-110 transition-transform">
                            </div>
                            <span class="font-bold text-lg text-rr-dark group-hover:text-rr-magenta transition-colors">{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach

            </div>

    <section class="max-w-8xl mx-auto px-4 py-10 md:pt-12 pt-1 pb-0">
        
        <livewire:wp-store-templates-products-list :whatsappStoreId="$whatsappStore->id" />

    </section>



<script>
document.getElementById('openFilter').onclick = () => {
    document.getElementById('mobileFilter').classList.remove('hidden');
}
document.getElementById('closeFilter').onclick = () => {
    document.getElementById('mobileFilter').classList.add('hidden');
}
</script>
            
    

        @include('whatsapp_stores.templates.ready_rasoi.order_modal')
        @include('whatsapp_stores.templates.ready_rasoi.cart_modal')
        @include('whatsapp_stores.templates.beauty_products.quantity_modal')
        @include('whatsapp_stores.templates.beauty_products.size_modal')
        @include('whatsapp_stores.templates.beauty_products.attributes_model')
    

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
    @livewireScripts
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
    document.addEventListener("DOMContentLoaded", function() {
        let selectBtn = document.getElementById("customSelectBtn");
        let hiddenSelect = document.getElementById("hiddenSelect");
        let menuItems = document.querySelectorAll("#customSelectMenu .dropdown-item");

        menuItems.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                let selectedText = this.textContent;
                let selectedValue = this.getAttribute("data-value");

                selectBtn.textContent = selectedText;

                hiddenSelect.value = selectedValue;
            });
        });
        
        let wpRegionCode = $("#wpRegionCode").val();
        let whatsappNumber = $("#whatsappNo").val();
        let recipientPhone = `${wpRegionCode}${whatsappNumber}`;
        $("#whatsappGif").attr("href",`https://wa.me/${recipientPhone}`);
        
        
        let searchInput = document.getElementById('productSearch');
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        if (searchQuery) {
            searchInput.value = searchQuery;
            searchInput.dispatchEvent(new Event('input'));
        }
    });

    document.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function() {
            const imgTag = item.querySelector("img");

            const selectedLang = item.getAttribute("data-lang");
            const selectedFlag = imgTag.src;
            const selectedText = item.textContent.trim();

            document.getElementById("dropdownMenuButton").innerHTML =
                `<img src="${selectedFlag}" class="flag" alt="flag" loading="lazy"> ${selectedText}`;
        });
    });
    
    function showFilter(){
        if($("#filterButton").attr("data-content") == "Show Filter"){
            $("#filterButton").attr("data-content","Hide filter");
            $("#filterMenu").animate({ height: '600px' }, 300);
            setTimeout(() => {
                $("#filterMenu").css("height", "100%");    
            }, 400);   
        }else{
            $("#filterButton").attr("data-content","Show Filter");
            $("#filterMenu").animate({ height: '0px' }, 300);
        }
        
    }
</script>
<script>
    $(document).ready(function () {
        const $slider = $('.banner-slider');

        $slider.slick({
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true,
            infinite: true,
            adaptiveHeight: true,
            pauseOnHover: false,
            pauseOnFocus: false,
        });

        $slider.on('afterChange', function(event, slick, currentSlide){
            const $currentSlide = $(slick.$slides[currentSlide]);
            const $video = $currentSlide.find('video');

            if ($video.length) {
                $slider.slick('slickPause');
                $video[0].play();
            } else {
                $slider.slick('slickPlay');
            }
        });

        // Trigger video autoplay on initial load
        $slider.trigger('afterChange', [ $slider.slick('getSlick'), 0 ]);
    });
</script>

</html>
