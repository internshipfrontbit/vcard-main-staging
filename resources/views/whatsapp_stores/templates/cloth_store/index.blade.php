<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/cloth_store.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/whatsappp_store/custom.css') }}" />
    
   
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
        
            

   .object-fit-cover {
        object-fit: contain;
    } 



    .badge-bottom-new {
        display: inline-block;
        padding: .35em .65em !important;
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
    
        .object-fit-banner {
        
            object-fit: fill;
        }
   @include('whatsapp_stores.templates.cloth_store.footer-commoncss')        
        
  </style>
    
    
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
                        <!--<div class="language-dropdown position-relative">-->
                        <!--    <button class="dropdown-btn position-relative" id="dropdownMenuButton"-->
                        <!--        data-bs-toggle="dropdown" aria-expanded="false">-->
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

                            <div
                                class="position-absolute product-count-badge count-product  badge rounded-pill bg-danger">

                            </div>

                        </button>
                    </div>
                </div>
            </nav>

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

    
    <div class="main-content mx-auto w-100 overflow-hidden d-flex flex-column justify-content-between {{ getLocalLanguage() == 'ar' ? 'rtl' : '' }}"
        @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
        <div>
        @if($whatsappStore->id == 1158)
           <div class="text-center" style="
                margin-top: 15px;
            ">
                <a href="https://www.instagram.com/aksharam_collection_surat/" target="_blank">
            <button style="padding: 10px 20px;
                background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
                color: white;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                cursor: pointer;
                font-size: 16px;">
                <i class="fa-brands fa-instagram"></i> Visit on Instagram
            </button>
            </a>
            </div>
        @endif
            <div class="category-section px-50 pt-30 position-relative">

                     <form action="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias]) }}" method="GET">
                   
                        <div class="search-input-container position-relative mb-4">
                            <input type="text" class="form-control" placeholder="Enter product name" name="search">
                            <button type="submit" style="position: absolute;top: 1px;right: 1px;background: #000000; color: #ffffff;padding: 6px 10px;border-radius: 4px;cursor: pointer;border: none !important;"><i class="fas fa-search" ></i></button>
                        </div>
                    </form> 

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-30">
                    <div class="section-heading mb-0">
                        <h2 class="title-size position-relative mb-0">
                            {{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                    </div>

                </div>
                @if ($whatsappStore->categories->count() > 0)
                    <div class="category-slider">
                        @foreach ($whatsappStore->categories as $category)

                           @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
                           @else
                            <a onclick="setCategory({{$category->id}})" href="javascript:void(0)"
                           @endif
                                style="color: #212529">
                                <div>
                                    <div class="category-box mx-auto">
                                        <div class="category-img h-100 w-100 mb-20 mx-auto">
                                            <img src="{{ $category->image_url ?? '' }}" alt="images"
                                                class="h-100 w-100 object-fit-cover" />
                                        </div>
                                        <p class="category-name-size fs-20 fw-5 text-center lh-sm mb-0 text-black">{{ $category->name }}
                                        </p>
                                        @if($whatsappStore->id == 530)
                                        <p class="category-name-size fs-20 fw-5 text-center lh-sm mb-0 text-black mt-2" style="
                                            color: #0e2c2a !important;
                                            font-size: 13px !important;
                                        ">Click Here</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
                
                @if ($whatsappStore->categories->count() == 0)
                    <div class="d-flex justify-content-center mb-5 mt-3">
                        <h3 class="fs-20 fw-6 mb-0">
                            {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                    </div>
                @endif
            </div>
            <div class="product-section px-50 pt-30 position-relative">
                <div class="section-heading">
                    <h2 class="title-size mb-0">{{ __('messages.whatsapp_stores_templates.choose_your_product') }}</h2>
                </div>
                <div class="mb-50 product-list-section">

                    <div class="row custom-row product-gap-row row-gap-4 ">

                        @foreach ($whatsappStore->products()->latest()->take(8)->get() as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-6 product-box-section bg-white">
                                <div class="h-100 flex-column justify-content-between d-flex">

                                @if (request()->getHost() === 'staging.vcardking.com') 
                                 <a href="{{ route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                @else
                                 <a href="{{ route('whatsapp.store.product.details', [$product->id]) }}"
                                @endif

                                        class="d-flex text-black flex-column justify-content-between product-card">
                                        <div class="product-img w-100 h-100 mb-10 mx-auto">
                                            <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                                class="w-100 h-100 object-fit-cover product-image" />
                                        </div>
                                        @if($whatsappStore->id == 530)
                                            <input value="{{$product->sizes}}" type="hidden" id="product_size_{{$product->id}}">
                                        @endif
                                        <div class="product-details h-100">
                                            <div class="d-flex flex-column h-100">
                                                <div>
                                                    <div class="d-flex gap-2  mb-10 ">
                                                        <h5 class="product-name-size fs-20 fw-6 mb-0 w-75 product-name">
                                                            {{ $product->name }}</h5>

                                                    </div>
                                                     @if($whatsappStore->id == 530)
                                                        <p class="fs-14 fw-5 mb-2 text-gray-200 lh-sm">{{$product->sizes}}</p>
                                                    @endif
                                                    <p class="fs-14 fw-5 mb-2 text-gray-200 lh-sm product-category">
                                                        {{ $product->category->name }}</p>
                                                       
                                                    @if($product->selling_price )    
                                                    <p class="fs-18 fw-7 lh-sm mb-10">
                                                        <span class="currency_icon">
                                                            {{ $product->currency->currency_icon }}</span>
                                                        <span
                                                            class="selling_price">{{ $product->selling_price }}</span>
                                                        @if ($product->net_price)
                                                            <del class="fs-14 fw-7 text-gray-200">{{ $product->currency->currency_icon }}
                                                                {{ $product->net_price }}</del>
                                                        @endif
                                                    </p>
                                                    @endif
                                                    <input type="hidden" value="{{ $product->available_stock }}"
                                                        class="available-stock">
                                                </div>

                                            </div>
                                        </div>
                                    </a>


                                    @if($whatsappStore->id == 1193)
                                    
                                    
                                    <div class="d-flex justify-content-center">
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
                                    <div class="d-flex d-flex-custom justify-content-center">
                                         @if($whatsappStore->id == 210)
                                                    <!--- Amaaxon Button -->
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

                                                @else
                                                
                                                    @if($whatsappStore->id == 236 || $whatsappStore->id == 77 || $whatsappStore->id == 1158 || $whatsappStore->id == 1323)
                                                        <button class="addToCartBtn" id="product-{{ $product->id }}" style="display: none;" data-id="{{ $product->id }}"></button>
                                                        
                                         <button
                                            class="@if ($product->available_stock == 0) disabled @endif btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 add-to-cart-min-w-142px "
                                            data-id="{{ $product->id }}" style="margin-right: 1px;" onclick="openSizeModel({{$product->id}},'{{$product->sizes}}',{!! $product->color ? str_replace('"', "'", json_encode(json_decode($product->color))) : '[]' !!})"
                                             style="@if($product->available_stock == 0) background-color: red !important; border-color: red !important; @endif">
                                                    @else
                                                    <button
                                            class="@if ($product->available_stock == 0) disabled @endif btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 addToCartBtn addToCartButton add-to-cart-min-w-142px "
                                            data-id="{{ $product->id }}" id="product-{{ $product->id }}"
                                             style="@if($product->available_stock == 0) background-color: red !important; border-color: red !important; @endif">
                                                    @endif
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 31 30" fill="none">
                                                <path
                                                    d="M10.8571 8.64281C10.8571 6.07855 12.9356 4 15.4999 4C18.0641 4 20.1427 6.07855 20.1427 8.64281C20.1427 8.83225 20.0674 9.01393 19.9335 9.14788C19.7995 9.28184 19.6178 9.35709 19.4284 9.35709C19.239 9.35709 19.0573 9.28184 18.9233 9.14788C18.7894 9.01393 18.7141 8.83225 18.7141 8.64281C18.7141 7.79034 18.3755 6.97278 17.7727 6.36999C17.1699 5.7672 16.3523 5.42856 15.4999 5.42856C14.6474 5.42856 13.8298 5.7672 13.227 6.36999C12.6243 6.97278 12.2856 7.79034 12.2856 8.64281C12.2856 8.83225 12.2104 9.01393 12.0764 9.14788C11.9425 9.28184 11.7608 9.35709 11.5713 9.35709C11.3819 9.35709 11.2002 9.28184 11.0663 9.14788C10.9323 9.01393 10.8571 8.83225 10.8571 8.64281ZM16.2141 15.0713C16.2141 14.8819 16.1389 14.7002 16.0049 14.5662C15.871 14.4323 15.6893 14.357 15.4999 14.357C15.3104 14.357 15.1287 14.4323 14.9948 14.5662C14.8608 14.7002 14.7856 14.8819 14.7856 15.0713V17.2142H12.6428C12.4533 17.2142 12.2716 17.2894 12.1377 17.4234C12.0037 17.5573 11.9285 17.739 11.9285 17.9284C11.9285 18.1179 12.0037 18.2996 12.1377 18.4335C12.2716 18.5675 12.4533 18.6427 12.6428 18.6427H14.7856V20.7855C14.7856 20.975 14.8608 21.1567 14.9948 21.2906C15.1287 21.4246 15.3104 21.4998 15.4999 21.4998C15.6893 21.4998 15.871 21.4246 16.0049 21.2906C16.1389 21.1567 16.2141 20.975 16.2141 20.7855V18.6427H18.357C18.5464 18.6427 18.7281 18.5675 18.8621 18.4335C18.996 18.2996 19.0713 18.1179 19.0713 17.9284C19.0713 17.739 18.996 17.5573 18.8621 17.4234C18.7281 17.2894 18.5464 17.2142 18.357 17.2142H16.2141V15.0713Z"
                                                    fill="currentColor" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.00281 12.6614C7.10921 11.9891 7.45206 11.3768 7.96967 10.9348C8.48728 10.4927 9.14566 10.2499 9.82635 10.25H21.173C21.8538 10.2498 22.5122 10.4926 23.0299 10.9346C23.5476 11.3767 23.8905 11.989 23.9969 12.6614L25.4644 21.947C25.7383 23.682 24.3962 25.2499 22.6405 25.2499H8.35922C6.60352 25.2499 5.2614 23.682 5.53568 21.947L7.00281 12.6614ZM9.82635 11.6786C9.48591 11.6784 9.15661 11.7998 8.89768 12.0208C8.63875 12.2419 8.46719 12.548 8.41386 12.8843L6.94638 22.1699C6.91421 22.3739 6.92667 22.5825 6.9829 22.7813C7.03913 22.9801 7.1378 23.1643 7.27209 23.3213C7.40638 23.4783 7.57312 23.6043 7.7608 23.6906C7.94848 23.7769 8.15264 23.8215 8.35922 23.8213H22.6405C22.8471 23.8214 23.0512 23.7768 23.2389 23.6905C23.4265 23.6041 23.5932 23.4781 23.7275 23.3212C23.8618 23.1642 23.9604 22.98 24.0167 22.7813C24.0729 22.5825 24.0855 22.3739 24.0534 22.1699L22.5859 12.8843C22.5325 12.548 22.3609 12.2417 22.1019 12.0207C21.8429 11.7997 21.5135 11.6784 21.173 11.6786H9.82635Z"
                                                    fill="currentColor" />
                                            </svg>
                                                    @if($product->available_stock > 0)
                                                         @if($whatsappStore->id == 939)
                                                            Inquiry Now
                                                         @else
                                                            {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                                         @endif 
                                                    @else
                                                        {{ __('messages.whatsapp_stores.out_of_stock') }}
                                                    @endif 
                                        </button>

                                    @if($whatsappStore->id != 692 && $whatsappStore->id != 939 && $whatsappStore->id != 584)      
                                        @if($whatsappStore->id == 236 || $whatsappStore->id == 77 || $whatsappStore->id == 1158 || $whatsappStore->id == 1323) 
                                        <button
                                            class="btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 add-to-cart-min-w-142px" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}',0,true,undefined,'{{$product->sizes}}',{!! $product->color ? str_replace('"', "'", json_encode(json_decode($product->color))) : '[]' !!})" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;"
                                            data-id="{{ $product->id }}">
                                        @else
                                            @if($whatsappStore->id == 332 || $whatsappStore->id == 651 || $whatsappStore->id == 721 || $whatsappStore->id == 41 || $whatsappStore->id == 664)
                                                <button
                                                    class="btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 add-to-cart-min-w-142px addToCartBtn" data-storebutton="true" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;"
                                                    data-id="{{ $product->id }}">
                                            @else
                                                <button
                                                    class="btn btn-primary d-flex gap-2 align-items-center fs-14 fw-6 add-to-cart-min-w-142px" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;"
                                                    data-id="{{ $product->id }}">        
                                            @endif
                                        
                                        @endif

                                         @if($whatsappStore->id == 1158)
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 31 30" fill="none">
                                                <path
                                                    d="M10.8571 8.64281C10.8571 6.07855 12.9356 4 15.4999 4C18.0641 4 20.1427 6.07855 20.1427 8.64281C20.1427 8.83225 20.0674 9.01393 19.9335 9.14788C19.7995 9.28184 19.6178 9.35709 19.4284 9.35709C19.239 9.35709 19.0573 9.28184 18.9233 9.14788C18.7894 9.01393 18.7141 8.83225 18.7141 8.64281C18.7141 7.79034 18.3755 6.97278 17.7727 6.36999C17.1699 5.7672 16.3523 5.42856 15.4999 5.42856C14.6474 5.42856 13.8298 5.7672 13.227 6.36999C12.6243 6.97278 12.2856 7.79034 12.2856 8.64281C12.2856 8.83225 12.2104 9.01393 12.0764 9.14788C11.9425 9.28184 11.7608 9.35709 11.5713 9.35709C11.3819 9.35709 11.2002 9.28184 11.0663 9.14788C10.9323 9.01393 10.8571 8.83225 10.8571 8.64281ZM16.2141 15.0713C16.2141 14.8819 16.1389 14.7002 16.0049 14.5662C15.871 14.4323 15.6893 14.357 15.4999 14.357C15.3104 14.357 15.1287 14.4323 14.9948 14.5662C14.8608 14.7002 14.7856 14.8819 14.7856 15.0713V17.2142H12.6428C12.4533 17.2142 12.2716 17.2894 12.1377 17.4234C12.0037 17.5573 11.9285 17.739 11.9285 17.9284C11.9285 18.1179 12.0037 18.2996 12.1377 18.4335C12.2716 18.5675 12.4533 18.6427 12.6428 18.6427H14.7856V20.7855C14.7856 20.975 14.8608 21.1567 14.9948 21.2906C15.1287 21.4246 15.3104 21.4998 15.4999 21.4998C15.6893 21.4998 15.871 21.4246 16.0049 21.2906C16.1389 21.1567 16.2141 20.975 16.2141 20.7855V18.6427H18.357C18.5464 18.6427 18.7281 18.5675 18.8621 18.4335C18.996 18.2996 19.0713 18.1179 19.0713 17.9284C19.0713 17.739 18.996 17.5573 18.8621 17.4234C18.7281 17.2894 18.5464 17.2142 18.357 17.2142H16.2141V15.0713Z"
                                                    fill="currentColor" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.00281 12.6614C7.10921 11.9891 7.45206 11.3768 7.96967 10.9348C8.48728 10.4927 9.14566 10.2499 9.82635 10.25H21.173C21.8538 10.2498 22.5122 10.4926 23.0299 10.9346C23.5476 11.3767 23.8905 11.989 23.9969 12.6614L25.4644 21.947C25.7383 23.682 24.3962 25.2499 22.6405 25.2499H8.35922C6.60352 25.2499 5.2614 23.682 5.53568 21.947L7.00281 12.6614ZM9.82635 11.6786C9.48591 11.6784 9.15661 11.7998 8.89768 12.0208C8.63875 12.2419 8.46719 12.548 8.41386 12.8843L6.94638 22.1699C6.91421 22.3739 6.92667 22.5825 6.9829 22.7813C7.03913 22.9801 7.1378 23.1643 7.27209 23.3213C7.40638 23.4783 7.57312 23.6043 7.7608 23.6906C7.94848 23.7769 8.15264 23.8215 8.35922 23.8213H22.6405C22.8471 23.8214 23.0512 23.7768 23.2389 23.6905C23.4265 23.6041 23.5932 23.4781 23.7275 23.3212C23.8618 23.1642 23.9604 22.98 24.0167 22.7813C24.0729 22.5825 24.0855 22.3739 24.0534 22.1699L22.5859 12.8843C22.5325 12.548 22.3609 12.2417 22.1019 12.0207C21.8429 11.7997 21.5135 11.6784 21.173 11.6786H9.82635Z"
                                                    fill="currentColor" />
                                            </svg>
                                          @else  
                                       
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
                                            @endif

                                                @if($whatsappStore->id == 530)
                                               
                                                Inquiry Now

                                                @else

                                                  {{ __('messages.whatsapp_stores_templates.order_now') }}

                                                @endif
                                            
                                        </button>
                                    @endif
                                @endif
                                       
                                    </div>

                                @endif

                                </div>
                            </div>
                        @endforeach
                        @if ($whatsappStore->products->count() == 0)
                            <div class="text-center mb-5 mt-3">
                                <h3 class="fs-20 fw-6 mb-0 text-break">
                                    {{ __('messages.whatsapp_stores_templates.product_not_found') }}</h3>
                            </div>
                        @endif
                    </div>

                </div>


                @if ($whatsappStore->products->count() > 0)
                    <div class="text-center">

                                @if (request()->getHost() === 'staging.vcardking.com') 
                                 <a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                                @else
                                 <a href="{{ route('whatsapp.store.products') }}"
                                @endif

                        
                            class="btn view-more-btn d-flex align-items-center justify-content-center mx-auto gap-20 fs-16 fw-medium">
                            <span class="text">{{ __('messages.whatsapp_stores_templates.view_more') }}</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 25 25" fill="none">
                                    <g clip-path="url(#clip0_410_200)">
                                        <path
                                            d="M0.976545 11.5234H21.6581L18.2321 8.11406C17.8498 7.73359 17.8484 7.11528 18.2288 6.733C18.6093 6.35068 19.2277 6.34926 19.6099 6.72968L24.7127 11.8078L24.7136 11.8087C25.0949 12.1892 25.0961 12.8095 24.7137 13.1913L24.7128 13.1922L19.61 18.2703C19.2278 18.6507 18.6095 18.6494 18.2289 18.267C17.8485 17.8847 17.8499 17.2664 18.2322 16.8859L21.6581 13.4766H0.976545C0.437189 13.4766 -1.71661e-05 13.0394 -1.71661e-05 12.5C-1.71661e-05 11.9606 0.437189 11.5234 0.976545 11.5234Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clippath id="clip0_410_200">
                                            <rect width="25" height="25" fill="currentColor"
                                                transform="matrix(-1 0 0 1 25 0)" />
                                        </clippath>
                                    </defs>
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif
                
                
                <div class="section-heading text-center mt-5">
                    <div class="collection-title">
                        <!--<img src="./public/images/left.png">-->
                        <h2 class="title-size crimson-pro-medium">Our Trending Videos</h2>
                        <!--<img src="./public/images/right.png">-->
                    </div>
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
        </div>
        <div>
            @if (isset($enable_pwa) && $enable_pwa == 1 && !isiOSDevice())
                <div class="mt-0">
                    <div class="pwa-support d-flex align-items-center justify-content-center">
                        <div>
                            <h1 class="text-start pwa-heading">{{ __('messages.pwa.add_to_home_screen') }}</h1>
                            <p class="text-start pwa-text text-dark fs-16 fw-5">
                                {{ __('messages.pwa.pwa_description') }} </p>
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
            @include('whatsapp_stores.templates.cloth_store.cart_modal')
            @include('whatsapp_stores.templates.cloth_store.size_modal')

            @include('whatsapp_stores.templates.order_modal')
        </div>
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
                                class="position-absolute product-count-badge count-product badge-bottom-new rounded-pill bg-danger">

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
</body>
<script>
    function addToCartClickButton(){
        $("#addToCartViewBtn").click();
    }
</script>
<script>
    let vcardAlias = "{{ $whatsappStore->url_alias }}";
    let languageChange = "{{ url('language') }}";
    let lang = "{{ getLocalLanguage() ?? 'en' }}";
    let isRtl = "{{ getLocalLanguage() == 'ar' ? 'true' : 'false' }}" === "true";
</script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ asset('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ mix('assets/js/whatsapp_store_template.js') }}?v={{ time() }}"></script>
<script>
    $(document).ready(function() {
        $(".category-slider").slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            // autoplay: true,
            rtl: isRtl,
            arrows: true,
            prevArrow: '<button class="slide-arrow category-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M2.61048 5.99881L2.52357 5.91829L2.61048 6.01208L6.74799 10.4776C6.74801 10.4776 6.74802 10.4777 6.74804 10.4777C6.89859 10.6459 6.98199 10.8714 6.98011 11.1056C6.97822 11.3398 6.89118 11.5637 6.73792 11.7291C6.58468 11.8945 6.37755 11.9882 6.16119 11.9902C5.94487 11.9922 5.7363 11.9025 5.58044 11.7401C5.58042 11.74 5.58039 11.74 5.58037 11.74L0.851898 6.63663C0.696935 6.46933 0.609765 6.24231 0.609765 6.00545C0.609765 5.76859 0.696935 5.54156 0.851899 5.37426L5.58049 0.270777C5.73548 0.103552 5.94549 0.00976553 6.1643 0.00976555C6.3831 0.00976557 6.59311 0.103552 6.7481 0.270777L6.7481 0.270775C6.90306 0.438075 6.99023 0.665102 6.99023 0.901961C6.99023 1.13882 6.90306 1.36585 6.7481 1.53315L2.61048 5.99881Z" stroke="#141414" stroke-width="0.0195312"/></svg></button>',
            nextArrow: '<button class="slide-arrow category-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none"><path d="M4.38952 6.00119L4.47643 6.08171L4.38952 5.98792L0.252014 1.52238C0.251996 1.52236 0.251977 1.52234 0.251959 1.52232C0.101415 1.35406 0.0180061 1.12857 0.0198916 0.894392C0.0217773 0.660185 0.108825 0.43628 0.262083 0.270871C0.415319 0.105486 0.622448 0.0118285 0.838806 0.0098001C1.05513 0.00776977 1.2637 0.097502 1.41956 0.259938C1.41958 0.25996 1.41961 0.259983 1.41963 0.260006L6.1481 5.36337C6.30307 5.53067 6.39024 5.75769 6.39024 5.99455C6.39024 6.23141 6.30307 6.45844 6.1481 6.62574L1.41951 11.7292C1.26452 11.8964 1.05451 11.9902 0.835705 11.9902C0.616899 11.9902 0.406885 11.8964 0.251898 11.7292L0.2519 11.7292C0.0969359 11.5619 0.00976574 11.3349 0.00976578 11.098C0.00976582 10.8612 0.096936 10.6342 0.2519 10.4669L4.38952 6.00119Z" stroke="#2650D7" stroke-width="0.0195312"/></svg></button>',
            responsive: [
                {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    arrows:false,
                    slidesToShow: 3,
                    dots: true,
                },
            },
            {
                breakpoint: 460,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    arrows:false,
                },
            }, {
                breakpoint: 360,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    arrows:false,
                },
            }, ],
        });
    });
</script>
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
</html>
