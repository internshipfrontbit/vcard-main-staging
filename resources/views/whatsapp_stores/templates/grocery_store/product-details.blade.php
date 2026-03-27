<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} | {{ $whatsappStore->store_name }}</title>
    @if(!empty($product->images_url) && count($product->images_url) > 0)
        <meta property="og:image" content="{{ asset($product->images_url[0]) }}" />
        <meta name="twitter:image" content="{{ asset($product->images_url[0]) }}">
    @endif
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/grocery_store.css') }}" />
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

.navbar {
    background-color: #72bf78;
    border-radius: 0px !important;
    padding: 10px 15px;
}   

.item-details-section .item-details-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px 0 #00000040;
    padding: 25px 20px;
    margin-top: 21px;
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


</head>



<body>
<nav class="navbar navbar-expand-lg position-relative">
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
                            <!--<div class="language-dropdown position-relative">-->
                            <!--    <button class="dropdown-btn position-relative" id="dropdownMenuButton"-->
                            <!--        data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--        @if (array_key_exists(getLocalLanguage() ?? 'en', \App\Models\User::FLAG))-->
                            <!--            <img class="flag" alt="flag"-->
                            <!--                src="{{ asset(\App\Models\User::FLAG[getLocalLanguage() ?? 'en']) }}"-->
                            <!--                loading="lazy" />-->
                            <!--        @endif-->
                            <!--        {{ strtoupper(getLocalLanguage() ?? 'EN') }}-->
                            <!--    </button>-->
                            <!--    <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="14"-->
                            <!--        height="8" viewBox="0 0 18 10" fill="none">-->
                            <!--        <path fill-rule="evenodd" clip-rule="evenodd"-->
                            <!--            d="M0.615983 0.366227C0.381644 0.600637 0.25 0.918522 0.25 1.24998C0.25 1.58143 0.381644 1.89932 0.615983 2.13373L8.11598 9.63373C8.35039 9.86807 8.66828 9.99971 8.99973 9.99971C9.33119 9.99971 9.64907 9.86807 9.88348 9.63373L17.3835 2.13373C17.6112 1.89797 17.7372 1.58222 17.7343 1.25448C17.7315 0.92673 17.6 0.613214 17.3683 0.381454C17.1365 0.149694 16.823 0.0182329 16.4952 0.0153849C16.1675 0.0125369 15.8517 0.13853 15.616 0.366227L8.99973 6.98248L2.38348 0.366227C2.14907 0.131889 1.83119 0.000244141 1.49973 0.000244141C1.16828 0.000244141 0.850393 0.131889 0.615983 0.366227Z"-->
                            <!--            fill="black" />-->
                            <!--    </svg>-->
                            <!--    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                            <!--        @foreach (getAllLanguageWithFullData() as $language)-->
                            <!--            <li>-->
                            <!--                <a class="dropdown-item" href="javascript:void(0)" id="languageName"-->
                            <!--                    data-name="{{ $language->iso_code }}">-->

                            <!--                    @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))-->
                            <!--                        <img class="flag" alt="flag"-->
                            <!--                            src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }} "-->
                            <!--                            loading="lazy" />-->
                            <!--                    @else-->
                            <!--                        @if (count($language->media) != 0)-->
                            <!--                            <img src="{{ $language->image_url }}" class="me-1"-->
                            <!--                                loading="lazy" />-->
                            <!--                        @else-->
                            <!--                            <i class="fa fa-flag fa-xl me-3 text-danger"-->
                            <!--                                aria-hidden="true"></i>-->
                            <!--                        @endif-->
                            <!--                    @endif-->
                            <!--                    {{ strtoupper($language->iso_code) }}-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        @endforeach-->
                            <!--    </ul>-->
                            <!--</div>-->

                            <button
                                class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                                id="addToCartViewBtn">

                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20.0048 9.03985C20.0048 9.27694 19.9106 9.50433 19.7429 9.67198C19.5753 9.83964 19.3479 9.93382 19.1108 9.93382C18.8737 9.93382 18.6463 9.83964 18.4787 9.67198C18.311 9.50433 18.2168 9.27694 18.2168 9.03985V7.2519C18.2168 6.38254 17.8715 5.54879 17.2567 4.93406C16.642 4.31934 15.8083 3.97399 14.9389 3.97399C14.0696 3.97399 13.2358 4.31934 12.6211 4.93406C12.0063 5.54879 11.661 6.38254 11.661 7.2519V9.03985C11.661 9.27694 11.5668 9.50433 11.3992 9.67198C11.2315 9.83964 11.0041 9.93382 10.767 9.93382C10.5299 9.93382 10.3025 9.83964 10.1349 9.67198C9.96723 9.50433 9.87305 9.27694 9.87305 9.03985V7.2519C9.87305 5.90835 10.4068 4.61982 11.3568 3.66979C12.3068 2.71976 13.5954 2.18604 14.9389 2.18604C16.2825 2.18604 17.571 2.71976 18.521 3.66979C19.471 4.61982 20.0048 5.90835 20.0048 7.2519V9.03985Z"
                                        fill="#292929" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.6898 10.6489L24.6434 24.9525C24.6674 25.3188 24.616 25.6862 24.4924 26.0318C24.3688 26.3775 24.1756 26.6942 23.9249 26.9623C23.6741 27.2304 23.371 27.4442 23.0343 27.5905C22.6977 27.7369 22.3346 27.8127 21.9675 27.8132H7.90939C7.54218 27.813 7.17892 27.7375 6.84209 27.5913C6.50526 27.445 6.20204 27.2312 5.95119 26.963C5.70034 26.6948 5.5072 26.378 5.38374 26.0322C5.26028 25.6864 5.20912 25.3189 5.23342 24.9525L6.187 10.6489C6.23235 9.97006 6.534 9.33384 7.03086 8.86907C7.52771 8.40431 8.18262 8.14575 8.86296 8.14575H21.0139C21.6942 8.14575 22.3491 8.40431 22.846 8.86907C23.3428 9.33384 23.6445 9.97006 23.6898 10.6489ZM17.9017 13.4238C17.6351 13.984 17.2153 14.4571 16.6909 14.7884C16.1664 15.1197 15.5588 15.2955 14.9384 15.2955C14.3181 15.2955 13.7105 15.1197 13.186 14.7884C12.6615 14.4571 12.2417 13.984 11.9752 13.4238C11.9248 13.3177 11.854 13.2227 11.7668 13.144C11.6797 13.0653 11.5779 13.0045 11.4673 12.9652C11.3566 12.9258 11.2393 12.9086 11.1221 12.9146C11.0048 12.9206 10.8899 12.9496 10.7838 13C10.6778 13.0504 10.5827 13.1212 10.504 13.2084C10.4253 13.2955 10.3646 13.3973 10.3252 13.508C10.2859 13.6186 10.2687 13.7359 10.2747 13.8532C10.2807 13.9704 10.3097 14.0854 10.3601 14.1914C10.7706 15.0583 11.4188 15.7908 12.2293 16.3037C13.0398 16.8166 13.9793 17.0889 14.9384 17.0889C15.8976 17.0889 16.837 16.8166 17.6475 16.3037C18.458 15.7908 19.1062 15.0583 19.5168 14.1914C19.5672 14.0854 19.5962 13.9704 19.6022 13.8532C19.6082 13.7359 19.591 13.6186 19.5516 13.508C19.5123 13.3973 19.4515 13.2955 19.3728 13.2084C19.2942 13.1212 19.1991 13.0504 19.093 13C18.987 12.9496 18.872 12.9206 18.7548 12.9146C18.6375 12.9086 18.5202 12.9258 18.4096 12.9652C18.2989 13.0045 18.1972 13.0653 18.11 13.144C18.0229 13.2226 17.9521 13.3177 17.9017 13.4238Z"
                                        fill="#292929" />
                                </svg>
                                <div
                                    class="position-absolute product-count-badge count-product  badge rounded-pill bg-danger">

                                </div>
                            </button>
                        </div>
                    </div>
                </nav>    
    <div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        @if($whatsappStore->id == 1209)
        <div class="bg-vector bg-vector-1 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-1.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-2 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-2.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-3 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-3.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-4 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-4.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-5 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-5.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-6 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/vedasri-store/bg-vector-6.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        @else
        <div class="bg-vector bg-vector-1 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-1.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-2 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-2.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-3 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-3.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-4 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-4.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-5 text-start">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-5.png') }}" alt="vector"
                loading="lazy" />
        </div>
        <div class="bg-vector bg-vector-6 text-end">
            <img src="{{ asset('assets/img/whatsapp_stores/grocery_store/bg-vector-6.png') }}" alt="vector"
                class="ms-auto" loading="lazy" />
        </div>
        @endif
        <div>



            <div class="item-details-section px-4 mb-30 position-relative">
                <div class="item-details-card">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 mb-lg-0 mb-40">
                            
                                                
                                @php
                                    $videoId = '';
                                    if (!empty($product->youtube_link)) {
                                        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $product->youtube_link, $matches);
                                        $videoId = $matches[1] ?? '';
                                    }
                                @endphp
                            
                            
                            <div class="row flex-sm-row align-items-center">

                                <div class="col-lg-9 col-sm-10 ps-sm-0 mb-4 mb-sm-0">
                                    
                                    
                                    
                     <!-- Main Display Section -->
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
                                        style="display: none !important;"
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
                                    
                                    
                                    
                                    <div class="slider-for" style="display: none;">
                                       @foreach ($product->images_url as $image)
                                           <div>
                                               <div class="details-img h-100 w-100">
                                                   <img src="{{ $image }}" alt="items"
                                                       class="w-100 h-100 object-fit-cover" loading="lazy" />
                                               </div>
                                           </div>
                                       @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-2 px-sm-0 left-slider">
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
                                            
                                                <div class="thumbnail-img">
                                                    <img src="{{ $image }}" alt="items"
                                                        class="w-100 h-100 object-fit-cover image-thumbnail" loading="lazy" data-image="{{ $image }}" />
                                                </div>
                                           
                                        @endforeach
                                    </div>
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
                                

                        
                        <div class="col-xl-6 col-lg-6">
                            <div class="details d-flex flex-column justify-content-between h-100">
                                <div>
                                    <h4 class="fs-24 fw-6 product-name">{{ $product->name }}</h4>
                                    <input type="hidden" value="{{ $product->available_stock }}"
                                            class="available-stock">
                                    <input type="hidden" value="{{ $product->category->name }}"
                                        class="product-category">
                                    <input type="hidden" value="{{ $product->images_url[0] }}"
                                        class="product-image">
                                    
                                    <p class="fs-24 fw-5 mb-30">
                                        <span class="currency_icon">{{ $product->currency->currency_icon }}</span>
                                        <span class="selling_price"> {{ $product->selling_price }}</span>
                                        @if ($product->net_price)
                                            <del class="fs-20 fw-6 text-gray-200">{{ $product->currency->currency_icon }}
                                                <span id="mrpPrice">{{ $product->net_price }}<span></del>
                                        @endif
                                        @if ($product->available_stock == 0)
                                            <span
                                                class="badge badge-danger bg-danger text-sm out-of-stock-text mt-0 ms-2">{{ __('messages.whatsapp_stores.out_of_stock') }}</span>
                                        @endif
                                    </p>
                                    <style>
                                    
                                    .product-box.activeclass{
                                        border: 1px solid #c29c77 !important;
                                        outline: 1px solid #c29c77 !important;
                                    }
                                    
                                    .product-box.activeclass .attribute{
                                        border-bottom: 1px solid #c29c77 !important !important;
                                    }
                                    
                                        .product-box .attribute {
                                        font-weight: bold;
                                        font-size: 14px;
                                        padding: 8px;
                                        border-bottom: 1px solid #c29c77;
                                    }
                                    .product-box {
                                        width: 120px;
                                        border: 1px solid #ccc;
                                        border-radius: 8px;
                                        text-align: center;
                                        font-family: Arial, sans-serif;
                                        overflow: hidden;
                                        cursor: pointer;
                                    }
                                
                                    .product-box .attribute {
                                      font-weight: bold;
                                      font-size: 14px;
                                      padding: 8px;
                                      border-bottom: 1px solid #ddd;
                                    }
                                
                                    .product-box .price {
                                      font-size: 14px;
                                      color: #333;
                                      padding: 8px;
                                    }
                                    .asttribute-item-container{
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 8px;
                                    }
                                </style>    
                                <p class="fs-20 fw-6 text-gray-200 mb-3">
                                        {{$product->atribute_title}}</p>
                                            <div class="asttribute-item-container mb-3" id="attributeContainer">
                                                
                                            </div>
                                        <div class="form-group mb-4 attr-input">
                                            @if($whatsappStore->id == 1209)
                                            <p id="moqNotes" style="display:none;"><b>MOQ Notes: </b><span></span></p>
                                            @endif
                                    <div class="form-label customize-label">
                                        
                                        @if($whatsappStore->id == 1209)
                                    <span id="applyDisText" style="font-weight: 700;"></span>: <span style="font-weight: 600;color: #770101;">(Get </span> <span id="appOfferCount" style="font-weight: 600;color: #770101;">1</span><span id="applyoffertext" style="
                                        font-weight: 600;
                                        color: #770101;
                                    "></span>
                                     @endif
                                    </div>
                                     @if($whatsappStore->id == 1209 || $whatsappStore->id == 1238)
                                     <div class="input-group" style="width:197px;">
                                        <button class="btn btn-danger" type="button" id="qtyMinusBtnNew" onclick="onminusbuttonClick()">-</button>

                                        <input type="number" id="orderNewAttQty" value="1" class="form-control text-center" onchange="onQtyInputChange()">

                                        <button class="btn btn-success" type="button" id="qtyPlusBtnNew" onclick="onplusbuttonClick()">+</button>
                                    </div>
                                    @endif
                                    <script>
                                        function onplusbuttonClick(){
                                            let selectAttribute = JSON.parse($("#selectedAttribute").val());
                                             let val = parseInt($("#orderNewAttQty").val() || 0);
                                                    $("#orderNewAttQty").val(val + 1);
                                            let storeId = $("#whatsappStoreId").val();
                                            if(storeId == 1209){
                                             let cnt = getOfferCount(Number(val + 1), Number(selectAttribute.discount_quantity));
                                            $("#appOfferCount").html(cnt);       
                                            }
                                        }
                                         function onQtyInputChange(){
                                            let selectAttribute = JSON.parse($("#selectedAttribute").val());
                                            let val = parseInt($("#orderNewAttQty").val() || 0);
                                            if(val < 1){
                                                $("#orderNewAttQty").val(1);
                                                val = 1;
                                            }
                                            let storeId = $("#whatsappStoreId").val();
                                            if(storeId == 1209){
                                            let cnt = getOfferCount(Number(val), Number(selectAttribute.discount_quantity));
                                            $("#appOfferCount").html(cnt);
                                            }
                                        }
                                        function onminusbuttonClick(){
                                            let selectAttribute = JSON.parse($("#selectedAttribute").val());
                                            let val = parseInt($("#orderNewAttQty").val() || 0);  
                                                    if (val > 1) {              // Prevent negative / zero
                                                        $("#orderNewAttQty").val(val - 1);
                                                    }
                                                    let storeId = $("#whatsappStoreId").val();
                                            if(storeId == 1209){
                                                     let cnt = getOfferCount(Number(val), Number(selectAttribute.discount_quantity));
                                                $("#appOfferCount").html(cnt);
                                            }
                                        }
                                    </script>
                                   
                                    </div>
                                        <input type="hidden" value="{{$product->atribute_title}}" id="product_attr_title_{{$product->id}}"> 
                                        <input type="hidden" value="{{$product->attributes}}" id="product_attr_attribu_{{$product->id}}">    
                                        <input type="hidden" id="selectedAttribute" name="selected_attribute" value="">
                                <input type="hidden" id="isOpenFrom" name="selected_attribute" value="">
                                <input type="hidden" id="attrProductId" name="selected_attribute" value="">
                                <input type="hidden" value="{{$product->dis_free}}" id="product_dis_free_{{$product->id}}">
                                <input type="hidden" value="{{$product->dis_text}}" id="product_dis_text_{{$product->id}}">
                                <input type="hidden" value="{{$product->id}}" id="product_id">
                                <input type="hidden" value="true" id="isFromProductDetails">
                                <div class="d-flex mb-3">
                                    @if ($product->available_stock != 0)
                                    <button
                                        class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-3 addToCartBtn me-2"
                                        data-id="{{ $product->id }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 30 30" fill="none">
                                                <path
                                                    d="M4.06864 11.7857L6.75321 23.5389C6.8827 24.1133 7.20391 24.6265 7.66397 24.994C8.12403 25.3615 8.69552 25.5614 9.28435 25.5609H15.5766C15.804 25.5609 16.022 25.4706 16.1827 25.3098C16.3435 25.1491 16.4338 24.931 16.4338 24.7037C16.4338 24.4764 16.3435 24.2584 16.1827 24.0976C16.022 23.9369 15.804 23.8466 15.5766 23.8466H9.28435C8.87292 23.8466 8.51807 23.5603 8.42378 23.154L5.7375 11.3974C5.70906 11.2683 5.70992 11.1345 5.74001 11.0058C5.7701 10.8771 5.82866 10.7567 5.91138 10.6536C5.99409 10.5505 6.09887 10.4672 6.218 10.41C6.33713 10.3527 6.46759 10.3228 6.59978 10.3226H8.78378V12.3309C8.78378 12.5582 8.87409 12.7762 9.03483 12.9369C9.19558 13.0977 9.4136 13.188 9.64092 13.188C9.86825 13.188 10.0863 13.0977 10.247 12.9369C10.4078 12.7762 10.4981 12.5582 10.4981 12.3309V10.3217H20.1101V12.3309C20.1101 12.5582 20.2004 12.7762 20.3611 12.9369C20.5219 13.0977 20.7399 13.188 20.9672 13.188C21.1945 13.188 21.4126 13.0977 21.5733 12.9369C21.734 12.7762 21.8244 12.5582 21.8244 12.3309V10.3217H24.0084C24.1412 10.3219 24.2723 10.3521 24.3919 10.4099C24.5115 10.4678 24.6166 10.5518 24.6992 10.6558C24.7819 10.7598 24.8401 10.8811 24.8695 11.0107C24.8989 11.1403 24.8987 11.2748 24.8689 11.4043L22.9146 19.956C22.8896 20.0657 22.8864 20.1794 22.9053 20.2903C22.9241 20.4013 22.9647 20.5075 23.0246 20.6028C23.0845 20.6981 23.1625 20.7807 23.2543 20.8458C23.3462 20.911 23.4499 20.9574 23.5596 20.9824C23.6694 21.0075 23.783 21.0107 23.894 20.9918C24.0049 20.9729 24.1111 20.9324 24.2064 20.8725C24.3017 20.8126 24.3843 20.7345 24.4495 20.6427C24.5146 20.5509 24.561 20.4472 24.5861 20.3374L26.5378 11.7917C26.6282 11.4129 26.6312 11.0184 26.5465 10.6382C26.4619 10.258 26.2918 9.90213 26.0492 9.59743C25.8066 9.28838 25.4969 9.03862 25.1434 8.86708C24.79 8.69555 24.4021 8.60676 24.0092 8.60743H21.7532C21.3075 5.44457 18.5886 3 15.3041 3C12.0195 3 9.3015 5.44371 8.85492 8.60743H6.59978C5.80007 8.60743 5.05692 8.96829 4.55978 9.59743C4.31745 9.90112 4.14732 10.2559 4.06223 10.635C3.97715 11.0141 3.97934 11.4076 4.06864 11.7857ZM15.3041 4.71429C16.4197 4.71598 17.5 5.10517 18.3604 5.8153C19.2208 6.52543 19.8077 7.5124 20.0209 8.60743H10.5872C10.8004 7.5124 11.3874 6.52543 12.2477 5.8153C13.1081 5.10517 14.1885 4.71598 15.3041 4.71429Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M20.9296 20.7959C20.7023 20.7959 20.4843 20.8862 20.3235 21.047C20.1628 21.2077 20.0725 21.4257 20.0725 21.653V23.0408H18.6848C18.4575 23.0408 18.2394 23.1311 18.0787 23.2918C17.9179 23.4526 17.8276 23.6706 17.8276 23.8979C17.8276 24.1252 17.9179 24.3432 18.0787 24.504C18.2394 24.6647 18.4575 24.755 18.6848 24.755H20.0734V26.1428C20.0734 26.3701 20.1637 26.5881 20.3244 26.7488C20.4851 26.9096 20.7032 26.9999 20.9305 26.9999C21.1578 26.9999 21.3758 26.9096 21.5366 26.7488C21.6973 26.5881 21.7876 26.3701 21.7876 26.1428V24.7542H23.1754C23.4027 24.7542 23.6207 24.6639 23.7814 24.5031C23.9422 24.3424 24.0325 24.1244 24.0325 23.897C24.0325 23.6697 23.9422 23.4517 23.7814 23.291C23.6207 23.1302 23.4027 23.0399 23.1754 23.0399H21.7868V21.653C21.7868 21.4257 21.6965 21.2077 21.5357 21.047C21.375 20.8862 21.157 20.7959 20.9296 20.7959Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                    </button>
                                @endif
                                @if($whatsappStore->id != "26")
                                    <button
                                        class="btn btn-primary d-flex justify-content-center align-items-center {{ $product->available_stock != 0 ? 'w-50' : 'w-100'}} fs-18 gap-3"
                                        data-id="{{ $product->id }}" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
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
                                        {{ __('messages.whatsapp_stores_templates.order_now') }}
                                    </button>
                                @endif
                                </div>
                                    <p class="fs-20 fw-6 text-gray-200 mb-3">
                                        {{ __('messages.whatsapp_stores_templates.description') }}</p>
                                    <p class="fw-5 fs-16">
                                        {!! $product->description !!}
                                    </p>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($whatsappStore->id == 223)
                <iframe style="width: 100%;height: 900px;" srcdoc="{{$product->html_code}}"></iframe>
            @endif
             @if($whatsappStore->id != 223)
                <div class="recommended-product-section px-4 position-relative">
                <div class="section-heading">
                    <h2> {{ __('messages.whatsapp_stores_templates.recommended_products') }}</h2>
                </div>
                <div class="product-slider">
                    @foreach ($whatsappStore->products as $product)
                        <div>

                            @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                            @else
                            <a href="{{ route('whatsapp.store.product.details', [$product->id]) }}"
                            @endif
                            
                            
                            
                                class="d-block h-100" style="color: #212529;">
                                <div class="product-card">
                                    <div class="product-img bg-yellow">
                                        <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                            class="w-100 h-100 object-fit-cover" loading="lazy" />
                                    </div>
                                    <div class="product-details">
                                        <h5 class="fs-22 fw-6 mb-0 product-name">{{ $product->name }}</h5>
                                        <p class="fs-18 fw-6 mb-0">
                                            {{ $product->currency->currency_icon }}{{ $product->selling_price }}
                                            @if ($product->net_price)
                                                <del class="fs-14 fw-5 text-gray-200">{{ $product->currency->currency_icon }}
                                                    {{ $product->net_price }}</del>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @include('whatsapp_stores.templates.order_modal')
        @include('whatsapp_stores.templates.cart_modal')
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
        
  @if($whatsappStore->id == 493)        
    <a id="whatsappGifNew" href="tel:+918487938602" style="position: fixed;right: 10px;bottom: 28px;">
        <img src="https://staging.vcardking.com/uploads/call_icon.png" style="height: 59px;width: 59px;">
    </a>     
 @else     
    <a id="whatsappGif" href="https://wa.me/917984847580" style="position: fixed;right: 10px;bottom: 28px;">
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
            ).innerHTML = `<img src="${selectedFlag}" class="flag" alt="flag"> ${selectedText}`;
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".product-slider").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            rtl: isRtl,
            arrows: false,
            prevArrow: '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M0 6.99998C0 6.74907 0.0960374 6.49819 0.287709 6.3069L6.32224 0.287199C6.70612 -0.0957328 7.3285 -0.0957328 7.71221 0.287199C8.09593 0.669975 8.09593 1.29071 7.71221 1.67367L2.37252 6.99998L7.71203 12.3263C8.09574 12.7092 8.09574 13.3299 7.71203 13.7127C7.32831 14.0958 6.70593 14.0958 6.32206 13.7127L0.287522 7.69306C0.09582 7.50167 0 7.25079 0 6.99998Z" fill="currentColor" /></svg></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M8 7.00002C8 7.25093 7.90396 7.50181 7.71229 7.6931L1.67776 13.7128C1.29388 14.0957 0.671503 14.0957 0.287787 13.7128C-0.095929 13.33 -0.095929 12.7093 0.287787 12.3263L5.62748 7.00002L0.287973 1.67369C-0.0957425 1.29076 -0.0957425 0.670084 0.287973 0.287339C0.67169 -0.0957785 1.29407 -0.0957785 1.67794 0.287339L7.71248 6.30694C7.90418 6.49833 8 6.74921 8 7.00002Z" fill="currentColor"/></svg></button>',
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

        let currency_icon = "{{$product->currency->currency_icon}}"
        let productId = $("#product_id").val();
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
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: false,
            arrows: false,
            focusOnSelect: true,
            vertical: true,
            responsive: [{
                    breakpoint: 1129,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    },
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        vertical: false,
                        dots: true,
                    },
                },
                {
                    breakpoint: 436,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        vertical: false,
                    },
                },
                {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        vertical: false,
                        dots: true,
                    },
                },
            ],
        });
        console.log($('.slider-for').length, $('.slider-nav').length);
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
