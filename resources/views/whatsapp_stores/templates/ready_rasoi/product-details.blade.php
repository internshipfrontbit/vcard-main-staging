<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        if(window.location.href.includes("seller-zone-surat")){
            window.location.href = "https://sellerzones.com/"
        }
    </script>
    <title>{{ $product->name }} | {{ $whatsappStore->store_name }}</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    @if(!empty($product->images_url) && count($product->images_url) > 0)
        <meta property="og:image" content="{{ asset($product->images_url[0]) }}" />
        <meta name="twitter:image" content="{{ asset($product->images_url[0]) }}">
    @endif
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
    @include('whatsapp_stores.templates.beauty_products.commoncss')
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


    
    @if ( $whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif    

    <style>
    @media(max-width: 600px){
        .mobile-button-container{
            display: block !important;
        }
        .mobile-full-button{
            width: 100% !important;
            margin-bottom: 10px;
        }   
    }
    .product-slider .slide-arrow.prev-arrow, .product-slider .slide-arrow.next-arrow{
        display: none !important    
    }
    </style>
    
<style>
    .download-icon-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        padding: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease-in-out;
    }

    .download-icon-btn:hover {
        transform: scale(1.05);
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
    
    .text-gray-200-Blue {
        color: #1269B0 !important;
    }    
    
    
            .horizontal-videos {
            display: flex;
            overflow: hidden;
            gap: 10px;
            max-width: calc((210px * 5) + (10px * 4));
            /*margin: 40px auto 0;*/
            scroll-behavior: smooth;
        }

        .video-wrapper {
            position: relative;
        }

        .video-wrapper iframe {
            border-radius: 15px;
            width: 100px;
            height: 100px;
            cursor: pointer;
        }
                
        .shimmer {
          position: absolute;
          top: 0; left: 0;
          width: 100%;
          height: 100%;
          background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
          background-size: 200% 100%;
          animation: shimmer 1.5s infinite;
          border-radius: 15px;
        }
        
        
        @keyframes shimmer {
          0% { background-position: -200% 0; }
          100% { background-position: 200% 0; }
        }
        
        .play-icon {
            color: white;
            font-size: 24px; /* adjust as needed */
        }
        
        .thumbnail-img {
            position: relative; /* ensure parent is positioned */
            width: 100px;
            height: 100px;
        }
        
        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            pointer-events: none;
        }
        .thumVideo{
           position: relative; height: 100px; width:100px !important; 
        }

        
       
        @media (max-width: 767px) {
            .horizontal-videos {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch; 
                max-width: calc((160px * 2) + (10px * 1));
            }
              .video-wrapper iframe {
                width: 160px;
                height: 285px;
              }
      
        }   
    
/* Desktop Hover Zoom */
.zoom-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 100%;
    border-radius: 8px;
    cursor: crosshair;
}
.zoom-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.2s ease-out;
    transform-origin: center center;
}

/* Mobile Popup */
.mobile-zoom-overlay {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.95);
    justify-content: center;
    align-items: center;
}

.mobile-zoom-wrapper {
    overflow: hidden;
    max-width: 90%;
    max-height: 90%;
}

.mobile-zoom-overlay img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.mobile-zoom-close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 40px;
    color: #fff;
    cursor: pointer;
}

    
</style>


    
    <style>


        
    .object-fit-cover {
        object-fit: contain;
    }
    
    
    .item-details-section .item-details-card {
        background-color: #fff;
        box-shadow: 0 2px 10px 0 #00000040;
        padding: 25px 20px;
        margin-top: 47px;
    } 
    
    </style>
    

</head>

<body>

    @include('whatsapp_stores.templates.ready_rasoi.common_header')


    <section class="max-w-7xl mx-auto px-4 py-10 mt-3 item-details-section">

    <div class="item-details-card bg-white rounded-4xl shadow-sm p-6 md:p-10 mt-4">

        <div class="row">
            <div class="col-xl-5 col-lg-6 mb-lg-0 mb-4">
                 <div id="mainDisplay" class="mb-0" style="position: relative;">
                            <div class="details-img position-relative">
                    
                                @php
                                    $videoId = '';
                                    if (!empty($product->youtube_link)) {
                                        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $product->youtube_link, $matches);
                                        $videoId = $matches[1] ?? '';
                                    }
                                @endphp
                    

                                <!-- Main Image (show if no video) -->
                                <div class="zoom-container" id="zoomContainer" style="{{ $videoId ? 'display: none;' : 'display: block;' }}">
                                    <img id="mainImage"
                                        src="{{ $product->images_url[0] }}"
                                        alt="items"
                                        class="zoom-image"
                                        loading="lazy"
                                        style="{{ $videoId ? 'display: none;' : 'display: block;' }}" />
                                </div>                                
                    
                                <!-- Main Video (show if videoId exists) -->
                                @if ($videoId)
                                <iframe id="mainVideo" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=1&showinfo=0&modestbranding=1" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media; fullscreen" 
                                    allowfullscreen 
                                    class="w-100 h-100 rounded"
                                    style="display: block;">
                                </iframe>
                                @endif
                    
                                @if (count($product->images_url) > 1)
                                    <button
                                        class="btn btn-primary d-flex justify-content-center align-items-center download-icon-btn"
                                        onclick="generatePdf('{{ $product->name }}', '{{ json_encode($product->images_url) }}')"
                                        style="position: absolute; top: 20px; right: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 25" fill="none">
                                            <path d="M12 5V15M5 12L12 19L19 12"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                @endif
                    
                            </div>
                        </div>                            
                            

                <!-- Mobile Popup -->
                <div id="mobileZoomPopup" class="mobile-zoom-overlay">
                    <span class="mobile-zoom-close">&times;</span>
                    <div class="mobile-zoom-wrapper">
                        <img id="mobileZoomImage" src="" alt="zoomed image" />
                    </div>
                </div>                         


    <!-- Thumbnail Slider -->
    <div class="slider-nav mt-3">
        <!-- Video Thumbnail FIRST (if exists) -->
        @if ($videoId)
        <div class="thumbnail-img video-thumbnail thumVideo" data-videoid="{{ $videoId }}">
            <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="Video Thumbnail" class="w-100 h-100 object-fit-cover rounded" loading="lazy" />
            <div class="play-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#fff" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>
        @endif

        <!-- Image Thumbnails -->
        @foreach ($product->images_url as $image)
        <div>
            <div class="thumbnail-img">
                <img src="{{ $image }}" alt="items" class="w-100 h-100 object-fit-cover rounded image-thumbnail" loading="lazy" data-image="{{ $image }}" />
            </div>
        </div>
        @endforeach
    </div> 
            </div>    
            <div class="col-xl-7 col-lg-6 details">
                <h2 class="text-3xl font-semibold mb-2 product-name">{{ $product->name }}</h2>
                <p class="text-gray-500 text-sm mb-4 italic product-category">{{ $product->category->name }}</p>

            <div class="flex items-center gap-3 mb-4">
                <span class="text-magenta text-2xl font-bold"><span class="currency_icon">{{ $product->currency->currency_icon }}</span><span class="selling_price">{{ $product->selling_price }}</span></span>
                <span class="line-through text-gray-400">{{ $product->currency->currency_icon }}{{ $product->net_price }}</span>
                <span class="bg-yellowAccent text-xs px-3 py-1 rounded-full">{{ round((($product->selling_price - $product->net_price) / $product->selling_price) * 100) }}% OFF</span>
            </div>
<input type="hidden" value="{{ $product->images_url[0] }}"
                                                class="product-image">
            <!-- DESCRIPTION -->
            <div class="mb-6">
                <h4 class="font-semibold mb-2">Description</h4>
                <div class="list-disc ml-5 text-sm text-gray-600 space-y-2">
                    {!! $product->description !!}
                </div>
            </div>

            <!-- EXTRA INFO -->
            <div class="text-sm text-gray-500 space-y-2">
                <p><i class="fas fa-truck mr-2"></i> Free shipping on orders above ₹499</p>
                <p><i class="fas fa-undo mr-2"></i> Easy 7-day return policy</p>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="flex gap-4 mt-6">
                <button class="addToCartBtn bg-yellowAccent font-bold py-3 rounded-2xl text-sm hover:shadow-md md:w-25 w-50 transition @if($product->available_stock == 0) disabled @endif" style="height: auto !important;" data-id="{{ $product->id }}">Add To Cart</button>
                <button class="bg-magenta text-white font-bold py-3 rounded-2xl text-sm hover:opacity-90 transition md:w-25 w-50" style="background: #025d18;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')"><i class="fa-brands fa-whatsapp" style="font-size: 20px;position: relative;left: -3px;"></i> <span style="position: relative;top: -2px;">Order Now</button>
            </div>

            
            </div>
        </div>    
        
    </div>

</section>

<!-- ================= RECOMMENDED PRODUCTS ================= -->
<section class="max-w-7xl mx-auto px-4 md:pb-20 pb-2">

    <h3 class="text-xl font-semibold mb-6">Recommended Products</h3>

    <div class="product-slider">
                    @foreach ($whatsappStore->products as $product)
                        <div>
                            @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                            @else
                            <a href="{{ route('whatsapp.store.product.details', [$product->id]) }}"
                            @endif
                                class="d-block h-100" style="color: #212529;">
                                <div class="bg-white rounded-3xl p-4 shadow-sm" style="margin-right: 16px;margin-bottom: 20px;">
                                    <img src="{{ $product->images_url[0] ?? '' }}"
                                        class="h-40 w-full object-contain rounded-xl mb-3">
                                    <h4 class="text-sm font-medium">{{ $product->name }}</h4>
                                    <p class="text-magenta font-semibold">{{ $product->currency->currency_icon }}
                                            {{ $product->selling_price }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
</section>

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
</body>
<script>
    let vcardAlias = "{{ $whatsappStore->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let lang = "{{ getLocalLanguage() ?? 'en' }}";
    let isRtl = "{{ getLocalLanguage() == 'ar' ? 'true' : 'false' }}" === "true";
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
                `<img src="${selectedFlag}" class="flag" alt="flag" loading="lazy"> ${selectedText}`;
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".product-slider").slick({
            infinite: true,
            slidesToShow: {{$whatsappStore->id == 208 ? 5 : 4}},
            slidesToScroll: 1,
            autoplay: true,
            rtl: isRtl,
            prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M0 6.99998C0 6.74907 0.0960374 6.49819 0.287709 6.3069L6.32224 0.287199C6.70612 -0.0957328 7.3285 -0.0957328 7.71221 0.287199C8.09593 0.669975 8.09593 1.29071 7.71221 1.67367L2.37252 6.99998L7.71203 12.3263C8.09574 12.7092 8.09574 13.3299 7.71203 13.7127C7.32831 14.0958 6.70593 14.0958 6.32206 13.7127L0.287522 7.69306C0.09582 7.50167 0 7.25079 0 6.99998Z" fill="currentColor" /></svg></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M8 7.00002C8 7.25093 7.90396 7.50181 7.71229 7.6931L1.67776 13.7128C1.29388 14.0957 0.671503 14.0957 0.287787 13.7128C-0.095929 13.33 -0.095929 12.7093 0.287787 12.3263L5.62748 7.00002L0.287973 1.67369C-0.0957425 1.29076 -0.0957425 0.670084 0.287973 0.287339C0.67169 -0.0957785 1.29407 -0.0957785 1.67794 0.287339L7.71248 6.30694C7.90418 6.49833 8 6.74921 8 7.00002Z" fill="currentColor"/></svg></button>',
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: {{$whatsappStore->id == 208 ? 4 : 3}},
                    },
                },
                {
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
                        arrows: false,
                    },
                },
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            rtl: isRtl,
            fade: true,
            asNavFor: ".slider-nav",
        });
$(".slider-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 1, // ✅ changed to 1 for proper slide
    dots: false,
    rtl: typeof isRtl !== "undefined" ? isRtl : false,
    arrows: false,
    infinite: false, // or true if looping needed
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 1129,
            settings: { slidesToShow: 3 },
        },
        {
            breakpoint: 991,
            settings: { slidesToShow: 5 },
        },
        {
            breakpoint: 768,
            settings: { slidesToShow: 4 },
        },
        {
            breakpoint: 575,
            settings: { slidesToShow: 3 },
        },
    ],
});
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


<script>
    const logoUrl = "{{ $whatsappStore->logo_url }}";

    async function generatePdf(productName, img) {
        
        console.log("Image failed to load:",  productName);
        console.log("Image failed to load:",  typeof img);
        let images = JSON.parse(img);
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const pageWidth = doc.internal.pageSize.width;
        const pageHeight = doc.internal.pageSize.height;

        try {
            const logoImg = await loadImage(logoUrl);

            for (let i = 0; i < images.length; i++) {
                const imgUrl = images[i];
                try {
                    const productImg = await loadImage(imgUrl);

                    // Calculate image dimensions
                    const imgWidth = productImg.width;
                    const imgHeight = productImg.height;
                    const aspectRatio = imgWidth / imgHeight;

                    let newWidth = pageWidth * 0.92;
                    let newHeight = newWidth / aspectRatio;

                    if (newHeight > pageHeight * 0.8) {
                        newHeight = pageHeight * 0.8;
                        newWidth = newHeight * aspectRatio;
                    }

                    const xOffset = (pageWidth - newWidth) / 2;
                    const yOffset = (pageHeight - newHeight) / 2;

                    // Add logo
                    doc.addImage(logoImg, 'PNG', 8, 8, 15, 15);

                    // Add main product image
                    doc.addImage(productImg, 'JPEG', xOffset, yOffset, newWidth, newHeight);

                    // Footer
                    const footerText = "Powered by vCard King";
                    doc.setFontSize(10);
                    doc.setTextColor(0, 0, 255);
                    const textWidth = doc.getTextWidth(footerText);
                    doc.textWithLink(footerText, pageWidth - textWidth - 10, pageHeight - 10, {
                        url: "https://staging.vcardking.com",
                    });

                    if (i < images.length - 1) {
                        doc.addPage(); // Only add page if not the last image
                    }

                } catch (imgErr) {
                    console.error("Image failed to load:", imgUrl, imgErr);
                }
            }

            doc.save(`${productName}_catalogue.pdf`);

        } catch (logoErr) {
            console.error("Logo failed to load:", logoErr);
            alert("Failed to load logo. PDF cannot be generated.");
        }
    }

    function loadImage(url) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = "anonymous"; // Important for CORS
            img.src = url;
            img.onload = () => resolve(img);
            img.onerror = reject;
        });
    }
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const mainImage = document.getElementById('mainImage');
    const mainVideo = document.getElementById('mainVideo');
    const downloadButtonWrapper = document.getElementById('downloadButtonWrapper');
    
    const zoomContainer = document.querySelector('.zoom-container');
    const mobileZoomPopup = document.getElementById('mobileZoomPopup');
    const mobileZoomImage = document.getElementById('mobileZoomImage');
    const closeBtn = document.querySelector('.mobile-zoom-close');    

    // ✅ Image thumbnails click
    document.querySelectorAll('.image-thumbnail').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const imageUrl = this.getAttribute('data-image');
            if(mainVideo){
                mainVideo.style.display = 'none';
                zoomContainer.style.display = 'block';
                mainVideo.src = ''; // stop video playback
            }
            mainImage.src = imageUrl;
            mainImage.style.display = 'block';
            if(downloadButtonWrapper) downloadButtonWrapper.style.display = 'block';
        });
    });

    // ✅ Video thumbnail click (if exists)
    const videoThumbnail = document.querySelector('.video-thumbnail');
    if(videoThumbnail && mainVideo){
        const videoId = videoThumbnail.getAttribute('data-videoid');
        const videoPlayUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}&controls=1&showinfo=0&modestbranding=1`;

        videoThumbnail.addEventListener('click', function(e) {
            e.preventDefault();
            mainImage.style.display = 'none';
            mainImage.src = '';
            mainVideo.src = videoPlayUrl; // reset src to autoplay video
            mainVideo.style.display = 'block';
            zoomContainer.style.display = 'none';
            if(downloadButtonWrapper) downloadButtonWrapper.style.display = 'none';
        });
    }
    
    
    
   // Desktop hover zoom
    function enableDesktopZoom() {
        zoomContainer.addEventListener('mousemove', function (e) {
            const rect = zoomContainer.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            mainImage.style.transformOrigin = `${x}% ${y}%`;
            mainImage.style.transform = "scale(2)";
        });
        zoomContainer.addEventListener('mouseleave', function () {
            mainImage.style.transform = "scale(1)";
        });
    }

    // Mobile popup zoom
    function enableMobileZoom() {
        mainImage.addEventListener('click', function () {
            mobileZoomImage.src = mainImage.src;
            mobileZoomPopup.style.display = 'flex';
        });
        closeBtn.addEventListener('click', function () {
            mobileZoomPopup.style.display = 'none';
        });
        mobileZoomPopup.addEventListener('click', function (e) {
            if (e.target === mobileZoomPopup) mobileZoomPopup.style.display = 'none';
        });
    }

    // Check device
    if (window.innerWidth <= 768) {
        enableMobileZoom();  // 📱 mobile: popup
    } else {
        enableDesktopZoom(); // 💻 desktop: hover zoom
    }    


    let currency_icon = "{{$product->currency->currency_icon}}"
    let productId = "{{$product->id}}"
    let prodAttribute = $("#product_attr_attribu_"+productId).val();
    let prodAttribTitle = $("#product_attr_title_"+productId).val();
    
    
    if(prodAttribute){
        if(!localStorage.getItem("isFromModelClick")){
            if(JSON.parse(prodAttribute).length > 0){
                openModelAndrenderAttributes(JSON.parse(prodAttribute), prodAttribTitle, currency_icon, 'direct', productId);
                return;   
            }
        }
    }
    
    
    
});

// Amazon-like zoom on hover
const zoomContainer = document.querySelector('.zoom-container');
const zoomImage = document.getElementById('mainImage');

zoomContainer.addEventListener('mousemove', function (e) {
    const rect = zoomContainer.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;

    zoomImage.style.transformOrigin = `${x}% ${y}%`;
    zoomImage.style.transform = "scale(2)"; // zoom level (2x here)
});

zoomContainer.addEventListener('mouseleave', function () {
    zoomImage.style.transformOrigin = "center center";
    zoomImage.style.transform = "scale(1)";
});

</script>



</html>
