<!DOCTYPE html>
<html lang="en" dir="{{ getLocalLanguage() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} | {{ $whatsappStore->store_name }}</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <script>
        if(window.location.href.includes("jay-namkin")){
            window.location.href = "https://jaynamkeen.com"
        }
    </script>
    @if(!empty($product->images_url) && count($product->images_url) > 0)
        <meta property="og:image" content="{{ asset($product->images_url[0]) }}" />
        <meta name="twitter:image" content="{{ asset($product->images_url[0]) }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/restaurant.css') }}" />
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
 
        
    @if($whatsappStore->id == 322 || $whatsappStore->id == 187)
    <style>
        
    .details-img {
        border-radius: 10px !important;
        height: 500px !important;
        object-fit: fill;
        width: 100%;
        max-height: 500px !important;

    }
    
    .product-img {
        aspect-ratio: unset;
        border-radius: 15px !important;
        margin-bottom: 6px;
        height: 250px !important;
        max-height: unset !important;
        object-fit: fill;
        width: 100%;
    }
    
    .product-image{
     border-radius: 15px !important;   
    }    



                   
    </style>
    @endif
    
    <style>
        
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
            width: 100px !important;
            height: 100px !important;
            margin: auto;
        }

        .slick-slide.slick-active{
            opacity: 1 !important;
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
        
    .object-fit-cover {
        object-fit: contain;
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
    @include('whatsapp_stores.templates.restaurant.footer-commoncss')        
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
    
</style>




<body>
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
                                    style="color: #ffffff">{{ $whatsappStore->store_name }}</a></span>
                            @else
                            <span class="fw-6 fs-18"><a
                                    href="{{ route('whatsapp.store.show') }}"
                                    style="color: #ffffff">{{ $whatsappStore->store_name }}</a></span>
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
    

<div class="main-container">     
    
    <div class="main-content mx-auto w-100 d-flex flex-column justify-content-between position-relative">
        <div>
             @if($whatsappStore->id != 1106)
            <div class="position-absolute vector-3 vector">
                <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-3.png') }}" alt="images" />
            </div>
             @endif
             
             @if($whatsappStore->id != 1106)
            <div class="position-absolute vector-2 text-end vector">
                <img src="{{ asset('assets/img/whatsapp_stores/restaurant/vector-2.png') }}" alt="images" />
            </div>
            @endif

            <div class="item-details-section px-50 mb-30">
                <div class="item-details-card overflow-hidden position-relative">
                    <div class="row row-gap-30px">
                                                <div class="col-xl-5 col-lg-6">
                            
                                @php
                                    $videoId = '';
                                    if (!empty($product->youtube_link)) {
                                        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $product->youtube_link, $matches);
                                        $videoId = $matches[1] ?? '';
                                    }
                                @endphp                       
                            
                            
                            
                            
                            <div class="slider-for mb-15px">
                                
                                
                        <div id="mainDisplay" class="mb-20" style="position: relative;">
                            <div class="details-img position-relative">

 <!-- Main Image (show if no video) -->
<div class="zoom-container" id="zoomContainer" style="{{ $videoId ? 'display: none;' : 'display: block;' }}">
    <img id="mainImage"
         src="{{ $product->images_url[0] }}"
         alt="items"
         class="zoom-image"
         loading="lazy"
         style="{{ $videoId ? 'display: none;' : 'display: block;' }}; border-radius: 10px;" />
</div>                                      

                    
                                <!-- Main Video (show if videoId exists) -->
                                @if ($videoId)
                                <iframe id="mainVideo" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=1&showinfo=0&modestbranding=1" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media; fullscreen" 
                                    allowfullscreen 
                                    class="w-100 h-100 "
                                    style="display: block;border-radius: 10px;">
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
                                
                            </div>

                            
<!-- Mobile Popup -->
<div id="mobileZoomPopup" class="mobile-zoom-overlay">
    <span class="mobile-zoom-close">&times;</span>
    <div class="mobile-zoom-wrapper">
        <img id="mobileZoomImage" src="" alt="zoomed image" />
    </div>
</div>                              

                            <div class="slider-nav">
                                
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
                                
                                @foreach ($product->images_url as $image)
                                    <div>
                                        <div class="thumbnail-img h-100 w-100 mx-auto position-relative" data-image="{{ $image }}">
                                            <img src="{{ $image }}" alt="items"
                                                class="w-100 h-100 object-fit-cover image-thumbnail" loading="lazy" data-image="{{ $image }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        
                        
                        <!--<div class="col-xl-5 col-lg-6">-->
                        <!--    <div class="slider-for mb-15px">-->
                        <!--        @foreach ($product->images_url as $image)-->
                        <!--            <div>-->
                        <!--                @if($whatsappStore->id != 97)-->
                        <!--                    <div class="details-img h-100 w-100 mx-auto">-->
                        <!--                        <img src="{{ $image }}" alt="items"-->
                        <!--                        class="w-100 h-100 object-fit-cover" loading="lazy" />-->
                        <!--                    </div>-->
                        <!--                @else-->
                        <!--                <div class="new-details-image details-img w-100 mx-auto" style="max-height: 700px !important;">-->
                        <!--                    <img src="{{ $image }}" alt="items"-->
                        <!--                        class="w-100 object-fit-cover" loading="lazy" style="height: 700px !important"/>-->
                        <!--                </div>-->
                        <!--                @endif-->
                                        
                        <!--            </div>-->
                        <!--        @endforeach-->
                        <!--    </div>-->
                        <!--    <div class="slider-nav">-->
                        <!--        @foreach ($product->images_url as $image)-->
                        <!--            <div>-->
                        <!--                <div class="thumbnail-img h-100 w-100 mx-auto position-relative">-->
                        <!--                    <img src="{{ $image }}" alt="items"-->
                        <!--                        class="w-100 h-100 object-fit-cover" />-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        @endforeach-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-xl-7 col-lg-6">
                            <div class="product-detail-content d-flex h-100 justify-content-between flex-column" >
                                <div>
                                    <div class="d-flex align-items-center gap-20px mb-10">
                                        <p class="fs-24 text-white fw-semibold mb-0 product-name">{{ $product->name }}</p>
                                        <input type="hidden" value="{{ $product->available_stock }}"
                                            class="available-stock">
                                        <input type="hidden" value="{{ $product->category->name }}"
                                            class="product-category">
                                        <input type="hidden" value="{{ $product->images_url[0] }}"
                                            class="product-image">
                                    </div>
                                    <p class="text-primary fs-28 fw-semibold mb-10">

                                       @if ($product->selling_price)
                                        <span class="currency_icon">
                                            {{ $product->currency->currency_icon }}</span>
                                        <span class="selling_price">{{ $product->selling_price }}</span>
                                        @endif
                                         
                                         @if ($product->net_price)
                                                        <del class="fs-14 fw-5 text-gray-200">{{ $product->currency->currency_icon }}
                                                            {{ $product->net_price }}</del>
                                                    @endif
                                        @if ($product->available_stock == 0)
                                            <span class="badge badge-danger bg-danger text-sm out-of-stock-text mt-0 ms-2">{{ __('messages.whatsapp_stores.out_of_stock') }}</span>
                                        @endif
                                    </p>
                                    <p class="fs-20 fw-6 text-gray-200 mb-3">
                                        {{ __('messages.whatsapp_stores_templates.description') }} :</p>
                                    <p class="fs-16 text-white fw-normal mb-20 ">{!! $product->description !!}</p>
                                </div>

                                @if($whatsappStore->id == 1065 )
                                <div class="d-flex">
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

                                <div class="d-flex">
                                    @if ($product->available_stock != 0)
                                            @if($whatsappStore->id != 171 && $whatsappStore->id != 1065)
                                        <button class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 addToCartBtn mx-1" data-id="{{ $product->id }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 24 25" fill="none">
                                                <path d="M8.28564 7.41444C8.28564 5.36304 9.94849 3.7002 11.9999 3.7002C14.0513 3.7002 15.7141 5.36304 15.7141 7.41444C15.7141 7.56599 15.6539 7.71134 15.5468 7.8185C15.4396 7.92566 15.2943 7.98587 15.1427 7.98587C14.9912 7.98587 14.8458 7.92566 14.7387 7.8185C14.6315 7.71134 14.5713 7.56599 14.5713 7.41444C14.5713 6.73247 14.3004 6.07842 13.8181 5.59619C13.3359 5.11396 12.6819 4.84304 11.9999 4.84304C11.3179 4.84304 10.6639 5.11396 10.1816 5.59619C9.69941 6.07842 9.42849 6.73247 9.42849 7.41444C9.42849 7.56599 9.36829 7.71134 9.26112 7.8185C9.15396 7.92566 9.00862 7.98587 8.85707 7.98587C8.70552 7.98587 8.56017 7.92566 8.45301 7.8185C8.34585 7.71134 8.28564 7.56599 8.28564 7.41444ZM12.5713 12.5572C12.5713 12.4057 12.5111 12.2604 12.404 12.1532C12.2968 12.046 12.1514 11.9858 11.9999 11.9858C11.8483 11.9858 11.703 12.046 11.5958 12.1532C11.4887 12.2604 11.4285 12.4057 11.4285 12.5572V14.2715H9.7142C9.56265 14.2715 9.41731 14.3317 9.31014 14.4389C9.20298 14.546 9.14278 14.6914 9.14278 14.8429C9.14278 14.9945 9.20298 15.1398 9.31014 15.247C9.41731 15.3542 9.56265 15.4144 9.7142 15.4144H11.4285V17.1286C11.4285 17.2802 11.4887 17.4255 11.5958 17.5327C11.703 17.6399 11.8483 17.7001 11.9999 17.7001C12.1514 17.7001 12.2968 17.6399 12.404 17.5327C12.5111 17.4255 12.5713 17.2802 12.5713 17.1286V15.4144H14.2856C14.4371 15.4144 14.5825 15.3542 14.6896 15.247C14.7968 15.1398 14.857 14.9945 14.857 14.8429C14.857 14.6914 14.7968 14.546 14.6896 14.4389C14.5825 14.3317 14.4371 14.2715 14.2856 14.2715H12.5713V12.5572Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.20225 10.7719C5.28737 10.234 5.56165 9.74422 5.97574 9.39058C6.38982 9.03693 6.91653 8.84268 7.46108 8.84277H16.5384C17.083 8.84261 17.6098 9.03683 18.0239 9.39049C18.4381 9.74414 18.7124 10.234 18.7975 10.7719L19.9715 18.2004C20.1907 19.5884 19.117 20.8427 17.7124 20.8427H6.28738C4.88282 20.8427 3.80912 19.5884 4.02854 18.2004L5.20225 10.7719ZM7.46108 9.98562C7.18873 9.98552 6.92529 10.0826 6.71814 10.2594C6.511 10.4363 6.37375 10.6812 6.33109 10.9502L5.1571 18.3787C5.13137 18.5419 5.14134 18.7088 5.18632 18.8678C5.23131 19.0269 5.31024 19.1742 5.41767 19.2998C5.52511 19.4254 5.65849 19.5262 5.80864 19.5952C5.95878 19.6643 6.12211 19.7 6.28738 19.6998H17.7124C17.8777 19.6999 18.041 19.6642 18.1911 19.5951C18.3412 19.5261 18.4746 19.4253 18.582 19.2997C18.6894 19.1741 18.7684 19.0268 18.8134 18.8678C18.8584 18.7088 18.8684 18.5419 18.8427 18.3787L17.6687 10.9502C17.626 10.6811 17.4887 10.4362 17.2815 10.2593C17.0743 10.0825 16.8108 9.98546 16.5384 9.98562H7.46108Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                    </button>
                                    @endif
                                        <button class="btn btn-primary d-flex justify-content-center align-items-center {{ $whatsappStore->id == 171 ? 'w-100' : 'w-50'}} fs-18 gap-2 mx-1" data-id="{{ $product->id }}" id="whatsappOrderButton" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;height: 40px;border: 1px solid #25d366 !important;">
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
                                        @if($whatsappStore->id == 171)
                                                    <span style="margin-left: 6px !important;">Inquiry Now</span>
                                                @else
                                                    <span style="margin-left: 6px !important;">{{ __('messages.whatsapp_stores_templates.order_now') }}</span>
                                                @endif
                                    </button>
                                    @else
                                        <button class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 mx-1" data-id="{{ $product->id }}" id="whatsappOrderButton" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;height: 40px;border: 1px solid #25d366 !important;">
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
                                    </button>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recommended-product-section px-50 position-relative">
                <div class="text-center">
                    <h2
                        class="text-center text-white fs-28 fw-semibold mb-40 section-heading position-relative d-inline-block">
                        {{ __('messages.whatsapp_stores_templates.recommended_items') }}</h2>
                    </h2>
                </div>
                <div class="product-slider">
                    @foreach ($whatsappStore->products as $product)

                            @if (request()->getHost() === 'staging.vcardking.com') 
                             <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                            @else
                             <a href="{{ route('whatsapp.store.product.details', [$product->id]) }}"
                            @endif

                       
                            class="d-block h-100" style="color: #FFFFFF;">
                            <div>
                                <div class="product-card">
                                    <div class="product-img mx-auto h-100 w-100">
                                        <img src="{{ $product->images_url[0] }}" alt="item"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                    <div class="product-details">
                                        <h5 class="fs-20 fw-normal text-white mb-0 text-center product-name">{{ $product->name }}
                                        </h5>
                                        <p class="fs-24 fw-semibold mb-0 text-primary text-center">
                                            {{ $product->currency->currency_icon }} {{ $product->selling_price }}
                                             @if ($product->net_price)
                                                        <del class="fs-14 fw-5 text-gray-200">{{ $product->currency->currency_icon }}
                                                            {{ $product->net_price }}</del>
                                                    @endif</p>
                                           
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @include('whatsapp_stores.templates.order_modal')
        @include('whatsapp_stores.templates.restaurant.cart_modal')
        @include('whatsapp_stores.templates.restaurant.quantity_modal')

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
    
     <a id="whatsappGif" href="https://wa.me/917984847580" style="position: fixed;right: 10px;bottom: 28px;">
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
            ).innerHTML = `<img src="${selectedFlag}" class="flag" alt="flag"> ${selectedText}`;
        });
    });
    $(document).ready(function() {
        $(".product-slider").slick({
            infinite: true,
            slidesToShow: 4,
            rtl: isRtl,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
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
    $(document).ready(function() {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: false,
            rtl: isRtl,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: false,
            rtl: isRtl,
            arrows: false,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 1129,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 5,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 4,
                        vertical: false,
                        dots: true,
                    },
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 3,
                        vertical: false,
                        dots: true,
                    },
                },
            ],
        });
    });
</script>


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

document.addEventListener("DOMContentLoaded", function() {
        
    let wpRegionCode = $("#wpRegionCode").val();
        let whatsappNumber = $("#whatsappNo").val();
        let recipientPhone = `${wpRegionCode}${whatsappNumber}`;
        $("#whatsappGif").attr("href",`https://wa.me/${recipientPhone}`);    
    
    
    const mainImage = document.getElementById('mainImage');
    const mainVideo = document.getElementById('mainVideo');
    const downloadButtonWrapper = document.getElementById('downloadButtonWrapper');
    
    
    const zoomContainer = document.querySelector('.zoom-container');
    const mobileZoomPopup = document.getElementById('mobileZoomPopup');
    const mobileZoomImage = document.getElementById('mobileZoomImage');
    const closeBtn = document.querySelector('.mobile-zoom-close');    
    

    // ✅ Image thumbnails click
    document.querySelectorAll('.thumbnail-img').forEach(item => {
       
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
            $(".slick-slide.slick-active").css("opacity", "1 !important");
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
