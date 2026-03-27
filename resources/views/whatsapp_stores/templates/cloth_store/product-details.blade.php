<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} | {{ $whatsappStore->store_name }}</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ $whatsappStore->logo_url }}" type="image/png">
    @if(!empty($product->images_url) && count($product->images_url) > 0)
        <meta property="og:image" content="{{ asset($product->images_url[0]) }}" />
        <meta name="twitter:image" content="{{ asset($product->images_url[0]) }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/cloth_store.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
    

    
    @if ( $whatsappStore->google_analytics)
        {!! $whatsappStore->google_analytics !!}
    @endif    

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
        
        /*.thumbnail-img {*/
        /*    border: 1px solid #000;*/
        /*    box-shadow: 0 2px 20px #00000040;*/
            position: relative; /* ensure parent is positioned */
        /*    width: 100px;*/
        /*    height: 100px;*/
        /*}*/
        
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
                    <!--<div class="language-dropdown position-relative">-->
                    <!--    <button class="dropdown-btn position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown"-->
                    <!--        aria-expanded="false">-->
                    <!--        @if (array_key_exists(getLocalLanguage() ?? 'en', \App\Models\User::FLAG))-->
                    <!--            <img class="flag" alt="flag"-->
                    <!--                src="{{ asset(\App\Models\User::FLAG[getLocalLanguage() ?? 'en']) }}" />-->
                    <!--        @endif-->
                    <!--        {{ strtoupper(getLocalLanguage() ?? 'EN') }}-->
                    <!--    </button>-->
                    <!--    <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8"-->
                    <!--        viewBox="0 0 18 10" fill="none">-->
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
                    <!--                            src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }}" />-->
                    <!--                    @else-->
                    <!--                        @if (count($language->media) != 0)-->
                    <!--                            <img src="{{ $language->image_url }}" class="me-1" />-->
                    <!--                        @else-->
                    <!--                            <i class="fa fa-flag fa-xl me-3 text-danger" aria-hidden="true"></i>-->
                    <!--                        @endif-->
                    <!--                    @endif-->
                    <!--                    {{ strtoupper($language->iso_code) }}-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--        @endforeach-->
                    <!--    </ul>-->
                    <!--</div>-->

                    <button class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
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
                        <div class="position-absolute product-count-badge count-product  badge rounded-pill bg-danger">

                        </div>
                    </button>
                </div>
            </div>
        </nav>
<div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between"
    @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
    <div>
        
        <div class="item-details-section px-50 mb-30 position-relative">
            <div class="item-details-card">
                <div class="row">
                    
                    
                        <div class="col-xl-5 col-lg-6 mb-lg-0 mb-40">
                            
                        <!-- Main Display Section -->
                        <div id="mainDisplay" class="mb-20" style="position: relative;">
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
                    
                    
                    
                    
                    
                    
                        <!--<div class="col-xl-5 col-lg-6 mb-lg-0 mb-40">-->
                        <!--    <div class="slider-for mb-20">-->
                        <!--        @foreach ($product->images_url as $image)-->
                        <!--            <div>-->
                        <!--                <div class="details-img">-->
                        <!--                    <img src="{{ $image }}" alt="items"-->
                        <!--                        class="w-100 h-100 object-fit-cover rounded" loading="lazy" />-->
                        <!--                       @if (count($product->images_url) > 1)-->
                        <!--                            <button-->
                        <!--                                class="btn btn-primary d-flex justify-content-center align-items-center download-icon-btn"-->
                        <!--                                onclick="generatePdf('{{ $product->name }}', '{{ json_encode($product->images_url) }}')"-->
                        <!--                                style="position: absolute; top: 20px; right: 20px;">-->
                        <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"-->
                        <!--                                    viewBox="0 0 24 25" fill="none">-->
                        <!--                                    <path d="M12 5V15M5 12L12 19L19 12"-->
                        <!--                                        stroke="currentColor" stroke-width="2"-->
                        <!--                                        stroke-linecap="round" stroke-linejoin="round" />-->
                        <!--                                </svg>-->
                        <!--                            </button>-->
                        <!--                        @endif-->
                        <!--                        </div>-->
                        <!--            </div>-->
                        <!--                @endforeach-->
                        <!--            </div>-->
                                
                                    <!-- Thumbnail Slider (Optional) -->
                                    <!--<div class="slider-nav mt-3">-->
                                    <!--    @foreach ($product->images_url as $image)-->
                                    <!--        <div>-->
                                    <!--            <div class="thumbnail-img">-->
                                    <!--                <img src="{{ $image }}" alt="items" class="w-100 h-100 object-fit-cover rounded image-thumbnail" loading="lazy" data-image="{{ $image }}" />-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--</div>-->
                                    
                                    
                                    
                        <!--</div>-->
                        @if($whatsappStore->id == 77)
                    <div class="col-xl-7 col-lg-6" style="background: #f4f4f4;padding-top: 12px;padding-bottom: 13px;">
                        @else
                    <div class="col-xl-7 col-lg-6">    
                        @endif
                        <div class="details d-flex flex-column justify-content-between h-100">
                            <div>
                                <h4 class="fs-28 product-name">{{ $product->name }}</h4>
                                <input type="hidden" value="{{ $product->available_stock }}"
                                        class="available-stock">
                                <input type="hidden" value="{{ $product->category->name }}"
                                class="product-category">
                                <input value="{{$product->sizes}}" type="hidden" id="product_size_{{$product->id}}">
                                
                            <input type="hidden" value="{{ $product->images_url[0] }}"
                                class="product-image">
                                <p class="fs-28 fw-5 mb-30">
                                    <span class="currency_icon">{{ $product->currency->currency_icon }}</span>
                                    <span class="selling_price"> {{ $product->selling_price }}</span> <del
                                        class="fs-18 fw-6 text-gray-200">{{ $product->currency->currency_icon }}
                                        {{ $product->net_price }}</del>
                                    @if ($product->available_stock == 0)
                                        <span
                                            class="badge badge-danger bg-danger text-sm out-of-stock-text mt-0 ms-2">{{ __('messages.whatsapp_stores.out_of_stock') }}</span>
                                    @endif
                                </p>
                                
                                @if($whatsappStore->id == 236 || $whatsappStore->id == 364 || $whatsappStore->id == 77 || $whatsappStore->id == 1323 || $whatsappStore->id == 1158)
                                    @if(!empty($product->sizes))
                                        @php
                                            $sizes = array_map('trim', explode(',', $product->sizes));
                                        @endphp
                                    
                                        <div class="form-group mb-4">
                                            <label class="fs-20 fw-6 text-gray-200 mb-3">Select Size:</label><br>
                                            @foreach($sizes as $size)
                                                    <div class="form-check form-check-inline">
                                                        <input 
                                                            class="form-check-input" 
                                                            type="radio" 
                                                            name="size" 
                                                            id="size_{{ $size }}" 
                                                            value="{{ $size }}" 
                                                            {{ $loop->first ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="size_{{ $size }}">{{ $size }}</label>
                                                    </div>
                                                @endforeach
                                        </div>
                                    @endif
                                @endif
                                
                                @if($whatsappStore->id == 208)
                                    @if(!empty($product->cartoon_qty))
                                        <label class="fs-20 fw-6 text-gray-200 mb-1">Cartoon Quantity:</label>
                                        <p class="fw-5 fs-16 mb-4">{{ $product->cartoon_qty }}</p>
                                    @endif
                                @endif
                                
                                @if($whatsappStore->id == 191 || $whatsappStore->id == 77 || $whatsappStore->id == 1158)
                                    @php
                                    // Decode the JSON string into an array
                                    $colors = json_decode($product->color, true);
                                    @endphp
                                    @if (!empty($colors) && is_array($colors))
                                        <style>
                                            .color-swatch {
                                                width: 30px;
                                                height: 30px;
                                                border-radius: 50%;
                                                display: inline-block;
                                                margin: 5px;
                                                border: 2px solid #c1c1c1fa;
                                                cursor: pointer;
                                                transition: border 0.2s ease;
                                            }
                                        
                                            .color-swatch.selected {
                                                border: 3px solid #000; /* black border on selection */
                                            }
                                        </style>
                                        <p class="fs-20 fw-6 text-gray-200 mb-0">
                                        {{ 'Colors' }}</p>
                                        <div id="color-options" style="margin-bottom: 17px;display: flex; flex-wrap: wrap;">
                                            @foreach ($colors as $index => $color)
                                                <div style="display: flex;flex-direction: row;align-items: center;margin-right: 3px;">
                                                    <div class="color-swatch  {{ $loop->first ? 'selected' : '' }}"
                                                        style="background-color: {{ $color['color_code'] }};"
                                                        data-color="{{ $color['color_name'] }}"
                                                        title="{{ $color['color_name'] }}"
                                                        onclick="selectColor(this)">
                                                    </div>
                                                    <span style="font-weight: 500;">{{ $color['color_name'] }}</span>
                                                </div>
                                                
                                            @endforeach
                                        </div>
                                        
                                        <!-- Hidden input if you want to store selected color -->
                                        <input type="hidden" id="selectedColor" name="selected_color" value="{{ $colors && $colors[0] ? $colors[0]['color_name'] : '' }}">
                                        
                                        <script>
                                            function selectColor(el) {
                                                // Remove previous selection
                                                document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
                                        
                                                // Add new selection
                                                el.classList.add('selected');
                                        
                                                // Store selected value
                                                document.getElementById('selectedColor').value = el.dataset.color;
                                            }
                                        </script>
                                    @endif
                                @endif
                                
                                <p class="fs-20 fw-6 text-gray-200 mb-3">
                                    {{ __('messages.whatsapp_stores_templates.description') }}</p>
                                <p class="fw-5 fs-16 mb-4">
                                    {!! $product->description !!}
                                </p>

                            </div>

 @if($whatsappStore->id == 1193)
                                    
                                    
                                      <div class="d-flex w-100">
                                          <button data-id="{{ $product->id }}"
                                                class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 addToCartBtn w-100 mb-1 @if($product->available_stock == 0) disabled @endif"
                                               style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">         
                                            
                                       
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
                                             Inquiry Now 
                                        </button>
                                       
                                    </div>
@endif

 @if($whatsappStore->id != 1193)                                    

                            @if($whatsappStore->id == 210)
                            <div class="d-flex w-100">
                                <a href="{{ $product->affiliate_url }}" target="_blank" style="background: #ffd814;border-radius: 10px;width: 100%;text-align: center;">
                                                    <div >
                                                        <svg class="cursor-pointer" width="260" height="44" viewBox="0 0 260 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="260" height="44" rx="10" fill="#FFD814"/>
                                                    <g clip-path="url(#clip0_625_22)">
                                                    <path d="M64.4558 24.3932C64.0685 24.3932 63.7275 24.3112 63.4329 24.147C63.1383 23.9776 62.9092 23.7447 62.7455 23.4482C62.5818 23.1464 62.5 22.7996 62.5 22.4078C62.5 21.9366 62.62 21.5237 62.8601 21.169C63.1056 20.8143 63.452 20.5416 63.8993 20.351C64.3522 20.1604 64.8813 20.0651 65.4869 20.0651C65.7651 20.0651 65.9915 20.0836 66.1661 20.1207V19.9539C66.1661 19.5516 66.0897 19.2524 65.937 19.0565C65.7842 18.8553 65.5524 18.7548 65.2414 18.7548C64.7395 18.7548 64.4176 19.0115 64.2758 19.5251C64.2321 19.6733 64.1421 19.7369 64.0057 19.7157L62.8928 19.5251C62.811 19.5092 62.7537 19.4748 62.7209 19.4218C62.6937 19.3689 62.6909 19.2974 62.7128 19.2074C62.8546 18.6674 63.1547 18.2491 63.6129 17.9527C64.0767 17.6509 64.6577 17.5 65.356 17.5C66.1852 17.5 66.8153 17.7171 67.2463 18.1512C67.6828 18.5853 67.901 19.218 67.901 20.0492V24.0438C67.901 24.102 67.8792 24.1523 67.8355 24.1947C67.7973 24.2317 67.7482 24.2502 67.6882 24.2502H66.6244C66.4935 24.2502 66.4116 24.1814 66.3789 24.0438L66.2152 23.2973H66.1498C66.0025 23.6467 65.7815 23.9167 65.4869 24.1073C65.1978 24.2979 64.8541 24.3932 64.4558 24.3932ZM64.284 22.2172C64.284 22.4979 64.3576 22.7229 64.5049 22.8923C64.6577 23.0564 64.8622 23.1385 65.1187 23.1385C65.4569 23.1385 65.716 22.9928 65.8961 22.7017C66.0761 22.4052 66.1661 21.9816 66.1661 21.4311V21.0101C66.0134 20.9837 65.8688 20.9704 65.7324 20.9704C65.2851 20.9704 64.9304 21.0842 64.6686 21.3119C64.4122 21.5343 64.284 21.8361 64.284 22.2172ZM68.9157 17.8494C68.9157 17.7912 68.9348 17.7435 68.973 17.7065C69.0166 17.6641 69.0685 17.6429 69.1285 17.6429H70.2087C70.2687 17.6429 70.3178 17.6615 70.3559 17.6985C70.3996 17.7356 70.4269 17.7859 70.4378 17.8494L70.6015 18.6277H70.6669C70.8143 18.2624 71.0243 17.9844 71.2971 17.7938C71.5753 17.5979 71.9026 17.5 72.279 17.5C72.6828 17.5 73.0292 17.6032 73.3183 17.8097C73.6129 18.0162 73.8393 18.31 73.9975 18.6912H74.063C74.3031 18.2889 74.5731 17.9897 74.8732 17.7938C75.1732 17.5979 75.5087 17.5 75.8797 17.5C76.2834 17.5 76.6326 17.6059 76.9272 17.8177C77.2272 18.0294 77.4564 18.3312 77.6146 18.723C77.7728 19.1148 77.8519 19.578 77.8519 20.1127V24.0438C77.8519 24.102 77.8301 24.1523 77.7864 24.1947C77.7482 24.2317 77.6991 24.2502 77.6391 24.2502H76.3298C76.2698 24.2502 76.2179 24.2317 76.1743 24.1947C76.1361 24.1523 76.117 24.102 76.117 24.0438V20.2398C76.117 19.8533 76.0407 19.5568 75.8879 19.3504C75.7351 19.1439 75.5142 19.0406 75.225 19.0406C74.9086 19.0406 74.6658 19.1624 74.4967 19.406C74.3331 19.6495 74.2512 20.0016 74.2512 20.4622V24.0438C74.2512 24.102 74.2294 24.1523 74.1857 24.1947C74.1476 24.2317 74.0985 24.2502 74.0385 24.2502H72.7291C72.6691 24.2502 72.6173 24.2317 72.5736 24.1947C72.5354 24.1523 72.5164 24.102 72.5164 24.0438V20.2398C72.5164 19.8533 72.44 19.5568 72.2872 19.3504C72.1345 19.1439 71.9135 19.0406 71.6244 19.0406C71.3079 19.0406 71.0652 19.1624 70.8961 19.406C70.7324 19.6495 70.6506 20.0016 70.6506 20.4622V24.0438C70.6506 24.102 70.6288 24.1523 70.5851 24.1947C70.5469 24.2317 70.4978 24.2502 70.4378 24.2502H69.1285C69.0685 24.2502 69.0166 24.2317 68.973 24.1947C68.9348 24.1523 68.9157 24.102 68.9157 24.0438V17.8494ZM78.7029 22.4078C78.7029 21.9366 78.823 21.5237 79.063 21.169C79.3085 20.8143 79.6549 20.5416 80.1023 20.351C80.5551 20.1604 81.0843 20.0651 81.6898 20.0651C81.9681 20.0651 82.1945 20.0836 82.3691 20.1207V19.9539C82.3691 19.5516 82.2927 19.2524 82.1399 19.0565C81.9872 18.8553 81.7553 18.7548 81.4444 18.7548C80.9425 18.7548 80.6206 19.0115 80.4787 19.5251C80.4351 19.6733 80.3451 19.7369 80.2087 19.7157L79.0957 19.5251C79.0139 19.5092 78.9566 19.4748 78.9239 19.4218C78.8966 19.3689 78.8939 19.2974 78.9157 19.2074C79.0575 18.6674 79.3576 18.2491 79.8159 17.9527C80.2796 17.6509 80.8606 17.5 81.5589 17.5C82.3882 17.5 83.0183 17.7171 83.4493 18.1512C83.8857 18.5853 84.1039 19.218 84.1039 20.0492V24.0438C84.1039 24.102 84.0821 24.1523 84.0385 24.1947C84.0003 24.2317 83.9512 24.2502 83.8912 24.2502H82.8273C82.6964 24.2502 82.6146 24.1814 82.5818 24.0438L82.4182 23.2973H82.3527C82.2054 23.6467 81.9845 23.9167 81.6898 24.1073C81.4007 24.2979 81.057 24.3932 80.6588 24.3932C80.2605 24.3932 79.9305 24.3112 79.6358 24.147C79.3412 23.9776 79.1121 23.7447 78.9485 23.4482C78.7848 23.1464 78.7029 22.7996 78.7029 22.4078ZM80.4869 22.2172C80.4869 22.4979 80.5606 22.7229 80.7078 22.8923C80.8606 23.0564 81.0652 23.1385 81.3216 23.1385C81.6598 23.1385 81.919 22.9928 82.099 22.7017C82.279 22.4052 82.3691 21.9816 82.3691 21.4311V21.0101C82.2163 20.9837 82.0717 20.9704 81.9353 20.9704C81.488 20.9704 81.1334 21.0842 80.8715 21.3119C80.6151 21.5343 80.4869 21.8361 80.4869 22.2172ZM84.9877 23.0829C84.9877 22.9664 85.0205 22.8658 85.0859 22.7811L87.8846 18.9771H85.2659C85.2059 18.9771 85.1541 18.9586 85.1105 18.9215C85.0723 18.8792 85.0532 18.8289 85.0532 18.7706V17.8494C85.0532 17.7912 85.0723 17.7435 85.1105 17.7065C85.1541 17.6641 85.2059 17.6429 85.2659 17.6429H89.5704C89.6304 17.6429 89.6795 17.6641 89.7177 17.7065C89.7613 17.7435 89.7831 17.7912 89.7831 17.8494V18.8103C89.7831 18.9268 89.7504 19.0274 89.6849 19.1121L87.1481 22.4952C87.3009 22.4687 87.4564 22.4555 87.6146 22.4555C88.0074 22.4555 88.3674 22.4899 88.6948 22.5587C89.0275 22.6223 89.3712 22.7281 89.7258 22.8764C89.8513 22.9293 89.9141 23.0193 89.9141 23.1464V24.0597C89.9141 24.1444 89.8868 24.2026 89.8323 24.2344C89.7777 24.2608 89.7095 24.2582 89.6276 24.2265C89.2185 24.0782 88.8557 23.975 88.5393 23.9167C88.2283 23.8532 87.8873 23.8214 87.5164 23.8214C87.1454 23.8214 86.7908 23.8532 86.4362 23.9167C86.087 23.9803 85.6997 24.0835 85.2742 24.2265C85.1923 24.2529 85.1241 24.2529 85.0695 24.2265C85.015 24.1947 84.9877 24.1391 84.9877 24.0597V23.0829ZM90.2742 20.9466C90.2742 20.3007 90.4024 19.7157 90.6588 19.1915C90.9152 18.6621 91.267 18.2491 91.7144 17.9527C92.1672 17.6509 92.6691 17.5 93.2201 17.5C93.7711 17.5 94.2785 17.6509 94.7258 17.9527C95.1787 18.2491 95.5333 18.6621 95.7897 19.1915C96.0515 19.7157 96.1825 20.3007 96.1825 20.9466C96.1825 21.5925 96.0515 22.1802 95.7897 22.7096C95.5333 23.2338 95.1787 23.6467 94.7258 23.9485C94.2785 24.245 93.7766 24.3932 93.2201 24.3932C92.6636 24.3932 92.1672 24.245 91.7144 23.9485C91.267 23.6467 90.9152 23.2338 90.6588 22.7096C90.4024 22.1802 90.2742 21.5925 90.2742 20.9466ZM92.0745 20.9466C92.0745 21.619 92.1727 22.1378 92.3691 22.5031C92.5655 22.8632 92.8491 23.0432 93.2201 23.0432C93.5911 23.0432 93.8775 22.8632 94.0794 22.5031C94.2812 22.1378 94.3822 21.619 94.3822 20.9466C94.3822 20.2742 94.2812 19.758 94.0794 19.398C93.8775 19.0327 93.5911 18.8501 93.2201 18.8501C92.8491 18.8501 92.5655 19.0327 92.3691 19.398C92.1727 19.758 92.0745 20.2742 92.0745 20.9466ZM97.0663 17.8494C97.0663 17.7912 97.0854 17.7435 97.1236 17.7065C97.1672 17.6641 97.219 17.6429 97.279 17.6429H98.3592C98.4192 17.6429 98.4684 17.6615 98.5066 17.6985C98.5502 17.7356 98.5775 17.7859 98.5884 17.8494L98.7521 18.6277H98.8175C98.9648 18.2677 99.1803 17.9897 99.464 17.7938C99.7531 17.5979 100.091 17.5 100.479 17.5C100.893 17.5 101.251 17.6059 101.551 17.8177C101.856 18.0294 102.091 18.3312 102.255 18.723C102.418 19.1148 102.5 19.578 102.5 20.1127V24.0438C102.5 24.102 102.478 24.1523 102.435 24.1947C102.396 24.2317 102.347 24.2502 102.287 24.2502H100.978C100.918 24.2502 100.866 24.2317 100.822 24.1947C100.784 24.1523 100.765 24.102 100.765 24.0438V20.2398C100.765 19.8533 100.683 19.5568 100.52 19.3504C100.356 19.1439 100.124 19.0406 99.8241 19.0406C99.4913 19.0406 99.2376 19.1624 99.063 19.406C98.8884 19.6495 98.8011 20.0016 98.8011 20.4622V24.0438C98.8011 24.102 98.7793 24.1523 98.7357 24.1947C98.6975 24.2317 98.6484 24.2502 98.5884 24.2502H97.279C97.219 24.2502 97.1672 24.2317 97.1236 24.1947C97.0854 24.1523 97.0663 24.102 97.0663 24.0438V17.8494Z" fill="#171D27"/>
                                                    <path d="M67.0501 25.1634C66.9465 25.2428 66.9247 25.3751 66.9847 25.5605C67.0392 25.7246 67.1674 25.9284 67.3693 26.1719C68.1821 27.1461 69.1505 27.9561 70.2743 28.6021C71.3982 29.248 72.6012 29.7244 73.8832 30.0315C75.1707 30.3439 76.4855 30.5001 77.8275 30.5001C79.546 30.5001 81.1827 30.2565 82.7375 29.7694C84.2923 29.2876 85.5908 28.61 86.6328 27.7364C86.9983 27.4241 87.1811 27.1752 87.1811 26.9899C87.1811 26.9211 87.1511 26.8523 87.0911 26.7834C87.0092 26.7041 86.911 26.6776 86.7964 26.7041C86.6819 26.7305 86.521 26.7967 86.3136 26.9026C85.3153 27.4108 84.0987 27.8158 82.6639 28.1176C81.2345 28.4247 79.7424 28.5782 78.1876 28.5782C76.2618 28.5782 74.4015 28.3241 72.6066 27.8158C70.8117 27.3076 69.2214 26.5134 67.8357 25.4334C67.6339 25.2799 67.4702 25.1819 67.3447 25.1395C67.2247 25.0972 67.1265 25.1051 67.0501 25.1634Z" fill="#FF6201"/>
                                                    <path d="M85.2331 25.5609C85.1185 25.6668 85.0885 25.778 85.1431 25.8945C85.1813 25.9792 85.255 26.0268 85.3641 26.0374C85.4732 26.0533 85.6286 26.0427 85.8305 26.0056C86.1578 25.9368 86.4988 25.8891 86.8534 25.8627C87.208 25.8415 87.5163 25.8468 87.7781 25.8785C88.04 25.9156 88.2037 25.9792 88.2692 26.0692C88.3674 26.2121 88.3319 26.5139 88.1627 26.9745C87.9991 27.4351 87.7754 27.8825 87.4917 28.3166C87.3826 28.4913 87.3172 28.629 87.2953 28.7296C87.2735 28.8302 87.3008 28.9149 87.3772 28.9837C87.4262 29.0313 87.4808 29.0552 87.5408 29.0552C87.6991 29.0552 87.9282 28.9201 88.2282 28.6502C88.7683 28.1948 89.1475 27.6548 89.3657 27.0301C89.4857 26.7071 89.5594 26.3683 89.5866 26.0136C89.6139 25.6589 89.573 25.4047 89.4639 25.2512C89.3602 25.1029 89.1311 24.9812 88.7765 24.8859C88.4274 24.7906 88.0755 24.7429 87.7208 24.7429C87.028 24.7429 86.3706 24.9018 85.7487 25.2194C85.5196 25.3412 85.3477 25.455 85.2331 25.5609Z" fill="#FF6201"/>
                                                    </g>
                                                    <path d="M119.82 16.544C120.876 16.544 121.831 16.7893 122.684 17.28C123.548 17.7707 124.225 18.4587 124.716 19.344C125.217 20.2187 125.468 21.2107 125.468 22.32C125.468 23.4293 125.217 24.4267 124.716 25.312C124.225 26.1973 123.548 26.8853 122.684 27.376C121.831 27.8667 120.876 28.112 119.82 28.112C118.764 28.112 117.804 27.8667 116.94 27.376C116.087 26.8853 115.409 26.1973 114.908 25.312C114.417 24.4267 114.172 23.4293 114.172 22.32C114.172 21.2107 114.417 20.2187 114.908 19.344C115.409 18.4587 116.087 17.7707 116.94 17.28C117.804 16.7893 118.764 16.544 119.82 16.544ZM119.82 18.624C119.159 18.624 118.577 18.7733 118.076 19.072C117.575 19.3707 117.18 19.8027 116.892 20.368C116.615 20.9227 116.476 21.5733 116.476 22.32C116.476 23.0667 116.615 23.7227 116.892 24.288C117.18 24.8427 117.575 25.2693 118.076 25.568C118.577 25.8667 119.159 26.016 119.82 26.016C120.481 26.016 121.063 25.8667 121.564 25.568C122.065 25.2693 122.455 24.8427 122.732 24.288C123.02 23.7227 123.164 23.0667 123.164 22.32C123.164 21.5733 123.02 20.9227 122.732 20.368C122.455 19.8027 122.065 19.3707 121.564 19.072C121.063 18.7733 120.481 18.624 119.82 18.624ZM129.101 20.832C129.431 20.2667 129.869 19.824 130.413 19.504C130.957 19.1733 131.565 19.008 132.237 19.008V21.424H131.581C129.927 21.424 129.101 22.192 129.101 23.728V28H126.845V19.136H129.101V20.832ZM136.637 19.024C137.384 19.024 138.019 19.2 138.541 19.552C139.075 19.904 139.459 20.3787 139.693 20.976V16.16H141.933V28H139.693V26.144C139.459 26.7413 139.075 27.2213 138.541 27.584C138.019 27.936 137.384 28.112 136.637 28.112C135.891 28.112 135.219 27.9307 134.621 27.568C134.024 27.2053 133.555 26.6827 133.213 26C132.883 25.3067 132.717 24.496 132.717 23.568C132.717 22.64 132.883 21.8347 133.213 21.152C133.555 20.4587 134.024 19.9307 134.621 19.568C135.219 19.2053 135.891 19.024 136.637 19.024ZM137.341 20.992C136.637 20.992 136.072 21.2213 135.645 21.68C135.219 22.1387 135.005 22.768 135.005 23.568C135.005 24.368 135.219 24.9973 135.645 25.456C136.072 25.904 136.637 26.128 137.341 26.128C138.024 26.128 138.584 25.8987 139.021 25.44C139.469 24.9707 139.693 24.3467 139.693 23.568C139.693 22.7787 139.469 22.1547 139.021 21.696C138.584 21.2267 138.024 20.992 137.341 20.992ZM151.994 23.232C151.994 23.456 151.967 23.712 151.914 24H145.418C145.45 24.7893 145.663 25.3707 146.058 25.744C146.452 26.1173 146.943 26.304 147.53 26.304C148.052 26.304 148.484 26.176 148.826 25.92C149.178 25.664 149.402 25.3173 149.498 24.88H151.882C151.764 25.4987 151.514 26.0533 151.13 26.544C150.746 27.0347 150.25 27.4187 149.642 27.696C149.044 27.9733 148.378 28.112 147.642 28.112C146.778 28.112 146.01 27.9307 145.338 27.568C144.666 27.1947 144.143 26.6667 143.77 25.984C143.396 25.3013 143.21 24.496 143.21 23.568C143.21 22.64 143.396 21.8347 143.77 21.152C144.143 20.4587 144.666 19.9307 145.338 19.568C146.01 19.2053 146.778 19.024 147.642 19.024C148.516 19.024 149.279 19.2053 149.93 19.568C150.591 19.9307 151.098 20.432 151.45 21.072C151.812 21.7013 151.994 22.4213 151.994 23.232ZM149.722 23.008C149.754 22.2827 149.562 21.7333 149.146 21.36C148.74 20.9867 148.239 20.8 147.642 20.8C147.034 20.8 146.522 20.9867 146.106 21.36C145.69 21.7333 145.46 22.2827 145.418 23.008H149.722ZM155.531 20.832C155.862 20.2667 156.299 19.824 156.843 19.504C157.387 19.1733 157.995 19.008 158.667 19.008V21.424H158.011C156.358 21.424 155.531 22.192 155.531 23.728V28H153.275V19.136H155.531V20.832ZM172.328 28H170.072L165.016 20.32V28H162.76V16.704H165.016L170.072 24.448V16.704H172.328V28ZM178.146 19.024C179.01 19.024 179.783 19.2053 180.466 19.568C181.159 19.9307 181.703 20.4587 182.098 21.152C182.492 21.8347 182.69 22.64 182.69 23.568C182.69 24.496 182.492 25.3013 182.098 25.984C181.703 26.6667 181.159 27.1947 180.466 27.568C179.783 27.9307 179.01 28.112 178.146 28.112C177.282 28.112 176.503 27.9307 175.81 27.568C175.127 27.1947 174.588 26.6667 174.194 25.984C173.799 25.3013 173.602 24.496 173.602 23.568C173.602 22.64 173.799 21.8347 174.194 21.152C174.588 20.4587 175.127 19.9307 175.81 19.568C176.503 19.2053 177.282 19.024 178.146 19.024ZM178.146 20.976C177.516 20.976 176.983 21.2 176.546 21.648C176.108 22.0853 175.89 22.7253 175.89 23.568C175.89 24.4107 176.108 25.056 176.546 25.504C176.983 25.9413 177.516 26.16 178.146 26.16C178.775 26.16 179.308 25.9413 179.746 25.504C180.183 25.056 180.402 24.4107 180.402 23.568C180.402 22.7253 180.183 22.0853 179.746 21.648C179.308 21.2 178.775 20.976 178.146 20.976ZM196.652 19.136L194.268 28H191.772L189.868 21.552L187.916 28H185.42L183.052 19.136H185.308L186.748 25.984L188.716 19.136H191.1L193.084 25.984L194.54 19.136H196.652Z" fill="#171D27"/>
                                                    <defs>
                                                    <clipPath id="clip0_625_22">
                                                    <rect width="40" height="13" fill="white" transform="translate(62.5 17.5)"/>
                                                    </clipPath>
                                                    </defs>
                                                    </svg>
                                                    </div>
                                                    </a>
                            </div>
                            @else
                                @if ($product->available_stock != 0)
                            <div class="d-flex w-100">
                                <button
                                    class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 fw-5 rounded-pill addToCartBtn mx-2"
                                    data-id="{{ $product->id }}">
                                    <span>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M31.4875 25.4531L32.6527 19.1277C32.6781 18.9947 32.6706 18.8574 32.6307 18.728C32.5908 18.5985 32.5198 18.4808 32.424 18.3851C32.3281 18.2894 32.2102 18.2187 32.0807 18.1791C31.9512 18.1395 31.8139 18.1322 31.6809 18.1579C31.1281 18.2744 30.5648 18.3332 29.9999 18.3334C27.9216 18.3333 25.9184 17.5568 24.3831 16.1561C22.8478 14.7554 21.8912 12.8317 21.7009 10.7622C21.6834 10.5548 21.5887 10.3614 21.4357 10.2203C21.2826 10.0792 21.0823 10.0006 20.8741 10H9.1405L9.01987 9.45719C8.89649 8.90209 8.58751 8.40565 8.14395 8.04982C7.70039 7.694 7.14876 7.50005 6.58011 7.5H4.21081C3.79565 7.5 3.41097 7.78359 3.34425 8.19336C3.32398 8.31294 3.33004 8.43551 3.362 8.55251C3.39396 8.66952 3.45106 8.77814 3.52932 8.87081C3.60757 8.96348 3.7051 9.03796 3.81509 9.08907C3.92509 9.14018 4.04491 9.16667 4.1662 9.16672H6.57948C6.76931 9.16586 6.95368 9.23015 7.1018 9.34887C7.24992 9.46758 7.35282 9.63353 7.39331 9.81898L11.9122 30.1549C11.2522 30.362 10.6728 30.7689 10.2541 31.3196C9.83546 31.8702 9.59816 32.5372 9.57502 33.2286C9.55189 33.9199 9.74408 34.6013 10.125 35.1787C10.506 35.7561 11.0568 36.2009 11.7015 36.4516C12.3462 36.7023 13.0529 36.7465 13.7238 36.5782C14.3947 36.4099 14.9968 36.0374 15.4468 35.5121C15.8968 34.9867 16.1725 34.3346 16.2359 33.6458C16.2992 32.957 16.147 32.2655 15.8003 31.667H26.2828C25.9164 32.3022 25.7699 33.0407 25.8659 33.7678C25.962 34.4948 26.2953 35.1699 26.8141 35.6882C27.333 36.2065 28.0083 36.5392 28.7355 36.6345C29.4627 36.7299 30.201 36.5826 30.8359 36.2156C31.4708 35.8486 31.9669 35.2823 32.2472 34.6045C32.5275 33.9268 32.5763 33.1756 32.386 32.4673C32.1958 31.759 31.7772 31.1333 31.1951 30.6872C30.6129 30.2411 29.8999 29.9995 29.1665 30H13.5851L13.0296 27.5H29.029C29.6134 27.5 30.1794 27.2952 30.6285 26.9213C31.0777 26.5473 31.3816 26.0279 31.4875 25.4531ZM12.9165 34.5834C12.6693 34.5834 12.4276 34.51 12.2221 34.3727C12.0165 34.2353 11.8563 34.0401 11.7617 33.8117C11.6671 33.5833 11.6423 33.332 11.6905 33.0895C11.7388 32.847 11.8578 32.6243 12.0326 32.4495C12.2074 32.2747 12.4302 32.1556 12.6727 32.1074C12.9151 32.0591 13.1665 32.0839 13.3949 32.1785C13.6233 32.2731 13.8185 32.4333 13.9559 32.6389C14.0932 32.8445 14.1665 33.0861 14.1665 33.3334C14.1665 33.6649 14.0348 33.9828 13.8004 34.2172C13.566 34.4517 13.248 34.5834 12.9165 34.5834ZM30.4165 33.3334C30.4165 33.5806 30.3432 33.8223 30.2059 34.0278C30.0685 34.2334 29.8733 34.3936 29.6449 34.4882C29.4165 34.5828 29.1651 34.6076 28.9227 34.5593C28.6802 34.5111 28.4574 34.3921 28.2826 34.2172C28.1078 34.0424 27.9888 33.8197 27.9405 33.5772C27.8923 33.3347 27.9171 33.0834 28.0117 32.855C28.1063 32.6266 28.2665 32.4314 28.4721 32.294C28.6776 32.1567 28.9193 32.0834 29.1665 32.0834C29.498 32.0834 29.816 32.2151 30.0504 32.4495C30.2848 32.6839 30.4165 33.0018 30.4165 33.3334Z"
                                                fill="currentColor" />
                                            <path
                                                d="M29.9997 3.33301C28.6811 3.33301 27.3922 3.724 26.2959 4.45654C25.1995 5.18908 24.3451 6.23027 23.8405 7.44844C23.3359 8.6666 23.2039 10.007 23.4611 11.3002C23.7183 12.5934 24.3533 13.7813 25.2856 14.7137C26.218 15.646 27.4059 16.281 28.6991 16.5382C29.9923 16.7954 31.3327 16.6634 32.5509 16.1588C33.769 15.6542 34.8102 14.7998 35.5428 13.7034C36.2753 12.6071 36.6663 11.3182 36.6663 9.99965C36.6663 8.23155 35.9639 6.53588 34.7137 5.28564C33.4634 4.03541 31.7677 3.33303 29.9997 3.33301ZM32.9163 10.833H30.833V12.9164C30.8341 13.0265 30.8133 13.1357 30.7719 13.2377C30.7305 13.3398 30.6693 13.4326 30.5918 13.5109C30.5143 13.5891 30.4221 13.6512 30.3205 13.6936C30.2188 13.736 30.1098 13.7578 29.9997 13.7578C29.8896 13.7578 29.7805 13.736 29.6789 13.6936C29.5773 13.6512 29.4851 13.5891 29.4076 13.5109C29.3301 13.4326 29.2689 13.3398 29.2275 13.2377C29.1861 13.1357 29.1653 13.0265 29.1664 12.9164V10.833H27.083C26.9729 10.8341 26.8637 10.8133 26.7616 10.7719C26.6596 10.7305 26.5668 10.6693 26.4885 10.5918C26.4103 10.5143 26.3482 10.4221 26.3058 10.3205C26.2634 10.2188 26.2416 10.1098 26.2416 9.99969C26.2416 9.88957 26.2634 9.78054 26.3058 9.67891C26.3482 9.57728 26.4103 9.48505 26.4885 9.40757C26.5668 9.33008 26.6596 9.26887 26.7616 9.22747C26.8637 9.18607 26.9729 9.1653 27.083 9.16637H29.1664V7.08301C29.1653 6.9729 29.1861 6.86366 29.2275 6.76163C29.2689 6.65959 29.3301 6.56677 29.4076 6.48852C29.4851 6.41028 29.5773 6.34818 29.6789 6.30579C29.7805 6.2634 29.8896 6.24158 29.9997 6.24158C30.1098 6.24158 30.2188 6.2634 30.3205 6.30579C30.4221 6.34818 30.5143 6.41028 30.5918 6.48852C30.6693 6.56677 30.7305 6.65959 30.7719 6.76163C30.8133 6.86366 30.8341 6.9729 30.833 7.08301V9.16637H32.9164C33.136 9.16849 33.3459 9.25723 33.5004 9.41327C33.655 9.56932 33.7417 9.78007 33.7417 9.99969C33.7417 10.2193 33.655 10.4301 33.5004 10.5861C33.3459 10.7421 33.136 10.8309 32.9164 10.833H32.9163Z"
                                                fill="currentColor" />
                                        </svg>

                                    </span>
                                                         @if($whatsappStore->id == 939)
                                                            Inquiry Now
                                                         @else
                                                            {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                                         @endif                                    
                                    
                                </button>
                                 @if($whatsappStore->id != 692 && $whatsappStore->id != 939 && $whatsappStore->id != 584)                 
                                @if($whatsappStore->id == 236 || $whatsappStore->id == 77 || $whatsappStore->id == 1323 || $whatsappStore->id == 1158)
                                        <button
                                    class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 fw-5 rounded-pill" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')"
                                    data-id="{{ $product->id }}">
                                @else
                                    @if($whatsappStore->id == 332 || $whatsappStore->id == 651 ||$whatsappStore->id == 721 || $whatsappStore->id == 41 || $whatsappStore->id == 664 )
                                        <button
                                        class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 fw-5 rounded-pill addToCartBtn" data-storebutton="true" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366;"
                                        data-id="{{ $product->id }}">
                                    @else
                                        <button
                                        class="btn btn-primary d-flex justify-content-center align-items-center w-50 fs-18 gap-2 fw-5 rounded-pill" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')"
                                        data-id="{{ $product->id }}">
                                    @endif 
                                @endif
                                
                                    <span>
                                        @if($whatsappStore->id == 1158)
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M31.4875 25.4531L32.6527 19.1277C32.6781 18.9947 32.6706 18.8574 32.6307 18.728C32.5908 18.5985 32.5198 18.4808 32.424 18.3851C32.3281 18.2894 32.2102 18.2187 32.0807 18.1791C31.9512 18.1395 31.8139 18.1322 31.6809 18.1579C31.1281 18.2744 30.5648 18.3332 29.9999 18.3334C27.9216 18.3333 25.9184 17.5568 24.3831 16.1561C22.8478 14.7554 21.8912 12.8317 21.7009 10.7622C21.6834 10.5548 21.5887 10.3614 21.4357 10.2203C21.2826 10.0792 21.0823 10.0006 20.8741 10H9.1405L9.01987 9.45719C8.89649 8.90209 8.58751 8.40565 8.14395 8.04982C7.70039 7.694 7.14876 7.50005 6.58011 7.5H4.21081C3.79565 7.5 3.41097 7.78359 3.34425 8.19336C3.32398 8.31294 3.33004 8.43551 3.362 8.55251C3.39396 8.66952 3.45106 8.77814 3.52932 8.87081C3.60757 8.96348 3.7051 9.03796 3.81509 9.08907C3.92509 9.14018 4.04491 9.16667 4.1662 9.16672H6.57948C6.76931 9.16586 6.95368 9.23015 7.1018 9.34887C7.24992 9.46758 7.35282 9.63353 7.39331 9.81898L11.9122 30.1549C11.2522 30.362 10.6728 30.7689 10.2541 31.3196C9.83546 31.8702 9.59816 32.5372 9.57502 33.2286C9.55189 33.9199 9.74408 34.6013 10.125 35.1787C10.506 35.7561 11.0568 36.2009 11.7015 36.4516C12.3462 36.7023 13.0529 36.7465 13.7238 36.5782C14.3947 36.4099 14.9968 36.0374 15.4468 35.5121C15.8968 34.9867 16.1725 34.3346 16.2359 33.6458C16.2992 32.957 16.147 32.2655 15.8003 31.667H26.2828C25.9164 32.3022 25.7699 33.0407 25.8659 33.7678C25.962 34.4948 26.2953 35.1699 26.8141 35.6882C27.333 36.2065 28.0083 36.5392 28.7355 36.6345C29.4627 36.7299 30.201 36.5826 30.8359 36.2156C31.4708 35.8486 31.9669 35.2823 32.2472 34.6045C32.5275 33.9268 32.5763 33.1756 32.386 32.4673C32.1958 31.759 31.7772 31.1333 31.1951 30.6872C30.6129 30.2411 29.8999 29.9995 29.1665 30H13.5851L13.0296 27.5H29.029C29.6134 27.5 30.1794 27.2952 30.6285 26.9213C31.0777 26.5473 31.3816 26.0279 31.4875 25.4531ZM12.9165 34.5834C12.6693 34.5834 12.4276 34.51 12.2221 34.3727C12.0165 34.2353 11.8563 34.0401 11.7617 33.8117C11.6671 33.5833 11.6423 33.332 11.6905 33.0895C11.7388 32.847 11.8578 32.6243 12.0326 32.4495C12.2074 32.2747 12.4302 32.1556 12.6727 32.1074C12.9151 32.0591 13.1665 32.0839 13.3949 32.1785C13.6233 32.2731 13.8185 32.4333 13.9559 32.6389C14.0932 32.8445 14.1665 33.0861 14.1665 33.3334C14.1665 33.6649 14.0348 33.9828 13.8004 34.2172C13.566 34.4517 13.248 34.5834 12.9165 34.5834ZM30.4165 33.3334C30.4165 33.5806 30.3432 33.8223 30.2059 34.0278C30.0685 34.2334 29.8733 34.3936 29.6449 34.4882C29.4165 34.5828 29.1651 34.6076 28.9227 34.5593C28.6802 34.5111 28.4574 34.3921 28.2826 34.2172C28.1078 34.0424 27.9888 33.8197 27.9405 33.5772C27.8923 33.3347 27.9171 33.0834 28.0117 32.855C28.1063 32.6266 28.2665 32.4314 28.4721 32.294C28.6776 32.1567 28.9193 32.0834 29.1665 32.0834C29.498 32.0834 29.816 32.2151 30.0504 32.4495C30.2848 32.6839 30.4165 33.0018 30.4165 33.3334Z"
                                                fill="currentColor" />
                                            <path
                                                d="M29.9997 3.33301C28.6811 3.33301 27.3922 3.724 26.2959 4.45654C25.1995 5.18908 24.3451 6.23027 23.8405 7.44844C23.3359 8.6666 23.2039 10.007 23.4611 11.3002C23.7183 12.5934 24.3533 13.7813 25.2856 14.7137C26.218 15.646 27.4059 16.281 28.6991 16.5382C29.9923 16.7954 31.3327 16.6634 32.5509 16.1588C33.769 15.6542 34.8102 14.7998 35.5428 13.7034C36.2753 12.6071 36.6663 11.3182 36.6663 9.99965C36.6663 8.23155 35.9639 6.53588 34.7137 5.28564C33.4634 4.03541 31.7677 3.33303 29.9997 3.33301ZM32.9163 10.833H30.833V12.9164C30.8341 13.0265 30.8133 13.1357 30.7719 13.2377C30.7305 13.3398 30.6693 13.4326 30.5918 13.5109C30.5143 13.5891 30.4221 13.6512 30.3205 13.6936C30.2188 13.736 30.1098 13.7578 29.9997 13.7578C29.8896 13.7578 29.7805 13.736 29.6789 13.6936C29.5773 13.6512 29.4851 13.5891 29.4076 13.5109C29.3301 13.4326 29.2689 13.3398 29.2275 13.2377C29.1861 13.1357 29.1653 13.0265 29.1664 12.9164V10.833H27.083C26.9729 10.8341 26.8637 10.8133 26.7616 10.7719C26.6596 10.7305 26.5668 10.6693 26.4885 10.5918C26.4103 10.5143 26.3482 10.4221 26.3058 10.3205C26.2634 10.2188 26.2416 10.1098 26.2416 9.99969C26.2416 9.88957 26.2634 9.78054 26.3058 9.67891C26.3482 9.57728 26.4103 9.48505 26.4885 9.40757C26.5668 9.33008 26.6596 9.26887 26.7616 9.22747C26.8637 9.18607 26.9729 9.1653 27.083 9.16637H29.1664V7.08301C29.1653 6.9729 29.1861 6.86366 29.2275 6.76163C29.2689 6.65959 29.3301 6.56677 29.4076 6.48852C29.4851 6.41028 29.5773 6.34818 29.6789 6.30579C29.7805 6.2634 29.8896 6.24158 29.9997 6.24158C30.1098 6.24158 30.2188 6.2634 30.3205 6.30579C30.4221 6.34818 30.5143 6.41028 30.5918 6.48852C30.6693 6.56677 30.7305 6.65959 30.7719 6.76163C30.8133 6.86366 30.8341 6.9729 30.833 7.08301V9.16637H32.9164C33.136 9.16849 33.3459 9.25723 33.5004 9.41327C33.655 9.56932 33.7417 9.78007 33.7417 9.99969C33.7417 10.2193 33.655 10.4301 33.5004 10.5861C33.3459 10.7421 33.136 10.8309 32.9164 10.833H32.9163Z"
                                                fill="currentColor" />
                                        </svg>
                                        
                                        @else
                                            <svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;">
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
                                        @endif

                                    </span>
                                    @if($whatsappStore->id == 530)
                                               
                                                Inquiry Now

                                                @else
                                    {{ __('messages.whatsapp_stores_templates.order_now') }}

                                    @endif     
                                </button>
                            @endif     
                            </div>
                            @else
                                <button
                                    class="btn btn-primary d-flex justify-content-center align-items-center w-100 fs-18 gap-2 fw-5 rounded-pill"
                                    data-id="{{ $product->id }}" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')">
                                    <span>
                                        
                                        <svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;">
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
                                    @if($whatsappStore->id == 530)
                                               
                                                Inquiry Now

                                                @else
                                    {{ __('messages.whatsapp_stores_templates.order_now') }}
                                    @endif     
                                </button>
                            @endif
                            @endif
@endif                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recommended-product-section px-50 position-relative">
            <div class="section-heading">
                <h2>{{ __('messages.whatsapp_stores_templates.recommended_products') }}</h2>
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
                            <div class="product-card h-100 d-flex flex-column">
                                <div class="product-img w-100 h-100 mb-10 mx-auto">
                                    <img src="{{ $product->images_url[0] }}" alt="product"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="product-details h-100">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <h5 class="fs-20 fw-5 mb-2 product-name">{{ $product->name }}</h5>
                                            @if($product->selling_price )
                                            <p class="fs-16 fw-5 lh-sm mb-10 text-gray-200">
                                                {{ $product->currency->currency_icon }}
                                                {{ $product->selling_price }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('whatsapp_stores.templates.cloth_store.cart_modal')

    @include('whatsapp_stores.templates.order_modal')
    @include('whatsapp_stores.templates.cloth_store.size_modal')

</div>

 @include('whatsapp_stores.templates.footee-common-view')  
 @if($whatsappStore->id != 236)
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
    
@endif

 @if($whatsappStore->id != 236 && $whatsappStore->id != 692)
    <a id="whatsappGif" href="https://wa.me/917984847580" style="position: fixed;right: 10px;bottom: 28px; z-index: 100;">
        <img src="https://staging.vcardking.com/uploads/whatsapp.gif" style="height: 59px;width: 59px;">
    </a>
    @endif
    @if($whatsappStore->id == 236)
        <div style="position: fixed;right: 16px;bottom: 24px;">
        <button style="background-color: #27262e12;border: none;border-radius: 15px;height: 50px;min-width: 50px;width: 50px;"
                            class="add-to-cart-btn d-flex align-items-center justify-content-center position-relative"
                            onclick="addToCartClickButton()">
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
                                class="position-absolute product-count-badge count-product  badge rounded-pill bg-danger">

                            </div>

                        </button>
                        </div>
    @endif
    <a href="" id="whatsappUrlLink" style="visibility: hidden"></a>
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
<script type="text/javascript" src="{{ mix('assets/js/whatsapp_store_template.js') }}?v={{ time() }}"></script>
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
            rtl: isRtl,
            autoplay: true,
            arrows: false,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        dots: true,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
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
            console.log("mainImage*-*--**-*-", mainImage);
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
