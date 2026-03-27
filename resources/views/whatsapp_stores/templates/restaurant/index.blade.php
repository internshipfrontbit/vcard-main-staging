<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        if(window.location.href.includes("jay-namkin")){
            window.location.href = "https://jaynamkeen.com"
        }
    </script>
    <meta charset="UTF-8" />

    @if ($whatsappStore->site_title && $whatsappStore->home_title)
        <title>{{ $whatsappStore->home_title }} | {{ $whatsappStore->site_title }}</title>
    @else
        <title>{{ $whatsappStore->store_name }}</title>
    @endif
    
    <script>
        if(window.location.href.includes("jay-namkin")){
            window.location.href = "https://jaynamkeen.com"
        }
    </script>
    @php
        $coverImage = $whatsappStore->getFirstMediaUrl(\App\Models\WhatsappStore::COVER_IMAGE);
        $coverImage = $coverImage ?: asset('uploads/default-cover.jpg'); // fallback image
    @endphp

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
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/restaurant.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
    
    @if($whatsappStore->id == 151)
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0Q4K91F31C"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-0Q4K91F31C');
        </script>
    @endif
    

    @if ( $whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif    
    
    
        
    <style>
        
            .horizontal-videos {
            display: flex;
            overflow: hidden;
            gap: 10px;
            max-width: calc((210px * 5) + (10px * 4));
            margin: 40px auto 0;
            scroll-behavior: smooth;
            margin-bottom: 64px;
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
                margin-bottom: 64px;
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
          



        .view-more {
            margin-bottom: 105px;
        }
    
        
    </style>
    
    
    @if($whatsappStore->id == 322 || $whatsappStore->id == 187)
    <style>
        
    .product-img {
        aspect-ratio: 1.49;
        border-radius: 15px !important;
        margin-bottom: 6px;
        height: 253px;
        object-fit: fill;
        width: 100%;
    }
    .product-image{
     border-radius: 15px !important;   
    }
                   
    </style>
    @endif
    
   @include('whatsapp_stores.templates.restaurant.footer-commoncss')     
   
  @if($whatsappStore->id == 308)
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
    
</head>




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
    
        .object-fit-cover {
        object-fit: contain;
    }               

        .object-fit-banner {
        object-fit: fill;
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


<body style="background: black;">
<div class="position-relative top-0 header w-100 px-50 z-3">
              <nav class="navbar  navbar-expand-lg w-100" id="header">
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
                                    style="color: #ffffff ">{{ $whatsappStore->store_name }}</a></span>
                            @else
                            <span class="fw-6 fs-18"><a
                                    href="{{ route('whatsapp.store.show') }}"
                                    style="color: #ffffff ">{{ $whatsappStore->store_name }}</a></span>
                            @endif                        
                        </div>

                        <div class="d-flex align-items-center gap-lg-4 gap-sm-3 gap-2">

                            
                             @if($whatsappStore->id != 322 && $whatsappStore->id != 187 && $whatsappStore->id != 1065)    
                            <button
                                class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                                id="addToCartViewBtn">
                                <div
                                    class="position-absolute cart-count d-flex align-items-center justify-content-center product-count-badge">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40"
                                    viewBox="0 0 41 40" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M27.1301 11.6667C27.1301 11.9982 26.9984 12.3161 26.764 12.5505C26.5296 12.785 26.2116 12.9167 25.8801 12.9167C25.5486 12.9167 25.2306 12.785 24.9962 12.5505C24.7618 12.3161 24.6301 11.9982 24.6301 11.6667V9.16666C24.6301 7.95109 24.1472 6.7853 23.2877 5.92576C22.4281 5.06621 21.2623 4.58333 20.0468 4.58333C18.8312 4.58333 17.6654 5.06621 16.8059 5.92576C15.9463 6.7853 15.4634 7.95109 15.4634 9.16666V11.6667C15.4634 11.9982 15.3317 12.3161 15.0973 12.5505C14.8629 12.785 14.545 12.9167 14.2134 12.9167C13.8819 12.9167 13.564 12.785 13.3296 12.5505C13.0951 12.3161 12.9634 11.9982 12.9634 11.6667V9.16666C12.9634 7.28804 13.7097 5.48637 15.0381 4.15799C16.3665 2.82961 18.1682 2.08333 20.0468 2.08333C21.9254 2.08333 23.7271 2.82961 25.0554 4.15799C26.3838 5.48637 27.1301 7.28804 27.1301 9.16666V11.6667Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32.2835 13.9167L33.6168 33.9167C33.6503 34.4289 33.5784 34.9425 33.4056 35.4258C33.2328 35.9092 32.9627 36.352 32.6121 36.7268C32.2614 37.1017 31.8376 37.4007 31.3669 37.6053C30.8961 37.81 30.3884 37.9159 29.8751 37.9167H10.2185C9.70502 37.9164 9.19708 37.8108 8.72611 37.6063C8.25514 37.4018 7.83116 37.1028 7.48041 36.7279C7.12966 36.3529 6.85961 35.9099 6.68698 35.4264C6.51435 34.9428 6.44281 34.429 6.4768 33.9167L7.81013 13.9167C7.87355 12.9675 8.29533 12.0779 8.99005 11.428C9.68477 10.7782 10.6005 10.4167 11.5518 10.4167H28.5418C29.4931 10.4167 30.4088 10.7782 31.1035 11.428C31.7983 12.0779 32.22 12.9675 32.2835 13.9167ZM24.1901 17.7967C23.8175 18.5799 23.2305 19.2415 22.4971 19.7047C21.7638 20.1679 20.9142 20.4138 20.0468 20.4138C19.1794 20.4138 18.3298 20.1679 17.5965 19.7047C16.8631 19.2415 16.2761 18.5799 15.9035 17.7967C15.833 17.6484 15.734 17.5154 15.6121 17.4054C15.4903 17.2954 15.3479 17.2104 15.1933 17.1554C15.0386 17.1004 14.8746 17.0764 14.7106 17.0847C14.5466 17.0931 14.3859 17.1337 14.2376 17.2042C14.0893 17.2746 13.9564 17.3736 13.8464 17.4955C13.7363 17.6173 13.6514 17.7597 13.5964 17.9144C13.5414 18.069 13.5173 18.2331 13.5257 18.397C13.5341 18.561 13.5747 18.7217 13.6451 18.87C14.2192 20.0821 15.1255 21.1063 16.2588 21.8235C17.3921 22.5407 18.7056 22.9214 20.0468 22.9214C21.3879 22.9214 22.7015 22.5407 23.8348 21.8235C24.9681 21.1063 25.8744 20.0821 26.4485 18.87C26.5189 18.7217 26.5595 18.561 26.5679 18.397C26.5762 18.2331 26.5522 18.069 26.4972 17.9144C26.4422 17.7597 26.3573 17.6173 26.2472 17.4955C26.1372 17.3736 26.0042 17.2746 25.856 17.2042C25.7077 17.1337 25.547 17.0931 25.383 17.0847C25.219 17.0764 25.055 17.1004 24.9003 17.1554C24.7456 17.2104 24.6033 17.2954 24.4815 17.4054C24.3596 17.5154 24.2606 17.6484 24.1901 17.7967Z"
                                        fill="white" />
                                </svg>
                            </button>
                             @endif
                        </div>
                    </div>
                </nav>
            </div>    

            <div id="bannerCarousel" 
                 class="carousel slide banner-section position-relative {{ $whatsappStore->is_full_screen == 0 ? 'container px-0' : ''  }}" 
                 data-bs-ride="{{ $whatsappStore->is_auto_scroll == 'true' ? 'carousel' : 'false' }}" 
                 data-bs-interval="{{ $whatsappStore->is_auto_scroll == 'true' ? '4000' : 'false' }}">     
                 
                <div class="carousel-inner">
            
                    {{-- YouTube Video Slide (non-clickable) --}}
                    @if($whatsappStore->youtube_banner_url)
                        @php
                            $videoId = '';
                            if (!empty($whatsappStore->youtube_banner_url)) {
                                preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $whatsappStore->youtube_banner_url, $matches);
                                $videoId = $matches[1] ?? '';
                            }
                        @endphp
                        @if($videoId)
                            <div class="carousel-item active">
                                <div class="ratio ratio-16x9" style="pointer-events: none;">
                                    <iframe 
                                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&controls=0&showinfo=0&modestbranding=1&rel=0&loop=1&playlist={{ $videoId }}"
                                        title="YouTube video"
                                        frameborder="0"
                                        allow="autoplay; encrypted-media"
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            </div>
                        @endif
                    @endif
            
                    {{-- Cover Image Slide (same height as video) --}}
                    <div class="carousel-item {{ empty($videoId) ? 'active' : '' }}">
                        <div class="ratio ratio-16x9">
                            <img src="{{ $whatsappStore->cover_url }}" class="object-fit-cover-banner w-100 h-100" alt="banner" loading="lazy" />
                        </div>
                    </div>


        {{-- Extra Cover Images --}}
        @foreach($whatsappStore->extra_cover_images_url as $extraImage)
            <div class="carousel-item">
                <div class="ratio ratio-16x9">
                    <img src="{{ $extraImage }}" class="object-fit-cover-banner w-100 h-100" alt="extra banner" loading="lazy" />
                </div>
            </div>
        @endforeach                    
            
                </div>
            
                {{-- Carousel Controls (optional) --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            
            </div> 


    @include('whatsapp_stores.templates.marquee-text')    


<div class="main-container">            
    <div class="main-content mx-auto w-100 d-flex flex-column justify-content-between position-relative">
        <div>

                    @if (request()->getHost() === 'staging.vcardking.com')  
                     <form action="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias]) }}" style="margin-top:20px" method="GET">
                    @else
                     <form action="{{ route('whatsapp.store.products') }}" style="margin-top:20px" method="GET">
                    @endif
                        <div class="search-input-container position-relative mb-4">
                            <input type="text" class="form-control" style="background: #4c4c4c;color: #ffffff;border: none !important; " placeholder="Enter product name" name="search">
                            <button type="submit" style="position: absolute;top: 1px;right: 1px;background: #ffffff;color: #000000;padding: 6px 10px;border-radius: 4px;cursor: pointer;border: none !important;"><i class="fas fa-search" ></i></button>
                        </div>
                    </form>

            <div class="category-section px-50 pt-40px pb-40px position-relative">
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        {{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                </div>
                <div class="category-slider">
                    @foreach ($whatsappStore->categories as $category)
                        
                            <div class="position-relative">
                                <style>
                                            .share-button {
                                                position: absolute;
                                                top: 0px;
                                                right: -5px;
                                                font-size: 20px;
                                                background: #1d1d1d;
                                                padding: 10px 10px;
                                                border-radius: 50px;
                                                cursor: pointer;
                                                color: #ffffff;
                                                z-index: 1;
                                            }
                                        </style>
                                        @if($whatsappStore->id == 322)
                                            <i class="fa-solid fa-share-nodes share-button" onclick="categoryShare(896)"></i>
                                        @endif

                            @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}" style="color: #FFFFFF">
                            @else
                            <script>
                                function setCategory(id){
                                    let urlObj = new URL(window.location.href);

                                    urlObj.pathname = "/products";

                                    // Set new category ID
                                    urlObj.searchParams.set("category", id); // replace 200 with the new ID
                                    
                                    // Get the updated URL
                                    let updatedUrl = urlObj.toString();
                                    
                                    
                                    window.location.href = updatedUrl;
                                    window.location.relod();
                                }
                            </script>
                            <a onclick="setCategory({{$category->id}})" href="javascript:void(0)" style="color: #FFFFFF">
                            @endif

                                        
                                <div class="category-box">
                                    <div class="category-img mx-auto position-relative">
                                        
                                        <img src="{{ $category->image_url }}" alt="category-img"
                                            class="h-100 w-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                    <p class="fw-medium fs-16 text-white text-center">{{ $category->name }}</p>
                                </div>
                                </a>
                            </div>
                        
                    @endforeach

                </div>
                @if ($whatsappStore->categories->count() == 0)
                    <div class="text-center mb-5 mt-3">
                        <h3 class="fs-20 fw-6 mb-0 text-white">
                            {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                    </div>
                @endif
            </div>
            <div class="product-section px-50 position-relative">

                @if($whatsappStore->id != 1106)                    
                <div class="position-absolute vector-2 vector text-end">
                    <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-2.png') }}" alt="images" />
                </div>
                @endif
                
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        {{ __('messages.whatsapp_stores_templates.choose_your_item') }}</h2>
                </div>
                <div class="row custom-row product-gap-row row-gap-30px">
                    @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-card d-flex justify-content-between flex-column h-100">

                            @if (request()->getHost() === 'staging.vcardking.com') 
                                <a class="d-flex justify-content-between flex-column"
                                    href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                            @else
                                <a class="d-flex justify-content-between flex-column"
                                    href="{{ route('whatsapp.store.product.details', [$product->id]) }}">
                            @endif
                            

                                    <div>
                                        <div class="product-img">
                                            <img src="{{ $product->images_url[0] ?? '' }}" alt="product-img"
                                                class="h-100 w-100 object-fit-cover  product-image" />
                                        </div>
                                        <div class="product-details">
                                            <input type="hidden" value="{{ $product->category->name }}"
                                                class="product-category">
                                            <p class="fs-18 fw-normal text-white text-center mb-0 product-name">
                                                {{ $product->name }}</p>
                                            <p class="text-primary fs-20 fw-semibold text-center mb-4 "> 
                                                @if (!empty($product->selling_price))

                                                    <span
                                                        class="currency_icon">
                                                        {{ $product->currency->currency_icon }}</span>
                                                    <span class="selling_price">{{ $product->selling_price }}</span>
                                               @endif  
                                                
                                                 @if ($product->net_price)
                                                        <del class="fs-14 fw-5 text-gray-200">{{ $product->currency->currency_icon }}
                                                            {{ $product->net_price }}</del>
                                                    @endif
                                            </p>
                                            
                                        </div>
                                        <input type="hidden" value="{{ $product->available_stock }}"
                                        class="available-stock">
                                    </div>
                                </a>

 @if($whatsappStore->id == 1065 )
                                <div>
                                            <button data-id="{{ $product->id }}"
                                                class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 addToCartBtn w-100 mb-1 @if($product->available_stock == 0) disabled @endif"
                                               style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">   
                                            <span>
                                                <svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path>
                                                    <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path>
                                                    <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#5BD066"></stop>
                                                    <stop offset="1" stop-color="#27B43E"></stop>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                            </span>
                                             Order Now 
                                                    <div class="cart">
                                                        <svg viewBox="0 0 36 26">
                                                            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                            </polyline>
                                                            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                        </svg>
                                                    </div>
                                </button>
                                </div>
                                @else


                                
                                <div>
                                @if($whatsappStore->id != 322 && $whatsappStore->id != 187 && $whatsappStore->id != 1065 )
                                    <button
                                    class="@if($product->available_stock == 0) disabled @endif btn btn-primary d-flex justify-content-center align-items-center w-100 mx-auto addToCartBtn mb-1"
                                    data-id="{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 28 28" class="me-1">
                                        <path
                                            d="M13.5264 20.4167C13.5262 21.5727 13.8127 22.7108 14.3605 23.7288C14.9082 24.7469 15.6999 25.6132 16.6647 26.25H4.50225C4.08859 26.2504 3.67958 26.1628 3.30243 25.9929C2.92529 25.8229 2.58865 25.5746 2.31493 25.2645C2.04121 24.9544 1.83667 24.5895 1.71494 24.1941C1.59321 23.7988 1.55706 23.3821 1.60892 22.9717L3.35892 8.97167C3.44705 8.26638 3.78969 7.61755 4.32247 7.14708C4.85524 6.6766 5.54148 6.41687 6.25225 6.41667H7.69308V9.91667C7.69308 10.0714 7.75454 10.2197 7.86394 10.3291C7.97333 10.4385 8.12171 10.5 8.27642 10.5C8.43112 10.5 8.5795 10.4385 8.68889 10.3291C8.79829 10.2197 8.85975 10.0714 8.85975 9.91667V6.41667H15.8597V9.91667C15.8597 10.0714 15.9212 10.2197 16.0306 10.3291C16.14 10.4385 16.2884 10.5 16.4431 10.5C16.5978 10.5 16.7462 10.4385 16.8556 10.3291C16.965 10.2197 17.0264 10.0714 17.0264 9.91667V6.41667H18.4672C19.178 6.41687 19.8643 6.6766 20.397 7.14708C20.9298 7.61755 21.2724 8.26638 21.3606 8.97167L21.9322 13.5567C20.9149 13.3503 19.8645 13.3723 18.8567 13.6212C17.8489 13.8702 16.909 14.3397 16.1048 14.9961C15.3006 15.6524 14.6521 16.4791 14.2062 17.4165C13.7603 18.3539 13.5281 19.3786 13.5264 20.4167ZM17.0264 6.41667H15.8597C15.8597 5.48841 15.491 4.59817 14.8346 3.94179C14.1782 3.28542 13.288 2.91667 12.3597 2.91667C11.4315 2.91667 10.5413 3.28542 9.88487 3.94179C9.2285 4.59817 8.85975 5.48841 8.85975 6.41667H7.69308C7.69308 5.17899 8.18475 3.992 9.05992 3.11683C9.93509 2.24167 11.1221 1.75 12.3597 1.75C13.5974 1.75 14.7844 2.24167 15.6596 3.11683C16.5347 3.992 17.0264 5.17899 17.0264 6.41667Z"
                                            fill="currentColor" />
                                        <path
                                            d="M20.5264 14.5834C19.3727 14.5834 18.2449 14.9255 17.2856 15.5665C16.3263 16.2074 15.5786 17.1185 15.1371 18.1844C14.6956 19.2503 14.5801 20.4232 14.8052 21.5547C15.0303 22.6863 15.5858 23.7257 16.4016 24.5415C17.2174 25.3573 18.2568 25.9129 19.3884 26.138C20.5199 26.363 21.6928 26.2475 22.7587 25.806C23.8246 25.3645 24.7357 24.6168 25.3767 23.6575C26.0176 22.6982 26.3598 21.5704 26.3598 20.4167C26.3581 18.8701 25.7429 17.3874 24.6493 16.2938C23.5557 15.2002 22.073 14.5851 20.5264 14.5834ZM22.2764 21H21.1098V22.1667C21.1098 22.3214 21.0483 22.4698 20.9389 22.5792C20.8295 22.6886 20.6811 22.75 20.5264 22.75C20.3717 22.75 20.2233 22.6886 20.1139 22.5792C20.0045 22.4698 19.9431 22.3214 19.9431 22.1667V21H18.7764C18.6217 21 18.4733 20.9386 18.3639 20.8292C18.2545 20.7198 18.1931 20.5714 18.1931 20.4167C18.1931 20.262 18.2545 20.1136 18.3639 20.0042C18.4733 19.8948 18.6217 19.8334 18.7764 19.8334H19.9431V18.6667C19.9431 18.512 20.0045 18.3636 20.1139 18.2542C20.2233 18.1448 20.3717 18.0834 20.5264 18.0834C20.6811 18.0834 20.8295 18.1448 20.9389 18.2542C21.0483 18.3636 21.1098 18.512 21.1098 18.6667V19.8334H22.2764C22.4311 19.8334 22.5795 19.8948 22.6889 20.0042C22.7983 20.1136 22.8598 20.262 22.8598 20.4167C22.8598 20.5714 22.7983 20.7198 22.6889 20.8292C22.5795 20.9386 22.4311 21 22.2764 21Z"
                                            fill="currentColor" />
                                    </svg>
                                    {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                </button>
                                @endif
                                <button
                                    class="@if($product->available_stock == 0) disabled @endif btn btn-primary d-flex justify-content-center align-items-center w-100 mx-auto" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;"
                                    data-id="{{ $product->id }}">
                                    <svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path>
                                                    <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path>
                                                    <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#5BD066"></stop>
                                                    <stop offset="1" stop-color="#27B43E"></stop>
                                                    </linearGradient>
                                                    </defs>
                                                </svg>
                                                @if($whatsappStore->id == 322)
                                                    <span style="margin-left: 6px !important;">Inquiry Now</span>
                                                @else
                                                    <span style="margin-left: 6px !important;">{{ __('messages.whatsapp_stores_templates.order_now') }}</span>
                                                @endif
                                    
                                </button>    
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    @endforeach
                    @if ($whatsappStore->products->count() == 0)
                        <div class="text-center mb-5 mt-3 text-white">
                            <h3 class="fs-20 fw-6 mb-0 text-break">
                                {{ __('messages.whatsapp_stores_templates.item_not_added') }}</h3>
                        </div>
                    @endif
                </div>
            </div>
            @if ($whatsappStore->products->count() > 0)
                <div class="view-more position-relative">
                    @if($whatsappStore->id != 1106)
                    <div class="position-absolute vector-3 vector">
                        <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-3.png') }}"
                            alt="images" />
                    </div>
                    @endif

                            @if (request()->getHost() === 'staging.vcardking.com') 
                             <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                            @else
                             <a href="{{ route('whatsapp.store.products') }}"
                            @endif                    

                   
                        class="d-block w-100 text-end mx-auto view-more-button fs-20 fw-semibold position-relative">
                        <div
                            class="view-arrow rounded-circle h-100 w-100 d-flex justify-content-center align-items-center position-absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22"
                                viewBox="0 0 26 22" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.7199 0.595177C13.8546 0.423237 14.0185 0.282523 14.2022 0.181083C14.3858 0.0796421 14.5857 0.0194658 14.7903 0.00399616C14.9948 -0.0114735 15.2002 0.0180676 15.3945 0.0909283C15.5888 0.163789 15.7683 0.27854 15.9227 0.428618L25.4659 9.68188C25.6336 9.84473 25.7681 10.0456 25.8602 10.2711C25.9523 10.4965 26 10.7413 26 10.9889C26 11.2365 25.9523 11.4813 25.8602 11.7067C25.7681 11.9322 25.6336 12.1331 25.4659 12.2959L15.9227 21.5492C15.7691 21.7044 15.5892 21.8239 15.3936 21.9008C15.198 21.9777 14.9905 22.0105 14.7834 21.9971C14.5762 21.9837 14.3735 21.9245 14.1872 21.823C14.0009 21.7215 13.8346 21.5796 13.6982 21.4057C13.5618 21.2318 13.4579 21.0294 13.3927 20.8104C13.3275 20.5913 13.3022 20.3599 13.3184 20.1299C13.3345 19.8998 13.3918 19.6756 13.4868 19.4705C13.5819 19.2653 13.7127 19.0833 13.8718 18.9351L20.2783 12.7239H1.56003C1.14628 12.7239 0.749484 12.5411 0.456922 12.2157C0.164359 11.8903 0 11.449 0 10.9889C0 10.5288 0.164359 10.0875 0.456922 9.76208C0.749484 9.4367 1.14628 9.25391 1.56003 9.25391H20.2762L13.8697 3.04266C13.5581 2.74014 13.3672 2.31237 13.3392 1.8534C13.3111 1.39444 13.448 0.94186 13.7199 0.595177Z"
                                    fill="currentColor" />
                            </svg>

                        </div>
                        {{ __('messages.whatsapp_stores_templates.view_more') }}
                    </a>
                </div>
            @endif
            
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        Our Trending Videos</h2>
                </div>            

                           
                            <!-- Video Container -->
                <div class="horizontal-videos" id="videoContainer">
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
                
                
        </div>
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
        @include('whatsapp_stores.templates.restaurant.cart_modal')
        @include('whatsapp_stores.templates.restaurant.quantity_modal')
        
        
                
                @if($whatsappStore->id == 308)
                <img src="https://staging.vcardking.com/uploads/chahat_payment_QR.jpeg" alt="Footer Banner - JK Filterwala" class="chahatcss">
                 @endif

     

    </div>
</div>

    @include('whatsapp_stores.templates.footee-common-view')      
    
        <div id="addToCartBottomViewBtn" style="position: fixed;right: 16px;bottom: 95px;">
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
    
    
     <a id="whatsappGif" href="https://wa.me/917984847580" style="position: fixed;right: 10px;bottom: 28px;z-index: 100;">
        <img src="https://staging.vcardking.com/uploads/whatsapp.gif" style="height: 59px;width: 59px;">
    </a>
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
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/whatsapp_store_template.js') }}?v={{ time() }}"></script>
<script>
    $(document).ready(function() {
        $(".category-slider").slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            rtl: isRtl,
            autoplay: true,
            prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none"><path d="M8.01843 19.124L0.253456 10.7018C0.16129 10.6016 0.0961597 10.493 0.0580645 10.376C0.0193548 10.259 0 10.1337 0 10C0 9.86631 0.0193548 9.74098 0.0580645 9.62401C0.0961597 9.50704 0.16129 9.39842 0.253456 9.29815L8.01843 0.850923C8.23349 0.616974 8.50231 0.5 8.82489 0.5C9.14747 0.5 9.42396 0.62533 9.65438 0.875989C9.88479 1.12665 10 1.41909 10 1.7533C10 2.08751 9.88479 2.37995 9.65438 2.63061L2.88018 10L9.65438 17.3694C9.86943 17.6033 9.97696 17.8914 9.97696 18.2337C9.97696 18.5766 9.86175 18.8734 9.63134 19.124C9.40092 19.3747 9.1321 19.5 8.82489 19.5C8.51767 19.5 8.24885 19.3747 8.01843 19.124Z" fill="black"/></svg></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none"><path d="M1.98157 19.124L9.74654 10.7018C9.83871 10.6016 9.90384 10.493 9.94194 10.376C9.98065 10.259 10 10.1337 10 10C10 9.86631 9.98065 9.74098 9.94194 9.62401C9.90384 9.50704 9.83871 9.39842 9.74654 9.29815L1.98157 0.850923C1.76651 0.616974 1.49769 0.5 1.17511 0.5C0.852534 0.5 0.576037 0.62533 0.345622 0.875989C0.115208 1.12665 0 1.41909 0 1.7533C0 2.08751 0.115208 2.37995 0.345622 2.63061L7.11982 10L0.345622 17.3694C0.130569 17.6033 0.0230408 17.8914 0.0230408 18.2337C0.0230408 18.5766 0.138248 18.8734 0.368663 19.124C0.599078 19.3747 0.867895 19.5 1.17511 19.5C1.48233 19.5 1.75115 19.3747 1.98157 19.124Z" fill="black"/></svg></button>',
            responsive: [{
                    breakpoint: 1399,
                    settings: {
                        slidesToShow: 5,
                    },
                },
                {
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    },
                },
            ],
        });
    });
    
    document.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function() {
            const selectedLang = item.getAttribute("data-lang");
            const selectedFlag = item.querySelector("img").src;
            const selectedText = item.textContent.trim();
            document.getElementById(
                "dropdownMenuButton"
            ).innerHTML = `<img src="${selectedFlag}" class="flag" alt="flag"> ${selectedText}`;
        });
    });
    document.addEventListener("DOMContentLoaded", function(e) {
        let wpRegionCode = $("#wpRegionCode").val();
        let whatsappNumber = $("#whatsappNo").val();
        let recipientPhone = `${wpRegionCode}${whatsappNumber}`;
        $("#whatsappGif").attr("href",`https://wa.me/${recipientPhone}`);
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