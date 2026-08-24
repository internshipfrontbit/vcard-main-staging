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

    <script>
        if(window.location.href.includes("seller-zone-surat")){
            window.location.href = "https://sellerzones.com/"
        }
        if(window.location.href.includes("bhakti-insurance") && !window.location.href.includes("bhakti-insurance-gujarat")){
            window.location.href = "https://staging.vcardking.com/store/bhakti-insurance-gujarat"
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
   
  @if($whatsappStore->id == 348 || $whatsappStore->id == 1555)
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
                                <span class="fw-6 fs-18 whatsapp-stor-name"><a
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
                        <!--                            src="{{ asset(\App\Models\User::FLAG[$language->iso_code]) }}"-->
                        <!--                            loading="lazy" />-->
                        <!--                    @else-->
                        <!--                        @if (count($language->media) != 0)-->
                        <!--                            <img src="{{ $language->image_url }}" class="me-1"-->
                        <!--                                loading="lazy" />-->
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
                        @if($whatsappStore->id == 1488)
                            <a href="{{ route('whatsappstore.page.logout') }}">
                                <button class="btn btn-primary" type="button">Logout</button>
                            </a>
                        @endif

                    </div>
                </div>
            </nav>

              
            
             @if($whatsappStore->id != 423)
                        
                 

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
            @endif

    @include('whatsapp_stores.templates.marquee-text')      
               
            
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
    @if($whatsappStore->id == 423)       
 <img src="https://staging.vcardking.com/uploads/top_1.jpg" alt="Footer Banner - JK Filterwala" style="width: 100%; margin-top: 32px;">
    @endif       
    
            
            @if($whatsappStore->id == 1600) 

                @if(count(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id)) > 0)

                    <div class="section-heading text-left mt-5">
                        <div class="collection-title">
                            <!--<img src="./public/images/left.png">-->
                            <h2 class="crimson-pro-medium px-50">Satisfied Customer Review Video</h2>
                            <!--<img src="./public/images/right.png">-->
                        </div>
                    </div>

                    @endif

                    
            
            
                    <!-- Video Container -->
                    <div class="horizontal-videos" id="videoContainer">
                        @foreach (array_slice(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id), 0, 5) as $link)
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

                    @if($whatsappStore->id == 1600) 

                @if(count(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id)) > 0)

                    <div class="section-heading text-left mt-5">
                        <div class="collection-title">
                            <!--<img src="./public/images/left.png">-->
                            <h2 class="crimson-pro-medium px-50">JOYY CANDY Description Video</h2>
                            <!--<img src="./public/images/right.png">-->
                        </div>
                    </div>

                    @endif

                    
            
            
                    <!-- Video Container -->
                    <div class="horizontal-videos" id="videoContainerNew">
                        @foreach (array_slice(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id), 5, 10) as $link)
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
                    <div id="videoOverlayNew">
                        <div class="close-btn">&times;</div>
                        <iframe src="" frameborder="0" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>
                    </div> 

                @endif

                    <div style="margin-top: 12px;">
                        <img src="https://staging.vcardking.com/uploads/banner_1.jpeg" style="max-width: 100%">
                    </div>
    
                    <div class="webthree-button" style="
                                display: flex;
                                margin-top: 35px;
                                /* width: calc(100vh - 100px); */
                                justify-content: center;
                                gap: 14px;
                            ">

                            <a href="https://share.google/x5xC5gPsNwyElFdrQ" target="_blank" style="">
                                                                                <div style="
                                border-radius: 10px;
                            ">
                                                                                    <svg class="cursor-pointer" width="260" height="44" viewBox="0 0 260 44" fill="none" xmlns="http://www.w3.org/2000/svg" style="
                                background: #ffd814;
                                height: 48px;
                                border-radius: 10px;
                            ">
                                                    <rect width="260" height="44" rx="10" fill="#FFD814"></rect>
                                                    <g clip-path="url(#clip0_625_22)">
                                                    <path d="M64.4558 24.3932C64.0685 24.3932 63.7275 24.3112 63.4329 24.147C63.1383 23.9776 62.9092 23.7447 62.7455 23.4482C62.5818 23.1464 62.5 22.7996 62.5 22.4078C62.5 21.9366 62.62 21.5237 62.8601 21.169C63.1056 20.8143 63.452 20.5416 63.8993 20.351C64.3522 20.1604 64.8813 20.0651 65.4869 20.0651C65.7651 20.0651 65.9915 20.0836 66.1661 20.1207V19.9539C66.1661 19.5516 66.0897 19.2524 65.937 19.0565C65.7842 18.8553 65.5524 18.7548 65.2414 18.7548C64.7395 18.7548 64.4176 19.0115 64.2758 19.5251C64.2321 19.6733 64.1421 19.7369 64.0057 19.7157L62.8928 19.5251C62.811 19.5092 62.7537 19.4748 62.7209 19.4218C62.6937 19.3689 62.6909 19.2974 62.7128 19.2074C62.8546 18.6674 63.1547 18.2491 63.6129 17.9527C64.0767 17.6509 64.6577 17.5 65.356 17.5C66.1852 17.5 66.8153 17.7171 67.2463 18.1512C67.6828 18.5853 67.901 19.218 67.901 20.0492V24.0438C67.901 24.102 67.8792 24.1523 67.8355 24.1947C67.7973 24.2317 67.7482 24.2502 67.6882 24.2502H66.6244C66.4935 24.2502 66.4116 24.1814 66.3789 24.0438L66.2152 23.2973H66.1498C66.0025 23.6467 65.7815 23.9167 65.4869 24.1073C65.1978 24.2979 64.8541 24.3932 64.4558 24.3932ZM64.284 22.2172C64.284 22.4979 64.3576 22.7229 64.5049 22.8923C64.6577 23.0564 64.8622 23.1385 65.1187 23.1385C65.4569 23.1385 65.716 22.9928 65.8961 22.7017C66.0761 22.4052 66.1661 21.9816 66.1661 21.4311V21.0101C66.0134 20.9837 65.8688 20.9704 65.7324 20.9704C65.2851 20.9704 64.9304 21.0842 64.6686 21.3119C64.4122 21.5343 64.284 21.8361 64.284 22.2172ZM68.9157 17.8494C68.9157 17.7912 68.9348 17.7435 68.973 17.7065C69.0166 17.6641 69.0685 17.6429 69.1285 17.6429H70.2087C70.2687 17.6429 70.3178 17.6615 70.3559 17.6985C70.3996 17.7356 70.4269 17.7859 70.4378 17.8494L70.6015 18.6277H70.6669C70.8143 18.2624 71.0243 17.9844 71.2971 17.7938C71.5753 17.5979 71.9026 17.5 72.279 17.5C72.6828 17.5 73.0292 17.6032 73.3183 17.8097C73.6129 18.0162 73.8393 18.31 73.9975 18.6912H74.063C74.3031 18.2889 74.5731 17.9897 74.8732 17.7938C75.1732 17.5979 75.5087 17.5 75.8797 17.5C76.2834 17.5 76.6326 17.6059 76.9272 17.8177C77.2272 18.0294 77.4564 18.3312 77.6146 18.723C77.7728 19.1148 77.8519 19.578 77.8519 20.1127V24.0438C77.8519 24.102 77.8301 24.1523 77.7864 24.1947C77.7482 24.2317 77.6991 24.2502 77.6391 24.2502H76.3298C76.2698 24.2502 76.2179 24.2317 76.1743 24.1947C76.1361 24.1523 76.117 24.102 76.117 24.0438V20.2398C76.117 19.8533 76.0407 19.5568 75.8879 19.3504C75.7351 19.1439 75.5142 19.0406 75.225 19.0406C74.9086 19.0406 74.6658 19.1624 74.4967 19.406C74.3331 19.6495 74.2512 20.0016 74.2512 20.4622V24.0438C74.2512 24.102 74.2294 24.1523 74.1857 24.1947C74.1476 24.2317 74.0985 24.2502 74.0385 24.2502H72.7291C72.6691 24.2502 72.6173 24.2317 72.5736 24.1947C72.5354 24.1523 72.5164 24.102 72.5164 24.0438V20.2398C72.5164 19.8533 72.44 19.5568 72.2872 19.3504C72.1345 19.1439 71.9135 19.0406 71.6244 19.0406C71.3079 19.0406 71.0652 19.1624 70.8961 19.406C70.7324 19.6495 70.6506 20.0016 70.6506 20.4622V24.0438C70.6506 24.102 70.6288 24.1523 70.5851 24.1947C70.5469 24.2317 70.4978 24.2502 70.4378 24.2502H69.1285C69.0685 24.2502 69.0166 24.2317 68.973 24.1947C68.9348 24.1523 68.9157 24.102 68.9157 24.0438V17.8494ZM78.7029 22.4078C78.7029 21.9366 78.823 21.5237 79.063 21.169C79.3085 20.8143 79.6549 20.5416 80.1023 20.351C80.5551 20.1604 81.0843 20.0651 81.6898 20.0651C81.9681 20.0651 82.1945 20.0836 82.3691 20.1207V19.9539C82.3691 19.5516 82.2927 19.2524 82.1399 19.0565C81.9872 18.8553 81.7553 18.7548 81.4444 18.7548C80.9425 18.7548 80.6206 19.0115 80.4787 19.5251C80.4351 19.6733 80.3451 19.7369 80.2087 19.7157L79.0957 19.5251C79.0139 19.5092 78.9566 19.4748 78.9239 19.4218C78.8966 19.3689 78.8939 19.2974 78.9157 19.2074C79.0575 18.6674 79.3576 18.2491 79.8159 17.9527C80.2796 17.6509 80.8606 17.5 81.5589 17.5C82.3882 17.5 83.0183 17.7171 83.4493 18.1512C83.8857 18.5853 84.1039 19.218 84.1039 20.0492V24.0438C84.1039 24.102 84.0821 24.1523 84.0385 24.1947C84.0003 24.2317 83.9512 24.2502 83.8912 24.2502H82.8273C82.6964 24.2502 82.6146 24.1814 82.5818 24.0438L82.4182 23.2973H82.3527C82.2054 23.6467 81.9845 23.9167 81.6898 24.1073C81.4007 24.2979 81.057 24.3932 80.6588 24.3932C80.2605 24.3932 79.9305 24.3112 79.6358 24.147C79.3412 23.9776 79.1121 23.7447 78.9485 23.4482C78.7848 23.1464 78.7029 22.7996 78.7029 22.4078ZM80.4869 22.2172C80.4869 22.4979 80.5606 22.7229 80.7078 22.8923C80.8606 23.0564 81.0652 23.1385 81.3216 23.1385C81.6598 23.1385 81.919 22.9928 82.099 22.7017C82.279 22.4052 82.3691 21.9816 82.3691 21.4311V21.0101C82.2163 20.9837 82.0717 20.9704 81.9353 20.9704C81.488 20.9704 81.1334 21.0842 80.8715 21.3119C80.6151 21.5343 80.4869 21.8361 80.4869 22.2172ZM84.9877 23.0829C84.9877 22.9664 85.0205 22.8658 85.0859 22.7811L87.8846 18.9771H85.2659C85.2059 18.9771 85.1541 18.9586 85.1105 18.9215C85.0723 18.8792 85.0532 18.8289 85.0532 18.7706V17.8494C85.0532 17.7912 85.0723 17.7435 85.1105 17.7065C85.1541 17.6641 85.2059 17.6429 85.2659 17.6429H89.5704C89.6304 17.6429 89.6795 17.6641 89.7177 17.7065C89.7613 17.7435 89.7831 17.7912 89.7831 17.8494V18.8103C89.7831 18.9268 89.7504 19.0274 89.6849 19.1121L87.1481 22.4952C87.3009 22.4687 87.4564 22.4555 87.6146 22.4555C88.0074 22.4555 88.3674 22.4899 88.6948 22.5587C89.0275 22.6223 89.3712 22.7281 89.7258 22.8764C89.8513 22.9293 89.9141 23.0193 89.9141 23.1464V24.0597C89.9141 24.1444 89.8868 24.2026 89.8323 24.2344C89.7777 24.2608 89.7095 24.2582 89.6276 24.2265C89.2185 24.0782 88.8557 23.975 88.5393 23.9167C88.2283 23.8532 87.8873 23.8214 87.5164 23.8214C87.1454 23.8214 86.7908 23.8532 86.4362 23.9167C86.087 23.9803 85.6997 24.0835 85.2742 24.2265C85.1923 24.2529 85.1241 24.2529 85.0695 24.2265C85.015 24.1947 84.9877 24.1391 84.9877 24.0597V23.0829ZM90.2742 20.9466C90.2742 20.3007 90.4024 19.7157 90.6588 19.1915C90.9152 18.6621 91.267 18.2491 91.7144 17.9527C92.1672 17.6509 92.6691 17.5 93.2201 17.5C93.7711 17.5 94.2785 17.6509 94.7258 17.9527C95.1787 18.2491 95.5333 18.6621 95.7897 19.1915C96.0515 19.7157 96.1825 20.3007 96.1825 20.9466C96.1825 21.5925 96.0515 22.1802 95.7897 22.7096C95.5333 23.2338 95.1787 23.6467 94.7258 23.9485C94.2785 24.245 93.7766 24.3932 93.2201 24.3932C92.6636 24.3932 92.1672 24.245 91.7144 23.9485C91.267 23.6467 90.9152 23.2338 90.6588 22.7096C90.4024 22.1802 90.2742 21.5925 90.2742 20.9466ZM92.0745 20.9466C92.0745 21.619 92.1727 22.1378 92.3691 22.5031C92.5655 22.8632 92.8491 23.0432 93.2201 23.0432C93.5911 23.0432 93.8775 22.8632 94.0794 22.5031C94.2812 22.1378 94.3822 21.619 94.3822 20.9466C94.3822 20.2742 94.2812 19.758 94.0794 19.398C93.8775 19.0327 93.5911 18.8501 93.2201 18.8501C92.8491 18.8501 92.5655 19.0327 92.3691 19.398C92.1727 19.758 92.0745 20.2742 92.0745 20.9466ZM97.0663 17.8494C97.0663 17.7912 97.0854 17.7435 97.1236 17.7065C97.1672 17.6641 97.219 17.6429 97.279 17.6429H98.3592C98.4192 17.6429 98.4684 17.6615 98.5066 17.6985C98.5502 17.7356 98.5775 17.7859 98.5884 17.8494L98.7521 18.6277H98.8175C98.9648 18.2677 99.1803 17.9897 99.464 17.7938C99.7531 17.5979 100.091 17.5 100.479 17.5C100.893 17.5 101.251 17.6059 101.551 17.8177C101.856 18.0294 102.091 18.3312 102.255 18.723C102.418 19.1148 102.5 19.578 102.5 20.1127V24.0438C102.5 24.102 102.478 24.1523 102.435 24.1947C102.396 24.2317 102.347 24.2502 102.287 24.2502H100.978C100.918 24.2502 100.866 24.2317 100.822 24.1947C100.784 24.1523 100.765 24.102 100.765 24.0438V20.2398C100.765 19.8533 100.683 19.5568 100.52 19.3504C100.356 19.1439 100.124 19.0406 99.8241 19.0406C99.4913 19.0406 99.2376 19.1624 99.063 19.406C98.8884 19.6495 98.8011 20.0016 98.8011 20.4622V24.0438C98.8011 24.102 98.7793 24.1523 98.7357 24.1947C98.6975 24.2317 98.6484 24.2502 98.5884 24.2502H97.279C97.219 24.2502 97.1672 24.2317 97.1236 24.1947C97.0854 24.1523 97.0663 24.102 97.0663 24.0438V17.8494Z" fill="#171D27"></path>
                                                    <path d="M67.0501 25.1634C66.9465 25.2428 66.9247 25.3751 66.9847 25.5605C67.0392 25.7246 67.1674 25.9284 67.3693 26.1719C68.1821 27.1461 69.1505 27.9561 70.2743 28.6021C71.3982 29.248 72.6012 29.7244 73.8832 30.0315C75.1707 30.3439 76.4855 30.5001 77.8275 30.5001C79.546 30.5001 81.1827 30.2565 82.7375 29.7694C84.2923 29.2876 85.5908 28.61 86.6328 27.7364C86.9983 27.4241 87.1811 27.1752 87.1811 26.9899C87.1811 26.9211 87.1511 26.8523 87.0911 26.7834C87.0092 26.7041 86.911 26.6776 86.7964 26.7041C86.6819 26.7305 86.521 26.7967 86.3136 26.9026C85.3153 27.4108 84.0987 27.8158 82.6639 28.1176C81.2345 28.4247 79.7424 28.5782 78.1876 28.5782C76.2618 28.5782 74.4015 28.3241 72.6066 27.8158C70.8117 27.3076 69.2214 26.5134 67.8357 25.4334C67.6339 25.2799 67.4702 25.1819 67.3447 25.1395C67.2247 25.0972 67.1265 25.1051 67.0501 25.1634Z" fill="#FF6201"></path>
                                                    <path d="M85.2331 25.5609C85.1185 25.6668 85.0885 25.778 85.1431 25.8945C85.1813 25.9792 85.255 26.0268 85.3641 26.0374C85.4732 26.0533 85.6286 26.0427 85.8305 26.0056C86.1578 25.9368 86.4988 25.8891 86.8534 25.8627C87.208 25.8415 87.5163 25.8468 87.7781 25.8785C88.04 25.9156 88.2037 25.9792 88.2692 26.0692C88.3674 26.2121 88.3319 26.5139 88.1627 26.9745C87.9991 27.4351 87.7754 27.8825 87.4917 28.3166C87.3826 28.4913 87.3172 28.629 87.2953 28.7296C87.2735 28.8302 87.3008 28.9149 87.3772 28.9837C87.4262 29.0313 87.4808 29.0552 87.5408 29.0552C87.6991 29.0552 87.9282 28.9201 88.2282 28.6502C88.7683 28.1948 89.1475 27.6548 89.3657 27.0301C89.4857 26.7071 89.5594 26.3683 89.5866 26.0136C89.6139 25.6589 89.573 25.4047 89.4639 25.2512C89.3602 25.1029 89.1311 24.9812 88.7765 24.8859C88.4274 24.7906 88.0755 24.7429 87.7208 24.7429C87.028 24.7429 86.3706 24.9018 85.7487 25.2194C85.5196 25.3412 85.3477 25.455 85.2331 25.5609Z" fill="#FF6201"></path>
                                                    </g>
                                                    <path d="M119.82 16.544C120.876 16.544 121.831 16.7893 122.684 17.28C123.548 17.7707 124.225 18.4587 124.716 19.344C125.217 20.2187 125.468 21.2107 125.468 22.32C125.468 23.4293 125.217 24.4267 124.716 25.312C124.225 26.1973 123.548 26.8853 122.684 27.376C121.831 27.8667 120.876 28.112 119.82 28.112C118.764 28.112 117.804 27.8667 116.94 27.376C116.087 26.8853 115.409 26.1973 114.908 25.312C114.417 24.4267 114.172 23.4293 114.172 22.32C114.172 21.2107 114.417 20.2187 114.908 19.344C115.409 18.4587 116.087 17.7707 116.94 17.28C117.804 16.7893 118.764 16.544 119.82 16.544ZM119.82 18.624C119.159 18.624 118.577 18.7733 118.076 19.072C117.575 19.3707 117.18 19.8027 116.892 20.368C116.615 20.9227 116.476 21.5733 116.476 22.32C116.476 23.0667 116.615 23.7227 116.892 24.288C117.18 24.8427 117.575 25.2693 118.076 25.568C118.577 25.8667 119.159 26.016 119.82 26.016C120.481 26.016 121.063 25.8667 121.564 25.568C122.065 25.2693 122.455 24.8427 122.732 24.288C123.02 23.7227 123.164 23.0667 123.164 22.32C123.164 21.5733 123.02 20.9227 122.732 20.368C122.455 19.8027 122.065 19.3707 121.564 19.072C121.063 18.7733 120.481 18.624 119.82 18.624ZM129.101 20.832C129.431 20.2667 129.869 19.824 130.413 19.504C130.957 19.1733 131.565 19.008 132.237 19.008V21.424H131.581C129.927 21.424 129.101 22.192 129.101 23.728V28H126.845V19.136H129.101V20.832ZM136.637 19.024C137.384 19.024 138.019 19.2 138.541 19.552C139.075 19.904 139.459 20.3787 139.693 20.976V16.16H141.933V28H139.693V26.144C139.459 26.7413 139.075 27.2213 138.541 27.584C138.019 27.936 137.384 28.112 136.637 28.112C135.891 28.112 135.219 27.9307 134.621 27.568C134.024 27.2053 133.555 26.6827 133.213 26C132.883 25.3067 132.717 24.496 132.717 23.568C132.717 22.64 132.883 21.8347 133.213 21.152C133.555 20.4587 134.024 19.9307 134.621 19.568C135.219 19.2053 135.891 19.024 136.637 19.024ZM137.341 20.992C136.637 20.992 136.072 21.2213 135.645 21.68C135.219 22.1387 135.005 22.768 135.005 23.568C135.005 24.368 135.219 24.9973 135.645 25.456C136.072 25.904 136.637 26.128 137.341 26.128C138.024 26.128 138.584 25.8987 139.021 25.44C139.469 24.9707 139.693 24.3467 139.693 23.568C139.693 22.7787 139.469 22.1547 139.021 21.696C138.584 21.2267 138.024 20.992 137.341 20.992ZM151.994 23.232C151.994 23.456 151.967 23.712 151.914 24H145.418C145.45 24.7893 145.663 25.3707 146.058 25.744C146.452 26.1173 146.943 26.304 147.53 26.304C148.052 26.304 148.484 26.176 148.826 25.92C149.178 25.664 149.402 25.3173 149.498 24.88H151.882C151.764 25.4987 151.514 26.0533 151.13 26.544C150.746 27.0347 150.25 27.4187 149.642 27.696C149.044 27.9733 148.378 28.112 147.642 28.112C146.778 28.112 146.01 27.9307 145.338 27.568C144.666 27.1947 144.143 26.6667 143.77 25.984C143.396 25.3013 143.21 24.496 143.21 23.568C143.21 22.64 143.396 21.8347 143.77 21.152C144.143 20.4587 144.666 19.9307 145.338 19.568C146.01 19.2053 146.778 19.024 147.642 19.024C148.516 19.024 149.279 19.2053 149.93 19.568C150.591 19.9307 151.098 20.432 151.45 21.072C151.812 21.7013 151.994 22.4213 151.994 23.232ZM149.722 23.008C149.754 22.2827 149.562 21.7333 149.146 21.36C148.74 20.9867 148.239 20.8 147.642 20.8C147.034 20.8 146.522 20.9867 146.106 21.36C145.69 21.7333 145.46 22.2827 145.418 23.008H149.722ZM155.531 20.832C155.862 20.2667 156.299 19.824 156.843 19.504C157.387 19.1733 157.995 19.008 158.667 19.008V21.424H158.011C156.358 21.424 155.531 22.192 155.531 23.728V28H153.275V19.136H155.531V20.832ZM172.328 28H170.072L165.016 20.32V28H162.76V16.704H165.016L170.072 24.448V16.704H172.328V28ZM178.146 19.024C179.01 19.024 179.783 19.2053 180.466 19.568C181.159 19.9307 181.703 20.4587 182.098 21.152C182.492 21.8347 182.69 22.64 182.69 23.568C182.69 24.496 182.492 25.3013 182.098 25.984C181.703 26.6667 181.159 27.1947 180.466 27.568C179.783 27.9307 179.01 28.112 178.146 28.112C177.282 28.112 176.503 27.9307 175.81 27.568C175.127 27.1947 174.588 26.6667 174.194 25.984C173.799 25.3013 173.602 24.496 173.602 23.568C173.602 22.64 173.799 21.8347 174.194 21.152C174.588 20.4587 175.127 19.9307 175.81 19.568C176.503 19.2053 177.282 19.024 178.146 19.024ZM178.146 20.976C177.516 20.976 176.983 21.2 176.546 21.648C176.108 22.0853 175.89 22.7253 175.89 23.568C175.89 24.4107 176.108 25.056 176.546 25.504C176.983 25.9413 177.516 26.16 178.146 26.16C178.775 26.16 179.308 25.9413 179.746 25.504C180.183 25.056 180.402 24.4107 180.402 23.568C180.402 22.7253 180.183 22.0853 179.746 21.648C179.308 21.2 178.775 20.976 178.146 20.976ZM196.652 19.136L194.268 28H191.772L189.868 21.552L187.916 28H185.42L183.052 19.136H185.308L186.748 25.984L188.716 19.136H191.1L193.084 25.984L194.54 19.136H196.652Z" fill="#171D27"></path>
                                                    <defs>
                                                    <clipPath id="clip0_625_22">
                                                    <rect width="40" height="13" fill="white" transform="translate(62.5 17.5)"></rect>
                                                    </clipPath>
                                                    </defs>
                                                    </svg>
                                                    </div>
                                                    </a>
                                        <a href="https://joyycandy.com/" target="_blank" class="btn btn-primary" style="
                                            padding-top: 13px;
                                            width: 277px;
                                            /* margin-left: 24px; */
                                        "><i class="fas fa-globe text-primary" style="
                                            color: #ffffff !important;
                                            font-size: 16px;
                                            position: relative;
                                            top: 1px;
                                            margin-right: 10px;
                                        "></i>Visit Website</a>
                                        
</div>
<div class="webthree-button-new" style="
    display: flex;
    margin-top: 35px;
    /* width: calc(100vh - 100px); */
    justify-content: center;
    gap: 14px;
">
<a target="_blank" href="https://www.flipkart.com/joyy-herbal-100-natural-sexual-chewable-candy-men-women-supports-stamina-chocolate/p/itmad0d51ddb141c?pid=CMFHME5FGUX79GGS">
    
<svg width="285" height="49" viewBox="0 0 285 49" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="284.129" height="48.0833" rx="10.928" fill="#1C41D6"/>
<g clip-path="url(#clip0_676_682)">
<mask id="mask0_676_682" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="70" y="10" width="42" height="35">
<path d="M70.2931 10.4625C70.2931 10.5381 70.2168 10.5382 70.2168 10.6137C70.2168 21.1156 70.2168 31.6931 70.2168 42.195C70.2931 42.7239 70.5985 43.2527 71.0565 43.6305H71.1328C71.3619 43.8572 71.6672 43.9327 71.9726 44.0838C72.0489 44.0838 72.2016 44.0838 72.2779 44.0838C72.3543 44.0838 72.507 44.1594 72.5833 44.0838H89.6071C89.6834 44.0838 89.6834 44.0838 89.7598 44.0838C89.9125 44.0838 89.9888 44.0838 90.1415 44.0083V43.9327C90.1415 43.9327 90.1415 43.8572 90.1415 43.7817C90.5232 41.7417 90.8286 39.7773 91.2103 37.7374C91.2103 37.6619 91.2103 37.5863 91.2103 37.5107C89.6071 37.5107 88.0803 37.5107 86.4772 37.5107C86.0955 37.5107 85.7138 37.5107 85.3321 37.4352C84.645 37.4352 84.0343 37.4352 83.3472 37.3596C82.5075 37.3596 81.7441 37.284 80.9044 37.284C80.2937 37.2085 79.6066 37.2085 78.9959 37.2085C78.6142 37.1329 78.1561 37.2085 77.6981 37.1329C77.011 37.0574 76.324 37.133 75.6369 37.0574C74.8735 37.0574 74.1864 36.9819 73.423 36.9819C73.6521 36.9819 73.8811 36.9819 74.1101 36.9819C74.6445 36.9063 75.1788 36.9818 75.7132 36.9062C76.2476 36.9062 76.8583 36.8307 77.3927 36.8307C77.9271 36.7552 78.3851 36.8307 78.9195 36.7552C79.5302 36.7552 80.0646 36.6796 80.6753 36.6796C81.1334 36.6041 81.6678 36.6797 82.1258 36.6041C82.4312 36.6041 82.6602 36.6041 82.9655 36.6041C83.2709 36.6041 83.4999 36.5285 83.8053 36.6041C84.3397 36.5285 84.9504 36.5285 85.4848 36.5285C85.4084 36.3018 85.4084 36.0752 85.3321 35.9241C85.2557 35.773 85.103 35.8485 85.0267 35.7729C83.8053 35.6218 82.5075 35.3952 81.2861 35.2441C81.3624 35.1686 81.4387 35.1686 81.5151 35.1686H81.5914C82.5838 35.093 83.4999 35.0174 84.4923 34.9419C84.7213 34.9419 84.9504 34.8663 85.1794 34.8663C85.103 34.5641 85.0267 34.2619 84.874 33.9597C82.8128 33.6575 80.6754 33.3552 78.6142 33.053C79.1486 32.9775 79.6829 32.902 80.2173 32.902H80.2936C82.0494 32.7509 83.7289 32.5241 85.4848 32.373C87.6986 32.373 89.8361 32.373 92.05 32.373C92.05 32.373 92.05 32.373 92.1263 32.373C92.2026 32.373 92.279 32.3731 92.279 32.2975C92.4317 31.3909 92.6607 30.4087 92.8134 29.5021C93.0424 28.2177 93.4241 26.9332 94.0348 25.7999C95.0272 23.9111 96.4777 22.3245 98.3098 21.2667C100.066 20.2845 102.051 19.7557 104.035 19.6801C104.646 19.6046 105.333 19.6045 105.944 19.7556C106.326 19.8312 106.784 19.9823 107.089 20.2845C107.394 20.5111 107.547 20.8134 107.623 21.1156C107.929 21.8712 108.005 22.7023 108.158 23.4578C108.158 23.76 108.234 24.1377 108.081 24.4399C107.929 24.7421 107.623 24.8933 107.318 24.9689C106.173 25.2711 105.028 24.9689 103.883 25.2711C102.967 25.4977 102.127 25.951 101.516 26.7065C100.829 27.5376 100.447 28.5954 100.295 29.6531C100.142 30.5598 99.913 31.542 99.7603 32.4487C100.218 32.4487 100.753 32.4487 101.211 32.4487C101.821 32.4487 102.432 32.4487 103.043 32.4487C103.501 32.4487 103.959 32.6753 104.112 33.1286C104.341 33.6574 104.264 34.2619 104.188 34.7908C104.112 35.3952 103.959 35.9997 103.654 36.6041C103.425 37.0574 103.043 37.5107 102.509 37.7374C102.203 37.813 101.898 37.8129 101.669 37.8129C100.676 37.8129 99.7603 37.8129 98.7679 37.8129C98.6152 38.4929 98.5389 39.2484 98.3862 39.9284C98.1572 41.2883 97.8518 42.7239 97.6228 44.0838C97.6228 44.1594 97.6228 44.235 97.6228 44.3105C97.8518 44.3105 98.1572 44.3105 98.3862 44.3105C98.6152 44.3105 98.7679 44.3105 98.9969 44.3105C102.356 44.3105 105.791 44.3105 109.226 44.3105C109.608 44.3105 109.99 44.2349 110.295 44.0838C110.448 44.0083 110.601 43.8572 110.753 43.7817C110.906 43.7061 110.982 43.4795 111.135 43.4039C111.288 43.1017 111.44 42.875 111.44 42.5728H111.517C111.517 31.9953 111.517 21.4934 111.517 10.9159C111.517 10.8404 111.517 10.7648 111.44 10.7648C97.6991 10.4626 83.9579 10.4625 70.2931 10.4625Z" fill="white"/>
</mask>
<g mask="url(#mask0_676_682)">
<path d="M70.2168 44.0837H111.517V44.1593H70.2168V44.0837Z" fill="#F7E500"/>
<path d="M70.2168 43.9326H111.517V44.1593H70.2168V43.9326Z" fill="#F7E500"/>
<path d="M70.2168 43.7826H111.517V44.0092H70.2168V43.7826Z" fill="#F7E500"/>
<path d="M70.2168 43.7063H111.517V43.933H70.2168V43.7063Z" fill="#F7E500"/>
<path d="M70.2168 43.5556H111.517V43.7823H70.2168V43.5556Z" fill="#F7E500"/>
<path d="M70.2168 43.4046H111.517V43.6312H70.2168V43.4046Z" fill="#F7E500"/>
<path d="M70.2168 43.2529H111.517V43.4796H70.2168V43.2529Z" fill="#F7E500"/>
<path d="M70.2168 43.1771H111.517V43.4038H70.2168V43.1771Z" fill="#F7E500"/>
<path d="M70.2168 43.0261H111.517V43.2527H70.2168V43.0261Z" fill="#F7E500"/>
<path d="M70.2168 42.8753H111.517V43.102H70.2168V42.8753Z" fill="#F7E500"/>
<path d="M70.2168 42.7242H111.517V42.9508H70.2168V42.7242Z" fill="#F7E500"/>
<path d="M70.2168 42.6489H111.517V42.8755H70.2168V42.6489Z" fill="#F7E500"/>
<path d="M70.2168 42.4981H111.517V42.7248H70.2168V42.4981Z" fill="#F7E500"/>
<path d="M70.2168 42.3466H111.517V42.5732H70.2168V42.3466Z" fill="#F7E500"/>
<path d="M70.2168 42.1954H111.517V42.4221H70.2168V42.1954Z" fill="#F7E400"/>
<path d="M70.2168 42.1196H111.517V42.3463H70.2168V42.1196Z" fill="#F7E400"/>
<path d="M70.2168 41.9686H111.517V42.1952H70.2168V41.9686Z" fill="#F7E400"/>
<path d="M70.2168 41.8169H111.517V42.0436H70.2168V41.8169Z" fill="#F7E400"/>
<path d="M70.2168 41.742H111.517V41.9687H70.2168V41.742Z" fill="#F7E400"/>
<path d="M70.2168 41.5914H111.517V41.818H70.2168V41.5914Z" fill="#F7E400"/>
<path d="M70.2168 41.4401H111.517V41.6668H70.2168V41.4401Z" fill="#F7E400"/>
<path d="M70.2168 41.289H111.517V41.5157H70.2168V41.289Z" fill="#F7E400"/>
<path d="M70.2168 41.2137H111.517V41.4403H70.2168V41.2137Z" fill="#F7E400"/>
<path d="M70.2168 41.0621H111.517V41.2888H70.2168V41.0621Z" fill="#F7E400"/>
<path d="M70.2168 40.9105H111.517V41.1372H70.2168V40.9105Z" fill="#F7E400"/>
<path d="M70.2168 40.7594H111.517V40.9861H70.2168V40.7594Z" fill="#F7E400"/>
<path d="M70.2168 40.684H111.517V40.9107H70.2168V40.684Z" fill="#F7E400"/>
<path d="M70.2168 40.5329H111.517V40.7596H70.2168V40.5329Z" fill="#F7E400"/>
<path d="M70.2168 40.3827H111.517V40.6093H70.2168V40.3827Z" fill="#F7E400"/>
<path d="M70.2168 40.2314H111.517V40.4581H70.2168V40.2314Z" fill="#F7E400"/>
<path d="M70.2168 40.1557H111.517V40.3824H70.2168V40.1557Z" fill="#F7E400"/>
<path d="M70.2168 40.0046H111.517V40.2312H70.2168V40.0046Z" fill="#F7E200"/>
<path d="M70.2168 39.853H111.517V40.0797H70.2168V39.853Z" fill="#F7E200"/>
<path d="M70.2168 39.7019H111.517V39.9285H70.2168V39.7019Z" fill="#F7E200"/>
<path d="M70.2168 39.6265H111.517V39.8531H70.2168V39.6265Z" fill="#F7E200"/>
<path d="M70.2168 39.4753H111.517V39.702H70.2168V39.4753Z" fill="#F7E200"/>
<path d="M70.2168 39.3247H111.517V39.5513H70.2168V39.3247Z" fill="#F7E200"/>
<path d="M70.2168 39.1739H111.517V39.4006H70.2168V39.1739Z" fill="#F7E200"/>
<path d="M70.2168 39.0981H111.517V39.3248H70.2168V39.0981Z" fill="#F7E200"/>
<path d="M70.2168 38.9466H111.517V39.1732H70.2168V38.9466Z" fill="#F7E200"/>
<path d="M70.2168 38.7954H111.517V39.0221H70.2168V38.7954Z" fill="#F7E200"/>
<path d="M70.2168 38.6438H111.517V38.8705H70.2168V38.6438Z" fill="#F7E200"/>
<path d="M70.2168 38.569H111.517V38.7956H70.2168V38.569Z" fill="#F7E200"/>
<path d="M70.2168 38.4178H111.517V38.6445H70.2168V38.4178Z" fill="#F7E200"/>
<path d="M70.2168 38.2671H111.517V38.4938H70.2168V38.2671Z" fill="#F7E200"/>
<path d="M70.2168 38.1152H111.517V38.3418H70.2168V38.1152Z" fill="#F7E200"/>
<path d="M70.2168 38.0406H111.517V38.2673H70.2168V38.0406Z" fill="#F7E200"/>
<path d="M70.2168 37.889H111.517V38.1157H70.2168V37.889Z" fill="#F7E200"/>
<path d="M70.2168 37.7375H111.517V37.9641H70.2168V37.7375Z" fill="#F7E200"/>
<path d="M70.2168 37.6621H111.517V37.8888H70.2168V37.6621Z" fill="#F6E101"/>
<path d="M70.2168 37.5114H111.517V37.7381H70.2168V37.5114Z" fill="#F6E101"/>
<path d="M70.2168 37.3595H111.517V37.5861H70.2168V37.3595Z" fill="#F6E101"/>
<path d="M70.2168 37.2087H111.517V37.4354H70.2168V37.2087Z" fill="#F6E101"/>
<path d="M70.2168 37.1333H111.517V37.36H70.2168V37.1333Z" fill="#F6E101"/>
<path d="M70.2168 36.9823H111.517V37.2089H70.2168V36.9823Z" fill="#F6E101"/>
<path d="M70.2168 36.8315H111.517V37.0582H70.2168V36.8315Z" fill="#F6E101"/>
<path d="M70.2168 36.68H111.517V36.9066H70.2168V36.68Z" fill="#F6E101"/>
<path d="M70.2168 36.6042H111.517V36.8308H70.2168V36.6042Z" fill="#F6E101"/>
<path d="M70.2168 36.453H111.517V36.6797H70.2168V36.453Z" fill="#F6E101"/>
<path d="M70.2168 36.3019H111.517V36.5285H70.2168V36.3019Z" fill="#F6E101"/>
<path d="M70.2168 36.1511H111.517V36.3778H70.2168V36.1511Z" fill="#F6E101"/>
<path d="M70.2168 36.0753H111.517V36.302H70.2168V36.0753Z" fill="#F6E101"/>
<path d="M70.2168 35.9247H111.517V36.1513H70.2168V35.9247Z" fill="#F6E101"/>
<path d="M70.2168 35.7735H111.517V36.0002H70.2168V35.7735Z" fill="#F6E101"/>
<path d="M70.2168 35.6224H111.517V35.8491H70.2168V35.6224Z" fill="#F8E200"/>
<path d="M70.2168 35.5467H111.517V35.7733H70.2168V35.5467Z" fill="#F8E200"/>
<path d="M70.2168 35.3954H111.517V35.6221H70.2168V35.3954Z" fill="#F8E000"/>
<path d="M70.2168 35.2443H111.517V35.471H70.2168V35.2443Z" fill="#F8E000"/>
<path d="M70.2168 35.0932H111.517V35.3199H70.2168V35.0932Z" fill="#F8E000"/>
<path d="M70.2168 35.0178H111.517V35.2445H70.2168V35.0178Z" fill="#F8E000"/>
<path d="M70.2168 34.8671H111.517V35.0938H70.2168V34.8671Z" fill="#F8E000"/>
<path d="M70.2168 34.7161H111.517V34.9427H70.2168V34.7161Z" fill="#F8E000"/>
<path d="M70.2168 34.5644H111.517V34.7911H70.2168V34.5644Z" fill="#F8E000"/>
<path d="M70.2168 34.4886H111.517V34.7153H70.2168V34.4886Z" fill="#F8E000"/>
<path d="M70.2168 34.338H111.517V34.5646H70.2168V34.338Z" fill="#F8E000"/>
<path d="M70.2168 34.1863H111.517V34.413H70.2168V34.1863Z" fill="#F8DE00"/>
<path d="M70.2168 34.0357H111.517V34.2623H70.2168V34.0357Z" fill="#F8DE00"/>
<path d="M70.2168 33.9603H111.517V34.187H70.2168V33.9603Z" fill="#F8DE00"/>
<path d="M70.2168 33.8091H111.517V34.0358H70.2168V33.8091Z" fill="#F8DE00"/>
<path d="M70.2168 33.6581H111.517V33.8847H70.2168V33.6581Z" fill="#F8DE00"/>
<path d="M70.2168 33.5069H111.517V33.7336H70.2168V33.5069Z" fill="#F8DE00"/>
<path d="M70.2168 33.4311H111.517V33.6578H70.2168V33.4311Z" fill="#F8DE00"/>
<path d="M70.2168 33.2796H111.517V33.5062H70.2168V33.2796Z" fill="#F8DE00"/>
<path d="M70.2168 33.1288H111.517V33.3555H70.2168V33.1288Z" fill="#F8DE00"/>
<path d="M70.2168 33.0539H111.517V33.2806H70.2168V33.0539Z" fill="#F8DE00"/>
<path d="M70.2168 32.902H111.517V33.1286H70.2168V32.902Z" fill="#F8DE00"/>
<path d="M70.2168 32.7511H111.517V32.9778H70.2168V32.7511Z" fill="#F8DE00"/>
<path d="M70.2168 32.6H111.517V32.8267H70.2168V32.6Z" fill="#F8DE00"/>
<path d="M70.2168 32.5248H111.517V32.7514H70.2168V32.5248Z" fill="#F8DE00"/>
<path d="M70.2168 32.3735H111.517V32.6002H70.2168V32.3735Z" fill="#F8DE00"/>
<path d="M70.2168 32.222H111.517V32.4487H70.2168V32.222Z" fill="#F8DE00"/>
<path d="M70.2168 32.0709H111.517V32.2975H70.2168V32.0709Z" fill="#F8DE00"/>
<path d="M70.2168 31.995H111.517V32.2217H70.2168V31.995Z" fill="#F8DE00"/>
<path d="M70.2168 31.8443H111.517V32.071H70.2168V31.8443Z" fill="#F7DC04"/>
<path d="M70.2168 31.6937H111.517V31.9203H70.2168V31.6937Z" fill="#F7DC04"/>
<path d="M70.2168 31.5425H111.517V31.7692H70.2168V31.5425Z" fill="#F7DC04"/>
<path d="M70.2168 31.4671H111.517V31.6938H70.2168V31.4671Z" fill="#F7DC04"/>
<path d="M70.2168 31.3161H111.517V31.5427H70.2168V31.3161Z" fill="#F7DC04"/>
<path d="M70.2168 31.1644H111.517V31.3911H70.2168V31.1644Z" fill="#F7DC04"/>
<path d="M70.2168 31.013H111.517V31.2396H70.2168V31.013Z" fill="#F7DC04"/>
<path d="M70.2168 30.9376H111.517V31.1642H70.2168V30.9376Z" fill="#F7DC04"/>
<path d="M70.2168 30.7864H111.517V31.0131H70.2168V30.7864Z" fill="#F7DC04"/>
<path d="M70.2168 30.6357H111.517V30.8623H70.2168V30.6357Z" fill="#F7DA05"/>
<path d="M70.2168 30.4845H111.517V30.7112H70.2168V30.4845Z" fill="#F7DA05"/>
<path d="M70.2168 30.4096H111.517V30.6363H70.2168V30.4096Z" fill="#F7DA05"/>
<path d="M70.2168 30.2581H111.517V30.4847H70.2168V30.2581Z" fill="#F7DA05"/>
<path d="M70.2168 30.1065H111.517V30.3332H70.2168V30.1065Z" fill="#F7DA05"/>
<path d="M70.2168 29.9553H111.517V30.182H70.2168V29.9553Z" fill="#F7DA05"/>
<path d="M70.2168 29.8796H111.517V30.1062H70.2168V29.8796Z" fill="#F7DA05"/>
<path d="M70.2168 29.7284H111.517V29.9551H70.2168V29.7284Z" fill="#F7DA05"/>
<path d="M70.2168 29.5777H111.517V29.8044H70.2168V29.5777Z" fill="#F7DA05"/>
<path d="M70.2168 29.5029H111.517V29.7295H70.2168V29.5029Z" fill="#F7DA05"/>
<path d="M70.2168 29.3516H111.517V29.5783H70.2168V29.3516Z" fill="#F7DA05"/>
<path d="M70.2168 29.2005H111.517V29.4272H70.2168V29.2005Z" fill="#F7DA05"/>
<path d="M70.2168 29.049H111.517V29.2756H70.2168V29.049Z" fill="#F7DA05"/>
<path d="M70.2168 28.9731H111.517V29.1998H70.2168V28.9731Z" fill="#F7DA05"/>
<path d="M70.2168 28.822H111.517V29.0487H70.2168V28.822Z" fill="#F7DA05"/>
<path d="M70.2168 28.6709H111.517V28.8976H70.2168V28.6709Z" fill="#F7DA05"/>
<path d="M70.2168 28.5201H111.517V28.7468H70.2168V28.5201Z" fill="#F7DA05"/>
<path d="M70.2168 28.4444H111.517V28.6711H70.2168V28.4444Z" fill="#F6D908"/>
<path d="M70.2168 28.2942H111.517V28.5208H70.2168V28.2942Z" fill="#F6D908"/>
<path d="M70.2168 28.1429H111.517V28.3696H70.2168V28.1429Z" fill="#F6D908"/>
<path d="M70.2168 27.9915H111.517V28.2181H70.2168V27.9915Z" fill="#F6D908"/>
<path d="M70.2168 27.9157H111.517V28.1423H70.2168V27.9157Z" fill="#F6D908"/>
<path d="M70.2168 27.7645H111.517V27.9911H70.2168V27.7645Z" fill="#F6D908"/>
<path d="M70.2168 27.6134H111.517V27.84H70.2168V27.6134Z" fill="#F6D908"/>
<path d="M70.2168 27.4626H111.517V27.6893H70.2168V27.4626Z" fill="#F6D908"/>
<path d="M70.2168 27.3868H111.517V27.6135H70.2168V27.3868Z" fill="#F6D908"/>
<path d="M70.2168 27.2362H111.517V27.4628H70.2168V27.2362Z" fill="#F6D60A"/>
<path d="M70.2168 27.0854H111.517V27.3121H70.2168V27.0854Z" fill="#F6D60A"/>
<path d="M70.2168 26.9338H111.517V27.1605H70.2168V26.9338Z" fill="#F6D60A"/>
<path d="M70.2168 26.8581H111.517V27.0847H70.2168V26.8581Z" fill="#F6D60A"/>
<path d="M70.2168 26.7069H111.517V26.9336H70.2168V26.7069Z" fill="#F6D60A"/>
<path d="M70.2168 26.5558H111.517V26.7825H70.2168V26.5558Z" fill="#F6D60A"/>
<path d="M70.2168 26.4047H111.517V26.6313H70.2168V26.4047Z" fill="#F6D60A"/>
<path d="M70.2168 26.3288H111.517V26.5555H70.2168V26.3288Z" fill="#F6D60A"/>
<path d="M70.2168 26.1786H111.517V26.4053H70.2168V26.1786Z" fill="#F6D60A"/>
<path d="M70.2168 26.0267H111.517V26.2533H70.2168V26.0267Z" fill="#F6D60A"/>
<path d="M70.2168 25.8759H111.517V26.1026H70.2168V25.8759Z" fill="#F6D60A"/>
<path d="M70.2168 25.8005H111.517V26.0272H70.2168V25.8005Z" fill="#F6D60A"/>
<path d="M70.2168 25.649H111.517V25.8756H70.2168V25.649Z" fill="#F6D60A"/>
<path d="M70.2168 25.4978H111.517V25.7245H70.2168V25.4978Z" fill="#F6D60A"/>
<path d="M70.2168 25.4224H111.517V25.6491H70.2168V25.4224Z" fill="#F6D60A"/>
<path d="M70.2168 25.271H111.517V25.4976H70.2168V25.271Z" fill="#F6D60A"/>
<path d="M70.2168 25.1202H111.517V25.3469H70.2168V25.1202Z" fill="#F6D60A"/>
<path d="M70.2168 24.9691H111.517V25.1957H70.2168V24.9691Z" fill="#F6D60A"/>
<path d="M70.2168 24.8938H111.517V25.1204H70.2168V24.8938Z" fill="#F6D50C"/>
<path d="M70.2168 24.7425H111.517V24.9692H70.2168V24.7425Z" fill="#F6D50C"/>
<path d="M70.2168 24.5915H111.517V24.8181H70.2168V24.5915Z" fill="#F6D50C"/>
<path d="M70.2168 24.4403H111.517V24.667H70.2168V24.4403Z" fill="#F9D606"/>
<path d="M70.2168 24.3645H111.517V24.5912H70.2168V24.3645Z" fill="#F9D606"/>
<path d="M70.2168 24.2134H111.517V24.44H70.2168V24.2134Z" fill="#F9D606"/>
<path d="M70.2168 24.0626H111.517V24.2893H70.2168V24.0626Z" fill="#F9D606"/>
<path d="M70.2168 23.9115H111.517V24.1382H70.2168V23.9115Z" fill="#F9D606"/>
<path d="M70.2168 23.8362H111.517V24.0628H70.2168V23.8362Z" fill="#F8D409"/>
<path d="M70.2168 23.685H111.517V23.9117H70.2168V23.685Z" fill="#F8D409"/>
<path d="M70.2168 23.5334H111.517V23.7601H70.2168V23.5334Z" fill="#F8D409"/>
<path d="M70.2168 23.3828H111.517V23.6094H70.2168V23.3828Z" fill="#F8D409"/>
<path d="M70.2168 23.3069H111.517V23.5336H70.2168V23.3069Z" fill="#F8D409"/>
<path d="M70.2168 23.1558H111.517V23.3825H70.2168V23.1558Z" fill="#F8D409"/>
<path d="M70.2168 23.0052H111.517V23.2318H70.2168V23.0052Z" fill="#F8D409"/>
<path d="M70.2168 22.8535H111.517V23.0802H70.2168V22.8535Z" fill="#F8D409"/>
<path d="M70.2168 22.7786H111.517V23.0053H70.2168V22.7786Z" fill="#F8D409"/>
<path d="M70.2168 22.6276H111.517V22.8542H70.2168V22.6276Z" fill="#F8D409"/>
<path d="M70.2168 22.4759H111.517V22.7026H70.2168V22.4759Z" fill="#F8D409"/>
<path d="M70.2168 22.3244H111.517V22.551H70.2168V22.3244Z" fill="#F8D409"/>
<path d="M70.2168 22.2495H111.517V22.4761H70.2168V22.2495Z" fill="#F8D409"/>
<path d="M70.2168 22.0983H111.517V22.325H70.2168V22.0983Z" fill="#F8D409"/>
<path d="M70.2168 21.9472H111.517V22.1738H70.2168V21.9472Z" fill="#F8D409"/>
<path d="M70.2168 21.796H111.517V22.0227H70.2168V21.796Z" fill="#F8D409"/>
<path d="M70.2168 21.7211H111.517V21.9478H70.2168V21.7211Z" fill="#F8D409"/>
<path d="M70.2168 21.5691H111.517V21.7957H70.2168V21.5691Z" fill="#F8D409"/>
<path d="M70.2168 21.4184H111.517V21.6451H70.2168V21.4184Z" fill="#F8D30B"/>
<path d="M70.2168 21.3426H111.517V21.5693H70.2168V21.3426Z" fill="#F8D30B"/>
<path d="M70.2168 21.1911H111.517V21.4177H70.2168V21.1911Z" fill="#F8D30B"/>
<path d="M70.2168 21.0399H111.517V21.2666H70.2168V21.0399Z" fill="#F8D30B"/>
<path d="M70.2168 20.8896H111.517V21.1163H70.2168V20.8896Z" fill="#F8D30B"/>
<path d="M70.2168 20.8135H111.517V21.0401H70.2168V20.8135Z" fill="#F8D30B"/>
<path d="M70.2168 20.6622H111.517V20.8889H70.2168V20.6622Z" fill="#F8D30B"/>
<path d="M70.2168 20.5115H111.517V20.7382H70.2168V20.5115Z" fill="#F8D30B"/>
<path d="M70.2168 20.3605H111.517V20.5871H70.2168V20.3605Z" fill="#F8D30B"/>
<path d="M70.2168 20.2846H111.517V20.5113H70.2168V20.2846Z" fill="#F9D10E"/>
<path d="M70.2168 20.1335H111.517V20.3602H70.2168V20.1335Z" fill="#F9D10E"/>
<path d="M70.2168 19.9824H111.517V20.209H70.2168V19.9824Z" fill="#F9D10E"/>
<path d="M70.2168 19.832H111.517V20.0587H70.2168V19.832Z" fill="#F9D10E"/>
<path d="M70.2168 19.7558H111.517V19.9825H70.2168V19.7558Z" fill="#F9D10E"/>
<path d="M70.2168 19.6052H111.517V19.8318H70.2168V19.6052Z" fill="#F9D10E"/>
<path d="M70.2168 19.454H111.517V19.6807H70.2168V19.454Z" fill="#F9D10E"/>
<path d="M70.2168 19.3025H111.517V19.5291H70.2168V19.3025Z" fill="#F9D10E"/>
<path d="M70.2168 19.2272H111.517V19.4538H70.2168V19.2272Z" fill="#F9D10E"/>
<path d="M70.2168 19.0759H111.517V19.3026H70.2168V19.0759Z" fill="#FAD10B"/>
<path d="M70.2168 18.9249H111.517V19.1515H70.2168V18.9249Z" fill="#FAD10B"/>
<path d="M70.2168 18.7736H111.517V19.0003H70.2168V18.7736Z" fill="#FAD10B"/>
<path d="M70.2168 18.6979H111.517V18.9246H70.2168V18.6979Z" fill="#FAD10B"/>
<path d="M70.2168 18.5477H111.517V18.7743H70.2168V18.5477Z" fill="#FAD10B"/>
<path d="M70.2168 18.396H111.517V18.6227H70.2168V18.396Z" fill="#FAD10B"/>
<path d="M70.2168 18.2449H111.517V18.4716H70.2168V18.2449Z" fill="#FAD10B"/>
<path d="M70.2168 18.1696H111.517V18.3962H70.2168V18.1696Z" fill="#FAD10B"/>
<path d="M70.2168 18.018H111.517V18.2447H70.2168V18.018Z" fill="#F9D00D"/>
<path d="M70.2168 17.8668H111.517V18.0935H70.2168V17.8668Z" fill="#F9D00D"/>
<path d="M70.2168 17.7162H111.517V17.9428H70.2168V17.7162Z" fill="#F9D00D"/>
<path d="M70.2168 17.6403H111.517V17.867H70.2168V17.6403Z" fill="#F9D00D"/>
<path d="M70.2168 17.4892H111.517V17.7159H70.2168V17.4892Z" fill="#F9D00D"/>
<path d="M70.2168 17.3386H111.517V17.5652H70.2168V17.3386Z" fill="#F9D00D"/>
<path d="M70.2168 17.1873H111.517V17.414H70.2168V17.1873Z" fill="#F9D00D"/>
<path d="M70.2168 17.112H111.517V17.3387H70.2168V17.112Z" fill="#F9D00D"/>
<path d="M70.2168 16.9605H111.517V17.1871H70.2168V16.9605Z" fill="#F9D00D"/>
<path d="M70.2168 16.8093H111.517V17.036H70.2168V16.8093Z" fill="#F9D00D"/>
<path d="M70.2168 16.7335H111.517V16.9602H70.2168V16.7335Z" fill="#F9D00D"/>
<path d="M70.2168 16.5824H111.517V16.8091H70.2168V16.5824Z" fill="#F9D00D"/>
<path d="M70.2168 16.4316H111.517V16.6583H70.2168V16.4316Z" fill="#F9D00D"/>
<path d="M70.2168 16.2806H111.517V16.5072H70.2168V16.2806Z" fill="#F9D00D"/>
<path d="M70.2168 16.2057H111.517V16.4323H70.2168V16.2057Z" fill="#F9D00D"/>
<path d="M70.2168 16.0544H111.517V16.2811H70.2168V16.0544Z" fill="#F9D00D"/>
<path d="M70.2168 15.903H111.517V16.1296H70.2168V15.903Z" fill="#F9D00D"/>
<path d="M70.2168 15.7517H111.517V15.9784H70.2168V15.7517Z" fill="#F9D00D"/>
<path d="M70.2168 15.676H111.517V15.9026H70.2168V15.676Z" fill="#FACE0F"/>
<path d="M70.2168 15.5249H111.517V15.7515H70.2168V15.5249Z" fill="#FACE0F"/>
<path d="M70.2168 15.3741H111.517V15.6008H70.2168V15.3741Z" fill="#FACE0F"/>
<path d="M70.2168 15.223H111.517V15.4497H70.2168V15.223Z" fill="#FACE0F"/>
<path d="M70.2168 15.1477H111.517V15.3743H70.2168V15.1477Z" fill="#FACE0F"/>
<path d="M70.2168 14.9969H111.517V15.2236H70.2168V14.9969Z" fill="#FACE0F"/>
<path d="M70.2168 14.8453H111.517V15.072H70.2168V14.8453Z" fill="#FACE0F"/>
<path d="M70.2168 14.6934H111.517V14.92H70.2168V14.6934Z" fill="#FACE0F"/>
<path d="M70.2168 14.6184H111.517V14.8451H70.2168V14.6184Z" fill="#FACE0F"/>
<path d="M70.2168 14.4673H111.517V14.694H70.2168V14.4673Z" fill="#FACD11"/>
<path d="M70.2168 14.3162H111.517V14.5428H70.2168V14.3162Z" fill="#FACD11"/>
<path d="M70.2168 14.165H111.517V14.3917H70.2168V14.165Z" fill="#FACD11"/>
<path d="M70.2168 14.0896H111.517V14.3163H70.2168V14.0896Z" fill="#FACD11"/>
<path d="M70.2168 13.9382H111.517V14.1648H70.2168V13.9382Z" fill="#FACD11"/>
<path d="M70.2168 13.7869H111.517V14.0136H70.2168V13.7869Z" fill="#FACD11"/>
<path d="M70.2168 13.6359H111.517V13.8625H70.2168V13.6359Z" fill="#FACD11"/>
<path d="M70.2168 13.5605H111.517V13.7871H70.2168V13.5605Z" fill="#FACD11"/>
<path d="M70.2168 13.4093H111.517V13.636H70.2168V13.4093Z" fill="#FACD11"/>
<path d="M70.2168 13.2587H111.517V13.4853H70.2168V13.2587Z" fill="#FACD11"/>
<path d="M70.2168 13.1825H111.517V13.4091H70.2168V13.1825Z" fill="#FACD11"/>
<path d="M70.2168 13.0312H111.517V13.2579H70.2168V13.0312Z" fill="#FACD11"/>
<path d="M70.2168 12.8806H111.517V13.1072H70.2168V12.8806Z" fill="#FACD11"/>
<path d="M70.2168 12.7294H111.517V12.9561H70.2168V12.7294Z" fill="#FACD11"/>
<path d="M70.2168 12.654H111.517V12.8807H70.2168V12.654Z" fill="#FACD11"/>
<path d="M70.2168 12.503H111.517V12.7296H70.2168V12.503Z" fill="#FACD11"/>
<path d="M70.2168 12.3518H111.517V12.5785H70.2168V12.3518Z" fill="#FACD11"/>
<path d="M70.2168 12.2011H111.517V12.4278H70.2168V12.2011Z" fill="#F9CB13"/>
<path d="M70.2168 12.1249H111.517V12.3515H70.2168V12.1249Z" fill="#F9CB13"/>
<path d="M70.2168 11.9741H111.517V12.2008H70.2168V11.9741Z" fill="#F9CB13"/>
<path d="M70.2168 11.823H111.517V12.0497H70.2168V11.823Z" fill="#F9CB13"/>
<path d="M70.2168 11.672H111.517V11.8986H70.2168V11.672Z" fill="#F9CB13"/>
<path d="M70.2168 11.5965H111.517V11.8232H70.2168V11.5965Z" fill="#F9CB13"/>
<path d="M70.2168 11.4449H111.517V11.6716H70.2168V11.4449Z" fill="#F9CB13"/>
<path d="M70.2168 11.2943H111.517V11.5209H70.2168V11.2943Z" fill="#F9CB13"/>
<path d="M70.2168 11.1435H111.517V11.3702H70.2168V11.1435Z" fill="#F9CB13"/>
<path d="M70.2168 11.0673H111.517V11.294H70.2168V11.0673Z" fill="#F9C814"/>
<path d="M70.2168 10.9167H111.517V11.1433H70.2168V10.9167Z" fill="#F9C814"/>
<path d="M70.2168 10.7655H111.517V10.9922H70.2168V10.7655Z" fill="#F9C814"/>
<path d="M70.2168 10.614H111.517V10.8406H70.2168V10.614Z" fill="#F9C814"/>
<path d="M70.2168 10.4628H111.517V10.6895H70.2168V10.4628Z" fill="#F9C814"/>
</g>
<mask id="mask1_676_682" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="70" y="3" width="42" height="7">
<path d="M76.0185 3.66238C75.8658 3.66238 75.7894 3.73801 75.6368 3.73801C74.8734 4.04022 74.1099 4.26686 73.4229 4.56908C73.3465 4.56908 73.2702 4.64459 73.1939 4.72015C73.1939 4.7957 73.1939 4.87131 73.1939 4.87131C73.7283 5.09797 74.2627 5.17349 74.797 5.40015C75.1024 5.4757 75.1787 5.77793 75.2551 6.08015H75.3314C75.4077 6.38236 75.3314 6.68454 75.3314 6.98675C75.3314 7.89339 75.3314 8.80002 75.3314 9.70666C73.6519 9.70666 71.9724 9.70666 70.293 9.70666C70.293 9.78221 70.293 9.85782 70.4457 9.85782C71.1327 9.85782 71.8198 9.85782 72.5068 9.85782C73.6519 9.85782 74.7207 9.85782 75.8658 9.85782C78.5377 9.85782 81.2859 9.85782 83.9578 9.85782C84.1105 9.85782 84.1868 9.85782 84.3395 9.85782C89.2253 9.85782 94.111 9.85782 99.0731 9.85782C100.6 9.85782 102.127 9.85782 103.73 9.85782C106.249 9.85782 108.845 9.85782 111.364 9.85782C111.44 9.85782 111.44 9.78221 111.44 9.70666C110.677 9.70666 109.913 9.70666 109.226 9.70666C108.31 9.70666 107.394 9.70666 106.402 9.70666C106.402 9.48 106.402 9.25341 106.402 9.02675C106.402 8.12011 106.402 7.21339 106.402 6.30675C106.402 6.2312 106.402 6.1557 106.478 6.08015C106.631 5.85349 106.707 5.55125 106.936 5.40015C107.47 5.17349 108.005 5.09797 108.539 4.87131C108.539 4.7202 108.539 4.64463 108.463 4.56908C107.776 4.34242 107.089 4.0402 106.402 3.81354C106.173 3.73799 105.944 3.6624 105.715 3.58685H76.0185V3.66238ZM98.615 7.51568C98.3097 7.13791 98.2333 6.53345 98.615 6.15568C98.8441 5.85347 99.3021 5.70236 99.6838 5.77791C99.9892 5.85347 100.295 6.08009 100.371 6.30675C100.6 6.83563 100.447 7.44007 99.9128 7.74229C99.7601 7.81784 99.6075 7.89345 99.3784 7.89345C99.1494 7.81789 98.8441 7.74234 98.615 7.51568ZM82.0493 7.81782C81.8203 7.74227 81.5149 7.59118 81.3622 7.36452C81.1332 7.0623 81.1332 6.68452 81.2859 6.30675C81.4386 6.00454 81.744 5.77793 82.0493 5.70238C82.66 5.55127 83.4234 6.08016 83.3471 6.76015C83.3471 7.36457 82.8127 7.81782 82.2783 7.81782C82.202 7.89337 82.1257 7.81782 82.0493 7.81782Z" fill="white"/>
</mask>
<g mask="url(#mask1_676_682)">
<path d="M94.1316 13.0416C94.1316 14.8549 92.6812 16.2904 90.8491 16.2904C89.0169 16.2904 87.5664 14.8549 87.5664 13.0416C87.5664 11.2283 89.0169 9.79286 90.8491 9.79286C92.6812 9.79286 94.1316 11.3039 94.1316 13.0416ZM93.979 13.0416C93.979 11.3039 92.6049 9.94393 90.8491 9.94393C89.0932 9.94393 87.7191 11.3039 87.7191 13.0416C87.7191 14.7793 89.0932 16.1393 90.8491 16.1393C92.6049 16.1393 93.979 14.7793 93.979 13.0416Z" fill="#EF9121"/>
<path d="M94.2358 13.0418C94.2358 14.9307 92.709 16.3662 90.8005 16.3662C88.892 16.3662 87.3652 14.8551 87.3652 13.0418C87.3652 11.2286 88.892 9.71747 90.8005 9.71747C92.709 9.71747 94.2358 11.2286 94.2358 13.0418ZM94.0831 13.0418C94.0831 11.3041 92.6327 9.86863 90.8768 9.86863C89.121 9.86863 87.6705 11.3041 87.6705 13.0418C87.6705 14.7796 89.121 16.2151 90.8768 16.2151C92.6327 16.2907 94.0831 14.8551 94.0831 13.0418Z" fill="#EF9121"/>
<path d="M94.3417 13.0415C94.3417 14.9303 92.7386 16.5169 90.8301 16.5169C88.9216 16.5169 87.3184 14.9303 87.3184 13.0415C87.3184 11.1527 88.9216 9.56606 90.8301 9.56606C92.7386 9.56606 94.3417 11.1527 94.3417 13.0415ZM94.1889 13.0415C94.1889 11.2282 92.6622 9.71713 90.8301 9.71713C88.9979 9.71713 87.4711 11.2282 87.4711 13.0415C87.4711 14.8548 88.9979 16.3659 90.8301 16.3659C92.6622 16.3659 94.1889 14.9303 94.1889 13.0415Z" fill="#EF9121"/>
<path d="M94.4455 13.0421C94.4455 15.0065 92.8424 16.5931 90.8576 16.5931C88.8727 16.5931 87.2695 15.0065 87.2695 13.0421C87.2695 11.0777 88.8727 9.4911 90.8576 9.4911C92.8424 9.4911 94.4455 11.0777 94.4455 13.0421ZM94.2929 13.0421C94.2929 11.1532 92.7661 9.64217 90.8576 9.64217C88.9491 9.64217 87.4223 11.1532 87.4223 13.0421C87.4223 14.9309 88.9491 16.442 90.8576 16.442C92.7661 16.5175 94.2929 14.9309 94.2929 13.0421Z" fill="#EF9121"/>
<path d="M94.5496 13.0417C94.5496 15.0816 92.8701 16.7438 90.8089 16.7438C88.7478 16.7438 87.0684 15.0816 87.0684 13.0417C87.0684 11.0018 88.7478 9.33956 90.8089 9.33956C92.8701 9.41511 94.5496 11.0018 94.5496 13.0417ZM94.397 13.0417C94.397 11.0773 92.7938 9.49072 90.8089 9.49072C88.8241 9.49072 87.221 11.0773 87.221 13.0417C87.221 15.0061 88.8241 16.5928 90.8089 16.5928C92.7938 16.5928 94.397 15.0061 94.397 13.0417Z" fill="#EF9121"/>
<path d="M94.6555 13.0415C94.6555 15.157 92.976 16.8192 90.8385 16.8192C88.701 16.8192 87.0215 15.157 87.0215 13.0415C87.0215 10.926 88.701 9.26387 90.8385 9.26387C92.976 9.26387 94.6555 11.0016 94.6555 13.0415ZM94.5028 13.0415C94.5028 11.0772 92.8233 9.41503 90.8385 9.41503C88.7773 9.41503 87.1742 11.0772 87.1742 13.0415C87.1742 15.0059 88.8536 16.6681 90.8385 16.6681C92.8997 16.6681 94.5028 15.0815 94.5028 13.0415Z" fill="#EF9121"/>
<path d="M94.7597 13.0419C94.7597 15.1574 93.0038 16.9708 90.7899 16.9708C88.5761 16.9708 86.8203 15.233 86.8203 13.0419C86.8203 10.8509 88.5761 9.11319 90.7899 9.11319C93.0038 9.11319 94.7597 10.9264 94.7597 13.0419ZM94.6069 13.0419C94.6069 11.002 92.9275 9.33979 90.7899 9.33979C88.6524 9.33979 86.973 11.002 86.973 13.0419C86.973 15.0819 88.6524 16.7441 90.7899 16.7441C92.9275 16.7441 94.6069 15.1574 94.6069 13.0419Z" fill="#EF9121"/>
<path d="M94.8654 13.0417C94.8654 15.2328 93.0332 17.0461 90.8194 17.0461C88.6055 17.0461 86.7734 15.2328 86.7734 13.0417C86.7734 10.8507 88.6055 9.03747 90.8194 9.03747C93.1096 9.03747 94.8654 10.8507 94.8654 13.0417ZM94.7127 13.0417C94.7127 10.9262 92.9569 9.18854 90.8194 9.18854C88.6819 9.18854 86.9261 10.9262 86.9261 13.0417C86.9261 15.1572 88.6819 16.8949 90.8194 16.8949C92.9569 16.8949 94.7127 15.1572 94.7127 13.0417Z" fill="#EF9121"/>
<path d="M94.9695 13.0416C94.9695 15.3082 93.1373 17.1215 90.7708 17.1215C88.4806 17.1215 86.6484 15.3082 86.6484 13.0416C86.6484 10.775 88.4806 8.96171 90.7708 8.96171C93.1373 8.96171 94.9695 10.775 94.9695 13.0416ZM94.8169 13.0416C94.8169 10.8506 93.061 9.11287 90.8471 9.11287C88.6333 9.11287 86.8775 10.8506 86.8775 13.0416C86.8775 15.2327 88.6333 16.9705 90.8471 16.9705C93.061 17.046 94.8169 15.2327 94.8169 13.0416Z" fill="#EF9121"/>
<path d="M95.0754 13.0421C95.0754 15.3842 93.1669 17.273 90.8004 17.273C88.4339 17.273 86.5254 15.3842 86.5254 13.0421C86.5254 10.6999 88.4339 8.81109 90.8004 8.81109C93.1669 8.88665 95.0754 10.7755 95.0754 13.0421ZM94.9228 13.0421C94.9228 10.7755 93.0906 8.96216 90.8004 8.96216C88.5102 8.96216 86.678 10.7755 86.678 13.0421C86.678 15.3087 88.5102 17.122 90.8004 17.122C93.0906 17.122 94.9228 15.3087 94.9228 13.0421Z" fill="#EF9121"/>
<path d="M95.1812 13.0422C95.1812 15.4599 93.1964 17.3488 90.8298 17.3488C88.387 17.3488 86.4785 15.3844 86.4785 13.0422C86.4785 10.7001 88.4633 8.73571 90.8298 8.73571C93.2727 8.73571 95.1812 10.7001 95.1812 13.0422ZM95.0285 13.0422C95.0285 10.7756 93.12 8.88678 90.8298 8.88678C88.5397 8.88678 86.6312 10.7756 86.6312 13.0422C86.6312 15.3088 88.5397 17.1977 90.8298 17.1977C93.1964 17.1977 95.0285 15.3844 95.0285 13.0422Z" fill="#EF9121"/>
<path d="M95.3617 13.0419C95.3617 15.4596 93.3768 17.4995 90.8576 17.4995C88.4147 17.4995 86.3535 15.5351 86.3535 13.0419C86.3535 10.5486 88.3384 8.5842 90.8576 8.5842C93.3005 8.65975 95.3617 10.6242 95.3617 13.0419ZM95.1326 13.0419C95.1326 10.6997 93.2241 8.8109 90.7813 8.8109C88.4147 8.8109 86.4298 10.6997 86.4298 13.0419C86.4298 15.384 88.3384 17.2728 90.7813 17.2728C93.2241 17.3484 95.1326 15.4596 95.1326 13.0419Z" fill="#EF9121"/>
<path d="M95.4655 13.0413C95.4655 15.5345 93.4043 17.5745 90.8851 17.5745C88.3659 17.5745 86.3047 15.5345 86.3047 13.0413C86.3047 10.548 88.3659 8.50805 90.8851 8.50805C93.4043 8.50805 95.4655 10.548 95.4655 13.0413ZM95.2364 13.0413C95.2364 10.6235 93.2516 8.65921 90.8088 8.65921C88.3659 8.65921 86.381 10.6235 86.381 13.0413C86.381 15.459 88.3659 17.4234 90.8088 17.4234C93.2516 17.4234 95.2364 15.459 95.2364 13.0413Z" fill="#EF9121"/>
<path d="M95.5716 13.0419C95.5716 15.6107 93.4342 17.6507 90.8386 17.6507C88.243 17.6507 86.1055 15.6107 86.1055 13.0419C86.1055 10.4731 88.243 8.43318 90.8386 8.43318C93.4342 8.43318 95.5716 10.5487 95.5716 13.0419ZM95.3427 13.0419C95.3427 10.5487 93.2815 8.58425 90.8386 8.58425C88.3194 8.58425 86.3345 10.6242 86.3345 13.0419C86.3345 15.4596 88.3957 17.4996 90.8386 17.4996C93.3578 17.5751 95.3427 15.5352 95.3427 13.0419Z" fill="#EF9121"/>
<path d="M95.6754 13.0416C95.6754 15.686 93.538 17.8015 90.8661 17.8015C88.1942 17.8015 86.0566 15.686 86.0566 13.0416C86.0566 10.3973 88.1942 8.28183 90.8661 8.28183C93.4616 8.35738 95.6754 10.4728 95.6754 13.0416ZM95.5228 13.0416C95.5228 10.4728 93.4616 8.4329 90.8661 8.4329C88.2705 8.4329 86.2094 10.4728 86.2094 13.0416C86.2094 15.6105 88.2705 17.6504 90.8661 17.6504C93.3853 17.6504 95.5228 15.6105 95.5228 13.0416Z" fill="#EF9121"/>
<path d="M95.7813 13.0422C95.7813 15.6865 93.5674 17.8776 90.8955 17.8776C88.2236 17.8776 86.0098 15.6865 86.0098 13.0422C86.0098 10.3978 88.2236 8.20672 90.8955 8.20672C93.5674 8.20672 95.7813 10.3978 95.7813 13.0422ZM95.6286 13.0422C95.6286 10.4733 93.4911 8.35788 90.8955 8.35788C88.3 8.35788 86.1624 10.4733 86.1624 13.0422C86.1624 15.611 88.3 17.7265 90.8955 17.7265C93.4911 17.8021 95.6286 15.6865 95.6286 13.0422Z" fill="#EF9121"/>
<path d="M95.8855 13.0418C95.8855 15.7617 93.6717 18.0283 90.8471 18.0283C88.0989 18.0283 85.8086 15.8373 85.8086 13.0418C85.8086 10.3219 88.0225 8.0553 90.8471 8.0553C93.5953 8.13086 95.8855 10.3219 95.8855 13.0418ZM95.7328 13.0418C95.7328 10.3974 93.519 8.282 90.8471 8.282C88.1752 8.282 85.9613 10.3974 85.9613 13.0418C85.9613 15.6862 88.0989 17.8017 90.8471 17.8017C93.519 17.8773 95.7328 15.6862 95.7328 13.0418Z" fill="#EF9121"/>
<path d="M95.9913 13.042C95.9913 15.8374 93.7011 18.1041 90.8765 18.1041C88.052 18.1041 85.7617 15.8374 85.7617 13.042C85.7617 10.2465 88.052 7.97992 90.8765 7.97992C93.7011 7.97992 95.9913 10.2465 95.9913 13.042ZM95.8386 13.042C95.8386 10.322 93.6248 8.13099 90.8765 8.13099C88.1283 8.13099 85.9145 10.322 85.9145 13.042C85.9145 15.7619 88.1283 17.9529 90.8765 17.9529C93.5484 17.9529 95.8386 15.7619 95.8386 13.042Z" fill="#EF9121"/>
<path d="M96.0954 13.0418C96.0954 15.9128 93.7288 18.1794 90.8279 18.1794C87.927 18.1794 85.5605 15.8372 85.5605 13.0418C85.5605 10.2463 87.927 7.90419 90.8279 7.90419C93.7288 7.90419 96.0954 10.2463 96.0954 13.0418ZM95.9427 13.0418C95.9427 10.2463 93.6525 8.05526 90.8279 8.05526C88.0033 8.05526 85.7132 10.3218 85.7132 13.0418C85.7132 15.7617 88.0033 18.0283 90.8279 18.0283C93.6525 18.0283 95.9427 15.8372 95.9427 13.0418Z" fill="#EF9121"/>
<path d="M96.2013 13.0423C96.2013 15.9889 93.8347 18.331 90.8575 18.331C87.8802 18.331 85.5137 15.9889 85.5137 13.0423C85.5137 10.0957 87.8802 7.75354 90.8575 7.75354C93.7584 7.8291 96.2013 10.1713 96.2013 13.0423ZM96.0486 13.0423C96.0486 10.2468 93.7584 7.90471 90.8575 7.90471C88.0329 7.90471 85.6664 10.1713 85.6664 13.0423C85.6664 15.9133 87.9565 18.18 90.8575 18.18C93.682 18.18 96.0486 15.9133 96.0486 13.0423Z" fill="#EF9121"/>
<path d="M96.3052 13.0421C96.3052 15.9887 93.8622 18.4064 90.885 18.4064C87.9077 18.4064 85.4648 15.9887 85.4648 13.0421C85.4648 10.0955 87.9077 7.67782 90.885 7.67782C93.8622 7.67782 96.3052 10.0955 96.3052 13.0421ZM96.1524 13.0421C96.1524 10.1711 93.7859 7.82889 90.885 7.82889C87.984 7.82889 85.6176 10.1711 85.6176 13.0421C85.6176 15.9131 87.984 18.2553 90.885 18.2553C93.7859 18.2553 96.1524 15.9887 96.1524 13.0421Z" fill="#EF9121"/>
<path d="M96.4112 13.0421C96.4112 16.0642 93.892 18.5575 90.8384 18.5575C87.7848 18.5575 85.2656 16.0642 85.2656 13.0421C85.2656 10.0199 87.7848 7.52671 90.8384 7.52671C93.892 7.60227 96.4112 10.0199 96.4112 13.0421ZM96.2585 13.0421C96.2585 10.0955 93.8156 7.67778 90.8384 7.67778C87.8611 7.67778 85.4183 10.0955 85.4183 13.0421C85.4183 15.9886 87.8611 18.4063 90.8384 18.4063C93.8156 18.4063 96.2585 15.9886 96.2585 13.0421Z" fill="#EF9121"/>
<path d="M96.5151 13.0423C96.5151 16.14 93.9959 18.6333 90.866 18.6333C87.736 18.6333 85.2168 16.14 85.2168 13.0423C85.2168 9.94464 87.736 7.45135 90.866 7.45135C93.9959 7.45135 96.5151 9.94464 96.5151 13.0423ZM96.3625 13.0423C96.3625 10.0202 93.9196 7.60252 90.866 7.60252C87.8124 7.60252 85.3695 10.0202 85.3695 13.0423C85.3695 16.0645 87.8124 18.4822 90.866 18.4822C93.9196 18.4822 96.3625 16.0645 96.3625 13.0423Z" fill="#EF9121"/>
<path d="M96.6212 13.042C96.6212 16.2152 94.0257 18.784 90.8194 18.784C87.6131 18.784 85.0176 16.2152 85.0176 13.042C85.0176 9.86871 87.6131 7.29991 90.8194 7.29991C94.0257 7.37546 96.6212 9.94426 96.6212 13.042ZM96.4686 13.042C96.4686 9.94426 93.9493 7.52661 90.8194 7.52661C87.6895 7.52661 85.1702 10.0198 85.1702 13.042C85.1702 16.0641 87.6895 18.5574 90.8194 18.5574C93.9493 18.6329 96.4686 16.1396 96.4686 13.042Z" fill="#EF9121"/>
<path d="M96.725 13.0412C96.725 16.2145 94.0532 18.8589 90.8469 18.8589C87.6406 18.8589 84.9688 16.29 84.9688 13.0412C84.9688 9.79245 87.6406 7.22367 90.8469 7.22367C94.0532 7.22367 96.725 9.868 96.725 13.0412ZM96.5724 13.0412C96.5724 9.94356 93.9768 7.37474 90.8469 7.37474C87.7169 7.37474 85.1214 9.868 85.1214 13.0412C85.1214 16.2145 87.7169 18.7078 90.8469 18.7078C93.9768 18.7078 96.5724 16.2145 96.5724 13.0412Z" fill="#EF9121"/>
<path d="M96.8313 13.0419C96.8313 16.2907 94.1594 18.9352 90.8004 18.9352C87.5178 18.9352 84.7695 16.2907 84.7695 13.0419C84.7695 9.79315 87.4414 7.14883 90.8004 7.14883C94.1594 7.14883 96.8313 9.79315 96.8313 13.0419ZM96.6785 13.0419C96.6785 9.8687 94.083 7.2999 90.8767 7.2999C87.6704 7.2999 85.0749 9.8687 85.0749 13.0419C85.0749 16.2152 87.6704 18.784 90.8767 18.784C94.083 18.8595 96.6785 16.2907 96.6785 13.0419Z" fill="#EF9121"/>
<path d="M96.9351 13.0415C96.9351 16.3659 94.1868 19.0858 90.8279 19.0858C87.4689 19.0858 84.7207 16.3659 84.7207 13.0415C84.7207 9.71716 87.4689 6.99724 90.8279 6.99724C94.1868 7.07279 96.9351 9.71716 96.9351 13.0415ZM96.7823 13.0415C96.7823 9.79271 94.1105 7.1484 90.8279 7.1484C87.5453 7.1484 84.8733 9.79271 84.8733 13.0415C84.8733 16.2903 87.5453 18.9347 90.8279 18.9347C94.1105 18.9347 96.7823 16.2903 96.7823 13.0415Z" fill="#EF9121"/>
<path d="M97.0408 13.0418C97.0408 16.4417 94.2926 19.1616 90.8573 19.1616C87.422 19.1616 84.6738 16.4417 84.6738 13.0418C84.6738 9.64191 87.422 6.922 90.8573 6.922C94.2926 6.922 97.0408 9.71746 97.0408 13.0418ZM96.8882 13.0418C96.8882 9.71746 94.2163 7.07307 90.8573 7.07307C87.4984 7.07307 84.8265 9.71746 84.8265 13.0418C84.8265 16.3662 87.4984 19.0106 90.8573 19.0106C94.2163 19.0106 96.8882 16.3662 96.8882 13.0418Z" fill="#EF9121"/>
<path d="M97.1451 13.0418C97.1451 16.5173 94.3205 19.3128 90.8089 19.3128C87.2973 19.3128 84.4727 16.5173 84.4727 13.0418C84.4727 9.56634 87.2973 6.77092 90.8089 6.77092C94.3205 6.84648 97.1451 9.6419 97.1451 13.0418ZM96.9924 13.0418C96.9924 9.71745 94.2442 6.99753 90.8089 6.99753C87.3736 6.99753 84.6253 9.71745 84.6253 13.0418C84.6253 16.3662 87.3736 19.0861 90.8089 19.0861C94.2442 19.1616 96.9924 16.4417 96.9924 13.0418Z" fill="#EF9121"/>
<path d="M97.2508 13.042C97.2508 16.5175 94.35 19.3885 90.8383 19.3885C87.2504 19.3885 84.4258 16.5175 84.4258 13.042C84.4258 9.56658 87.3267 6.69553 90.8383 6.69553C94.4263 6.69553 97.2508 9.56658 97.2508 13.042ZM97.0982 13.042C97.0982 9.64214 94.2736 6.8467 90.8383 6.8467C87.4031 6.8467 84.5784 9.64214 84.5784 13.042C84.5784 16.4419 87.4031 19.2375 90.8383 19.2375C94.2736 19.2375 97.0982 16.5175 97.0982 13.042Z" fill="#EF9121"/>
<path d="M97.3551 13.0419C97.3551 16.5929 94.4541 19.464 90.7898 19.464C87.2018 19.464 84.2246 16.5929 84.2246 13.0419C84.2246 9.4909 87.1255 6.61987 90.7898 6.61987C94.4541 6.61987 97.3551 9.4909 97.3551 13.0419ZM97.2024 13.0419C97.2024 9.56646 94.3778 6.77104 90.7898 6.77104C87.2782 6.77104 84.4537 9.56646 84.4537 13.0419C84.4537 16.5174 87.2782 19.3129 90.7898 19.3129C94.3778 19.3884 97.2024 16.5174 97.2024 13.0419Z" fill="#EF9121"/>
<path d="M97.4609 13.0418C97.4609 16.6684 94.4836 19.6151 90.8193 19.6151C87.155 19.6151 84.1777 16.6684 84.1777 13.0418C84.1777 9.41528 87.155 6.46873 90.8193 6.46873C94.4836 6.54429 97.4609 9.41528 97.4609 13.0418ZM97.3082 13.0418C97.3082 9.49084 94.4072 6.61981 90.8193 6.61981C87.2313 6.61981 84.3304 9.49084 84.3304 13.0418C84.3304 16.5929 87.2313 19.4639 90.8193 19.4639C94.4072 19.4639 97.3082 16.5929 97.3082 13.0418Z" fill="#EF9121"/>
<path d="M97.5647 13.0421C97.5647 16.7442 94.5111 19.6908 90.8468 19.6908C87.1061 19.6908 84.1289 16.7442 84.1289 13.0421C84.1289 9.33997 87.1824 6.39344 90.8468 6.39344C94.5874 6.39344 97.5647 9.41552 97.5647 13.0421ZM97.4121 13.0421C97.4121 9.41552 94.4347 6.54451 90.8468 6.54451C87.1824 6.54451 84.2815 9.49108 84.2815 13.0421C84.2815 16.5931 87.2588 19.5397 90.8468 19.5397C94.5111 19.6152 97.4121 16.6687 97.4121 13.0421Z" fill="#EF9121"/>
<path d="M97.6689 13.0422C97.6689 16.8198 94.6153 19.842 90.7983 19.842C86.9813 19.842 83.9277 16.8198 83.9277 13.0422C83.9277 9.2645 86.9813 6.24236 90.7983 6.24236C94.6153 6.31791 97.6689 9.34005 97.6689 13.0422ZM97.5163 13.0422C97.5163 9.4156 94.539 6.46906 90.7983 6.46906C87.134 6.46906 84.0805 9.4156 84.0805 13.0422C84.0805 16.6687 87.0577 19.6154 90.7983 19.6154C94.539 19.6909 97.5163 16.7443 97.5163 13.0422Z" fill="#EF9121"/>
<path d="M97.7747 13.0416C97.7747 16.8192 94.6448 19.9169 90.8278 19.9169C87.0108 19.9169 83.8809 16.8192 83.8809 13.0416C83.8809 9.26388 87.0108 6.16621 90.8278 6.16621C94.6448 6.16621 97.7747 9.26388 97.7747 13.0416ZM97.622 13.0416C97.622 9.33944 94.5684 6.31728 90.8278 6.31728C87.0871 6.31728 84.0335 9.33944 84.0335 13.0416C84.0335 16.7437 87.0871 19.7658 90.8278 19.7658C94.5684 19.7658 97.622 16.7437 97.622 13.0416Z" fill="#EF9121"/>
<path d="M97.879 13.0417C97.879 16.8949 94.749 19.9927 90.7793 19.9927C86.886 19.9927 83.6797 16.8949 83.6797 13.0417C83.6797 9.18848 86.886 6.09082 90.7793 6.09082C94.749 6.09082 97.879 9.18848 97.879 13.0417ZM97.7262 13.0417C97.7262 9.26403 94.5963 6.24189 90.7793 6.24189C86.9623 6.24189 83.8324 9.26403 83.8324 13.0417C83.8324 16.8194 86.9623 19.8415 90.7793 19.8415C94.6727 19.9171 97.7262 16.8194 97.7262 13.0417Z" fill="#EF9121"/>
<path d="M98.0609 13.0413C98.0609 16.9701 94.8546 20.1434 90.8849 20.1434C86.9153 20.1434 83.709 16.9701 83.709 13.0413C83.709 9.11255 86.9153 5.93929 90.8849 5.93929C94.7783 6.01484 98.0609 9.18811 98.0609 13.0413ZM97.8319 13.0413C97.8319 9.18811 94.702 6.09045 90.8086 6.09045C86.9153 6.09045 83.7854 9.18811 83.7854 13.0413C83.7854 16.8946 86.9153 19.9923 90.8086 19.9923C94.702 19.9923 97.8319 16.8946 97.8319 13.0413Z" fill="#EF9121"/>
<path d="M98.167 13.0416C98.167 17.0459 94.8844 20.2192 90.8384 20.2192C86.7924 20.2192 83.5098 16.9704 83.5098 13.0416C83.5098 9.11282 86.7924 5.86402 90.8384 5.86402C94.8844 5.86402 98.167 9.11282 98.167 13.0416ZM97.938 13.0416C97.938 9.18837 94.7317 6.01518 90.8384 6.01518C86.945 6.01518 83.7387 9.18837 83.7387 13.0416C83.7387 16.8948 86.945 20.0681 90.8384 20.0681C94.7317 20.0681 97.938 16.9704 97.938 13.0416Z" fill="#EF9121"/>
<path d="M98.2708 13.0416C98.2708 17.0459 94.9882 20.3703 90.8659 20.3703C86.7435 20.3703 83.4609 17.1214 83.4609 13.0416C83.4609 8.96168 86.7435 5.71292 90.8659 5.71292C94.9882 5.71292 98.2708 9.03723 98.2708 13.0416ZM98.0418 13.0416C98.0418 9.11278 94.8356 5.86399 90.7895 5.86399C86.7435 5.86399 83.5373 9.03723 83.5373 13.0416C83.5373 17.0459 86.7435 20.2191 90.7895 20.2191C94.8356 20.2191 98.0418 17.0459 98.0418 13.0416Z" fill="#EF9121"/>
<path d="M98.3767 13.0418C98.3767 17.1217 95.0178 20.4461 90.8954 20.4461C86.7731 20.4461 83.4141 17.1217 83.4141 13.0418C83.4141 8.96195 86.7731 5.63765 90.8954 5.63765C95.0178 5.63765 98.3767 8.96195 98.3767 13.0418ZM98.224 13.0418C98.224 9.0375 94.9414 5.78872 90.8954 5.78872C86.8494 5.78872 83.5668 9.0375 83.5668 13.0418C83.5668 17.0462 86.8494 20.2949 90.8954 20.2949C94.8651 20.2949 98.224 17.0462 98.224 13.0418Z" fill="#EF9121"/>
<path d="M98.4809 13.0423C98.4809 17.1978 95.0456 20.5977 90.8469 20.5977C86.6482 20.5977 83.2129 17.1978 83.2129 13.0423C83.2129 8.8869 86.6482 5.487 90.8469 5.487C95.0456 5.487 98.4809 8.8869 98.4809 13.0423ZM98.3281 13.0423C98.3281 8.96246 94.9692 5.7137 90.8469 5.7137C86.7245 5.7137 83.3655 9.03801 83.3655 13.0423C83.3655 17.0467 86.7245 20.3711 90.8469 20.3711C94.9692 20.3711 98.3281 17.1222 98.3281 13.0423Z" fill="#EF9121"/>
<path d="M98.5866 13.0421C98.5866 17.2731 95.1514 20.673 90.8763 20.673C86.6013 20.673 83.166 17.2731 83.166 13.0421C83.166 8.81113 86.6013 5.41125 90.8763 5.41125C95.075 5.41125 98.5866 8.88669 98.5866 13.0421ZM98.434 13.0421C98.434 8.88669 95.075 5.56232 90.8763 5.56232C86.6776 5.56232 83.3187 8.88669 83.3187 13.0421C83.3187 17.1976 86.6776 20.5219 90.8763 20.5219C94.9987 20.5219 98.434 17.1976 98.434 13.0421Z" fill="#EF9121"/>
<path d="M98.6908 13.0419C98.6908 17.3484 95.1793 20.7484 90.8279 20.7484C86.4765 20.7484 82.9648 17.2729 82.9648 13.0419C82.9648 8.81088 86.4765 5.33546 90.8279 5.33546C95.1793 5.33546 98.6908 8.81088 98.6908 13.0419ZM98.5382 13.0419C98.5382 8.88644 95.1029 5.48653 90.9042 5.48653C86.7055 5.48653 83.2702 8.88644 83.2702 13.0419C83.2702 17.1973 86.7055 20.5972 90.9042 20.5972C95.1029 20.5972 98.5382 17.2729 98.5382 13.0419Z" fill="#EF9121"/>
<path d="M98.7966 13.0419C98.7966 17.3485 95.2087 20.8995 90.8573 20.8995C86.506 20.8995 82.918 17.424 82.918 13.0419C82.918 8.65983 86.506 5.18435 90.8573 5.18435C95.2087 5.25991 98.7966 8.73538 98.7966 13.0419ZM98.644 13.0419C98.644 8.81094 95.1324 5.33552 90.8573 5.33552C86.5823 5.33552 83.0706 8.81094 83.0706 13.0419C83.0706 17.2729 86.5823 20.7484 90.8573 20.7484C95.1324 20.7484 98.644 17.3485 98.644 13.0419Z" fill="#EF9121"/>
<path d="M98.9005 13.0417C98.9005 17.4238 95.3125 20.9749 90.8848 20.9749C86.4571 20.9749 82.8691 17.4238 82.8691 13.0417C82.8691 8.65964 86.4571 5.10863 90.8848 5.10863C95.3125 5.10863 98.9005 8.65964 98.9005 13.0417ZM98.7478 13.0417C98.7478 8.7352 95.2362 5.25979 90.8848 5.25979C86.5335 5.25979 83.0218 8.7352 83.0218 13.0417C83.0218 17.3483 86.5335 20.8238 90.8848 20.8238C95.1599 20.8238 98.7478 17.3483 98.7478 13.0417Z" fill="#EF9121"/>
<path d="M99.0047 13.0414C99.0047 17.4991 95.3403 21.1257 90.8363 21.1257C86.3322 21.1257 82.668 17.4991 82.668 13.0414C82.668 8.58378 86.3322 4.95725 90.8363 4.95725C95.3403 5.0328 99.0047 8.65933 99.0047 13.0414ZM98.852 13.0414C98.852 8.65933 95.264 5.18385 90.8363 5.18385C86.4086 5.18385 82.8206 8.73488 82.8206 13.0414C82.8206 17.348 86.4086 20.899 90.8363 20.899C95.264 20.9746 98.852 17.4235 98.852 13.0414Z" fill="#EF9121"/>
<path d="M99.1105 13.0415C99.1105 17.5748 95.4461 21.2014 90.8657 21.2014C86.2854 21.2014 82.6211 17.5748 82.6211 13.0415C82.6211 8.50834 86.2854 4.88183 90.8657 4.88183C95.4461 4.88183 99.1105 8.5839 99.1105 13.0415ZM98.9578 13.0415C98.9578 8.65945 95.2935 5.0329 90.8657 5.0329C86.438 5.0329 82.7737 8.5839 82.7737 13.0415C82.7737 17.4992 86.438 21.0502 90.8657 21.0502C95.2935 21.0502 98.9578 17.4992 98.9578 13.0415Z" fill="#EF9121"/>
<path d="M99.2147 13.0414C99.2147 17.5746 95.474 21.2767 90.8173 21.2767C86.1606 21.2767 82.4199 17.5746 82.4199 13.0414C82.4199 8.50815 86.1606 4.80601 90.8173 4.80601C95.474 4.80601 99.2147 8.50815 99.2147 13.0414ZM99.062 13.0414C99.062 8.5837 95.3977 4.95718 90.8173 4.95718C86.2369 4.95718 82.5727 8.5837 82.5727 13.0414C82.5727 17.499 86.2369 21.1256 90.8173 21.1256C95.3977 21.1256 99.062 17.5746 99.062 13.0414Z" fill="#EF9121"/>
<path d="M99.3205 13.0414C99.3205 17.6502 95.5035 21.4279 90.8468 21.4279C86.19 21.4279 82.373 17.6502 82.373 13.0414C82.373 8.43268 86.19 4.65503 90.8468 4.65503C95.5035 4.73058 99.3205 8.43268 99.3205 13.0414ZM99.1678 13.0414C99.1678 8.50824 95.4271 4.8061 90.8468 4.8061C86.2664 4.8061 82.5257 8.50824 82.5257 13.0414C82.5257 17.5746 86.2664 21.2768 90.8468 21.2768C95.4271 21.2768 99.1678 17.5746 99.1678 13.0414Z" fill="#EF9121"/>
<path d="M99.4248 13.0416C99.4248 17.7259 95.6077 21.5036 90.7983 21.5036C86.0652 21.5036 82.1719 17.7259 82.1719 13.0416C82.1719 8.35728 85.9889 4.57964 90.7983 4.57964C95.6077 4.57964 99.4248 8.35728 99.4248 13.0416ZM99.272 13.0416C99.272 8.43283 95.5314 4.73071 90.8746 4.73071C86.2179 4.73071 82.4773 8.43283 82.4773 13.0416C82.4773 17.6504 86.2179 21.3525 90.8746 21.3525C95.5314 21.428 99.272 17.6504 99.272 13.0416Z" fill="#EF9121"/>
<path d="M99.5305 13.0417C99.5305 17.8015 95.6372 21.6548 90.8278 21.6548C86.0184 21.6548 82.125 17.8015 82.125 13.0417C82.125 8.28181 86.0184 4.42857 90.8278 4.42857C95.6372 4.50412 99.5305 8.35736 99.5305 13.0417ZM99.3778 13.0417C99.3778 8.35736 95.5608 4.65526 90.8278 4.65526C86.0947 4.65526 82.2777 8.43292 82.2777 13.0417C82.2777 17.6504 86.0947 21.4281 90.8278 21.4281C95.5608 21.5036 99.3778 17.726 99.3778 13.0417Z" fill="#EF9121"/>
<path d="M99.6343 13.0419C99.6343 17.8773 95.6647 21.7306 90.8553 21.7306C85.9695 21.7306 82.0762 17.8018 82.0762 13.0419C82.0762 8.28205 86.0458 4.35327 90.8553 4.35327C95.741 4.35327 99.6343 8.28205 99.6343 13.0419ZM99.4817 13.0419C99.4817 8.3576 95.5883 4.50443 90.8553 4.50443C86.0458 4.50443 82.2288 8.3576 82.2288 13.0419C82.2288 17.7262 86.1222 21.5795 90.8553 21.5795C95.5883 21.5795 99.4817 17.8018 99.4817 13.0419Z" fill="#EF9121"/>
<path d="M99.7385 13.0422C99.7385 17.8776 95.7689 21.8063 90.8068 21.8063C85.8447 21.8063 81.875 17.8776 81.875 13.0422C81.875 8.20674 85.8447 4.27798 90.8068 4.27798C95.7689 4.27798 99.7385 8.20674 99.7385 13.0422ZM99.5859 13.0422C99.5859 8.28229 95.6926 4.42904 90.8068 4.42904C85.9974 4.42904 82.0277 8.28229 82.0277 13.0422C82.0277 17.802 85.9211 21.6553 90.8068 21.6553C95.6926 21.7308 99.5859 17.8776 99.5859 13.0422Z" fill="#EF9121"/>
<path d="M99.8443 13.0421C99.8443 17.9531 95.7984 21.9575 90.8363 21.9575C85.8742 21.9575 81.8281 17.9531 81.8281 13.0421C81.8281 8.13117 85.8742 4.12689 90.8363 4.12689C95.7984 4.20245 99.8443 8.13117 99.8443 13.0421ZM99.6917 13.0421C99.6917 8.20673 95.722 4.27796 90.8363 4.27796C85.9505 4.27796 81.9809 8.20673 81.9809 13.0421C81.9809 17.8776 85.9505 21.8063 90.8363 21.8063C95.722 21.8063 99.6917 17.8776 99.6917 13.0421Z" fill="#EF9121"/>
<path d="M99.9505 13.0415C99.9505 18.0281 95.8281 22.0324 90.7897 22.0324C85.7513 22.0324 81.6289 18.0281 81.6289 13.0415C81.6289 8.05501 85.7513 4.05066 90.7897 4.05066C95.9045 4.05066 99.9505 8.13056 99.9505 13.0415ZM99.7977 13.0415C99.7977 8.13056 95.7518 4.20182 90.866 4.20182C85.9039 4.20182 81.9342 8.13056 81.9342 13.0415C81.9342 17.9525 85.9803 21.8813 90.866 21.8813C95.8281 21.9569 99.7977 17.9525 99.7977 13.0415Z" fill="#EF9121"/>
<path d="M100.054 13.0416C100.054 18.1037 95.932 22.1835 90.8173 22.1835C85.7025 22.1835 81.5801 18.1037 81.5801 13.0416C81.5801 7.9795 85.7025 3.89964 90.8173 3.89964C95.932 3.97519 100.054 8.05506 100.054 13.0416ZM99.9016 13.0416C99.9016 8.13061 95.8557 4.0507 90.8173 4.0507C85.7788 4.0507 81.7328 8.05506 81.7328 13.0416C81.7328 18.0281 85.7788 22.0325 90.8173 22.0325C95.8557 22.0325 99.9016 18.0281 99.9016 13.0416Z" fill="#EF9121"/>
<path d="M100.16 13.0418C100.16 18.1038 95.9615 22.2593 90.8467 22.2593C85.732 22.2593 81.5332 18.1038 81.5332 13.0418C81.5332 7.97968 85.732 3.82428 90.8467 3.82428C95.9615 3.82428 100.16 7.97968 100.16 13.0418ZM100.008 13.0418C100.008 8.05524 95.8851 3.97535 90.8467 3.97535C85.8083 3.97535 81.6859 8.05524 81.6859 13.0418C81.6859 18.0283 85.8083 22.1082 90.8467 22.1082C95.8851 22.1082 100.008 18.1038 100.008 13.0418Z" fill="#EF9121"/>
<path d="M100.264 13.0414C100.264 18.179 96.0655 22.41 90.7981 22.41C85.607 22.41 81.332 18.2546 81.332 13.0414C81.332 7.8282 85.5306 3.67274 90.7981 3.67274C96.0655 3.7483 100.264 7.90375 100.264 13.0414ZM100.112 13.0414C100.112 7.97931 95.9129 3.89944 90.7981 3.89944C85.6833 3.89944 81.4847 7.97931 81.4847 13.0414C81.4847 18.1035 85.6833 22.1833 90.7981 22.1833C95.9892 22.2589 100.112 18.1035 100.112 13.0414Z" fill="#EF9121"/>
<path d="M100.37 13.0412C100.37 18.2544 96.0951 22.4854 90.8276 22.4854C85.5602 22.4854 81.2852 18.2544 81.2852 13.0412C81.2852 7.82802 85.5602 3.59702 90.8276 3.59702C96.0951 3.59702 100.37 7.82802 100.37 13.0412ZM100.217 13.0412C100.217 7.90357 96.0187 3.74819 90.8276 3.74819C85.6365 3.74819 81.4379 7.90357 81.4379 13.0412C81.4379 18.1788 85.6365 22.3343 90.8276 22.3343C96.0187 22.3343 100.217 18.1788 100.217 13.0412Z" fill="#EF9121"/>
<path d="M100.474 13.0414C100.474 18.3302 96.1229 22.5612 90.7791 22.5612C85.4353 22.5612 81.084 18.2546 81.084 13.0414C81.084 7.7527 85.4353 3.52173 90.7791 3.52173C96.1992 3.52173 100.474 7.82825 100.474 13.0414ZM100.322 13.0414C100.322 7.82825 96.0466 3.6728 90.7791 3.6728C85.5117 3.6728 81.2366 7.90381 81.2366 13.0414C81.2366 18.1791 85.5117 22.4101 90.7791 22.4101C96.1229 22.4856 100.322 18.2546 100.322 13.0414Z" fill="#EF9121"/>
<path d="M100.656 13.0423C100.656 18.4066 96.3049 22.7132 90.8847 22.7132C85.4646 22.7132 81.1133 18.4066 81.1133 13.0423C81.1133 7.67799 85.4646 3.3715 90.8847 3.3715C96.2285 3.44705 100.656 7.75355 100.656 13.0423ZM100.427 13.0423C100.427 7.8291 96.1522 3.52257 90.8084 3.52257C85.4646 3.52257 81.1896 7.75355 81.1896 13.0423C81.1896 18.331 85.4646 22.562 90.8084 22.562C96.1522 22.562 100.427 18.331 100.427 13.0423Z" fill="#EF9121"/>
<path d="M100.76 13.0417C100.76 18.406 96.3326 22.7881 90.9125 22.7881C85.416 22.7881 80.9883 18.406 80.9883 13.0417C80.9883 7.67738 85.416 3.29526 90.9125 3.29526C96.3326 3.29526 100.76 7.67738 100.76 13.0417ZM100.531 13.0417C100.531 7.75293 96.1799 3.44642 90.8361 3.44642C85.4924 3.44642 81.141 7.75293 81.141 13.0417C81.141 18.3304 85.4924 22.637 90.8361 22.637C96.1799 22.637 100.531 18.406 100.531 13.0417Z" fill="#EF9121"/>
<path d="M100.866 13.0413C100.866 18.4812 96.3622 22.9388 90.8657 22.9388C85.3693 22.9388 80.8652 18.5567 80.8652 13.0413C80.8652 7.52593 85.3693 3.14385 90.8657 3.14385C96.3622 3.14385 100.866 7.60148 100.866 13.0413ZM100.637 13.0413C100.637 7.67703 96.2095 3.37054 90.7894 3.37054C85.3693 3.37054 80.9416 7.67703 80.9416 13.0413C80.9416 18.4056 85.3693 22.7122 90.7894 22.7122C96.2095 22.7122 100.637 18.4056 100.637 13.0413Z" fill="#EF9121"/>
<path d="M100.97 13.0419C100.97 18.5573 96.466 23.015 90.8932 23.015C85.3204 23.015 80.8164 18.5573 80.8164 13.0419C80.8164 7.5265 85.3204 3.06889 90.8932 3.06889C96.3897 3.06889 100.97 7.60206 100.97 13.0419ZM100.817 13.0419C100.817 7.60206 96.3897 3.21996 90.8932 3.21996C85.3968 3.21996 80.969 7.60206 80.969 13.0419C80.969 18.4818 85.3968 22.8639 90.8932 22.8639C96.3134 22.8639 100.817 18.4818 100.817 13.0419Z" fill="#EF9121"/>
<path d="M101.074 13.0421C101.074 18.6331 96.4939 23.0908 90.8448 23.0908C85.1956 23.0908 80.6152 18.5575 80.6152 13.0421C80.6152 7.52674 85.1956 2.99359 90.8448 2.99359C96.4939 2.99359 101.074 7.52674 101.074 13.0421ZM100.922 13.0421C100.922 7.6023 96.4176 3.14466 90.8448 3.14466C85.272 3.14466 80.768 7.6023 80.768 13.0421C80.768 18.482 85.272 22.9396 90.8448 22.9396C96.4176 23.0152 100.922 18.5575 100.922 13.0421Z" fill="#EF9121"/>
<path d="M101.18 13.0422C101.18 18.6332 96.5234 23.2419 90.8742 23.2419C85.1488 23.2419 80.5684 18.7087 80.5684 13.0422C80.5684 7.37572 85.2251 2.84252 90.8742 2.84252C96.5234 2.91807 101.18 7.45128 101.18 13.0422ZM101.027 13.0422C101.027 7.52683 96.4471 2.99368 90.8742 2.99368C85.3014 2.99368 80.721 7.45128 80.721 13.0422C80.721 18.6332 85.3014 23.0909 90.8742 23.0909C96.4471 23.0909 101.027 18.6332 101.027 13.0422Z" fill="#EF9121"/>
<path d="M101.284 13.0416C101.284 18.7081 96.6276 23.3169 90.8258 23.3169C85.1003 23.3169 80.3672 18.7081 80.3672 13.0416C80.3672 7.3751 85.024 2.76636 90.8258 2.76636C96.6276 2.76636 101.284 7.3751 101.284 13.0416ZM101.132 13.0416C101.132 7.45066 96.5513 2.91743 90.9021 2.91743C85.253 2.91743 80.6726 7.45066 80.6726 13.0416C80.6726 18.6326 85.253 23.1658 90.9021 23.1658C96.4749 23.2413 101.132 18.6326 101.132 13.0416Z" fill="#EF9121"/>
<path d="M101.39 13.042C101.39 18.7841 96.6571 23.4684 90.8552 23.4684C85.0534 23.4684 80.3203 18.7841 80.3203 13.042C80.3203 7.29997 85.0534 2.61571 90.8552 2.61571C96.6571 2.69127 101.39 7.29997 101.39 13.042ZM101.237 13.042C101.237 7.37552 96.5807 2.84232 90.8552 2.84232C85.1298 2.84232 80.473 7.45108 80.473 13.042C80.473 18.7085 85.1298 23.2417 90.8552 23.2417C96.5807 23.3173 101.237 18.7085 101.237 13.042Z" fill="#EF9121"/>
<path d="M101.494 13.041C101.494 18.8586 96.7609 23.5429 90.8827 23.5429C85.0046 23.5429 80.2715 18.8586 80.2715 13.041C80.2715 7.22338 85.0046 2.53904 90.8827 2.53904C96.6846 2.53904 101.494 7.29893 101.494 13.041ZM101.341 13.041C101.341 7.29893 96.6846 2.6902 90.8827 2.6902C85.0809 2.6902 80.4241 7.29893 80.4241 13.041C80.4241 18.7831 85.0809 23.3919 90.8827 23.3919C96.6082 23.3919 101.341 18.7831 101.341 13.041Z" fill="#EF9121"/>
<path d="M101.6 13.0417C101.6 18.9348 96.7908 23.6191 90.8363 23.6191C84.8818 23.6191 80.0723 18.8593 80.0723 13.0417C80.0723 7.22405 84.8818 2.46418 90.8363 2.46418C96.7908 2.46418 101.6 7.22405 101.6 13.0417ZM101.447 13.0417C101.447 7.2996 96.7144 2.61534 90.8363 2.61534C84.9581 2.61534 80.225 7.2996 80.225 13.0417C80.225 18.7837 84.9581 23.4681 90.8363 23.4681C96.7144 23.5436 101.447 18.8593 101.447 13.0417Z" fill="#EF9121"/>
<path d="M101.704 13.0417C101.704 18.9348 96.8183 23.7703 90.8638 23.7703C84.8329 23.7703 80.0234 19.0104 80.0234 13.0417C80.0234 7.07293 84.9092 2.3131 90.8638 2.3131C96.8183 2.38866 101.704 7.14849 101.704 13.0417ZM101.551 13.0417C101.551 7.22404 96.7419 2.46417 90.8638 2.46417C84.9856 2.46417 80.1762 7.22404 80.1762 13.0417C80.1762 18.8593 84.9856 23.6191 90.8638 23.6191C96.7419 23.6191 101.551 18.9348 101.551 13.0417Z" fill="#EF9121"/>
<path d="M101.81 13.0423C101.81 19.011 96.9243 23.8465 90.8171 23.8465C84.7099 23.8465 79.8242 19.011 79.8242 13.0423C79.8242 7.0736 84.7099 2.23823 90.8171 2.23823C96.9243 2.23823 101.81 7.0736 101.81 13.0423ZM101.657 13.0423C101.657 7.14915 96.8479 2.3893 90.8171 2.3893C84.8626 2.3893 79.9769 7.14915 79.9769 13.0423C79.9769 18.9355 84.7862 23.6953 90.8171 23.6953C96.7716 23.7709 101.657 18.9355 101.657 13.0423Z" fill="#EF9121"/>
<path d="M101.914 13.0424C101.914 19.0866 96.9519 23.9976 90.8447 23.9976C84.7375 23.9976 79.7754 19.0866 79.7754 13.0424C79.7754 6.9981 84.7375 2.08712 90.8447 2.08712C96.9519 2.08712 101.914 7.07365 101.914 13.0424ZM101.761 13.0424C101.761 7.07365 96.8755 2.23829 90.8447 2.23829C84.8138 2.23829 79.9281 7.07365 79.9281 13.0424C79.9281 19.0111 84.8138 23.8465 90.8447 23.8465C96.8755 23.8465 101.761 19.0111 101.761 13.0424Z" fill="#EF9121"/>
<path d="M102.02 13.0418C102.02 19.1616 96.9813 24.0726 90.8741 24.0726C84.6906 24.0726 79.7285 19.1616 79.7285 13.0418C79.7285 6.92196 84.7669 2.01101 90.8741 2.01101C96.9813 2.01101 102.02 6.99751 102.02 13.0418ZM101.867 13.0418C101.867 6.99751 96.905 2.16208 90.8741 2.16208C84.7669 2.16208 79.8813 6.99751 79.8813 13.0418C79.8813 19.0861 84.8433 23.9215 90.8741 23.9215C96.905 23.9215 101.867 19.0861 101.867 13.0418Z" fill="#EF9121"/>
<path d="M102.124 13.0419C102.124 19.1618 97.0855 24.1483 90.8256 24.1483C84.5657 24.1483 79.5273 19.1618 79.5273 13.0419C79.5273 6.92211 84.5657 1.93562 90.8256 1.93562C97.0855 1.93562 102.124 6.92211 102.124 13.0419ZM101.971 13.0419C101.971 6.99766 97.0091 2.08669 90.8256 2.08669C84.6421 2.08669 79.68 6.99766 79.68 13.0419C79.68 19.0862 84.6421 23.9972 90.8256 23.9972C97.0091 23.9972 101.971 19.1618 101.971 13.0419Z" fill="#EF9121"/>
<path d="M102.23 13.042C102.23 19.2374 97.115 24.2995 90.8551 24.2995C84.5953 24.2995 79.4805 19.2374 79.4805 13.042C79.4805 6.84661 84.5953 1.78451 90.8551 1.78451C97.115 1.78451 102.23 6.84661 102.23 13.042ZM102.077 13.042C102.077 6.92216 97.0387 1.93567 90.8551 1.93567C84.6716 1.93567 79.6332 6.92216 79.6332 13.042C79.6332 19.1618 84.6716 24.1484 90.8551 24.1484C97.0387 24.1484 102.077 19.1618 102.077 13.042Z" fill="#EF9121"/>
<path d="M102.334 13.0418C102.334 19.3128 97.1428 24.3748 90.8066 24.3748C84.4704 24.3748 79.2793 19.3128 79.2793 13.0418C79.2793 6.7709 84.394 1.70881 90.8066 1.70881C97.2191 1.70881 102.334 6.7709 102.334 13.0418ZM102.181 13.0418C102.181 6.84645 97.0665 1.85998 90.8066 1.85998C84.5467 1.85998 79.4319 6.84645 79.4319 13.0418C79.4319 19.2372 84.5467 24.2238 90.8066 24.2238C97.0665 24.2993 102.181 19.2372 102.181 13.0418Z" fill="#EF9121"/>
<path d="M102.44 13.0418C102.44 19.3883 97.2486 24.526 90.836 24.526C84.4235 24.526 79.2324 19.3883 79.2324 13.0418C79.2324 6.6953 84.4235 1.55771 90.836 1.55771C97.2486 1.63326 102.44 6.77086 102.44 13.0418ZM102.287 13.0418C102.287 6.77086 97.1722 1.70878 90.836 1.70878C84.4998 1.70878 79.3851 6.77086 79.3851 13.0418C79.3851 19.3127 84.4998 24.3748 90.836 24.3748C97.1722 24.3748 102.287 19.3127 102.287 13.0418Z" fill="#EF9121"/>
<path d="M102.544 13.042C102.544 19.4641 97.2765 24.6017 90.7876 24.6017C84.2987 24.6017 79.0312 19.3885 79.0312 13.042C79.0312 6.69555 84.2987 1.48241 90.7876 1.48241C97.2765 1.48241 102.544 6.69555 102.544 13.042ZM102.391 13.042C102.391 6.7711 97.2001 1.63348 90.8639 1.63348C84.4514 1.63348 79.3366 6.7711 79.3366 13.042C79.3366 19.313 84.5277 24.4506 90.8639 24.4506C97.2001 24.4506 102.391 19.3885 102.391 13.042Z" fill="#EF9121"/>
<path d="M102.65 13.0419C102.65 19.464 97.3823 24.7527 90.8171 24.7527C84.2518 24.7527 78.9844 19.5395 78.9844 13.0419C78.9844 6.54434 84.2518 1.33115 90.8171 1.33115C97.3823 1.40671 102.65 6.61989 102.65 13.0419ZM102.497 13.0419C102.497 6.69545 97.3059 1.55785 90.8171 1.55785C84.4045 1.55785 79.137 6.69545 79.137 13.0419C79.137 19.3884 84.3282 24.5261 90.8171 24.5261C97.3059 24.6017 102.497 19.464 102.497 13.0419Z" fill="#EF9121"/>
<path d="M102.754 13.0415C102.754 19.5391 97.4098 24.8278 90.8445 24.8278C84.2793 24.8278 78.9355 19.5391 78.9355 13.0415C78.9355 6.54391 84.2793 1.25518 90.8445 1.25518C97.4098 1.25518 102.754 6.54391 102.754 13.0415ZM102.601 13.0415C102.601 6.61946 97.3334 1.40626 90.8445 1.40626C84.3557 1.40626 79.0882 6.61946 79.0882 13.0415C79.0882 19.4635 84.3557 24.6767 90.8445 24.6767C97.3334 24.6767 102.601 19.4635 102.601 13.0415Z" fill="#EF9121"/>
<path d="M102.86 13.0421C102.86 19.6152 97.4396 24.904 90.7981 24.904C84.1565 24.904 78.7363 19.6152 78.7363 13.0421C78.7363 6.46893 84.1565 1.18022 90.7981 1.18022C97.4396 1.18022 102.86 6.46893 102.86 13.0421ZM102.707 13.0421C102.707 6.54448 97.3633 1.33129 90.7981 1.33129C84.2328 1.33129 78.889 6.62003 78.889 13.0421C78.889 19.5397 84.2328 24.7529 90.7981 24.7529C97.3633 24.7529 102.707 19.5397 102.707 13.0421Z" fill="#EF9121"/>
<path d="M102.964 13.0422C102.964 19.6909 97.5435 25.0552 90.8256 25.0552C84.1076 25.0552 78.6875 19.6909 78.6875 13.0422C78.6875 6.39346 84.1076 1.02915 90.8256 1.02915C97.5435 1.1047 102.964 6.46901 102.964 13.0422ZM102.811 13.0422C102.811 6.46901 97.4671 1.18031 90.8256 1.18031C84.184 1.18031 78.8401 6.46901 78.8401 13.0422C78.8401 19.6153 84.184 24.9041 90.8256 24.9041C97.4671 24.9041 102.811 19.6153 102.811 13.0422Z" fill="#EF9121"/>
<path d="M103.068 13.0415C103.068 19.6902 97.5713 25.1301 90.777 25.1301C83.9828 25.1301 78.4863 19.6902 78.4863 13.0415C78.4863 6.39285 83.9828 0.952997 90.777 0.952997C97.6476 0.952997 103.068 6.39285 103.068 13.0415ZM102.915 13.0415C102.915 6.4684 97.4949 1.10416 90.777 1.10416C84.0591 1.10416 78.6391 6.4684 78.6391 13.0415C78.6391 19.6147 84.0591 24.979 90.777 24.979C97.4949 25.0546 102.915 19.6902 102.915 13.0415Z" fill="#EF9121"/>
<path d="M103.174 13.042C103.174 19.7662 97.6007 25.2817 90.8065 25.2817C84.0122 25.2817 78.4395 19.8418 78.4395 13.042C78.4395 6.31771 84.0122 0.802345 90.8065 0.802345C97.6771 0.877899 103.174 6.31771 103.174 13.042ZM103.021 13.042C103.021 6.39326 97.5244 1.02895 90.8065 1.02895C84.0886 1.02895 78.5921 6.39326 78.5921 13.042C78.5921 19.6907 84.0886 25.055 90.8065 25.055C97.5244 25.055 103.021 19.7662 103.021 13.042Z" fill="#EF9121"/>
<path d="M103.356 13.0422C103.356 19.842 97.7828 25.3575 90.9122 25.3575C84.0416 25.3575 78.4688 19.842 78.4688 13.0422C78.4688 6.2424 84.0416 0.727051 90.9122 0.727051C97.7828 0.727051 103.356 6.2424 103.356 13.0422ZM103.127 13.0422C103.127 6.31795 97.63 0.87812 90.8358 0.87812C84.0415 0.87812 78.5451 6.31795 78.5451 13.0422C78.5451 19.7665 84.0415 25.2063 90.8358 25.2063C97.63 25.2063 103.127 19.7665 103.127 13.0422Z" fill="#EF9121"/>
<path d="M103.46 13.0416C103.46 19.917 97.8106 25.4324 90.8637 25.4324C83.9167 25.4324 78.2676 19.8414 78.2676 13.0416C78.2676 6.16623 83.9167 0.650806 90.8637 0.650806C97.8106 0.650806 103.46 6.24178 103.46 13.0416ZM103.231 13.0416C103.231 6.24178 97.6579 0.801968 90.7873 0.801968C83.9167 0.801968 78.344 6.31733 78.344 13.0416C78.344 19.8414 83.9167 25.2813 90.7873 25.2813C97.7343 25.3569 103.231 19.8414 103.231 13.0416Z" fill="#EF9121"/>
<path d="M103.566 13.0416C103.566 19.9926 97.9164 25.5835 90.8931 25.5835C83.8698 25.5835 78.2207 19.9926 78.2207 13.0416C78.2207 6.09073 83.8698 0.499792 90.8931 0.499792C97.84 0.575346 103.566 6.16628 103.566 13.0416ZM103.337 13.0416C103.337 6.24183 97.6874 0.650862 90.8168 0.650862C83.8699 0.650862 78.297 6.16628 78.297 13.0416C78.297 19.917 83.9462 25.4324 90.8168 25.4324C97.7637 25.4324 103.337 19.917 103.337 13.0416Z" fill="#EF9121"/>
<path d="M103.67 13.0418C103.67 19.9927 97.9442 25.6593 90.8446 25.6593C83.745 25.6593 78.0195 19.9927 78.0195 13.0418C78.0195 6.0909 83.745 0.424433 90.8446 0.424433C97.9442 0.424433 103.67 6.0909 103.67 13.0418ZM103.517 13.0418C103.517 6.16646 97.8678 0.575502 90.8446 0.575502C83.8976 0.575502 78.1722 6.16646 78.1722 13.0418C78.1722 19.9172 83.8213 25.5081 90.8446 25.5081C97.7915 25.5837 103.517 19.9927 103.517 13.0418Z" fill="#EF9121"/>
<path d="M103.776 13.0419C103.776 20.0683 97.9737 25.8104 90.8741 25.8104C83.7745 25.8104 77.9727 20.0683 77.9727 13.0419C77.9727 6.0154 83.7745 0.273325 90.8741 0.273325C97.9737 0.348879 103.776 6.0154 103.776 13.0419ZM103.623 13.0419C103.623 6.09096 97.8974 0.424486 90.8741 0.424486C83.8508 0.424486 78.1254 6.09096 78.1254 13.0419C78.1254 19.9928 83.8508 25.6594 90.8741 25.6594C97.8974 25.6594 103.623 19.9928 103.623 13.0419Z" fill="#EF9121"/>
<path d="M103.88 13.0413C103.88 20.1433 98.0779 25.8853 90.8256 25.8853C83.6496 25.8853 77.7715 20.1433 77.7715 13.0413C77.7715 5.93924 83.5733 0.197176 90.8256 0.197176C98.0015 0.197176 103.88 5.93924 103.88 13.0413ZM103.727 13.0413C103.727 6.01479 98.0015 0.348337 90.9019 0.348337C83.8023 0.348337 78.0769 6.01479 78.0769 13.0413C78.0769 20.0677 83.8023 25.7343 90.9019 25.7343C97.9252 25.7343 103.727 20.0677 103.727 13.0413Z" fill="#EF9121"/>
<path d="M103.985 13.042C103.985 20.2195 98.1073 25.9616 90.855 25.9616C83.6027 25.9616 77.7246 20.144 77.7246 13.042C77.7246 5.86438 83.6027 0.122339 90.855 0.122339C98.1073 0.122339 103.985 5.93994 103.985 13.042ZM103.833 13.042C103.833 5.93994 98.031 0.273409 90.855 0.273409C83.6791 0.273409 77.8773 6.01549 77.8773 13.042C77.8773 20.144 83.6791 25.8105 90.855 25.8105C98.031 25.8861 103.833 20.144 103.833 13.042Z" fill="#EF9121"/>
<path d="M104.089 13.0419C104.089 20.295 98.1349 26.1127 90.8826 26.1127C83.554 26.1127 77.6758 20.295 77.6758 13.0419C77.6758 5.78879 83.6303 -0.0287704 90.8826 -0.0287704C98.1349 -0.0287704 104.089 5.86434 104.089 13.0419ZM103.937 13.0419C103.937 5.9399 98.0586 0.122299 90.8826 0.122299C83.6303 0.122299 77.8285 5.86434 77.8285 13.0419C77.8285 20.2195 83.7067 25.9615 90.8826 25.9615C98.0586 25.9615 103.937 20.2195 103.937 13.0419Z" fill="#EF9121"/>
<path d="M104.194 13.0418C104.194 20.2949 98.239 26.1881 90.8341 26.1881C83.4291 26.1881 77.4746 20.2949 77.4746 13.0418C77.4746 5.78863 83.4291 -0.104553 90.8341 -0.104553C98.239 -0.104553 104.194 5.78863 104.194 13.0418ZM104.041 13.0418C104.041 5.86419 98.1627 0.0466099 90.8341 0.0466099C83.5818 0.0466099 77.6273 5.86419 77.6273 13.0418C77.6273 20.2193 83.5055 26.037 90.8341 26.037C98.0864 26.1126 104.041 20.2193 104.041 13.0418Z" fill="#EF9121"/>
<path d="M104.299 13.0417C104.299 20.3704 98.2685 26.3391 90.8635 26.3391C83.4586 26.3391 77.4277 20.3704 77.4277 13.0417C77.4277 5.71301 83.4586 -0.25569 90.8635 -0.25569C98.2685 -0.25569 104.299 5.71301 104.299 13.0417ZM104.147 13.0417C104.147 5.78857 98.1922 -0.10462 90.8635 -0.10462C83.5349 -0.10462 77.5804 5.78857 77.5804 13.0417C77.5804 20.2948 83.5349 26.188 90.8635 26.188C98.1922 26.188 104.147 20.2948 104.147 13.0417Z" fill="#EF9121"/>
<path d="M104.404 13.042C104.404 20.4462 98.2964 26.415 90.8151 26.415C83.3338 26.415 77.2266 20.4462 77.2266 13.042C77.2266 5.63773 83.3338 -0.330959 90.8151 -0.330959C98.2964 -0.330959 104.404 5.71328 104.404 13.042ZM104.251 13.042C104.251 5.71328 98.2201 -0.179888 90.8151 -0.179888C83.4101 -0.179888 77.4556 5.71328 77.4556 13.042C77.4556 20.3706 83.4865 26.2638 90.8151 26.2638C98.2201 26.2638 104.251 20.3706 104.251 13.042Z" fill="#EF9121"/>
<path d="M104.509 13.042C104.509 20.5218 98.4022 26.5661 90.8445 26.5661C83.2869 26.5661 77.1797 20.5218 77.1797 13.042C77.1797 5.56226 83.2869 -0.482035 90.8445 -0.482035C98.4022 -0.482035 104.509 5.63781 104.509 13.042ZM104.357 13.042C104.357 5.71337 98.3258 -0.255339 90.8445 -0.255339C83.3632 -0.255339 77.3323 5.71337 77.3323 13.042C77.3323 20.3707 83.3632 26.3394 90.8445 26.3394C98.3258 26.415 104.357 20.4463 104.357 13.042Z" fill="#EF9121"/>
<path d="M104.613 13.0414C104.613 20.5212 98.4297 26.6411 90.872 26.6411C83.238 26.6411 77.1309 20.5212 77.1309 13.0414C77.1309 5.56164 83.3144 -0.558186 90.872 -0.558186C98.4297 -0.558186 104.613 5.56164 104.613 13.0414ZM104.46 13.0414C104.46 5.6372 98.3533 -0.407024 90.872 -0.407024C83.3907 -0.407024 77.2835 5.6372 77.2835 13.0414C77.2835 20.4457 83.3907 26.49 90.872 26.49C98.3533 26.49 104.46 20.5212 104.46 13.0414Z" fill="#EF9121"/>
<path d="M104.719 13.0417C104.719 20.597 98.5358 26.7168 90.8255 26.7168C83.1915 26.7168 76.9316 20.597 76.9316 13.0417C76.9316 5.48633 83.1151 -0.633482 90.8255 -0.633482C98.5358 -0.633482 104.719 5.48633 104.719 13.0417ZM104.567 13.0417C104.567 5.56188 98.4594 -0.48241 90.8255 -0.48241C83.2678 -0.48241 77.0843 5.56188 77.0843 13.0417C77.0843 20.5215 83.2678 26.5658 90.8255 26.5658C98.3831 26.6413 104.567 20.5215 104.567 13.0417Z" fill="#EF9121"/>
<path d="M104.823 13.0417C104.823 20.6726 98.5633 26.868 90.8529 26.868C83.1426 26.868 76.8828 20.6726 76.8828 13.0417C76.8828 5.41077 83.1426 -0.784557 90.8529 -0.784557C98.5633 -0.709005 104.823 5.41077 104.823 13.0417ZM104.671 13.0417C104.671 5.48632 98.4869 -0.633488 90.8529 -0.633488C83.219 -0.633488 77.0355 5.48632 77.0355 13.0417C77.0355 20.597 83.219 26.7168 90.8529 26.7168C98.4869 26.7168 104.671 20.597 104.671 13.0417Z" fill="#EF9121"/>
<path d="M104.929 13.0415C104.929 20.7479 98.5931 26.9433 90.8065 26.9433C83.0198 26.9433 76.6836 20.7479 76.6836 13.0415C76.6836 5.33503 83.0198 -0.860374 90.8065 -0.860374C98.5931 -0.860374 104.929 5.41058 104.929 13.0415ZM104.777 13.0415C104.777 5.41058 98.5168 -0.709211 90.8065 -0.709211C83.0961 -0.709211 76.8363 5.41058 76.8363 13.0415C76.8363 20.6724 83.0961 26.7923 90.8065 26.7923C98.5168 26.7923 104.777 20.6724 104.777 13.0415Z" fill="#EF9121"/>
<path d="M105.033 13.042C105.033 20.7484 98.697 27.0949 90.834 27.0949C82.971 27.0949 76.6348 20.824 76.6348 13.042C76.6348 5.25998 82.971 -1.01093 90.834 -1.01093C98.697 -0.935381 105.033 5.33554 105.033 13.042ZM104.881 13.042C104.881 5.41109 98.6206 -0.784237 90.834 -0.784237C83.0473 -0.784237 76.7874 5.41109 76.7874 13.042C76.7874 20.6729 83.0473 26.8683 90.834 26.8683C98.6206 26.9439 104.881 20.7484 104.881 13.042Z" fill="#EF9121"/>
<path d="M105.139 13.0421C105.139 20.8241 98.7268 27.1707 90.7875 27.1707C82.8481 27.1707 76.4355 20.8241 76.4355 13.0421C76.4355 5.26013 82.8481 -1.08632 90.7875 -1.08632C98.7268 -1.08632 105.139 5.26013 105.139 13.0421ZM104.987 13.0421C104.987 5.33569 98.6505 -0.935251 90.8638 -0.935251C83.0771 -0.935251 76.7409 5.33569 76.7409 13.0421C76.7409 20.7486 83.0771 27.0195 90.8638 27.0195C98.6505 27.0195 104.987 20.8241 104.987 13.0421Z" fill="#EF9121"/>
<path d="M105.243 13.0415C105.243 20.8991 98.7543 27.2456 90.815 27.2456C82.8756 27.2456 76.3867 20.8991 76.3867 13.0415C76.3867 5.18397 82.8756 -1.16247 90.815 -1.16247C98.8307 -1.16247 105.243 5.18397 105.243 13.0415ZM105.09 13.0415C105.09 5.25952 98.678 -1.0114 90.815 -1.0114C82.952 -1.0114 76.5395 5.25952 76.5395 13.0415C76.5395 20.8235 82.952 27.0944 90.815 27.0944C98.678 27.0944 105.09 20.8235 105.09 13.0415Z" fill="#EF9121"/>
<path d="M105.349 13.0415C105.349 20.9746 98.8601 27.3966 90.8444 27.3966C82.8287 27.3966 76.3398 20.9746 76.3398 13.0415C76.3398 5.10834 82.8287 -1.3137 90.8444 -1.3137C98.8601 -1.23815 105.349 5.18389 105.349 13.0415ZM105.196 13.0415C105.196 5.18389 98.7838 -1.16254 90.8444 -1.16254C82.9051 -1.16254 76.4925 5.18389 76.4925 13.0415C76.4925 20.899 82.9051 27.2455 90.8444 27.2455C98.7838 27.2455 105.196 20.899 105.196 13.0415Z" fill="#EF9121"/>
<path d="M105.453 13.0418C105.453 21.0505 98.888 27.4725 90.796 27.4725C82.704 27.4725 76.1387 20.975 76.1387 13.0418C76.1387 5.03318 82.704 -1.38884 90.796 -1.38884C98.888 -1.38884 105.453 5.10874 105.453 13.0418ZM105.301 13.0418C105.301 5.18429 98.8117 -1.23777 90.796 -1.23777C82.7803 -1.23777 76.2914 5.18429 76.2914 13.0418C76.2914 20.8994 82.7803 27.3215 90.796 27.3215C98.8117 27.397 105.301 20.975 105.301 13.0418Z" fill="#EF9121"/>
<path d="M105.559 13.0418C105.559 21.0505 98.9938 27.6237 90.8254 27.6237C82.6571 27.6237 76.0918 21.126 76.0918 13.0418C76.0918 4.95759 82.6571 -1.53995 90.8254 -1.53995C98.9938 -1.4644 105.559 5.03314 105.559 13.0418ZM105.406 13.0418C105.406 5.10869 98.8411 -1.38888 90.8254 -1.38888C82.7334 -1.38888 76.2445 5.03314 76.2445 13.0418C76.2445 21.0505 82.8097 27.4725 90.8254 27.4725C98.9174 27.4725 105.406 21.0505 105.406 13.0418Z" fill="#EF9121"/>
<path d="M105.663 13.0417C105.663 21.1259 99.0216 27.699 90.7769 27.699C82.6085 27.699 75.8906 21.1259 75.8906 13.0417C75.8906 4.95743 82.5322 -1.61573 90.7769 -1.61573C99.0216 -1.61573 105.663 4.95743 105.663 13.0417ZM105.51 13.0417C105.51 5.03299 98.9452 -1.46457 90.8532 -1.46457C82.7612 -1.46457 76.1959 5.03299 76.1959 13.0417C76.1959 21.0503 82.7612 27.548 90.8532 27.548C98.9452 27.548 105.51 21.0503 105.51 13.0417Z" fill="#EF9121"/>
<path d="M105.769 13.0415C105.769 21.2012 99.0511 27.7744 90.8064 27.7744C82.5617 27.7744 75.8438 21.1257 75.8438 13.0415C75.8438 4.95724 82.5617 -1.69146 90.8064 -1.69146C99.1275 -1.69146 105.769 4.88169 105.769 13.0415ZM105.616 13.0415C105.616 4.95724 98.9748 -1.5403 90.8064 -1.5403C82.6381 -1.5403 75.9965 5.0328 75.9965 13.0415C75.9965 21.0501 82.6381 27.6233 90.8064 27.6233C99.0511 27.6989 105.616 21.1257 105.616 13.0415Z" fill="#EF9121"/>
<path d="M105.951 13.0418C105.951 21.2772 99.2331 27.9259 90.9121 27.9259C82.591 27.9259 75.873 21.2772 75.873 13.0418C75.873 4.80652 82.591 -1.84215 90.9121 -1.84215C99.2331 -1.84215 105.951 4.88207 105.951 13.0418ZM105.722 13.0418C105.722 4.88207 99.0804 -1.69107 90.8357 -1.69107C82.591 -1.69107 75.9495 4.88207 75.9495 13.0418C75.9495 21.2016 82.591 27.7748 90.8357 27.7748C99.0804 27.7748 105.722 21.2016 105.722 13.0418Z" fill="#EF9121"/>
<path d="M106.055 13.0412C106.055 21.3521 99.2609 28.0009 90.8635 28.0009C82.4661 28.0009 75.6719 21.2766 75.6719 13.0412C75.6719 4.73036 82.4661 -1.91829 90.8635 -1.91829C99.2609 -1.91829 106.055 4.80591 106.055 13.0412ZM105.826 13.0412C105.826 4.88147 99.1082 -1.76722 90.7871 -1.76722C82.4661 -1.76722 75.7482 4.88147 75.7482 13.0412C75.7482 21.201 82.4661 27.8497 90.7871 27.8497C99.1082 27.9252 105.826 21.2766 105.826 13.0412Z" fill="#EF9121"/>
<path d="M106.161 13.0417C106.161 21.3526 99.2904 28.1524 90.893 28.1524C82.4192 28.1524 75.625 21.4282 75.625 13.0417C75.625 4.65532 82.4956 -2.06894 90.893 -2.06894C99.2904 -1.99339 106.161 4.73087 106.161 13.0417ZM105.932 13.0417C105.932 4.80642 99.1376 -1.91778 90.8166 -1.91778C82.4955 -1.91778 75.7013 4.73087 75.7013 13.0417C75.7013 21.3526 82.4955 28.0014 90.8166 28.0014C99.2139 28.0014 105.932 21.3526 105.932 13.0417Z" fill="#EF9121"/>
<path d="M106.265 13.0424C106.265 21.4288 99.3945 28.2286 90.8444 28.2286C82.3707 28.2286 75.4238 21.4288 75.4238 13.0424C75.4238 4.65598 82.2944 -2.14381 90.8444 -2.14381C99.3182 -2.14381 106.265 4.65598 106.265 13.0424ZM106.112 13.0424C106.112 4.73154 99.3182 -1.99274 90.8444 -1.99274C82.3707 -1.99274 75.5765 4.73154 75.5765 13.0424C75.5765 21.3533 82.3707 28.0776 90.8444 28.0776C99.2418 28.0776 106.112 21.3533 106.112 13.0424Z" fill="#EF9121"/>
<path d="M106.369 13.0415C106.369 21.5035 99.422 28.3789 90.8719 28.3789C82.3219 28.3789 75.375 21.5035 75.375 13.0415C75.375 4.57957 82.3219 -2.29574 90.8719 -2.29574C99.422 -2.22019 106.369 4.65512 106.369 13.0415ZM106.216 13.0415C106.216 4.65512 99.3457 -2.06914 90.8719 -2.06914C82.3982 -2.06914 75.5276 4.73067 75.5276 13.0415C75.5276 21.3524 82.3982 28.1522 90.8719 28.1522C99.3457 28.2278 106.216 21.428 106.216 13.0415Z" fill="#EF9121"/>
<path d="M106.475 13.0418C106.475 21.5793 99.4519 28.4547 90.8254 28.4547C82.199 28.4547 75.1758 21.5793 75.1758 13.0418C75.1758 4.50426 82.199 -2.37113 90.8254 -2.37113C99.4519 -2.37113 106.475 4.57981 106.475 13.0418ZM106.322 13.0418C106.322 4.65536 99.3755 -2.21996 90.9018 -2.21996C82.428 -2.21996 75.4812 4.57981 75.4812 13.0418C75.4812 21.4282 82.428 28.3036 90.9018 28.3036C99.3755 28.3036 106.322 21.5038 106.322 13.0418Z" fill="#EF9121"/>
<path d="M106.579 13.0416C106.579 21.5791 99.5557 28.5301 90.8529 28.5301C82.1502 28.5301 75.127 21.5791 75.127 13.0416C75.127 4.50406 82.1502 -2.44685 90.8529 -2.44685C99.5557 -2.44685 106.579 4.50406 106.579 13.0416ZM106.426 13.0416C106.426 4.57962 99.4793 -2.29569 90.8529 -2.29569C82.2265 -2.29569 75.2796 4.57962 75.2796 13.0416C75.2796 21.5036 82.2265 28.379 90.8529 28.379C99.403 28.4545 106.426 21.5791 106.426 13.0416Z" fill="#EF9121"/>
<path d="M106.685 13.0416C106.685 21.6547 99.5851 28.6812 90.8824 28.6812C82.1033 28.6812 75.0801 21.6547 75.0801 13.0416C75.0801 4.4285 82.1796 -2.59793 90.8824 -2.59793C99.5851 -2.52237 106.685 4.4285 106.685 13.0416ZM106.532 13.0416C106.532 4.50406 99.5088 -2.44686 90.8824 -2.44686C82.256 -2.44686 75.2327 4.50406 75.2327 13.0416C75.2327 21.5791 82.256 28.5301 90.8824 28.5301C99.5088 28.5301 106.532 21.5791 106.532 13.0416Z" fill="#EF9121"/>
<path d="M106.789 13.0414C106.789 21.7301 99.6894 28.7566 90.834 28.7566C82.0549 28.7566 74.8789 21.7301 74.8789 13.0414C74.8789 4.35276 81.9785 -2.67365 90.834 -2.67365C99.613 -2.67365 106.789 4.35276 106.789 13.0414ZM106.636 13.0414C106.636 4.42832 99.5367 -2.52258 90.834 -2.52258C82.1312 -2.52258 75.0316 4.42832 75.0316 13.0414C75.0316 21.6545 82.1312 28.6054 90.834 28.6054C99.5367 28.6054 106.636 21.6545 106.636 13.0414Z" fill="#EF9121"/>
<path d="M106.893 13.0415C106.893 21.8057 99.7169 28.9077 90.8614 28.9077C82.006 28.9077 74.8301 21.8057 74.8301 13.0415C74.8301 4.27726 82.006 -2.82476 90.8614 -2.82476C99.7169 -2.82476 106.893 4.35282 106.893 13.0415ZM106.74 13.0415C106.74 4.35282 99.6405 -2.59806 90.8614 -2.59806C82.0824 -2.59806 74.9827 4.42837 74.9827 13.0415C74.9827 21.7301 82.0824 28.6811 90.8614 28.6811C99.6405 28.6811 106.74 21.7301 106.74 13.0415Z" fill="#EF9121"/>
<path d="M106.999 13.0417C106.999 21.8815 99.7467 28.9835 90.815 28.9835C81.8832 28.9835 74.6309 21.8815 74.6309 13.0417C74.6309 4.20198 81.8832 -2.90002 90.815 -2.90002C99.7467 -2.90002 106.999 4.27753 106.999 13.0417ZM106.846 13.0417C106.846 4.35309 99.6704 -2.74895 90.8913 -2.74895C82.0359 -2.74895 74.9362 4.35309 74.9362 13.0417C74.9362 21.7304 82.1122 28.8324 90.8913 28.8324C99.6704 28.8324 106.846 21.8059 106.846 13.0417Z" fill="#EF9121"/>
<path d="M107.103 13.041C107.103 21.8808 99.8506 29.0584 90.8425 29.0584C81.8344 29.0584 74.582 21.8808 74.582 13.041C74.582 4.20127 81.8344 -2.97627 90.8425 -2.97627C99.8506 -2.97627 107.103 4.20127 107.103 13.041ZM106.95 13.041C106.95 4.27682 99.7742 -2.8252 90.8425 -2.8252C81.987 -2.8252 74.7348 4.27682 74.7348 13.041C74.7348 21.8052 81.9107 28.9072 90.8425 28.9072C99.6979 28.9828 106.95 21.8808 106.95 13.041Z" fill="#EF9121"/>
<path d="M107.209 13.042C107.209 21.9573 99.88 29.2104 90.8719 29.2104C81.8638 29.2104 74.5352 21.9573 74.5352 13.042C74.5352 4.12666 81.8638 -3.12649 90.8719 -3.12649C99.88 -3.05093 107.209 4.12666 107.209 13.042ZM107.056 13.042C107.056 4.20221 99.8037 -2.97533 90.8719 -2.97533C81.9401 -2.97533 74.6878 4.20221 74.6878 13.042C74.6878 21.8817 81.9401 29.0593 90.8719 29.0593C99.8037 29.0593 107.056 21.8817 107.056 13.042Z" fill="#EF9121"/>
<path d="M107.313 13.0418C107.313 22.0326 99.9079 29.2858 90.8235 29.2858C81.739 29.2858 74.334 22.0326 74.334 13.0418C74.334 4.05092 81.739 -3.20221 90.8235 -3.20221C99.9079 -3.20221 107.313 4.12647 107.313 13.0418ZM107.16 13.0418C107.16 4.12647 99.8316 -3.05105 90.8235 -3.05105C81.8154 -3.05105 74.4867 4.12647 74.4867 13.0418C74.4867 21.9571 81.8154 29.1347 90.8235 29.1347C99.8316 29.1347 107.16 21.9571 107.16 13.0418Z" fill="#EF9121"/>
<path d="M107.419 13.0416C107.419 22.1081 100.014 29.4368 90.8529 29.4368C81.6921 29.4368 74.2871 22.1081 74.2871 13.0416C74.2871 3.97523 81.6921 -3.35341 90.8529 -3.35341C100.014 -3.35341 107.419 4.05079 107.419 13.0416ZM107.266 13.0416C107.266 4.12634 99.9374 -3.20234 90.8529 -3.20234C81.7685 -3.20234 74.4398 4.05079 74.4398 13.0416C74.4398 21.957 81.7685 29.2856 90.8529 29.2856C99.9374 29.2856 107.266 22.0325 107.266 13.0416Z" fill="#EF9121"/>
<path d="M107.523 13.0424C107.523 22.1088 100.041 29.5131 90.8043 29.5131C81.5672 29.5131 74.0859 22.1088 74.0859 13.0424C74.0859 3.97602 81.5672 -3.42817 90.8043 -3.42817C100.041 -3.42817 107.523 3.97602 107.523 13.0424ZM107.37 13.0424C107.37 4.05157 99.9651 -3.2771 90.8043 -3.2771C81.6435 -3.2771 74.2386 4.05157 74.2386 13.0424C74.2386 22.0333 81.6435 29.362 90.8043 29.362C99.9651 29.362 107.37 22.1088 107.37 13.0424Z" fill="#EF9121"/>
<path d="M107.629 13.0418C107.629 22.1838 100.071 29.588 90.8338 29.588C81.5204 29.588 74.0391 22.1838 74.0391 13.0418C74.0391 3.89986 81.5967 -3.50439 90.8338 -3.50439C100.147 -3.50439 107.629 3.89986 107.629 13.0418ZM107.476 13.0418C107.476 3.97541 99.9946 -3.35323 90.8338 -3.35323C81.673 -3.35323 74.1918 3.97541 74.1918 13.0418C74.1918 22.1082 81.673 29.437 90.8338 29.437C99.9946 29.5125 107.476 22.1082 107.476 13.0418Z" fill="#EF9321"/>
<path d="M107.735 13.0419C107.735 22.2594 100.177 29.7392 90.8634 29.7392C81.55 29.7392 73.916 22.2594 73.916 13.0419C73.916 3.82435 81.4736 -3.65542 90.8634 -3.65542C100.177 -3.57986 107.735 3.82435 107.735 13.0419ZM107.582 13.0419C107.582 3.89991 100.101 -3.50435 90.8634 -3.50435C81.6263 -3.50435 74.1451 3.89991 74.1451 13.0419C74.1451 22.1838 81.6263 29.5881 90.8634 29.5881C100.101 29.5881 107.582 22.1838 107.582 13.0419Z" fill="#F09521"/>
<path d="M107.839 13.0412C107.839 22.3342 100.205 29.8141 90.8147 29.8141C81.4249 29.8141 73.791 22.2587 73.791 13.0412C73.791 3.82365 81.4249 -3.73166 90.8147 -3.73166C100.205 -3.73166 107.839 3.82365 107.839 13.0412ZM107.686 13.0412C107.686 3.82365 100.128 -3.58059 90.8147 -3.58059C81.5013 -3.58059 73.9437 3.8992 73.9437 13.0412C73.9437 22.1831 81.5013 29.6629 90.8147 29.6629C100.128 29.6629 107.686 22.2587 107.686 13.0412Z" fill="#F09621"/>
<path d="M107.942 13.0421C107.942 22.4107 100.308 29.9661 90.8423 29.9661C81.3762 29.9661 73.7422 22.4107 73.7422 13.0421C73.7422 3.67348 81.3762 -3.88188 90.8423 -3.88188C100.308 -3.88188 107.942 3.74903 107.942 13.0421ZM107.79 13.0421C107.79 3.82459 100.232 -3.73072 90.8423 -3.73072C81.4525 -3.73072 73.8949 3.74903 73.8949 13.0421C73.8949 22.2596 81.5289 29.815 90.8423 29.815C100.156 29.815 107.79 22.3352 107.79 13.0421Z" fill="#F09821"/>
<path d="M108.049 13.0415C108.049 22.4101 100.338 30.041 90.7958 30.041C81.2533 30.041 73.543 22.4101 73.543 13.0415C73.543 3.67287 81.2533 -3.95803 90.7958 -3.95803C100.338 -3.95803 108.049 3.67287 108.049 13.0415ZM107.896 13.0415C107.896 3.74842 100.262 -3.80687 90.7958 -3.80687C81.406 -3.80687 73.6956 3.74842 73.6956 13.0415C73.6956 22.3346 81.3296 29.8899 90.7958 29.8899C100.262 29.8899 107.896 22.4101 107.896 13.0415Z" fill="#F09A22"/>
<path d="M108.152 13.0415C108.152 22.4857 100.366 30.1922 90.8232 30.1922C81.2808 30.1922 73.4941 22.5612 73.4941 13.0415C73.4941 3.52175 81.2808 -4.10911 90.8232 -4.10911C100.442 -4.03355 108.152 3.59731 108.152 13.0415ZM108 13.0415C108 3.67286 100.289 -3.8825 90.8232 -3.8825C81.3571 -3.8825 73.6468 3.67286 73.6468 13.0415C73.6468 22.4101 81.3571 29.9655 90.8232 29.9655C100.289 30.041 108 22.4101 108 13.0415Z" fill="#F19C21"/>
<path d="M108.259 13.0417C108.259 22.5615 100.472 30.2679 90.7768 30.2679C81.1579 30.2679 73.2949 22.5615 73.2949 13.0417C73.2949 3.52199 81.0816 -4.18441 90.7768 -4.18441C100.472 -4.18441 108.259 3.59754 108.259 13.0417ZM108.106 13.0417C108.106 3.59754 100.396 -4.03334 90.8531 -4.03334C81.3106 -4.03334 73.6003 3.59754 73.6003 13.0417C73.6003 22.4859 81.3106 30.1168 90.8531 30.1168C100.396 30.1168 108.106 22.4859 108.106 13.0417Z" fill="#F19D21"/>
<path d="M108.362 13.042C108.362 22.6372 100.499 30.3437 90.8043 30.3437C81.1091 30.3437 73.2461 22.5617 73.2461 13.042C73.2461 3.52223 81.1091 -4.25979 90.8043 -4.25979C100.499 -4.25979 108.362 3.52223 108.362 13.042ZM108.21 13.042C108.21 3.52223 100.423 -4.10863 90.8043 -4.10863C81.1854 -4.10863 73.3987 3.59778 73.3987 13.042C73.3987 22.5617 81.1854 30.1926 90.8043 30.1926C100.423 30.1926 108.21 22.5617 108.21 13.042Z" fill="#F09F21"/>
<path d="M108.468 13.042C108.468 22.6373 100.529 30.4949 90.8337 30.4949C81.0622 30.4949 73.1992 22.7129 73.1992 13.042C73.1992 3.44676 81.1385 -4.41078 90.8337 -4.41078C100.605 -4.33522 108.468 3.44676 108.468 13.042ZM108.316 13.042C108.316 3.52231 100.453 -4.25971 90.8337 -4.25971C81.1385 -4.25971 73.3519 3.44676 73.3519 13.042C73.3519 22.5618 81.2149 30.3438 90.8337 30.3438C100.529 30.3438 108.316 22.6373 108.316 13.042Z" fill="#EF9F22"/>
<path d="M108.651 13.0422C108.651 22.713 100.711 30.5706 90.8634 30.5706C81.0156 30.5706 73.0762 22.713 73.0762 13.0422C73.0762 3.37136 81.0156 -4.48616 90.8634 -4.48616C100.711 -4.48616 108.651 3.37136 108.651 13.0422ZM108.422 13.0422C108.422 3.44691 100.559 -4.33509 90.7871 -4.33509C81.0919 -4.33509 73.1525 3.44691 73.1525 13.0422C73.1525 22.6375 81.0156 30.4195 90.7871 30.4195C100.559 30.4195 108.422 22.6375 108.422 13.0422Z" fill="#EFA221"/>
<path d="M108.754 13.0423C108.754 22.7887 100.739 30.7218 90.8909 30.7218C81.043 30.7218 73.0273 22.7887 73.0273 13.0423C73.0273 3.29589 81.043 -4.63725 90.8909 -4.63725C100.739 -4.56169 108.754 3.29589 108.754 13.0423ZM108.525 13.0423C108.525 3.37144 100.586 -4.41055 90.8146 -4.41055C81.0431 -4.41055 73.1037 3.44699 73.1037 13.0423C73.1037 22.6376 81.0431 30.4951 90.8146 30.4951C100.662 30.5707 108.525 22.7131 108.525 13.0423Z" fill="#F1A31F"/>
<path d="M108.859 13.0417C108.859 22.8636 100.767 30.7967 90.8425 30.7967C80.9183 30.7967 72.8262 22.8636 72.8262 13.0417C72.8262 3.21972 80.9183 -4.71339 90.8425 -4.71339C100.767 -4.71339 108.859 3.29527 108.859 13.0417ZM108.63 13.0417C108.63 3.29527 100.614 -4.56223 90.766 -4.56223C80.9182 -4.56223 72.9026 3.29527 72.9026 13.0417C72.9026 22.7881 80.9182 30.6457 90.766 30.6457C100.614 30.6457 108.63 22.7881 108.63 13.0417Z" fill="#F1A61F"/>
<path d="M108.962 13.0415C108.962 22.939 100.87 30.8721 90.8699 30.8721C80.8694 30.8721 72.7773 22.8634 72.7773 13.0415C72.7773 3.21953 80.8694 -4.78912 90.8699 -4.78912C100.87 -4.78912 108.962 3.21953 108.962 13.0415ZM108.81 13.0415C108.81 3.29508 100.794 -4.63805 90.8699 -4.63805C80.9458 -4.63805 72.9301 3.29508 72.9301 13.0415C72.9301 22.7879 80.9458 30.721 90.8699 30.721C100.718 30.7966 108.81 22.8634 108.81 13.0415Z" fill="#F1A61F"/>
<path d="M109.068 13.0419C109.068 22.9394 100.9 31.0237 90.8994 31.0237C80.8989 31.0237 72.7305 23.015 72.7305 13.0419C72.7305 3.1444 80.8989 -4.93976 90.8994 -4.93976C100.9 -4.93976 109.068 3.1444 109.068 13.0419ZM108.916 13.0419C108.916 3.21995 100.824 -4.78869 90.8994 -4.78869C80.8989 -4.78869 72.8831 3.21995 72.8831 13.0419C72.8831 22.8638 80.9752 30.8725 90.8994 30.8725C100.824 30.8725 108.916 22.9394 108.916 13.0419Z" fill="#EFA91F"/>
<path d="M109.174 13.0417C109.174 23.0148 101.006 31.099 90.8528 31.099C80.6996 31.099 72.5312 23.0148 72.5312 13.0417C72.5312 3.06866 80.6996 -5.01558 90.8528 -5.01558C100.93 -5.01558 109.174 3.06866 109.174 13.0417ZM109.022 13.0417C109.022 3.14421 100.93 -4.86442 90.8528 -4.86442C80.8523 -4.86442 72.684 3.14421 72.684 13.0417C72.684 22.9392 80.776 30.9479 90.8528 30.9479C100.853 31.0235 109.022 22.9392 109.022 13.0417Z" fill="#EFA91F"/>
<path d="M109.278 13.0413C109.278 23.0899 101.034 31.2497 90.8803 31.2497C80.7271 31.2497 72.4824 23.0899 72.4824 13.0413C72.4824 2.99272 80.7271 -5.16703 90.8803 -5.16703C101.034 -5.09148 109.278 3.06828 109.278 13.0413ZM109.126 13.0413C109.126 3.06828 100.957 -5.01596 90.8803 -5.01596C80.8034 -5.01596 72.6352 3.06828 72.6352 13.0413C72.6352 23.0144 80.8034 31.0986 90.8803 31.0986C100.957 31.0986 109.126 23.0144 109.126 13.0413Z" fill="#EFAB1F"/>
<path d="M109.384 13.0415C109.384 23.1656 101.063 31.3255 90.8337 31.3255C80.6042 31.3255 72.2832 23.1656 72.2832 13.0415C72.2832 2.91732 80.6042 -5.24242 90.8337 -5.24242C101.063 -5.24242 109.384 2.99287 109.384 13.0415ZM109.232 13.0415C109.232 2.99287 100.987 -5.09135 90.8337 -5.09135C80.6805 -5.09135 72.4358 2.99287 72.4358 13.0415C72.4358 23.0901 80.6805 31.1743 90.8337 31.1743C100.987 31.1743 109.232 23.0901 109.232 13.0415Z" fill="#F0AF1E"/>
<path d="M109.488 13.0418C109.488 23.166 101.167 31.4013 90.8613 31.4013C80.5554 31.4013 72.2344 23.166 72.2344 13.0418C72.2344 2.91766 80.5554 -5.31762 90.8613 -5.31762C101.167 -5.31762 109.488 2.91766 109.488 13.0418ZM109.336 13.0418C109.336 2.99321 101.091 -5.16655 90.8613 -5.16655C80.6318 -5.16655 72.3871 2.99321 72.3871 13.0418C72.3871 23.0904 80.6318 31.2502 90.8613 31.2502C101.015 31.3257 109.336 23.166 109.336 13.0418Z" fill="#F2B01D"/>
<path d="M109.594 13.0418C109.594 23.2415 101.197 31.5524 90.8147 31.5524C80.4325 31.5524 72.0352 23.2415 72.0352 13.0418C72.0352 2.84209 80.4325 -5.46879 90.8147 -5.46879C101.197 -5.46879 109.594 2.84209 109.594 13.0418ZM109.442 13.0418C109.442 2.91764 101.121 -5.31763 90.8911 -5.31763C80.6615 -5.31763 72.3405 2.91764 72.3405 13.0418C72.3405 23.166 80.6615 31.4013 90.8911 31.4013C101.121 31.4013 109.442 23.166 109.442 13.0418Z" fill="#F0B11D"/>
<path d="M109.698 13.0421C109.698 23.3173 101.224 31.6282 90.8422 31.6282C80.46 31.6282 71.9863 23.3173 71.9863 13.0421C71.9863 2.76681 80.46 -5.54405 90.8422 -5.54405C101.224 -5.54405 109.698 2.76681 109.698 13.0421ZM109.545 13.0421C109.545 2.84236 101.148 -5.39298 90.8422 -5.39298C80.5364 -5.39298 72.139 2.84236 72.139 13.0421C72.139 23.2418 80.5364 31.4771 90.8422 31.4771C101.148 31.5527 109.545 23.2418 109.545 13.0421Z" fill="#F0B31D"/>
<path d="M109.804 13.042C109.804 23.3929 101.33 31.7793 90.8718 31.7793C80.4132 31.7793 71.9395 23.3929 71.9395 13.042C71.9395 2.69122 80.4132 -5.69516 90.8718 -5.69516C101.33 -5.61961 109.804 2.76677 109.804 13.042ZM109.651 13.042C109.651 2.76677 101.254 -5.54409 90.8718 -5.54409C80.4896 -5.54409 72.0922 2.76677 72.0922 13.042C72.0922 23.3173 80.4896 31.6282 90.8718 31.6282C101.254 31.6282 109.651 23.3173 109.651 13.042Z" fill="#F1B51C"/>
<path d="M109.908 13.0419C109.908 23.4682 101.358 31.8547 90.8232 31.8547C80.2883 31.8547 71.7383 23.3927 71.7383 13.0419C71.7383 2.69103 80.2883 -5.77097 90.8232 -5.77097C101.358 -5.77097 109.908 2.69103 109.908 13.0419ZM109.755 13.0419C109.755 2.76659 101.282 -5.61981 90.8232 -5.61981C80.3647 -5.61981 71.8909 2.76659 71.8909 13.0419C71.8909 23.3171 80.3647 31.7036 90.8232 31.7036C101.282 31.7036 109.755 23.3927 109.755 13.0419Z" fill="#F1B61C"/>
<path d="M110.014 13.0411C110.014 23.4675 101.464 32.005 90.8527 32.005C80.2415 32.005 71.6914 23.543 71.6914 13.0411C71.6914 2.61471 80.2415 -5.92281 90.8527 -5.92281C101.464 -5.92281 110.014 2.61471 110.014 13.0411ZM109.861 13.0411C109.861 2.69026 101.311 -5.69612 90.8527 -5.69612C80.3941 -5.69612 71.844 2.69026 71.844 13.0411C71.844 23.3919 80.3941 31.7784 90.8527 31.7784C101.311 31.7784 109.861 23.4675 109.861 13.0411Z" fill="#F2BA1B"/>
<path d="M110.118 13.0417C110.118 23.5437 101.492 32.0813 90.8043 32.0813C80.1167 32.0813 71.4902 23.5437 71.4902 13.0417C71.4902 2.53983 80.1167 -5.99768 90.8043 -5.99768C101.492 -5.99768 110.118 2.53983 110.118 13.0417ZM109.966 13.0417C109.966 2.61538 101.415 -5.84661 90.8043 -5.84661C80.2694 -5.84661 71.6429 2.61538 71.6429 13.0417C71.6429 23.4681 80.193 31.9301 90.8043 31.9301C101.415 31.9301 109.966 23.4681 109.966 13.0417Z" fill="#F2BA1B"/>
<path d="M110.224 13.0415C110.224 23.6189 101.521 32.1565 90.8337 32.1565C80.1461 32.1565 71.4434 23.6189 71.4434 13.0415C71.4434 2.46399 80.1461 -6.07349 90.8337 -6.07349C101.521 -6.07349 110.224 2.46399 110.224 13.0415ZM110.071 13.0415C110.071 2.53954 101.445 -5.92242 90.8337 -5.92242C80.2225 -5.92242 71.596 2.53954 71.596 13.0415C71.596 23.5434 80.2225 32.0054 90.8337 32.0054C101.445 32.0809 110.071 23.5434 110.071 13.0415Z" fill="#F2BC1A"/>
<path d="M110.328 13.0415C110.328 23.6946 101.625 32.3077 90.8612 32.3077C80.0973 32.3077 71.3945 23.6946 71.3945 13.0415C71.3945 2.38851 80.0973 -6.22458 90.8612 -6.22458C101.625 -6.14902 110.328 2.46407 110.328 13.0415ZM110.175 13.0415C110.175 2.46407 101.549 -6.07342 90.8612 -6.07342C80.1736 -6.07342 71.5472 2.46407 71.5472 13.0415C71.5472 23.619 80.1736 32.1566 90.8612 32.1566C101.549 32.1566 110.175 23.619 110.175 13.0415Z" fill="#F2BD1A"/>
<path d="M110.432 13.0414C110.432 23.6944 101.653 32.383 90.8127 32.383C79.9724 32.383 71.1934 23.6944 71.1934 13.0414C71.1934 2.38833 79.9724 -6.3003 90.8127 -6.3003C101.653 -6.3003 110.432 2.38833 110.432 13.0414ZM110.279 13.0414C110.279 2.46388 101.577 -6.14923 90.8127 -6.14923C80.0487 -6.14923 71.346 2.46388 71.346 13.0414C71.346 23.6188 80.0487 32.232 90.8127 32.232C101.577 32.232 110.279 23.6944 110.279 13.0414Z" fill="#F2BF19"/>
<path d="M110.538 13.0422C110.538 23.7708 101.682 32.535 90.8421 32.535C80.0019 32.535 71.1465 23.8464 71.1465 13.0422C71.1465 2.31362 80.0019 -6.45052 90.8421 -6.45052C101.682 -6.45052 110.538 2.31362 110.538 13.0422ZM110.385 13.0422C110.385 2.38917 101.606 -6.22392 90.8421 -6.22392C80.0782 -6.22392 71.2991 2.38917 71.2991 13.0422C71.2991 23.6952 80.0782 32.3083 90.8421 32.3083C101.606 32.3839 110.385 23.6952 110.385 13.0422Z" fill="#F2BF19"/>
<path d="M110.642 13.0416C110.642 23.8457 101.787 32.61 90.7937 32.61C79.8771 32.61 70.9453 23.8457 70.9453 13.0416C70.9453 2.23745 79.8007 -6.52676 90.7937 -6.52676C101.787 -6.52676 110.642 2.23745 110.642 13.0416ZM110.489 13.0416C110.489 2.31301 101.71 -6.3756 90.7937 -6.3756C79.9534 -6.3756 71.098 2.31301 71.098 13.0416C71.098 23.7702 79.8771 32.4589 90.7937 32.4589C101.71 32.4589 110.489 23.7702 110.489 13.0416Z" fill="#F3C318"/>
<path d="M110.748 13.0423C110.748 23.922 101.816 32.6862 90.8231 32.6862C79.8302 32.6862 70.8984 23.8464 70.8984 13.0423C70.8984 2.23812 79.8302 -6.60163 90.8231 -6.60163C101.816 -6.60163 110.748 2.23812 110.748 13.0423ZM110.595 13.0423C110.595 2.23812 101.74 -6.45047 90.8231 -6.45047C79.9065 -6.45047 71.0511 2.31367 71.0511 13.0423C71.0511 23.7709 79.9065 32.5351 90.8231 32.5351C101.74 32.6106 110.595 23.8464 110.595 13.0423Z" fill="#F3C318"/>
<path d="M110.852 13.0418C110.852 23.9971 101.844 32.8369 90.7747 32.8369C79.7054 32.8369 70.6973 23.9971 70.6973 13.0418C70.6973 2.08658 79.7054 -6.75314 90.7747 -6.75314C101.92 -6.67758 110.852 2.16213 110.852 13.0418ZM110.699 13.0418C110.699 2.23769 101.768 -6.60207 90.851 -6.60207C79.8581 -6.60207 71.0026 2.16213 71.0026 13.0418C71.0026 23.9215 79.9344 32.6857 90.851 32.6857C101.844 32.6857 110.699 23.9215 110.699 13.0418Z" fill="#F5C717"/>
<path d="M110.958 13.0421C110.958 23.9973 101.95 32.9127 90.8041 32.9127C79.6585 32.9127 70.6504 23.9973 70.6504 13.0421C70.6504 2.08682 79.6585 -6.82843 90.8041 -6.82843C101.95 -6.82843 110.958 2.08682 110.958 13.0421ZM110.805 13.0421C110.805 2.16237 101.873 -6.67736 90.8041 -6.67736C79.7349 -6.67736 70.8031 2.16237 70.8031 13.0421C70.8031 23.9218 79.7349 32.7615 90.8041 32.7615C101.873 32.837 110.805 23.9973 110.805 13.0421Z" fill="#F5C917"/>
<path d="M111.062 13.0418C111.062 24.0726 101.977 33.0635 90.8316 33.0635C79.6097 33.0635 70.6016 24.1482 70.6016 13.0418C70.6016 2.01101 79.686 -6.97985 90.8316 -6.97985C102.054 -6.90429 111.062 2.01101 111.062 13.0418ZM110.909 13.0418C110.909 2.08657 101.901 -6.82869 90.8316 -6.82869C79.7623 -6.82869 70.7542 2.08657 70.7542 13.0418C70.7542 23.9971 79.7623 32.9124 90.8316 32.9124C101.901 32.9124 110.909 23.9971 110.909 13.0418Z" fill="#F5CA16"/>
<path d="M111.244 13.042C111.244 24.1483 102.16 33.1392 90.8612 33.1392C79.6393 33.1392 70.4785 24.1483 70.4785 13.042C70.4785 1.93561 79.5629 -7.05523 90.8612 -7.05523C102.083 -7.05523 111.244 1.93561 111.244 13.042ZM111.015 13.042C111.015 2.01116 102.007 -6.90416 90.7849 -6.90416C79.6393 -6.90416 70.5548 2.01116 70.5548 13.042C70.5548 24.0728 79.5629 32.9881 90.7849 32.9881C102.007 32.9881 111.015 24.0728 111.015 13.042Z" fill="#F5CC15"/>
<path d="M111.348 13.0413C111.348 24.2232 102.187 33.2141 90.8888 33.2141C79.5905 33.2141 70.4297 24.1476 70.4297 13.0413C70.4297 1.9349 79.5905 -7.13147 90.8888 -7.13147C102.111 -7.13147 111.348 1.9349 111.348 13.0413ZM111.119 13.0413C111.119 1.9349 102.034 -6.9804 90.8125 -6.9804C79.5905 -6.9804 70.5061 2.01046 70.5061 13.0413C70.5061 24.0721 79.5905 33.0629 90.8125 33.0629C102.034 33.1385 111.119 24.1476 111.119 13.0413Z" fill="#F6CE14"/>
<path d="M111.454 13.0413C111.454 24.2232 102.217 33.3652 90.8422 33.3652C79.4676 33.3652 70.2305 24.2988 70.2305 13.0413C70.2305 1.78385 79.4676 -7.28258 90.8422 -7.28258C102.217 -7.20703 111.454 1.8594 111.454 13.0413ZM111.225 13.0413C111.225 1.93496 102.064 -7.13142 90.7659 -7.13142C79.4676 -7.13142 70.3831 1.8594 70.3831 13.0413C70.3831 24.2232 79.544 33.2141 90.7659 33.2141C102.141 33.2141 111.225 24.2232 111.225 13.0413Z" fill="#F6CE14"/>
<path d="M111.558 13.0416C111.558 24.299 102.321 33.441 90.8697 33.441C79.4187 33.441 70.1816 24.299 70.1816 13.0416C70.1816 1.78409 79.4187 -7.35788 90.8697 -7.35788C102.244 -7.35788 111.558 1.78409 111.558 13.0416ZM111.405 13.0416C111.405 1.85964 102.244 -7.20671 90.8697 -7.20671C79.4951 -7.20671 70.3343 1.85964 70.3343 13.0416C70.3343 24.2235 79.4951 33.2899 90.8697 33.2899C102.168 33.3655 111.405 24.299 111.405 13.0416Z" fill="#F6CE14"/>
<path d="M111.664 13.042C111.664 24.375 102.35 33.5926 90.8993 33.5926C79.4483 33.5926 70.1348 24.375 70.1348 13.042C70.1348 1.70895 79.4483 -7.50853 90.8993 -7.50853C102.35 -7.43298 111.664 1.70895 111.664 13.042ZM111.511 13.042C111.511 1.78451 102.274 -7.35746 90.8993 -7.35746C79.5246 -7.35746 70.2875 1.78451 70.2875 13.042C70.2875 24.2994 79.5246 33.4414 90.8993 33.4414C102.274 33.4414 111.511 24.2994 111.511 13.042Z" fill="#F6CE14"/>
<path d="M111.768 13.0418C111.768 24.4503 102.378 33.6679 90.8507 33.6679C79.3234 33.6679 69.9336 24.4503 69.9336 13.0418C69.9336 1.63321 79.3234 -7.58426 90.8507 -7.58426C102.378 -7.58426 111.768 1.70876 111.768 13.0418ZM111.615 13.0418C111.615 1.70876 102.302 -7.43319 90.8507 -7.43319C79.3998 -7.43319 70.0862 1.70876 70.0862 13.0418C70.0862 24.3748 79.3998 33.5167 90.8507 33.5167C102.302 33.5167 111.615 24.3748 111.615 13.0418Z" fill="#F6CE14"/>
<path d="M111.874 13.0419C111.874 24.526 102.484 33.8191 90.8802 33.8191C79.2765 33.8191 69.8867 24.526 69.8867 13.0419C69.8867 1.55774 79.2765 -7.73533 90.8802 -7.73533C102.484 -7.65978 111.874 1.6333 111.874 13.0419ZM111.721 13.0419C111.721 1.70885 102.407 -7.50863 90.8802 -7.50863C79.3529 -7.50863 70.0394 1.70885 70.0394 13.0419C70.0394 24.3749 79.3529 33.5925 90.8802 33.5925C102.331 33.668 111.721 24.4504 111.721 13.0419Z" fill="#F6CE14"/>
<path d="M111.978 13.0417C111.978 24.5258 102.512 33.8944 90.8316 33.8944C79.1517 33.8944 69.6855 24.5258 69.6855 13.0417C69.6855 1.55756 79.1517 -7.81105 90.8316 -7.81105C102.512 -7.81105 111.978 1.55756 111.978 13.0417ZM111.825 13.0417C111.825 1.63311 102.435 -7.65998 90.8316 -7.65998C79.228 -7.65998 69.8382 1.63311 69.8382 13.0417C69.8382 24.4502 79.228 33.7433 90.8316 33.7433C102.435 33.7433 111.825 24.5258 111.825 13.0417Z" fill="#F6CE14"/>
<path d="M112.084 13.0418C112.084 24.6015 102.617 33.9702 90.8611 33.9702C79.1048 33.9702 69.6387 24.6015 69.6387 13.0418C69.6387 1.48215 79.1811 -7.88644 90.8611 -7.88644C102.541 -7.88644 112.084 1.48215 112.084 13.0418ZM111.931 13.0418C111.931 1.5577 102.465 -7.73537 90.8611 -7.73537C79.2574 -7.73537 69.7913 1.5577 69.7913 13.0418C69.7913 24.5259 79.2574 33.819 90.8611 33.819C102.465 33.8946 111.931 24.5259 111.931 13.0418Z" fill="#F6CE14"/>
<path d="M112.188 13.0415C112.188 24.6767 102.645 34.1209 90.8127 34.1209C79.0563 34.1209 69.4375 24.6767 69.4375 13.0415C69.4375 1.40625 78.98 -8.03795 90.8127 -8.03795C102.645 -7.96239 112.188 1.40625 112.188 13.0415ZM112.035 13.0415C112.035 1.4818 102.569 -7.88679 90.889 -7.88679C79.209 -7.88679 69.7429 1.4818 69.7429 13.0415C69.7429 24.6012 79.209 33.9698 90.889 33.9698C102.569 33.9698 112.035 24.6012 112.035 13.0415Z" fill="#F6CE14"/>
<path d="M112.292 13.0422C112.292 24.7529 102.673 34.1971 90.8402 34.1971C79.0075 34.1971 69.3887 24.7529 69.3887 13.0422C69.3887 1.33137 79.0075 -8.11281 90.8402 -8.11281C102.673 -8.11281 112.292 1.40693 112.292 13.0422ZM112.139 13.0422C112.139 1.40693 102.596 -7.96164 90.8402 -7.96164C79.0838 -7.96164 69.5413 1.40693 69.5413 13.0422C69.5413 24.6774 79.0838 34.046 90.8402 34.046C102.596 34.046 112.139 24.6774 112.139 13.0422Z" fill="#F6CE14"/>
<path d="M112.397 13.0417C112.397 24.828 102.779 34.3478 90.8696 34.3478C78.9606 34.3478 69.3418 24.828 69.3418 13.0417C69.3418 1.25535 78.9606 -8.26435 90.8696 -8.26435C102.779 -8.18879 112.397 1.3309 112.397 13.0417ZM112.245 13.0417C112.245 1.40646 102.702 -8.03774 90.8696 -8.03774C79.0369 -8.03774 69.4944 1.40646 69.4944 13.0417C69.4944 24.6769 79.0369 34.1211 90.8696 34.1211C102.702 34.1211 112.245 24.7525 112.245 13.0417Z" fill="#F6CE14"/>
<path d="M112.504 13.0411C112.504 24.8274 102.808 34.4228 90.8231 34.4228C78.8378 34.4228 69.1426 24.8274 69.1426 13.0411C69.1426 1.25476 78.8378 -8.34047 90.8231 -8.34047C102.808 -8.34047 112.504 1.25476 112.504 13.0411ZM112.351 13.0411C112.351 1.33031 102.732 -8.1894 90.8231 -8.1894C78.9141 -8.1894 69.2953 1.33031 69.2953 13.0411C69.2953 24.7519 78.9141 34.2716 90.8231 34.2716C102.732 34.2716 112.351 24.8274 112.351 13.0411Z" fill="#F6CE14"/>
<path d="M112.607 13.0413C112.607 24.9032 102.836 34.4985 90.8506 34.4985C78.8653 34.4985 69.0938 24.9032 69.0938 13.0413C69.0938 1.17946 78.8653 -8.41585 90.8506 -8.41585C102.836 -8.41585 112.607 1.17946 112.607 13.0413ZM112.455 13.0413C112.455 1.25501 102.76 -8.26468 90.8506 -8.26468C78.9416 -8.26468 69.2464 1.25501 69.2464 13.0413C69.2464 24.8277 78.9416 34.3475 90.8506 34.3475C102.76 34.423 112.455 24.8277 112.455 13.0413Z" fill="#F6CE14"/>
<path d="M112.712 13.0418C112.712 24.9793 102.94 34.6501 90.8022 34.6501C78.7405 34.6501 68.8926 24.9793 68.8926 13.0418C68.8926 1.10438 78.6641 -8.56644 90.8022 -8.56644C102.94 -8.49089 112.712 1.17993 112.712 13.0418ZM112.559 13.0418C112.559 1.17993 102.864 -8.41537 90.8785 -8.41537C78.8931 -8.41537 69.198 1.17993 69.198 13.0418C69.198 24.9037 78.8931 34.499 90.8785 34.499C102.864 34.499 112.559 24.9037 112.559 13.0418Z" fill="#F6CE14"/>
<path d="M112.817 13.0416C112.817 25.0546 102.97 34.7255 90.8316 34.7255C78.6936 34.7255 68.8457 24.979 68.8457 13.0416C68.8457 1.10413 78.6936 -8.64223 90.8316 -8.64223C102.97 -8.64223 112.817 1.10413 112.817 13.0416ZM112.665 13.0416C112.665 1.17968 102.893 -8.49116 90.8316 -8.49116C78.7699 -8.49116 68.9984 1.17968 68.9984 13.0416C68.9984 24.9035 78.7699 34.5743 90.8316 34.5743C102.893 34.5743 112.665 24.979 112.665 13.0416Z" fill="#F6CE14"/>
<path d="M112.923 13.0416C112.923 25.0546 102.999 34.8766 90.8611 34.8766C78.6467 34.8766 68.7988 25.1302 68.7988 13.0416C68.7988 0.953075 78.723 -8.79333 90.8611 -8.79333C103.075 -8.71778 112.923 1.02863 112.923 13.0416ZM112.771 13.0416C112.771 1.10418 102.923 -8.64217 90.8611 -8.64217C78.7994 -8.64217 68.9515 1.02863 68.9515 13.0416C68.9515 25.0546 78.7994 34.7255 90.8611 34.7255C102.923 34.7255 112.771 25.0546 112.771 13.0416Z" fill="#F6CE14"/>
<path d="M113.028 13.0419C113.028 25.1304 103.103 34.9524 90.8126 34.9524C78.5219 34.9524 68.5977 25.1304 68.5977 13.0419C68.5977 0.953346 78.5219 -8.8686 90.8126 -8.8686C103.103 -8.8686 113.028 0.953346 113.028 13.0419ZM112.875 13.0419C112.875 1.0289 103.027 -8.71744 90.8126 -8.71744C78.5983 -8.71744 68.7504 1.0289 68.7504 13.0419C68.7504 25.0549 78.5983 34.8013 90.8126 34.8013C103.027 34.8013 112.875 25.0549 112.875 13.0419Z" fill="#F6CE14"/>
<path d="M113.133 13.0417C113.133 25.2058 103.133 35.0277 90.8421 35.0277C78.5514 35.0277 68.5508 25.1303 68.5508 13.0417C68.5508 0.877602 78.5514 -8.94432 90.8421 -8.94432C103.133 -8.94432 113.133 0.877602 113.133 13.0417ZM112.981 13.0417C112.981 0.953156 103.056 -8.79325 90.8421 -8.79325C78.6277 -8.79325 68.7035 1.02871 68.7035 13.0417C68.7035 25.0547 78.6277 34.8767 90.8421 34.8767C103.056 34.9522 112.981 25.1303 112.981 13.0417Z" fill="#F6CE14"/>
<path d="M113.237 13.0412C113.237 25.2809 103.237 35.1784 90.7934 35.1784C78.4264 35.1784 68.3496 25.2809 68.3496 13.0412C68.3496 0.801586 78.3501 -9.09586 90.7934 -9.09586C103.237 -9.02031 113.237 0.87714 113.237 13.0412ZM113.085 13.0412C113.085 0.87714 103.084 -8.94479 90.7934 -8.94479C78.5027 -8.94479 68.5023 0.87714 68.5023 13.0412C68.5023 25.2053 78.5027 35.0273 90.7934 35.0273C103.161 35.0273 113.085 25.2053 113.085 13.0412Z" fill="#F8CF10"/>
<path d="M113.341 13.0419C113.341 25.3571 103.264 35.2547 90.821 35.2547C78.3776 35.2547 68.3008 25.2816 68.3008 13.0419C68.3008 0.80228 78.3776 -9.17079 90.821 -9.17079C103.264 -9.17079 113.341 0.80228 113.341 13.0419ZM113.189 13.0419C113.189 0.877834 103.188 -9.01963 90.821 -9.01963C78.454 -9.01963 68.4535 0.877834 68.4535 13.0419C68.4535 25.206 78.454 35.1036 90.821 35.1036C103.188 35.1792 113.189 25.2816 113.189 13.0419Z" fill="#F8CF10"/>
<path d="M113.447 13.0416C113.447 25.3568 103.294 35.4054 90.7745 35.4054C78.2547 35.4054 68.1016 25.4323 68.1016 13.0416C68.1016 0.650806 78.2547 -9.32223 90.7745 -9.32223C103.294 -9.32223 113.447 0.72636 113.447 13.0416ZM113.295 13.0416C113.295 0.801914 103.218 -9.17116 90.8508 -9.17116C78.4837 -9.17116 68.4069 0.72636 68.4069 13.0416C68.4069 25.2812 78.4837 35.2543 90.8508 35.2543C103.218 35.2543 113.295 25.3568 113.295 13.0416Z" fill="#F8CF10"/>
<path d="M113.553 13.0423C113.553 25.4331 103.4 35.4817 90.8039 35.4817C78.2078 35.4817 68.0547 25.4331 68.0547 13.0423C68.0547 0.651531 78.2078 -9.39704 90.8039 -9.39704C103.4 -9.39704 113.553 0.651531 113.553 13.0423ZM113.4 13.0423C113.4 0.727085 103.324 -9.24597 90.8039 -9.24597C78.3605 -9.24597 68.2073 0.727085 68.2073 13.0423C68.2073 25.3575 78.2842 35.3306 90.8039 35.3306C103.324 35.3306 113.4 25.3575 113.4 13.0423Z" fill="#F8CD12"/>
<path d="M113.657 13.0412C113.657 25.5076 103.428 35.6317 90.8315 35.6317C78.2354 35.6317 68.0059 25.5076 68.0059 13.0412C68.0059 0.574928 78.2354 -9.54925 90.8315 -9.54925C103.428 -9.54925 113.657 0.650482 113.657 13.0412ZM113.504 13.0412C113.504 0.650482 103.351 -9.32255 90.8315 -9.32255C78.3118 -9.32255 68.1586 0.726036 68.1586 13.0412C68.1586 25.3565 78.3118 35.405 90.8315 35.405C103.351 35.4806 113.504 25.432 113.504 13.0412Z" fill="#F8CD12"/>
<path d="M113.747 13.0413C113.747 25.5076 103.518 35.6318 90.8453 35.6318C78.1729 35.6318 67.9434 25.5076 67.9434 13.0413C67.9434 0.574989 78.1729 -9.54919 90.8453 -9.54919C103.518 -9.54919 113.747 0.574989 113.747 13.0413ZM113.671 13.0413C113.671 0.650543 103.441 -9.47356 90.8453 -9.47356C78.2492 -9.47356 68.0197 0.574989 68.0197 13.0413C68.0197 25.5076 78.2492 35.5563 90.8453 35.5563C103.441 35.5563 113.671 25.5076 113.671 13.0413Z" fill="#F8CD12"/>
</g>
<mask id="mask2_676_682" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="80" y="11" width="2" height="3">
<path d="M81.0583 11.6718C80.6002 11.8985 80.753 12.4273 80.753 12.5784C80.8293 12.8051 80.9819 12.9561 81.0583 13.0317C81.1346 13.1073 81.2873 13.1829 81.3637 13.1829C81.2873 12.8806 81.5164 12.8806 81.5164 12.5784L81.5927 12.2006C81.5163 12.2006 82.0507 11.7473 81.8981 11.6718C81.8981 11.6718 81.8217 11.6717 81.669 11.5962C81.5927 11.5962 81.44 11.5206 81.3637 11.5206C81.2873 11.5962 81.211 11.5962 81.0583 11.6718Z" fill="white"/>
</mask>
<g mask="url(#mask2_676_682)">
<path d="M80.6758 11.4441H82.0499V11.5952H80.6758V11.4441Z" fill="#F9C814"/>
</g>
<path d="M81.5613 12.6154C81.5613 12.9177 81.4087 12.9177 81.4087 13.2199C81.3324 13.2199 81.1797 13.1444 81.1033 13.0688C80.9506 12.9177 80.8743 12.8421 80.7979 12.6154C80.7216 12.3888 80.6453 11.9355 81.1033 11.7088C81.5614 11.4822 81.8667 11.7844 81.943 11.7844C82.0194 11.7844 81.5613 12.3133 81.6377 12.3133L81.5613 12.6154Z" stroke="#F9D00D" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M99.3136 15.9979C99.3899 15.9224 99.4663 15.9224 99.5427 15.9224C98.8556 17.4335 98.0159 18.869 96.7944 20.0778C96.6418 20.229 96.5654 20.3045 96.4128 20.3801C96.2601 20.4556 96.1074 20.6067 96.0311 20.6822C95.8784 20.7578 95.802 20.8333 95.6494 20.9844C95.344 21.1356 95.0386 21.4378 94.6569 21.5134C93.9698 21.8156 93.2828 22.0422 92.5194 22.1933C92.2141 22.2688 91.985 22.3444 91.6796 22.3444C91.2979 22.42 90.9163 22.3444 90.6109 22.42C90.3819 22.42 90.2292 22.3444 90.0002 22.3444C89.8475 22.3444 89.6949 22.2689 89.4658 22.2689C89.3132 22.2689 89.1604 22.1933 88.9314 22.1178C86.2595 21.2867 83.6639 19.3223 82.9005 16.6024C82.9005 16.4513 82.8242 16.2246 82.8242 16.0735C82.9006 16.2246 82.9769 16.3757 83.0533 16.5268C84.122 18.8689 86.2595 20.6823 88.7788 21.2111C89.0078 21.2867 89.2367 21.2867 89.3894 21.3622C89.5421 21.3622 89.7712 21.3622 89.9239 21.4378C90.5346 21.4378 91.1452 21.4378 91.6796 21.4378C91.756 21.4378 91.8323 21.4378 91.9087 21.3622C92.9011 21.3622 93.8936 21.06 94.8096 20.6822C94.9623 20.6067 95.1913 20.5312 95.344 20.4556C95.4967 20.3801 95.6493 20.3045 95.802 20.2289C95.9547 20.1534 96.1074 20.0778 96.1837 19.9267C97.2525 19.0956 98.1685 17.9623 98.7793 16.7535C99.0846 16.3757 99.1609 16.149 99.3136 15.9979Z" fill="#BCA531"/>
<path d="M99.3136 15.9979C99.3899 15.9224 99.4663 15.9224 99.5427 15.9224C98.8556 17.4335 98.0159 18.869 96.7944 20.0778C96.6418 20.229 96.5654 20.3045 96.4127 20.3801C96.2601 20.4556 96.1074 20.6067 96.0311 20.6822C95.8784 20.7578 95.802 20.8333 95.6494 20.9844C95.344 21.1356 95.0386 21.4378 94.6569 21.5134C93.9698 21.8156 93.2828 22.0422 92.5194 22.1933C92.2141 22.2688 91.985 22.3444 91.6796 22.3444C91.2979 22.42 90.9163 22.3444 90.6109 22.42C90.3819 22.42 90.2292 22.3444 90.0002 22.3444C89.8475 22.3444 89.6949 22.2689 89.4658 22.2689C89.3132 22.2689 89.1604 22.1933 88.9314 22.1178C86.2595 21.2867 83.6639 19.3223 82.9005 16.6024C82.9005 16.4513 82.8242 16.2246 82.8242 16.0735C82.9006 16.2246 82.9769 16.3757 83.0533 16.5268C84.122 18.8689 86.2595 20.6823 88.7788 21.2111C89.0078 21.2867 89.2367 21.2867 89.3894 21.3622C89.5421 21.3622 89.7712 21.3622 89.9239 21.4378C90.5346 21.4378 91.1452 21.4378 91.6796 21.4378C91.756 21.4378 91.8323 21.4378 91.9087 21.3622C92.9011 21.3622 93.8936 21.06 94.8096 20.6822C94.9623 20.6067 95.1913 20.5312 95.344 20.4556C95.4967 20.3801 95.6493 20.3045 95.802 20.2289C95.9547 20.1534 96.1074 20.0778 96.1837 19.9267C97.2525 19.0956 98.1685 17.9623 98.7793 16.7535C99.0846 16.3757 99.1609 16.149 99.3136 15.9979Z" stroke="#BCA531" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M98.3776 21.0484C100.133 20.0662 102.118 19.5374 104.103 19.4618C104.714 19.3863 105.401 19.3863 106.012 19.5374C106.393 19.6129 106.851 19.764 107.157 20.0662C107.004 20.0662 106.851 19.9907 106.622 19.9907C106.164 19.9151 105.63 19.9151 105.172 19.9151C103.798 19.9151 102.347 19.9907 101.05 20.3684C100.362 20.5951 99.599 20.8217 98.9883 21.1995C97.8432 21.8039 96.8508 22.635 96.0874 23.5416C94.637 25.2038 93.7972 27.2438 93.4155 29.4348C93.1865 30.5681 92.9574 31.7014 92.8048 32.8347C92.4994 32.8347 92.1941 32.8347 91.965 32.8347C90.6673 32.8347 89.4458 32.8347 88.148 32.8347C87.8427 32.8347 87.6137 32.7592 87.3083 32.8347C85.0181 32.8347 82.6515 32.8347 80.3613 32.8347H80.4377C82.1936 32.6836 83.873 32.457 85.6288 32.3059C87.8427 32.3059 89.9801 32.3059 92.194 32.3059C92.2703 32.3059 92.3467 32.3058 92.4231 32.2303C92.5757 31.3236 92.8047 30.3415 92.9574 29.4348C93.1864 28.1504 93.5682 26.866 94.1789 25.7327C95.0187 23.6928 96.5455 22.1062 98.3776 21.0484Z" fill="#0664AE"/>
<path d="M98.3776 21.0484C100.133 20.0662 102.118 19.5374 104.103 19.4618C104.714 19.3863 105.401 19.3863 106.012 19.5374C106.393 19.6129 106.851 19.764 107.157 20.0662C107.004 20.0662 106.851 19.9907 106.622 19.9907C106.164 19.9151 105.63 19.9151 105.172 19.9151C103.798 19.9151 102.347 19.9907 101.05 20.3684C100.362 20.5951 99.599 20.8217 98.9883 21.1995C97.8432 21.8039 96.8508 22.635 96.0874 23.5416C94.637 25.2038 93.7972 27.2438 93.4155 29.4348C93.1865 30.5681 92.9574 31.7014 92.8048 32.8347C92.4994 32.8347 92.1941 32.8347 91.965 32.8347C90.6673 32.8347 89.4458 32.8347 88.148 32.8347C87.8427 32.8347 87.6137 32.7592 87.3083 32.8347C85.0181 32.8347 82.6515 32.8347 80.3613 32.8347H80.4377C82.1936 32.6836 83.873 32.457 85.6288 32.3059C87.8427 32.3059 89.9801 32.3059 92.194 32.3059C92.2703 32.3059 92.3467 32.3058 92.4231 32.2303C92.5757 31.3236 92.8047 30.3415 92.9574 29.4348C93.1864 28.1504 93.5682 26.866 94.1789 25.7327C95.0187 23.6928 96.5455 22.1062 98.3776 21.0484Z" stroke="#0664AE" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M101.076 20.3331C102.451 19.9553 103.825 19.8798 105.199 19.8798C105.657 19.8798 106.191 19.8798 106.649 19.9553C106.802 19.9553 106.955 20.0309 107.184 20.0309C107.489 20.2576 107.642 20.5598 107.718 20.862C108.023 21.6176 108.1 22.4486 108.252 23.2042C108.252 23.5064 108.329 23.8842 108.176 24.1864C108.023 24.4886 107.718 24.6397 107.413 24.7152C106.268 25.0174 105.122 24.7152 103.977 25.0175C103.061 25.2441 102.222 25.6975 101.611 26.453C100.924 27.2841 100.542 28.3418 100.389 29.3995C100.237 30.3061 100.008 31.2884 99.8551 32.195C99.7787 32.4217 99.7787 32.6484 99.7023 32.875C100.771 32.875 101.916 32.875 102.985 32.875C103.367 32.875 103.825 32.875 104.206 32.875C104.435 33.4039 104.359 34.0083 104.283 34.5372C104.206 35.1416 104.054 35.746 103.748 36.3505C103.519 36.8038 103.138 37.2571 102.603 37.4838C102.298 37.5593 101.993 37.5593 101.764 37.5593C100.771 37.5593 99.7787 37.5593 98.8626 37.5593C98.7099 38.2393 98.6336 38.9949 98.4809 39.6748C98.2519 41.0348 97.9465 42.4703 97.7175 43.8303C97.7175 43.9058 97.7175 43.9813 97.7175 44.0569C95.1983 44.0569 92.6791 44.0569 90.1598 44.0569V43.9813C90.3125 43.9813 90.6179 44.0569 90.6179 43.8303C90.9996 41.7148 91.3813 39.5993 91.763 37.4838C91.6103 37.4838 91.4576 37.4838 91.3049 37.4838C91.3049 37.5593 91.2286 37.6348 91.2286 37.7104C91.2286 37.6348 91.2286 37.5593 91.2286 37.4838C89.6255 37.4838 88.0987 37.4838 86.4956 37.4838C86.1139 37.4838 85.7322 37.4838 85.3505 37.4082C84.6634 37.4082 84.0526 37.4082 83.3656 37.3326C82.5258 37.3326 81.7625 37.2571 80.9227 37.2571C80.312 37.1815 79.625 37.1815 79.0143 37.1815C78.6326 37.106 78.1746 37.1816 77.7165 37.106C77.0295 37.0305 76.3423 37.106 75.6553 37.0305C74.8919 37.0305 74.2048 36.9548 73.4414 36.9548C73.6704 36.9548 73.8995 36.9548 74.1285 36.9548C74.6629 36.8793 75.1972 36.9549 75.7316 36.8793C76.266 36.8793 76.8768 36.8038 77.4111 36.8038C77.9455 36.7282 78.4036 36.8038 78.9379 36.7282C79.5486 36.7282 80.083 36.6527 80.6937 36.6527C81.1517 36.5771 81.6861 36.6526 82.1442 36.5771C82.6785 36.5771 83.2893 36.5015 83.8237 36.5015C84.3581 36.426 84.9688 36.426 85.5031 36.426C85.4268 36.1993 85.4268 35.9726 85.3505 35.8215C85.2742 35.6704 85.1215 35.746 85.0451 35.6705C83.8237 35.5194 82.5259 35.2927 81.3044 35.1416C81.3808 35.0661 81.4571 35.1416 81.6098 35.066C82.6022 34.9905 83.5183 34.915 84.5107 34.8394C84.7397 34.8394 84.9687 34.7639 85.1978 34.7639C85.1214 34.4617 85.0451 34.1594 84.8924 33.8572C82.8312 33.555 80.7701 33.2528 78.6326 32.9506C79.1669 32.875 79.7013 32.7994 80.2357 32.7994C82.5259 32.7994 84.8924 32.7994 87.1826 32.7994C87.4879 32.7994 87.717 32.875 88.0224 32.7994C89.3202 32.7994 90.5416 32.7994 91.8394 32.7994C92.1447 32.7994 92.4501 32.7994 92.6791 32.7994C92.8318 31.6661 93.0607 30.5328 93.2898 29.3995C93.6715 27.284 94.5876 25.1686 96.0381 23.5064C96.8778 22.5242 97.8702 21.7687 98.9389 21.1642C99.626 20.7865 100.313 20.5597 101.076 20.3331Z" fill="#1F74BA"/>
<path d="M90.1599 43.9813V44.0569C92.6791 44.0569 95.1983 44.0569 97.7175 44.0569C97.7175 43.9813 97.7175 43.9058 97.7175 43.8303C97.9465 42.4703 98.2519 41.0348 98.4809 39.6748C98.6336 38.9949 98.7099 38.2393 98.8626 37.5593C99.7787 37.5593 100.771 37.5593 101.764 37.5593C101.993 37.5593 102.298 37.5593 102.603 37.4838C103.138 37.2571 103.519 36.8038 103.748 36.3505C104.054 35.746 104.206 35.1416 104.283 34.5372C104.359 34.0083 104.435 33.4039 104.206 32.875C103.825 32.875 103.367 32.875 102.985 32.875C101.916 32.875 100.771 32.875 99.7023 32.875C99.7787 32.6484 99.7787 32.4217 99.8551 32.195C100.008 31.2884 100.237 30.3061 100.389 29.3995C100.542 28.3418 100.924 27.2841 101.611 26.453C102.222 25.6975 103.061 25.2441 103.977 25.0175C105.122 24.7152 106.268 25.0174 107.413 24.7152C107.718 24.6397 108.023 24.4886 108.176 24.1864C108.329 23.8842 108.252 23.5064 108.252 23.2042C108.1 22.4486 108.023 21.6176 107.718 20.862C107.642 20.5598 107.489 20.2576 107.184 20.0309C106.955 20.0309 106.802 19.9553 106.649 19.9553C106.191 19.8798 105.657 19.8798 105.199 19.8798C103.825 19.8798 102.451 19.9553 101.076 20.3331C100.313 20.5597 99.626 20.7865 98.9389 21.1642C97.8702 21.7687 96.8778 22.5242 96.0381 23.5064C94.5876 25.1686 93.6715 27.284 93.2898 29.3995C93.0607 30.5328 92.8318 31.6661 92.6791 32.7994C92.4501 32.7994 92.1447 32.7994 91.8394 32.7994C90.5416 32.7994 89.3202 32.7994 88.0224 32.7994C87.717 32.875 87.4879 32.7994 87.1826 32.7994C84.8924 32.7994 82.5259 32.7994 80.2357 32.7994C79.7013 32.7994 79.1669 32.875 78.6326 32.9506C80.7701 33.2528 82.8312 33.555 84.8924 33.8572C85.0451 34.1594 85.1214 34.4617 85.1978 34.7639C84.9687 34.7639 84.7397 34.8394 84.5107 34.8394C83.5183 34.915 82.6022 34.9905 81.6098 35.066C81.4571 35.1416 81.3808 35.0661 81.3044 35.1416C82.5259 35.2927 83.8237 35.5194 85.0451 35.6705C85.1215 35.746 85.2742 35.6704 85.3505 35.8215C85.4268 35.9726 85.4268 36.1993 85.5031 36.426C84.9688 36.426 84.3581 36.426 83.8237 36.5015C83.2893 36.5015 82.6785 36.5771 82.1442 36.5771C81.6861 36.6526 81.1517 36.5772 80.6937 36.6527C80.083 36.6527 79.5486 36.7282 78.9379 36.7282C78.4036 36.8038 77.9455 36.7282 77.4111 36.8038C76.8768 36.8038 76.266 36.8793 75.7316 36.8793C75.1972 36.9549 74.6629 36.8793 74.1285 36.9548C73.8995 36.9548 73.6704 36.9548 73.4414 36.9548C74.2048 36.9548 74.8919 37.0305 75.6553 37.0305C76.3423 37.106 77.0295 37.0305 77.7165 37.106C78.1746 37.1816 78.6326 37.106 79.0143 37.1815C79.625 37.1815 80.312 37.1815 80.9227 37.2571C81.7625 37.2571 82.5258 37.3326 83.3656 37.3326C84.0526 37.4082 84.6634 37.4082 85.3505 37.4082C85.7322 37.4838 86.1139 37.4838 86.4956 37.4838C88.0987 37.4838 89.6255 37.4838 91.2286 37.4838C91.2286 37.5593 91.2286 37.6348 91.2286 37.7104C91.2286 37.6348 91.3049 37.5593 91.3049 37.4838C91.4576 37.4838 91.6103 37.4838 91.763 37.4838C91.3813 39.5993 90.9996 41.7148 90.6179 43.8303C90.6179 44.0569 90.3125 43.9813 90.1599 43.9813ZM90.1599 43.9813C90.1599 43.9813 90.1599 43.9058 90.1599 43.8303" stroke="#1F74BA" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M99.8323 32.2349C100.901 32.2349 102.046 32.2349 103.115 32.2349C103.573 32.2349 104.031 32.4615 104.184 32.9149C103.802 32.9149 103.344 32.9149 102.962 32.9149C101.894 32.9149 100.748 32.9149 99.6797 32.9149C99.6797 32.6882 99.756 32.4616 99.8323 32.2349Z" fill="#0664AE"/>
<path d="M99.8323 32.2349C100.901 32.2349 102.046 32.2349 103.115 32.2349C103.573 32.2349 104.031 32.4615 104.184 32.9149C103.802 32.9149 103.344 32.9149 102.962 32.9149C101.894 32.9149 100.748 32.9149 99.6797 32.9149C99.6797 32.6882 99.756 32.4616 99.8323 32.2349Z" stroke="#0664AE" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M91.2369 37.584C91.3896 37.584 91.5422 37.584 91.6949 37.584C91.3132 39.6995 90.9315 41.8151 90.5498 43.9305C90.4735 44.1572 90.2445 44.0816 90.0918 44.0816C90.0918 44.0061 90.0918 43.9305 90.0918 43.9305C90.4735 41.8906 90.7789 39.9262 91.1606 37.8863C91.2369 37.7352 91.2369 37.6596 91.2369 37.584Z" fill="#0664AE"/>
<path d="M91.2369 37.584C91.3896 37.584 91.5422 37.584 91.6949 37.584C91.3132 39.6995 90.9315 41.8151 90.5498 43.9305C90.4735 44.1572 90.2445 44.0816 90.0918 44.0816C90.0918 44.0061 90.0918 43.9305 90.0918 43.9305C90.4735 41.8906 90.7789 39.9262 91.1606 37.8863C91.2369 37.7352 91.2369 37.6596 91.2369 37.584Z" stroke="#0664AE" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M100.348 12.4243C100.272 12.3488 100.272 12.2732 100.272 12.1221H100.196C100.119 11.8954 99.8902 11.5932 99.6612 11.5932C99.4322 11.5932 99.2031 11.5932 99.0504 11.7443C98.8214 12.0465 98.8978 12.4243 98.8978 12.8021V12.8776C98.8978 13.1043 98.8977 13.331 98.8214 13.5576C98.8214 13.6332 98.7451 13.7088 98.7451 13.7843C98.6687 14.3132 98.4397 14.842 98.2107 15.3709C98.1344 15.4465 98.1344 15.522 98.1344 15.5975C97.9817 15.8997 97.7527 16.202 97.5236 16.4287L97.4473 16.5042C97.2946 16.6553 97.142 16.8064 96.9893 17.0331C96.913 17.0331 96.9129 17.1086 96.9129 17.1086C96.6839 17.2597 96.5313 17.4864 96.2259 17.6375L96.1495 17.7131C94.699 18.6952 92.8669 19.0731 91.1111 19.0731C89.5843 19.1486 88.1339 18.7708 86.7597 18.1664C86.7597 18.1664 86.6834 18.1664 86.6834 18.0908C86.4544 17.9397 86.2254 17.8642 85.9963 17.7131C85.92 17.7131 85.9199 17.6375 85.8436 17.6375C85.6146 17.4864 85.462 17.4109 85.2329 17.1842C85.1566 17.1087 85.0802 17.1086 85.0039 17.0331C84.7749 16.8819 84.5459 16.6553 84.3932 16.5042C84.3169 16.4287 84.3168 16.4286 84.2405 16.3531C83.6298 15.6731 83.0954 14.9175 82.8664 14.0865C82.6374 13.4065 82.6374 12.651 82.6374 11.971C82.4083 11.6688 81.9503 11.4421 81.6449 11.6688C81.4922 11.7443 81.4923 11.971 81.3396 12.1221C81.1869 14.0109 81.9503 15.8998 83.2481 17.2597C83.2481 17.3353 83.2481 17.3353 83.3244 17.3353C83.5535 17.5619 83.7825 17.7886 84.0115 17.9397C84.0879 18.0153 84.0878 18.0153 84.1642 18.0908C84.3932 18.3175 84.6222 18.4685 84.8512 18.6197C84.9276 18.6197 84.9275 18.6953 85.0039 18.6953C85.3092 18.8464 85.6146 19.073 85.9963 19.2241L86.0727 19.2997C87.1414 19.8285 88.3628 20.2063 89.5843 20.2819C89.737 20.2819 89.8133 20.2819 89.966 20.3574C90.5767 20.3574 91.1111 20.3574 91.7218 20.3574C93.4776 20.2063 95.3861 19.753 96.8366 18.6953C96.9129 18.6197 96.913 18.6197 96.9893 18.6197C97.2183 18.4685 97.4473 18.2419 97.6763 18.0908C97.7526 18.0153 97.7527 18.0153 97.829 17.9397C98.058 17.6375 98.3634 17.4108 98.5924 17.1086C98.5924 17.1086 98.6687 17.0331 98.6687 16.9575C98.8978 16.7309 99.0504 16.4287 99.2031 16.1264L99.2795 16.0509L99.3558 15.9753C99.6612 15.2953 99.9665 14.6909 100.043 13.9354C100.119 13.9354 100.119 13.8598 100.119 13.8598C100.119 13.6332 100.196 13.4065 100.196 13.1798C100.348 13.0287 100.348 12.7265 100.348 12.4243Z" fill="white"/>
<path d="M100.348 12.4243C100.272 12.3488 100.272 12.2732 100.272 12.1221H100.196C100.119 11.8954 99.8902 11.5932 99.6612 11.5932C99.4322 11.5932 99.2031 11.5932 99.0504 11.7443C98.8214 12.0465 98.8978 12.4243 98.8978 12.8021V12.8776C98.8978 13.1043 98.8977 13.331 98.8214 13.5576C98.8214 13.6332 98.7451 13.7088 98.7451 13.7843C98.6687 14.3132 98.4397 14.842 98.2107 15.3709C98.1344 15.4465 98.1344 15.522 98.1344 15.5975C97.9817 15.8997 97.7527 16.202 97.5236 16.4287L97.4473 16.5042C97.2946 16.6553 97.142 16.8064 96.9893 17.0331C96.913 17.0331 96.9129 17.1086 96.9129 17.1086C96.6839 17.2597 96.5313 17.4864 96.2259 17.6375L96.1495 17.7131C94.699 18.6952 92.8669 19.0731 91.1111 19.0731C89.5843 19.1486 88.1339 18.7708 86.7597 18.1664C86.7597 18.1664 86.6834 18.1664 86.6834 18.0908C86.4544 17.9397 86.2254 17.8642 85.9963 17.7131C85.92 17.7131 85.9199 17.6375 85.8436 17.6375C85.6146 17.4864 85.462 17.4109 85.2329 17.1842C85.1566 17.1087 85.0802 17.1086 85.0039 17.0331C84.7749 16.8819 84.5459 16.6553 84.3932 16.5042C84.3169 16.4287 84.3168 16.4286 84.2405 16.3531C83.6298 15.6731 83.0954 14.9175 82.8664 14.0864C82.6374 13.4065 82.6374 12.651 82.6374 11.971C82.4083 11.6688 81.9503 11.4421 81.6449 11.6688C81.4922 11.7443 81.4923 11.971 81.3396 12.1221C81.1869 14.0109 81.9503 15.8998 83.2481 17.2597C83.2481 17.3353 83.2481 17.3353 83.3244 17.3353C83.5535 17.5619 83.7825 17.7886 84.0115 17.9397C84.0879 18.0153 84.0878 18.0153 84.1642 18.0908C84.3932 18.3175 84.6222 18.4685 84.8512 18.6197C84.9276 18.6197 84.9275 18.6953 85.0039 18.6953C85.3092 18.8464 85.6146 19.073 85.9963 19.2241L86.0727 19.2997C87.1414 19.8285 88.3628 20.2063 89.5843 20.2819C89.737 20.2819 89.8133 20.2819 89.966 20.3574C90.5767 20.3574 91.1111 20.3574 91.7218 20.3574C93.4776 20.2063 95.3861 19.753 96.8366 18.6953C96.9129 18.6197 96.913 18.6197 96.9893 18.6197C97.2183 18.4685 97.4473 18.2419 97.6763 18.0908C97.7526 18.0153 97.7527 18.0153 97.829 17.9397C98.058 17.6375 98.3634 17.4108 98.5924 17.1086C98.5924 17.1086 98.6687 17.0331 98.6687 16.9575C98.8978 16.7309 99.0504 16.4287 99.2031 16.1264L99.2795 16.0509L99.3558 15.9753C99.6612 15.2953 99.9665 14.6909 100.043 13.9354C100.119 13.9354 100.119 13.8598 100.119 13.8598C100.119 13.6332 100.196 13.4065 100.196 13.1798C100.348 13.0287 100.348 12.7265 100.348 12.4243Z" stroke="white" stroke-width="0.00308413" stroke-miterlimit="22.926"/>
<path d="M80.9473 12.222C81.4053 12.3731 82.4741 11.9953 82.7794 12.3731M81.2526 13.6574C81.7107 13.5063 82.7031 13.1286 83.0848 13.3553M81.7107 15.093C81.9397 15.1685 82.3214 14.7908 82.5504 14.6397C82.8557 14.4885 83.1611 14.3374 83.5428 14.2619M82.3977 16.604C82.6268 16.3018 82.8558 15.9996 83.2375 15.773C83.5428 15.5463 84.4589 14.9418 84.8406 15.1685M83.0084 17.6618C83.2374 17.4351 83.3901 17.1329 83.6192 16.9063C83.9245 16.6796 84.4589 16.6041 84.7643 16.453M84.1535 18.4173C84.2298 17.8885 84.7643 17.2085 85.375 17.2085M84.9933 19.2484C85.2987 19.2484 85.5276 18.5685 85.6803 18.3418C85.9857 18.0396 86.2911 17.8884 86.6728 17.8129M86.5964 19.9284C86.5964 19.5506 86.9781 18.3418 87.5125 18.4173M87.8942 20.3062C87.8942 19.8528 88.1232 18.4173 88.7339 18.3418M89.1156 21.0617C89.0393 20.3817 89.0393 19.475 89.5737 18.9462M90.7188 21.2128C90.6425 20.6839 90.1081 19.5506 90.7188 19.0973M92.3982 20.835C92.1692 20.5328 91.9402 19.324 92.0929 19.0218M94.0014 20.5329C93.7723 20.1551 93.5434 19.8529 93.467 19.3996C93.3907 19.1729 93.467 18.7951 93.467 18.5684M95.3755 20.0039C94.9175 19.7017 94.8412 18.644 94.9175 18.1906M96.6733 19.3996C96.3679 18.7196 95.9862 18.1906 95.9862 17.4351M97.9711 18.1906C97.5131 17.8884 96.826 17.284 96.9023 16.604M99.3452 17.133C98.5818 16.9818 97.7421 16.3019 97.284 15.6974M99.9559 15.924C99.4215 15.7729 97.6657 15.0929 97.742 14.413M100.49 14.5641C99.7269 14.2619 98.6581 14.0352 98.0474 13.5064M100.948 13.3553C100.49 13.4308 99.8032 13.2042 99.3452 13.0531C98.8108 12.9775 98.3527 12.7508 97.8184 12.6753M100.414 12.1464C99.4979 12.2219 98.6581 11.9197 97.8184 11.6175" stroke="#CFD1D0" stroke-width="0.0670798" stroke-miterlimit="22.926"/>
</g>
<path d="M131.205 17.5225C132.359 17.5225 133.403 17.7906 134.335 18.3268C135.279 18.863 136.019 19.6149 136.556 20.5824C137.104 21.5382 137.377 22.6223 137.377 23.8345C137.377 25.0468 137.104 26.1367 136.556 27.1042C136.019 28.0717 135.279 28.8235 134.335 29.3597C133.403 29.8959 132.359 30.1641 131.205 30.1641C130.051 30.1641 129.002 29.8959 128.058 29.3597C127.126 28.8235 126.385 28.0717 125.837 27.1042C125.301 26.1367 125.033 25.0468 125.033 23.8345C125.033 22.6223 125.301 21.5382 125.837 20.5824C126.385 19.6149 127.126 18.863 128.058 18.3268C129.002 17.7906 130.051 17.5225 131.205 17.5225ZM131.205 19.7955C130.483 19.7955 129.847 19.9587 129.299 20.2851C128.752 20.6115 128.32 21.0836 128.006 21.7014C127.703 22.3075 127.551 23.0186 127.551 23.8345C127.551 24.6505 127.703 25.3674 128.006 25.9852C128.32 26.5913 128.752 27.0576 129.299 27.384C129.847 27.7103 130.483 27.8735 131.205 27.8735C131.928 27.8735 132.563 27.7103 133.111 27.384C133.659 27.0576 134.085 26.5913 134.388 25.9852C134.702 25.3674 134.86 24.6505 134.86 23.8345C134.86 23.0186 134.702 22.3075 134.388 21.7014C134.085 21.0836 133.659 20.6115 133.111 20.2851C132.563 19.9587 131.928 19.7955 131.205 19.7955ZM141.347 22.2085C141.709 21.5907 142.186 21.1069 142.781 20.7572C143.375 20.3959 144.04 20.2152 144.774 20.2152V22.8554H144.057C142.251 22.8554 141.347 23.6947 141.347 25.3732V30.0417H138.882V20.3551H141.347V22.2085ZM149.583 20.2327C150.399 20.2327 151.093 20.425 151.664 20.8097C152.247 21.1943 152.666 21.713 152.923 22.3658V17.1029H155.371V30.0417H152.923V28.0134C152.666 28.6662 152.247 29.1907 151.664 29.5871C151.093 29.9717 150.399 30.1641 149.583 30.1641C148.767 30.1641 148.033 29.9659 147.38 29.5696C146.727 29.1732 146.215 28.6021 145.842 27.8561C145.48 27.0984 145.299 26.2125 145.299 25.1984C145.299 24.1842 145.48 23.3042 145.842 22.5581C146.215 21.8005 146.727 21.2235 147.38 20.8271C148.033 20.4308 148.767 20.2327 149.583 20.2327ZM150.353 22.3833C149.583 22.3833 148.965 22.6339 148.499 23.1351C148.033 23.6364 147.8 24.3241 147.8 25.1984C147.8 26.0726 148.033 26.7603 148.499 27.2616C148.965 27.7511 149.583 27.9959 150.353 27.9959C151.099 27.9959 151.711 27.7453 152.189 27.2441C152.678 26.7312 152.923 26.0493 152.923 25.1984C152.923 24.3358 152.678 23.6539 152.189 23.1526C151.711 22.6397 151.099 22.3833 150.353 22.3833ZM166.365 24.8312C166.365 25.076 166.336 25.3557 166.277 25.6704H159.179C159.214 26.533 159.447 27.1683 159.878 27.5763C160.309 27.9843 160.846 28.1883 161.487 28.1883C162.058 28.1883 162.53 28.0484 162.903 27.7686C163.288 27.4889 163.532 27.11 163.637 26.6321H166.242C166.114 27.3082 165.84 27.9143 165.421 28.4505C165.001 28.9867 164.459 29.4064 163.795 29.7094C163.142 30.0125 162.413 30.1641 161.609 30.1641C160.665 30.1641 159.826 29.9659 159.091 29.5696C158.357 29.1616 157.786 28.5846 157.378 27.8386C156.97 27.0925 156.766 26.2125 156.766 25.1984C156.766 24.1842 156.97 23.3042 157.378 22.5581C157.786 21.8005 158.357 21.2235 159.091 20.8271C159.826 20.4308 160.665 20.2327 161.609 20.2327C162.565 20.2327 163.398 20.4308 164.109 20.8271C164.832 21.2235 165.386 21.7713 165.77 22.4707C166.167 23.1585 166.365 23.9453 166.365 24.8312ZM163.882 24.5864C163.917 23.7937 163.707 23.1934 163.253 22.7854C162.81 22.3775 162.262 22.1735 161.609 22.1735C160.945 22.1735 160.385 22.3775 159.93 22.7854C159.476 23.1934 159.225 23.7937 159.179 24.5864H163.882ZM170.231 22.2085C170.592 21.5907 171.07 21.1069 171.664 20.7572C172.259 20.3959 172.923 20.2152 173.658 20.2152V22.8554H172.941C171.134 22.8554 170.231 23.6947 170.231 25.3732V30.0417H167.765V20.3551H170.231V22.2085ZM188.586 30.0417H186.121L180.596 21.6489V30.0417H178.131V17.6974H180.596L186.121 26.16V17.6974H188.586V30.0417ZM194.944 20.2327C195.888 20.2327 196.733 20.4308 197.479 20.8271C198.237 21.2235 198.831 21.8005 199.262 22.5581C199.694 23.3042 199.909 24.1842 199.909 25.1984C199.909 26.2125 199.694 27.0925 199.262 27.8386C198.831 28.5846 198.237 29.1616 197.479 29.5696C196.733 29.9659 195.888 30.1641 194.944 30.1641C194 30.1641 193.149 29.9659 192.391 29.5696C191.645 29.1616 191.056 28.5846 190.625 27.8386C190.194 27.0925 189.978 26.2125 189.978 25.1984C189.978 24.1842 190.194 23.3042 190.625 22.5581C191.056 21.8005 191.645 21.2235 192.391 20.8271C193.149 20.4308 194 20.2327 194.944 20.2327ZM194.944 22.3658C194.256 22.3658 193.673 22.6106 193.195 23.1002C192.717 23.5781 192.478 24.2775 192.478 25.1984C192.478 26.1192 192.717 26.8244 193.195 27.314C193.673 27.7919 194.256 28.0309 194.944 28.0309C195.631 28.0309 196.214 27.7919 196.692 27.314C197.17 26.8244 197.409 26.1192 197.409 25.1984C197.409 24.2775 197.17 23.5781 196.692 23.1002C196.214 22.6106 195.631 22.3658 194.944 22.3658ZM215.168 20.3551L212.562 30.0417H209.835L207.754 22.9953L205.621 30.0417H202.893L200.305 20.3551H202.771L204.344 27.8386L206.495 20.3551H209.1L211.268 27.8386L212.86 20.3551H215.168Z" fill="white"/>
<defs>
<clipPath id="clip0_676_682">
<rect width="43.4498" height="42.8781" fill="white" transform="translate(68.8281 2.6026)"/>
</clipPath>
</defs>
</svg>

</a>
<a target="_blank" href="https://www.shopsy.in/joyy-herbal-100-natural-intimacy-chewable-candy-men-women-supports-stamina-chocolate/p/itmdc1802738674f?pid=GXZHMGJ9QD9B3H5G" class="shopsy-btn" style="display: inline-flex;align-items: center;gap: 10px;background: #503ceb;color: #fff;padding: 8px 66px;border-radius: 12px;font-size: 18px;font-weight: 600;font-family: Arial, sans-serif;cursor: pointer;box-shadow: 0 4px 10px rgba(0,0,0,0.2);transition: all 0.3s ease;">
  <img src="https://staging.vcardking.com/uploads/shopsy-icon.png" alt="shopsy" style="width: 46px;height: 30px;"/>
  <span>Order Now</span>
</a>
<a target="_blank" href="https://wa.me/919409196685" class="btn btn-primary align-items-center d-flex  gap-2" style="background: #25d366;border-color: #25d366;width: 265px;justify-content: center;">
                                                                                                
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
                                                                                                                                      Chat on WhatsApp
                                                                                        
                                                
                                                                                        
                                        </a>
</div>





                @endif

                @if($whatsappStore->id == 1600)
                    <div id="bannerNewCarousel" style="margin-top: 30px;">
                        <div>
                            <img src="https://staging.vcardking.com/uploads/1slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/2slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/3slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/4slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/5slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/6slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/7slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/8slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/9slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                        <div>
                            <img src="https://staging.vcardking.com/uploads/10slider.jpeg" style="max-width: 100%;border-radius: 8px;margin:auto;">
                        </div>
                    </div>
                @endif

                
            <div class="category-section px-50 pt-30 mb-2 pb-1 position-relative">
                @if($whatsappStore->id == 125 || $whatsappStore->id == 208 || $whatsappStore->id == 1488)
                    @if (request()->getHost() === 'staging.vcardking.com')  
                     <form action="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias]) }}" method="GET">
                    @else
                     <form action="{{ route('whatsapp.store.products') }}" method="GET">
                    @endif
                        <div class="search-input-container position-relative mb-4">
                            <input type="text" class="form-control" placeholder="Enter product name" name="search">
                            <button type="submit" style="position: absolute;top: 1px;right: 1px;background: #c29c77;color: #ffffff;padding: 6px 10px;border-radius: 4px;cursor: pointer;border: none !important;"><i class="fas fa-search" ></i></button>
                        </div>
                    </form>
                @endif
                <div class="section-heading d-flex justify-content-between" style="margin-bottom: 10px !important">
                    
                    @if($whatsappStore->id != 1502)
                        <h2 class="title-size w-75">{{ __('messages.whatsapp_stores_templates.choos_your_category') }}</h2>
                    @else
                        <h2 class="title-size w-75">Shop by Category</h2>
                    @endif
                    

                    @if ($whatsappStore->categories->count() > 0)
                         @if($whatsappStore->id != 348 && $whatsappStore->id != 1555)
                        <div class="w-25 mt-2 mb-3 d-flex justify-content-end">
                            <svg class="cursor-pointer {{ $whatsappStore->id == 322 ? 'rotate-icon' : ''  }}" data-content="{{ $whatsappStore->id == 322 ? 'View Less' : 'View All' }}" id="viewAllButton" onclick="viewAllCategories()" style="height: 15px;width: 15px;margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 18 10" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.615983 0.366227C0.381644 0.600637 0.25 0.918522 0.25 1.24998C0.25 1.58143 0.381644 1.89932 0.615983 2.13373L8.11598 9.63373C8.35039 9.86807 8.66828 9.99971 8.99973 9.99971C9.33119 9.99971 9.64907 9.86807 9.88348 9.63373L17.3835 2.13373C17.6112 1.89797 17.7372 1.58222 17.7343 1.25448C17.7315 0.92673 17.6 0.613214 17.3683 0.381454C17.1365 0.149694 16.823 0.0182329 16.4952 0.0153849C16.1675 0.0125369 15.8517 0.13853 15.616 0.366227L8.99973 6.98248L2.38348 0.366227C2.14907 0.131889 1.83119 0.000244141 1.49973 0.000244141C1.16828 0.000244141 0.850393 0.131889 0.615983 0.366227Z" fill="black"></path>
                            </svg>
                        </div>
                        @endif
                    @endif
                </div>
                <style>
                    .horizontal-scroll {
                        flex-wrap: nowrap;
                        overflow-x: auto;
                        overflow-y: hidden;
                        scroll-behavior: smooth;
                        -webkit-overflow-scrolling: touch;
                    }

                    .horizontal-scroll::-webkit-scrollbar {
                        height: 6px;  
                    }

                    .horizontal-scroll::-webkit-scrollbar-track {
                        background: #f3efe7;
                        border-radius: 10px;
                    }

                    .horizontal-scroll::-webkit-scrollbar-thumb {
                        background: #c8b6a6;
                        border-radius: 10px;
                        transition: background 0.3s ease;
                    }

                    .horizontal-scroll::-webkit-scrollbar-thumb:hover {
                        background: #b09b87;
                    }
                    .horizontal-scroll {
                        scrollbar-width: thin;
                        scrollbar-color: #c8b6a6 #f3efe7;
                    }
                </style>
                <div class="row category-image-container horizontal-scroll" style="{{$whatsappStore->id == 322 ? 'flex-wrap: wrap' : 'flex-wrap: nowrap;'}}">
                    @foreach ($whatsappStore->categories as $category)
                        <div class="col-xl-3 col-md-3 col-sm-6 mb-3 category-image-mobile position-relative" style="{{ $whatsappStore->id == 322 ? 'width: 97%' : ''  }}">
                           @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.products', ['alias' => $whatsappStore->url_alias, 'category' => $category->id]) }}"
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
                            <a onclick="setCategory({{$category->id}})" href="javascript:void(0)"
                           @endif
                                style="color: #212529">
                                <div class="category-item" style="position:relative;">
                                    <div class="category-img">
                                        <img src="{{ $category->image_url }}" alt="category"
                                            class="w-100 h-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                  
                                    <h3 class="category-name-size fs-18 fw-6 mb-0 text-break">{{ $category->name }}</h3>
                                   
                                </div>
                            </a>
                            @if($whatsappStore->id == 322)
                                
                                    <i class="fa-solid fa-share-nodes share-button" onclick="categoryShare({{$category->id}})"></i>    
                                
                                
                            @endif
                            
                        </div>
                    @endforeach
                    @if ($whatsappStore->categories->count() == 0)
                        <div class="text-center mb-5 mt-3">
                            <h3 class="fs-20 fw-6 mb-0">
                                {{ __('messages.whatsapp_stores_templates.category_not_found') }}</h3>
                        </div>
                    @endif
                </div>
                
                
            </div>
             
             @if($whatsappStore->id == 550)
            <div class="category-section-new px-50 mb-2 pb-1 position-relative">
                <div class="section-heading d-flex justify-content-between">
                <h2 class="w-75">Business Details</h2> 
                </div>                
                <div class="row category-image-container">
                @php
                $certificates = [
                    [
                        'name' => 'Just Dial Certificate',
                        'image' => 'https://staging.vcardking.com/uploads/justdial.jpeg',
                    ],
                    [
                        'name' => 'Google Verify Certificate',
                        'image' => 'https://staging.vcardking.com/uploads/google.jpeg',
                    ],
                    [
                        'name' => 'Office Licence',
                        'image' => 'https://staging.vcardking.com/uploads/licence.jpeg',
                    ],
                    [
                        'name' => 'All India Cab Service',
                        'image' => 'https://staging.vcardking.com/uploads/ahmedabad1.jpeg',
                    ],
                    [
                        'name' => 'Ahmedabad Office',
                        'image' => 'https://staging.vcardking.com/uploads/ahmedabad2.jpeg',
                    ],
                ];
                 @endphp               
                     @foreach ($certificates as $certificate)    
                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3 category-image-mobile position-relative">
                           
                            <a href="{{ $certificate['image'] }}"
                                style="color: #212529">
                                <div class="category-item-new" style="position:relative;">
                                    <div class="category-img">
                                        <img src="{{ $certificate['image'] }}" alt="{{ $certificate['image'] }}"
                                            class="w-100 h-100 object-fit-cover-certificate rounded" loading="lazy" />
                                    </div>                                    

                                    <h3 class="fs-16 fw-6 mb-0 text-break">{{ $certificate['name'] }}</h3>
                                </div>
                            </a>
                           
                            
                        </div>
                      @endforeach

                </div>
                
                
            </div>            
             @endif
                        
@include('whatsapp_stores.templates.beauty_products.custom-category-view')             
            
            <div class="product-section-new product-section px-50 position-relative {{ $whatsappStore->id == 1488 ? 'd-none' : '' }}">
                @if($whatsappStore->id != 348 && $whatsappStore->id != 1555)
                <div class="section-heading" style="margin-bottom: 10px !important">
                    <h2 class="title-size">
                        
                         @if($whatsappStore->id == 550)
                         Choose Your Services
                         @else
                        {{ __('messages.whatsapp_stores_templates.choose_your_product') }}
                          @endif
                        
                        </h2>
                </div>
                <style>
                    .mobile-card .product-img{
                        height: 168px;
                        background: #efe5db;
                        border: 1px solid black;
                        border-radius: 20px;
                        /* border-left: 1px solid black; */
                        border-bottom: 0px !important;
                        border-bottom-left-radius: 0px;
                        border-bottom-right-radius: 0px;
                        position: relative;
                    }
                    .mobile-card .product-img span{
                        position: absolute;
                        top: 59%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        font-size: 22px;
                        font-weight: 800;
                        letter-spacing: 2px;
                        color: #000000;
                    }
                    .mobile-card .mobile-card-save{
                        background: #c29c77;
                        color: #ffffff;
                        font-size: 17px;
                        font-weight: 600;
                        text-align: center;
                        height: 38px;
                        line-height: 36px;
                    }
                </style>
                <div class="row custom-row product-gap-row mb-40">
                    @php($productLimit= $whatsappStore->id == 423 ? 35 : $productLimit= $whatsappStore->id == 208 || $whatsappStore->id == 1488 ? 18 : 8)
                    @foreach ($whatsappStore->products()->where('available_stock', '>', 0)->where('is_active','=',true)->orderByRaw('position IS NULL, position ASC')->orderBy('created_at', 'desc')->take($productLimit)->get() as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                            <div class="product-card h-100 d-flex flex-column items-new-product {{$whatsappStore->id == 345 ? 'mobile-card' : ''}}" style="padding:0px;">
                                 @if (request()->getHost() === 'staging.vcardking.com') 
                                <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                @else
                                <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}"
                                @endif
                                    class="d-block">
                                    <div class="product-img">
                                        @if($whatsappStore->id == 345)
                                            <div class="mobile-card-save">Save {{ $product->currency->currency_icon }}{{$product->net_price - $product->selling_price}}</div>
                                        @endif
                                        @if($whatsappStore->id == 345)
                                            <span>{{ $product->name }}</span>
                                        @else
                                            <img src="{{ $product->images_url[0] ?? '' }}" alt="product"
                                                class="w-100 h-100 object-fit-cover product-image" loading="lazy" />
                                        @endif
                                    </div>
                                </a>
                                <input type="hidden" value="XL,XXL,CMS" id="product_size_{{$product->id}}"> 
                                <input type="hidden" value="{{$product->atribute_title}}" id="product_attr_title_{{$product->id}}"> 
                                <input type="hidden" value="{{$product->attributes}}" id="product_attr_attribu_{{$product->id}}">
                                <input type="hidden" value="{{$product->order_qty}}" id="product_order_qty_attribu_{{$product->id}}">
                                <input type="hidden" value="{{$product->qty_price}}" id="product_qty_price_attribu_{{$product->id}}">
                                
                                <div class="product-details" style="flex-grow: 1;">
                                    <div class="d-flex flex-column h-100 justify-content-between">
                                        
                                        @if (request()->getHost() === 'staging.vcardking.com') 
                                        <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}"
                                        @else
                                        <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}"
                                        @endif
                                            class="d-block text-dark">
                                            <div>
                                               

                                                @if($product->p_code)
                                                 <p class="fs-14 fw-5 mb-1 product-category">#{{ $product->p_code }}</p>
                                                @endif

                                                <h5 class="product-name-size fs-20 fw-6 mb-1 product-name {{ $whatsappStore->id != 345 ? '' : 'd-none' }}">{{ $product->name }}</h5>
                                                

                                                @if($whatsappStore->id != 1185)
                                                    <p class="fs-16 fw-5 mb-1 product-category  product-category-jk-filtter  {{ $whatsappStore->id != 345 ? '' : 'd-none' }}">
                                                        {{ $product->category->name }}
                                                    </p>
                                               @endif
                                                
                                                
                                                

                                                <p class="fs-18 fw-7">
                                                    <span class="currency_icon">
                                                        @if (!empty($product->selling_price))

                                                          @if($whatsappStore->id != 702)
                                                            {{ $product->currency->currency_icon }}
                                                          @endif
                                                        
                                                        
                                                        </span>
                                                            <span class="selling_price">{{ $product->selling_price }}</span>     
                                                            @if($whatsappStore->id == 702)
                                                                %
                                                            @endif    
                                                        @endif
                                                    
                                                    @if ($product->net_price)
                                                        @if($product->net_price != $product->selling_price)
                                                            <del class="fs-14 fw-7 text-gray-200">
                                                        @if($whatsappStore->id != 702)
                                                            {{ $product->currency->currency_icon }}
                                                        @endif

                                                                {{ $product->net_price }}

                                                            @if($whatsappStore->id == 702)
                                                                %
                                                            @endif                                                             
                                                            </del>
                                                        @endif
                                                    @endif
                                                </p>
                            
                                                @if($whatsappStore->id == 208)
                                                    @if(!empty($product->cartoon_qty))
                                                        <p class="fs-17 fw-7 text-gray-200-Blue">Cartoon Quantity ({{ $product->cartoon_qty }})</p> 
                                                    @endif
                                                @endif                                                
                                                
                                                
                                                <input type="hidden" value="{{ $product->available_stock }}"
                                               class="available-stock">
                                            </div>
                                        </a>

                                         @if($product->affiliate_url)
                                            <div>
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
                                                    
                                                    </div>
                                         @else
                                            <div>
                                        @if($whatsappStore->id == 860 || $whatsappStore->id == 1518)
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
                                             Inquiry Now 
                                                    <div class="cart">
                                                        <svg viewBox="0 0 36 26">
                                                            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                            </polyline>
                                                            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                        </svg>
                                                    </div>
                                            
                                            
                                          @elseif($whatsappStore->id != 396 && $whatsappStore->id != 322 && $whatsappStore->id != 619  && $whatsappStore->id != 860 && $whatsappStore->id != 1518 && $whatsappStore->id != 983)
                                                @if($whatsappStore->id == 344 || $whatsappStore->id == 348 || $whatsappStore->id == 1502)
                                                <button class="addToCartBtn" id="product-{{ $product->id }}" style="display: none;" data-id="{{ $product->id }}"></button>
                                                <button data-id="{{ $product->id }}"
                                            class="btn btn-primary attributeAskButton d-flex justify-content-center align-items-center mx-auto gap-2 w-100 mb-1 @if($product->available_stock == 0) disabled @endif"
                                            style="@if($product->available_stock == 0) background-color: red !important; border-color: red !important; @endif" data-id="{{ $product->id }}" style="margin-right: 1px;" onclick="openSizeModel({{$product->id}},'{{$product->sizes}}')">
                                                @else
                                                    <button data-id="{{ $product->id }}"
                                            class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 addToCartBtn w-100 mb-1 @if($product->available_stock == 0) disabled @endif"
                                            style="@if($product->available_stock == 0) background-color: red !important; border-color: red !important; @endif">
                                                @endif
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                            viewBox="0 0 24 25" fill="none">
                                                            <path
                                                                d="M8.28564 7.41444C8.28564 5.36304 9.94849 3.7002 11.9999 3.7002C14.0513 3.7002 15.7141 5.36304 15.7141 7.41444C15.7141 7.56599 15.6539 7.71134 15.5468 7.8185C15.4396 7.92566 15.2943 7.98587 15.1427 7.98587C14.9912 7.98587 14.8458 7.92566 14.7387 7.8185C14.6315 7.71134 14.5713 7.56599 14.5713 7.41444C14.5713 6.73247 14.3004 6.07842 13.8181 5.59619C13.3359 5.11396 12.6819 4.84304 11.9999 4.84304C11.3179 4.84304 10.6639 5.11396 10.1816 5.59619C9.69941 6.07842 9.42849 6.73247 9.42849 7.41444C9.42849 7.56599 9.36829 7.71134 9.26112 7.8185C9.15396 7.92566 9.00862 7.98587 8.85707 7.98587C8.70552 7.98587 8.56017 7.92566 8.45301 7.8185C8.34585 7.71134 8.28564 7.56599 8.28564 7.41444ZM12.5713 12.5572C12.5713 12.4057 12.5111 12.2604 12.404 12.1532C12.2968 12.046 12.1514 11.9858 11.9999 11.9858C11.8483 11.9858 11.703 12.046 11.5958 12.1532C11.4887 12.2604 11.4285 12.4057 11.4285 12.5572V14.2715H9.7142C9.56265 14.2715 9.41731 14.3317 9.31014 14.4389C9.20298 14.546 9.14278 14.6914 9.14278 14.8429C9.14278 14.9945 9.20298 15.1398 9.31014 15.247C9.41731 15.3542 9.56265 15.4144 9.7142 15.4144H11.4285V17.1286C11.4285 17.2802 11.4887 17.4255 11.5958 17.5327C11.703 17.6399 11.8483 17.7001 11.9999 17.7001C12.1514 17.7001 12.2968 17.6399 12.404 17.5327C12.5111 17.4255 12.5713 17.2802 12.5713 17.1286V15.4144H14.2856C14.4371 15.4144 14.5825 15.3542 14.6896 15.247C14.7968 15.1398 14.857 14.9945 14.857 14.8429C14.857 14.6914 14.7968 14.546 14.6896 14.4389C14.5825 14.3317 14.4371 14.2715 14.2856 14.2715H12.5713V12.5572Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.20225 10.7719C5.28737 10.234 5.56165 9.74422 5.97574 9.39058C6.38982 9.03693 6.91653 8.84268 7.46108 8.84277H16.5384C17.083 8.84261 17.6098 9.03683 18.0239 9.39049C18.4381 9.74414 18.7124 10.234 18.7975 10.7719L19.9715 18.2004C20.1907 19.5884 19.117 20.8427 17.7124 20.8427H6.28738C4.88282 20.8427 3.80912 19.5884 4.02854 18.2004L5.20225 10.7719ZM7.46108 9.98562C7.18873 9.98552 6.92529 10.0826 6.71814 10.2594C6.511 10.4363 6.37375 10.6812 6.33109 10.9502L5.1571 18.3787C5.13137 18.5419 5.14134 18.7088 5.18632 18.8678C5.23131 19.0269 5.31024 19.1742 5.41767 19.2998C5.52511 19.4254 5.65849 19.5262 5.80864 19.5952C5.95878 19.6643 6.12211 19.7 6.28738 19.6998H17.7124C17.8777 19.6999 18.041 19.6642 18.1911 19.5951C18.3412 19.5261 18.4746 19.4253 18.582 19.2997C18.6894 19.1741 18.7684 19.0268 18.8134 18.8678C18.8584 18.7088 18.8684 18.5419 18.8427 18.3787L17.6687 10.9502C17.626 10.6811 17.4887 10.4362 17.2815 10.2593C17.0743 10.0825 16.8108 9.98546 16.5384 9.98562H7.46108Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    @if($product->available_stock > 0)
                                                        {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                                                    @else
                                                        {{ __('messages.whatsapp_stores.out_of_stock') }}
                                                    @endif 
                                                    <div class="cart">
                                                        <svg viewBox="0 0 36 26">
                                                            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                            </polyline>
                                                            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                        </svg>
                                                    </div>
                                                </button>
                                        
                                            @endif
                                           
                                                 
                                        @if($whatsappStore->id != 64 && $whatsappStore->id != 125 && $whatsappStore->id != 208 && $whatsappStore->id != 651 && $whatsappStore->id != 721 && $whatsappStore->id != 41 && $whatsappStore->id != 707 && $whatsappStore->id != 860 && $whatsappStore->id != 1518 && $whatsappStore->id != 796 && $whatsappStore->id != 1010 && $whatsappStore->id != 1151 && $whatsappStore->id != 195 && $whatsappStore->id != 1591)
                                        
                                            @if($whatsappStore->id == 344 || $whatsappStore->id == 348 || $whatsappStore->id == 1502)
                                                 <button data-id="{{ $product->id }}"
                                            class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}',0,true,undefined,'{{$product->sizes}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
                                            @else
                                                 <button data-id="{{ $product->id }}"
                                            class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
                                            @endif             
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
                                            @if($whatsappStore->id == 322 || $whatsappStore->id == 983)
                                                Inquiry Now
                                            @else
                                              @if($whatsappStore->id == 550)
                                            Book now
                                            @else
                                            {{ __('messages.whatsapp_stores_templates.order_now') }}
                                            @endif                                            
                                                
                                            @endif
                                            <div class="cart">
                                                <svg viewBox="0 0 36 26">
                                                    <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                    </polyline>
                                                    <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                </svg>
                                            </div>
                                        </button>
                                        @else
                                          @if($whatsappStore->id == 125 || $whatsappStore->id == 651 || $whatsappStore->id == 1010 || $whatsappStore->id == 721 ||$whatsappStore->id == 41 || $whatsappStore->id == 707)
                                            @if($product->available_stock > 0)
                                            <button data-id="{{ $product->id }}"
                                            class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100 addToCartBtn" data-storebutton="true" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
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
                                                <div class="cart">
                                                    <svg viewBox="0 0 36 26">
                                                        <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                        </polyline>
                                                        <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                    </svg>
                                                </div>
                                        </button>
                                          @endif
                                         @endif
                                        @endif
                                         
                                        </div>
                                         @endif
                                        
                                        
                                       
                                    </div>
                                </div>
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
                @if($whatsappStore->id != 423)
                    @if ($whatsappStore->products->count() > 0)
                        <div class="text-center">
                          @if (request()->getHost() === 'staging.vcardking.com')
                            <a href="{{ route('whatsapp.store.products',$whatsappStore->url_alias) }}"
                          @else
                            <a href="{{ route('whatsapp.store.products') }}"
                          @endif
                                class="btn view-more-btn d-flex align-items-center justify-content-center mx-auto gap-1">
                                <span class="text">{{ __('messages.whatsapp_stores_templates.view_more') }}</span>
                                <span class="ps-2 pe-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M29.3079 15.6116H0.692533C0.352148 15.6116 0.0771484 15.3366 0.0771484 14.9962C0.0771484 14.6558 0.352148 14.3808 0.692533 14.3808H27.8214L24.0868 10.6462C23.8464 10.4058 23.8464 10.0154 24.0868 9.77502C24.3271 9.53463 24.7175 9.53463 24.9579 9.77502L29.7445 14.5616C29.9214 14.7385 29.9733 15.0019 29.8771 15.2327C29.781 15.4616 29.556 15.6116 29.3079 15.6116Z"
                                            fill="currentColor" />
                                        <path
                                            d="M24.5153 20.4039C24.3576 20.4039 24.1999 20.3443 24.0807 20.2231C23.8403 19.9828 23.8403 19.5924 24.0807 19.352L28.873 14.5597C29.1134 14.3193 29.5038 14.3193 29.7441 14.5597C29.9845 14.8001 29.9845 15.1905 29.7441 15.4308L24.9518 20.2231C24.8307 20.3443 24.673 20.4039 24.5153 20.4039Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    @endif
                @endif
                 @endif
                
                
                

                @if($whatsappStore->id != 1600) 

                @if(count(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id)) > 0)

                    <div class="section-heading text-center mt-5">
                        <div class="collection-title">
                            <!--<img src="./public/images/left.png">-->
                            <h2 class="crimson-pro-medium">Our Trending Videos</h2>
                            <!--<img src="./public/images/right.png">-->
                        </div>
                    </div>

                    @endif

                    
            
            
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

                @endif
                

                @if(!empty($whatsappStore->testimonials) && is_array(json_decode($whatsappStore->testimonials, true)) && count(json_decode($whatsappStore->testimonials, true)) > 0)
                    <style>
                        .testimonial-section .testimonial-card {
            border: 1px solid rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            min-height: 280px; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 10px; /* Space between slides in Slick */
        }

        .testimonial-section .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-section .quote-icon {
            width: 45px;
            height: 45px;
            margin-bottom: 1rem;
            opacity: 0.8;
            fill: #000;
        }

        .testimonial-section .review-text {
            font-size: 1.25rem; /* Slightly bigger as requested */
            line-height: 1.6;
            color: #4a4a4a;
        }

        /* Customizing Slick Dots */
        .testimonial-section .slick-dots li button:before {
            font-size: 12px;
            color: #0d6efd;
        }
        .testimonial-section .slick-dots li.slick-active button:before {
            color: #0d6efd;
        }
        
        /* Ensure cards in the same row have equal height */
        .testimonial-section .slick-track {
            display: flex !important;
        }
        .testimonial-section .slick-slide {
            height: inherit !important;
        }
                    </style>
                <section class="py-5 testimonial-section">
                <div class="container">
                    <h2 class="text-center mb-4 mt-3 title-size" style="font-weight: 600;">What Our Clients Say</h2>
                    
                    <!-- Slick Slider Container -->
                    <div class="testimonial-slider">
                    
                    <!-- Slide 1 -->
                    @foreach(json_decode($whatsappStore->testimonials, true) as $item)
                    <div class="px-2">
                        <div class="testimonial-card p-4 rounded-4 shadow-sm bg-white">
                        <div>
                            <svg class="quote-icon" viewBox="0 0 512 512">
                                <path d="M119.472,66.59C53.489,66.59,0,120.094,0,186.1c0,65.983,53.489,119.487,119.472,119.487c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.135,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.829-6.389c82.925-90.7,115.385-197.448,115.385-251.8C238.989,120.094,185.501,66.59,119.472,66.59z"/>
                                <path d="M392.482,66.59c-65.983,0-119.472,53.505-119.472,119.51c0,65.983,53.489,119.487,119.472,119.487c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.136,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.828-6.389C479.539,347.2,512,240.452,512,186.1C512,120.094,458.511,66.59,392.482,66.59z"/>
                            </svg>
                            <p class="review-text fst-italic">"{{ $item['review'] ?? '' }}"</p>
                        </div>
                        <div class="mt-3">
                            <div class="text-warning mb-2" style="font-size: 18px;">★★★★★</div>
                            <h6 class="mb-0 fw-bold">{{ $item['name'] ?? '' }}</h6>
                        </div>
                        </div>
                    </div>


                    @endforeach

                    </div>
                </div>
                </section>

                @endif
                
                
                
                @if($whatsappStore->id == 423)
                <img src="https://staging.vcardking.com/uploads/JKFilterwala.jpg" alt="Footer Banner - JK Filterwala" style="width: 100%; margin-top: 32px;">
                 @endif

                
                
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
        
        
        @if($whatsappStore->id == 1151 || $whatsappStore->id == 1407 || $whatsappStore->id == 1591 || $whatsappStore->id == 1700 || $whatsappStore->id == 7 || $whatsappStore->id == 1589 || $whatsappStore->id == 1774)
            @include('whatsapp_stores.templates.ready_rasoi.cart_modal')
        @else
            @include('whatsapp_stores.templates.cart_modal')
        @endif
        
        @include('whatsapp_stores.templates.beauty_products.quantity_modal')
        @include('whatsapp_stores.templates.beauty_products.size_modal')
        @include('whatsapp_stores.templates.beauty_products.attributes_model')
                @if($whatsappStore->id == 1151)
                    <img src="https://staging.vcardking.com/uploads/microveda.jpeg" alt="Footer Banner - JK Filterwala" class="chahatcss">
                @endif 
        
    </div>
    

    
 @include('whatsapp_stores.templates.footee-common-view') 
 
        <div id="addToCartBottomViewBtn" style="position: fixed;right: 16px;{{ $whatsappStore->id == 208 || $whatsappStore->id == 1488 ? 'bottom: 165px;' : 'bottom: 95px;'}}">
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
        @if($whatsappStore->id == 208 || $whatsappStore->id == 1488)
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

        if($('#bannerNewCarousel').length){
            $('#bannerNewCarousel').slick({
                autoplay: true,
                autoplaySpeed: 15000,
                arrows: true,
                dots: true,
                infinite: true,
                adaptiveHeight: true,
                pauseOnHover: false,
                pauseOnFocus: false,
            });

        }

        if($('.testimonial-slider')){
            $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                slidesToShow: 1,
                }
            }
            ]
        });
        }
        
    });
</script>

</html>
