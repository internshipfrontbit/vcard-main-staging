<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8" />


    @if ($whatsappStore->site_title && $whatsappStore->home_title)
        <title>{{ $whatsappStore->home_title }} | {{ $whatsappStore->site_title }}</title>
    @else
        <title>{{ $whatsappStore->store_name }}</title>
    @endif
    
    
    @php
        $coverImage = $whatsappStore->getFirstMediaUrl(\App\Models\WhatsappStore::COVER_IMAGE);
        $coverImage = $coverImage ?: asset('uploads/default-cover.jpg'); // fallback image
    @endphp

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

    <script>
        if(window.location.href.includes("seller-zone-surat")){
            window.location.href = "https://sellerzones.com/"
        }
    </script>

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $whatsappStore->store_name }}" />
    <meta property="og:image" content="{{ $coverImage }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $whatsappStore->store_name }}">
    <meta name="twitter:image" content="{{ $coverImage }}">    
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">


        @if ($whatsappStore->meta_description)
            <meta name="description" content="{{ $whatsappStore->meta_description }}">
        @endif
        @if ($whatsappStore->meta_keyword)
            <meta name="keywords" content="{{ $whatsappStore->meta_keyword }}">
        @endif
    



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
    
    
    @if ($whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif
    
    <style>
        
    .fs-20 {
        font-size: 17px;
    }
    .fs-16 {
        font-size: 15px;
    }
    
    .section-heading h2 {
        font-size: 22px;
        font-weight: 600;
    }
    
    .text-gray-200-Blue {
        color: #1269B0 !important;
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
      


        .horizontal-videos {
            display: flex;
            overflow: hidden;
            gap: 10px;
            max-width: calc((210px * 5) + (10px * 4));
            margin: 40px auto 0;
            scroll-behavior: smooth;
        }

        .video-wrapper {
            position: relative;
        }

        .video-wrapper iframe {
            border-radius: 15px;
            width: 210px;
            height: 375px;
            cursor: pointer;
        }

        .iframe-click-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            background: transparent;
        }

        #videoOverlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            justify-content: center;
            align-items: center;
            z-index: 999999;
        }

        #videoOverlay.active {
            display: flex;
        }

        #videoOverlay iframe {
            width: 400px;
            height: 700px;
            border-radius: 15px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 40px;
            color: white;
            cursor: pointer;
            user-select: none;
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
        
        /* Responsive: show 2 videos on mobile */
        @media (max-width: 767px) {
            .horizontal-videos {
                overflow-x: auto; /* allow manual scroll on mobile */
                -webkit-overflow-scrolling: touch; /* smooth momentum scroll on iOS */
                max-width: calc((160px * 2) + (10px * 1));
            }
          .video-wrapper iframe {
            width: 160px;
            height: 285px;
          }
          
          #videoOverlay iframe {
            width: 90%;
            height: 80%;
            max-height: 80%;
          }          
        }
            


    .category-section-new .category-item-new {
        align-items: center;
        background-color: #fff;
        border: 1px solid #999;
        border-radius: 15px;
        display: flex;
        gap: 20px;
        height: 100%;
        padding: 20px 30px;
    }
     .object-fit-cover-certificate {
        object-fit: contain;
        height: 30px !important;
        width: 30px !important;
    }     
    
    .items-new-product {
        background-color: #9999991a;
        border-radius: 20px;
        overflow: hidden;
        padding: 10px;
    }
    
    </style>
    
    
    
      @if($whatsappStore->id == 1151)
    <style>
    

        .chahatcss {
            width: 35%;
            margin-top: 32px;
            text-align: center;
            margin: auto;

        }
    
        
    @media (max-width: 767px) {
        .chahatcss {
            width: 88%;
            margin-top: 32px;
            text-align: center;
            margin: auto;

        }
    }
    </style>
   @endif
    
    
    @include('whatsapp_stores.templates.ready_rasoi.commoncss')
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
    
    @if($whatsappStore->id == 125)
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6CK770WG02"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-6CK770WG02');
        </script>
    @endif
    <style>
        #viewAllButton{
                display: none;
            }
        @media(max-width: 600px){
            .category-image-container{
                flex-wrap: nowrap;
                overflow: auto;
            }   
            .category-image-mobile{
                width: 295px;
                padding-right: 0px !important;
            }
            #viewAllButton{
                display: block !important;
            }
            .rotate-icon{
                transform: rotate(180deg);
            }
        }
    </style>
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
    </style>
    
    

    
    <style>
    .product-section .product-card .product-img img {
    height: 250px !important;
    aspect-ratio: unset !important;
}
        .aspect-ratio-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
       }



.object-fit-cover {

    object-fit: contain;
}
        
    </style>
    
    
  @if($whatsappStore->id != 322)
    <style>
        
         @media (max-width: 767px) {
   .object-fit-cover {

    object-fit: cover;
}
        }
    </style>
   @endif  
   
  @if($whatsappStore->id == 348)
    <style>
        
@media(max-width: 600px) {
    .category-image-container {
        flex-wrap: wrap !important;
        overflow: visible;
    }

    .category-image-mobile {
        width: 97% !important;
        padding-right: 0px !important;
    }

    #viewAllButton {
        display: block !important;
    }

    #viewAllButton.rotate-icon {
        transform: rotate(180deg);
    }
}

    </style>
   @endif    
   
@if($whatsappStore->id == 423)
<style>
         @media (max-width: 767px) {
    .product-section .product-card .product-img img {
    height: 454px !important;
    aspect-ratio: unset !important;
object-fit: contain;    
}             

        }    
    
</style> 
 
@endif 

@if($whatsappStore->id == 348)
<style>
         @media (max-width: 767px) {
    .product-section .product-card .product-img img {
    height: 254px !important;
    aspect-ratio: unset !important;
object-fit: fill;    
}             

        }    
    
</style> 
 
@endif   
    

</head>

<body>


    @include('whatsapp_stores.templates.ready_rasoi.common_header')
            
             

<section class="relative pt-20 md:pt-32 pb-0 md:pb-16 px-4 overflow-hidden">
    <!-- Floating Vectors (Hidden on Mobile) -->
    <img src="https://staging.vcardking.com/assets/img/whatsapp_stores/readyrasoi/bg-vector-3.png"
        class="hidden md:block vector-float top-20 -left-20 w-64 rotate-12" alt="vector">
    <img src="https://staging.vcardking.com/assets/img/whatsapp_stores/readyrasoi/bg-vector-5.png"
        class="hidden md:block vector-float bottom-10 right-10 w-48 -rotate-12" alt="vector">

    <div class="container mx-auto grid lg:grid-cols-2 gap-10 items-center relative z-10">
        
        <!-- Content -->
        <div class="order-2 lg:order-1">
            <div class="flex items-center gap-2 text-magenta font-bold mb-4">
                <span class="w-8 h-[2px] bg-magenta"></span> Taste of India, Ready in a Blink
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold text-gray-900 leading-tight mb-6">
                Authentic Meals. <br>
                <span class="text-magenta">Ready in Minutes.</span>
            </h1>

            <p class="text-base sm:text-lg text-gray-600 mb-8 max-w-lg">
                Experience the richness of traditional Indian spices without the hours of cooking.
                100% natural, zero preservatives.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ request()->getHost() === 'staging.vcardking.com' ? route('whatsapp.store.products',$whatsappStore->url_alias) : route('whatsapp.store.products') }}" class="border-2 border-magenta text-magenta px-8 sm:px-10 py-3 sm:py-4 rounded-2xl font-bold text-base text-center sm:text-lg hover:bg-magenta hover:text-white transition-all">
                    Order Now
                </a>
            </div>
        </div>

        <!-- Banner -->
        <div class="relative order-1 lg:order-2">
            <div class="absolute -z-10 top-6 right-6 w-full h-full bg-yellowAccent rounded-3xl md:rounded-4xl rotate-2"></div>

            <div
                id="bannerCarousel"
                class="carousel slide rounded-3xl md:rounded-4xl shadow-2xl overflow-hidden w-full 
                       h-[260px] sm:h-[320px] md:h-[420px] lg:h-[500px]"
                data-bs-ride="{{ $whatsappStore->is_auto_scroll == 'true' ? 'carousel' : 'false' }}"
                data-bs-interval="{{ $whatsappStore->is_auto_scroll == 'true' ? '4000' : 'false' }}"
            >

                <div class="carousel-inner h-full">

                    {{-- YouTube Video Slide --}}
                    @if($whatsappStore->youtube_banner_url)
                        @php
                            $videoId = '';
                            preg_match(
                                '/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                $whatsappStore->youtube_banner_url,
                                $matches
                            );
                            $videoId = $matches[1] ?? '';
                        @endphp

                        @if($videoId)
                            <div class="carousel-item active h-full">
                                <iframe
                                    class="w-full h-full pointer-events-none"
                                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&controls=0&rel=0&loop=1&playlist={{ $videoId }}"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @endif
                    @endif

                    {{-- Main Cover Image --}}
                    <div class="carousel-item {{ empty($videoId) ? 'active' : '' }} h-full">
                        <img src="{{ $whatsappStore->cover_url }}"
                             class="w-full h-full object-cover"
                             alt="banner"
                             loading="lazy" />
                    </div>

                    {{-- Extra Cover Images --}}
                    @foreach($whatsappStore->extra_cover_images_url as $extraImage)
                        <div class="carousel-item h-full">
                            <img src="{{ $extraImage }}"
                                 class="w-full h-full object-cover"
                                 alt="extra banner"
                                 loading="lazy" />
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Fresh Badge (Hidden on Small Screens) -->
           
        </div>
    </div>
</section>

    
        <section class="py-12 md:py-20 relative">
    <div class="absolute inset-0"></div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-2xl sm:text-3xl font-extrabold mb-8 md:mb-12">
            Explore Our Kitchen
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach ($whatsappStore->categories as $category)

                @if (request()->getHost() === 'staging.vcardking.com') 
                    <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}">
                @else
                    <script>
                        function setCategory(id){
                            let urlObj = new URL(window.location.href);
                            urlObj.pathname = "/products";
                            urlObj.searchParams.set("category", id);
                            window.location.href = urlObj.toString();
                        }
                    </script>
                    <a onclick="setCategory({{ $category->id }})" href="javascript:void(0)">
                @endif

                <!-- Category Card -->
                <div class="bg-white/80 backdrop-blur-sm 
                            p-4 sm:p-6 md:p-8 
                            rounded-2xl md:rounded-4xl 
                            border-2 border-transparent 
                            hover:border-magenta 
                            group cursor-pointer 
                            hover-scale shadow-sm">

                    <div class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 
                                bg-cream rounded-2xl md:rounded-3xl 
                                flex items-center justify-center 
                                mx-auto mb-3 md:mb-4 
                                group-hover:bg-magenta transition">
                        <img src="{{ $category->image_url }}" 
                             alt="category"
                             class="max-w-full max-h-full object-contain">
                    </div>

                    <span class="block font-bold text-sm sm:text-base md:text-lg 
                                 group-hover:text-magenta transition">
                        {{ $category->name }}
                    </span>
                </div>

                </a>
            @endforeach
        </div>
    </div>
</section>


         <section class="py-8 md:py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-row justify-between sm:items-center gap-4 mb-8 md:mb-12">
    
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold">
                        Fan Favorites
                    </h2>

                    @if (request()->getHost() === 'staging.vcardking.com')
                        <a href="{{ route('whatsapp.store.products',$whatsappStore->url_alias) }}">
                    @else
                        <a href="{{ route('whatsapp.store.products') }}">
                    @endif
                        <button class="text-magenta font-bold flex items-center gap-2 
                                    text-sm sm:text-base 
                                    hover:gap-3 transition-all position-relative top-2">
                            View Menu <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </a>

                </div>

                <div class="row">
                    @php($productLimit= $whatsappStore->id == 423 ? 35 : $productLimit= $whatsappStore->id == 208 ? 18 : 8)
                @foreach ($whatsappStore->products()->where('available_stock', '>', 0)->orderBy('position', 'asc')->latest()->take($productLimit)->get() as $product)
    {{-- Added 'col-6' for 2 items per row on mobile. 'col-sm-6' and up remains standard. --}}
    <div class="col-xl-3 col-lg-4 col-sm-6 col-6 mb-6">
        
        {{-- Card: p-2 on mobile (tight), p-4 on desktop (original spacious look) --}}
        <div class="product-card bg-cream/30 rounded-[1.5rem] sm:rounded-[2.5rem] p-2 sm:p-4 premium-shadow hover-scale overflow-hidden h-full">
            
            {{-- Image: h-32 on mobile, h-64 on desktop --}}
            <div class="relative h-32 sm:h-64 w-full rounded-[1rem] sm:rounded-[1.5rem] overflow-hidden mb-2 sm:mb-6">
                @if (request()->getHost() === 'staging.vcardking.com') 
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                @else
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}">
                @endif
                <img src="{{ $product->images_url[0] ?? '' }}" class="w-full h-full object-contain product-image">
                
                    </a>
                
            </div>
            
            <div class="px-1 sm:px-2">
                @if (request()->getHost() === 'staging.vcardking.com') 
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                @else
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}">
                @endif
                    {{-- Name: text-sm on mobile, text-xl on desktop --}}
                    <h4 class="text-sm sm:text-xl font-extrabold mb-1 product-name leading-tight sm:leading-normal h-[40px] sm:h-[55px] line-clamp-2">{{ $product->name }}</h4>
                </a>
                
                <p class="text-gray-500 text-xs sm:text-sm mb-2 sm:mb-4 italic product-category truncate">{{ $product->category->name }}</p>
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2 sm:mb-6">
                    <div>
                        <span class="selling_price d-none">{{ $product->selling_price }}</span>
                        {{-- Price: text-lg on mobile, text-2xl on desktop --}}
                        <span class="text-lg sm:text-2xl font-black text-magenta">{{ $product->currency->currency_icon }}{{ $product->selling_price }}</span>
                        <span class="text-gray-400 line-through text-xs sm:text-sm ml-1 sm:ml-2"><span class="currency_icon">{{ $product->currency->currency_icon }}</span>{{ $product->net_price }}</span>
                    </div>
                    {{-- Discount Badge: responsive font and padding --}}
                    <div class="bg-yellowAccent/20 px-2 sm:px-3 py-1 rounded-lg text-[10px] sm:text-xs font-bold text-orange-600 w-fit mt-1 sm:mt-0">
                        {{ round((($product->selling_price - $product->net_price) / $product->selling_price) * 100) }}% OFF
                    </div>
                </div>
                
                {{-- Buttons: Stacked on mobile (grid-cols-1) to fit 2-card layout, side-by-side on desktop (md:grid-cols-2) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 sm:gap-3">
                    <input type="hidden" value="">
                    
                    {{-- Add to Cart: Smaller text/padding on mobile --}}
                    <button class="addToCartBtn bg-yellowAccent font-bold py-2 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm hover:shadow-md transition @if($product->available_stock == 0) disabled @endif" style="height: auto !important;width: auto !important;" data-id="{{ $product->id }}">
                        Add Cart
                    </button>
                    
                    {{-- Order Now: Smaller text/padding on mobile --}}
                    <button class="bg-magenta text-white font-bold py-2 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm hover:opacity-90 transition flex items-center justify-center gap-1" style="background: #025d18;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')">
                        <i class="fa-brands fa-whatsapp text-sm sm:text-lg"></i> 
                        <span>Order</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

                </div>
                
            </div>
        </section>

        <div class="container mx-auto flex flex-row justify-between sm:items-center 
            gap-4 mt-8 md:mt-12 mb-8 md:mb-12">

    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold 
               aos-init aos-animate"
        data-aos="fade-right">
        Trending Videos
    </h2>

    <button class="text-magenta font-bold flex items-center gap-2 
                   text-sm sm:text-base 
                   hover:gap-3 transition-all position-relative top-1 md:top-2">
        View More <i class="fa-solid fa-arrow-right"></i>
    </button>
</div>

            <!-- Video Container -->
                <div class="horizontal-videos mb-10" id="videoContainer">
                    @foreach (\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id) as $link)
                        <div class="video-wrapper">
                            <iframe 
                                src="{{ $link }}?autoplay=1&mute=1&loop=1&playlist={{ basename($link) }}&controls=0&showinfo=0&modestbranding=0" 
                                frameborder="0" 
                                allow="autoplay; encrypted-media; fullscreen" 
                                allowfullscreen></iframe>
                            <div class="iframe-click-overlay"></div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Overlay HTML -->
                <div id="videoOverlay">
                    <div class="close-btn">&times;</div>
                    <iframe src="" frameborder="0" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>
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
        @include('whatsapp_stores.templates.beauty_products.attributes_model')
                @if($whatsappStore->id == 1151)
                    <img src="https://staging.vcardking.com/uploads/microveda.jpeg" alt="Footer Banner - JK Filterwala" class="chahatcss">
                @endif 
        
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
    function viewAllCategories(){
        if($("#viewAllButton").attr("data-content") == "View All"){
            $("#viewAllButton").attr("data-content","View less");
            $("#viewAllButton").addClass("rotate-icon");
            $(".category-image-container").css({
                flexWrap: 'wrap'
            });                
            $(".category-image-mobile").css({
                width: '97%' 
            });  
            console.log("Click on viewAllCategories");
        }else{
            $("#viewAllButton").attr("data-content","View All");
            $("#viewAllButton").removeClass("rotate-icon");
            $(".category-image-container").css({
                flexWrap: 'nowrap'
            });                
            $(".category-image-mobile").css({
                width: '295px' 
            });   
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
