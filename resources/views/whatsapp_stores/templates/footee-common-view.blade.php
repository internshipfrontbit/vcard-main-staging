<style>

    .category-slider .slick-dots{
    display:none !important;
    }

   .container {
        max-width: 1300px;
    }

    .section-heading h2 {
        font-size: 16px;
    }
    
    .object-fit-footerlogo {
        border-radius: 10px !important;    
        object-fit: fill;
        height: 60px !important;
        width: 60px !important;
    }    
    
    .footer-links li a {
            position: relative;
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
            padding-left: 15px;
            display: inline-block;
    }

    .footer-links li a::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #ffffff;
            font-size: 16px;
            line-height: 1;
    }

    .footer-links li a:hover {
            color: #ffc107;
            text-decoration: underline;
    }
    
    .title-text {
        font-size: 14px;
    }
    .font-weight-title{
    
    font-weight: bold;

    }
    @media (max-width: 767.98px) {
        .rotate-icon {
           transform: rotate(180deg);
        }

        .rotate-icon.rotate {
              transition: transform 0.3s ease;
           
        }
    }      
    
</style>



@if($whatsappStore->product_gride == "1" )
<style>

         @media(max-width: 768px){
            .product-section .col-xl-3{
                width: 48% !important;
                max-width: 48% !important;
            }
            .products-section .col-xl-3{
                width: 48% !important;
                max-width: 48% !important;
            }
            .addToCartBtn{
                font-size: 13px !important;
            }
            .category-section .section-heading{
                
            }
            

            .product-section .product-card {
                border-radius: 8px;
                padding: 15px 15px;
            }            
            
            .product-section .product-card .product-img img {
                 height: 175px !important;
                 aspect-ratio: unset !important;
            }
            
            
            .items-section .item-card .item-img img {
                height: 175px !important;
                aspect-ratio: unset !important;
            }
            
            
            .recommended-product-section .product-slider .slick-slide .product-card .product-img img {
                height: 175px !important;
                aspect-ratio: unset !important;
            }          
        
            .custom-size-product {
                gap: 7px !important;
            }
            
            .product-gap-row {
                column-gap: 7px !important;
                row-gap: 7px !important;
            }
            
             .margin-bottom-custom {
                 margin-bottom: 5px !important;
             }    

            .custom-row>* {
                flex-shrink: 0;
                width: 48% !important;
                max-width: 48% !important;
                margin-top: var(--bs-gutter-y);
                padding-right: 0px !important;
                padding-left: 0px !important;
            } 
            
            .custom-row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: flex;               
                flex-wrap: wrap;
                margin-top: calc(-1 * var(--bs-gutter-y));
                margin-right: -5px;
                margin-left: -5px;
            }  
            
        .custom-product-details {
            background-color: #fff;
            padding: 10px 10px 0px !important;
            align-items: ;
        }            
            
        .px-4-custom {
            padding-right: 12px !important;
            padding-left: 12px !important;
        }    
            
     
        
        .custom-align-items-center {
            align-items: start !important;
        }
          
        .product-img-custom {
            height: 175px !important;
            align-items: center;
            aspect-ratio: unse !important;
            border-radius: 8px;
            justify-content: center;
            overflow: hidden;
            width: 100%;
        } 
        
         .custom-margin-bottom {
            margin-bottom: 0px !important;
        }   
        
        .d-flex-custom {
            display: block !important;
            margin: auto;
        }
        .new-button-width {
            min-width: 132px !important;
        }

        .min-height-new-ecom {
            height: unset !important;
            margin-bottom: 10px !important;
        }   
        
        .custom-ecom-style {
            display: flex !important;
        }        
                  
                
    }
    
    
</style>
@endif

@if($whatsappStore->product_gride == "1" && $whatsappStore->template_id == 2 )
<style>

    @media(max-width: 768px){
 
        .items-section .product-card {
            background-color: unset !important;
            border-radius: 8px;
            box-shadow: unset !important;
            padding: 15px 15px;
        }
        
       .product-card-custom-ecom {
            border: 1px solid #999 !important;
            border-radius: 20px !important;
            overflow: hidden;
            padding-bottom: 10px !important;
            
        }           
                
    }
    
    
</style>
@endif

@if($whatsappStore->product_gride == "1" && $whatsappStore->template_id == 4 )
<style>

    @media(max-width: 768px){

        .product-section .product-card {
            border-radius: 8px;
            padding: 15px 5px !important;
        }  
 
        .items-section .product-card {
            background-color: unset !important;
            border-radius: 8px;
            box-shadow: unset !important;
            padding: 15px 5px !important;
        }
        
       .product-card-custom-ecom {
            border: 1px solid #999 !important;
            border-radius: 20px !important;
            overflow: hidden;
            padding-bottom: 10px !important;
            
        }
        
        .add-to-cart-w-140px {
           min-width: unset !important; 
         }
                
    }
    
    
</style>
@endif


@if($whatsappStore->product_gride == "1" && $whatsappStore->template_id != 2 )
<style>

         @media(max-width: 768px){
 
        .items-section .product-card {
            background-color: #1d1d1d;
            border-radius: 8px;
            box-shadow: 7.27px 6.54px 18.18px 3.64px #00000030;
            padding: 24px 15px;
        }
        
       .product-card-custom-ecom {
            border: 1px solid #999 !important;
            border-radius: 20px !important;
            overflow: hidden;
            padding-bottom: 10px !important;
            
        }          
        
 
                  
                
    }
    
    
</style>
@endif



@if($whatsappStore->image_show == "1")
<style>
    .object-fit-cover {
        object-fit: contain;
    }
</style>
@else
<style>
    .object-fit-cover {
        object-fit: cover;
    }
</style>

@endif

@if($whatsappStore->id == 1209)
<style>
    .btn-primary {
       background-color: #770101 !important; 
       border: 1px solid #770101;
       color: #fff !important;
    } 

    .navbar .navbar-brand {
        border-radius: 10px;
        height: auto !important;
        min-width: 50px;
        overflow: hidden !important;
        width: 118px !important;
        position: relative !important;
        top: -3px !important;
    }

    .fw-6.fs-18:not(.mb-2){
        display: none;
    }

    .object-fit-footerlogo {
        border-radius: 10px !important;
        object-fit: fill;
        height: auto !important;
        width: 120px !important;
    }

    .bg-primary {
        background-color: #770101 !important;
    }
    

    .btn-primary:hover {
        background-color: #770101 !important; 
       border: 1px solid #770101;
       color: #fff !important;
    }
    
    .bg-dark {
        background-color: #770101 !important; 
    }

    .view-more-btn {
            background-color: #770101;
            color: #ffffff !important
    }

    .view-more-btn svg path{
            fill: #770101 !important; 
    }

    .navbar {
        background-color: #770101 !important;
    }

    .navbar span a{
        color: #ffffff !important;
    }

    .navbar .add-to-cart-btn {
        background-color: #ffffff !important;
    }

    .navbar .add-to-cart-btn svg path, #addToCartBottomViewBtn button svg path{
            fill: #770101;
    }

    .search-input-container button{
        background: #770101 !important;
        color: #ffffff !important
    }

    .main-content {
     background-color: #7701010d !important;
    }

    .modal .modal-dialog .modal-content .modal-body table th {
        background-color: #770101 !important;
        color: #fff !important;
    }

    .modal .modal-dialog .modal-content .modal-body table tbody td {
        background-color: #7701012e !important;
        color: #000 !important;
    }

    .items-section .items-filter-wrapper .form-check .form-check-input:checked {
        background-color: #770101 !important;
        border-color: #770101 !important;
    }

    .product-box.activeclass {
        border: 1px solid #770101 !important;
        outline: 1px solid #770101 !important;
    }

    .attr-input input{
        outline: none !important
    }
    .attr-input input:focus{
        outline: none !important
    }
    .main-content .bg-vector img {
        width: 100px !important;
    }
    .view-more-btn:hover {
        background-color: #770101 !important;
        color: #ffffff !important !important;
    }

    .view-more-btn:hover .arrow-btn {
        background-color: #ffffff !important;
    }

    #filterButton span{
        background: #770101;
    }

    @media(max-width: 600px){
        .product-section .product-card .product-img, .items-section .item-card .item-img  {
            aspect-ratio: unset !important;
        }
    }
</style>
@endif

@if($whatsappStore->id == 1700)
<style>
    .navbar .navbar-brand {
        border-radius: 10px;
        height: auto !important;
        min-width: 50px;
        overflow: hidden !important;
        width: 118px !important;
        position: relative !important;
        top: -3px !important;
    }

    .fw-6.fs-18:not(.category-name-size){
        display: none;
    }
    
    .object-fit-footerlogo {
        height: auto !important;
        width: 196px !important;
        background: #ffffff !important;
        padding: 10px !important;
    }
</style>
@endif

@if($whatsappStore->id == 1500)
<style>
    .main-content {
        background: #f6f6f6 !important;
    }
    .bg-vector {
        display: none !important;
    }
    .fw-6.fs-18:not(.mb-0) {
        display: none;
    }
    .navbar-brand{
        height: auto !important;
        width: 105px !important;
    }
    .nvabar-brand img{
        object-fit: unset !important;
    }
    .object-fit-footerlogo {
        border-radius: 10px !important;
        object-fit: fill;
        height: auto !important;
        width: 120px !important;
    }
    .btn-primary {
       background-color: #292929 !important; 
       border: 1px solid #292929;
       color: #fff !important;
    } 

    .btn-primary:hover {
        background-color: #292929 !important; 
       border: 1px solid #292929;
       color: #fff !important;
    }

    .product-card{
        border: 1px solid #000;
    }

    .product-section .product-card .product-details {
        border: none !important;
    }

    .horizontal-scroll {
        scrollbar-width: thin;
        scrollbar-color: #000000 #e9e9e9;
    }

    .items-section .item-card{
        border: 1px solid #000;
        background-color: #ffffff;
    }
    .items-section .item-card .item-img {
        border: none !important;
    }
    .btn-primary.disabled, .btn-primary:disabled, .page-item.active .page-link {
        background-color: #292929 !important;
        border-color: #292929 !important;
    }
    .page-item:hover .page-link{
        background-color: #292929 !important;
        border-color: #292929 !important;
    }
    .items-section .items-tabs .form-check-input:checked {
        background-color: #292929 !important;
        border-color: #292929 !important;
    }
    .product-category-jk-filtter:hover{
        font-weight: 600 !important;
        color: #292929 !important;
    }
    .category-button:hover {
        font-weight: 600 !important;
        color: #292929 !important;
    }
    .dropdown-menu li:hover a{
        background-color: #292929 !important;
        background: #292929 !important;
    }
    .view-more-btn {
        background-color: #2125292b;
    }
    .view-more-btn:hover span:first-child{
        background-color: #292929 !important;
        color: #ffffff !important;
    }
    .view-more-btn:hover span:last-child svg path{ 
        fill: #292929 !important;
    }
    .view-more-btn:hover{
         background-color: #2125292b !important;
    }
    .view-more-btn:hover svg path{
         fill: #292929 !important;
    }
    .category-section .category-item {
        flex-wrap: wrap;
        flex-direction: column;
    }
    .category-section .category-item {
        flex-wrap: wrap !important;
        flex-direction: column !important;
    }
    .category-section .category-item:not(.active) {
        border: none !important;
    }
    .category-section .category-item:active{
        border: 1px solid #292929 !important;
    }
    .category-item .category-img {
        height: auto !important;
        width: 58px !important; 
        max-width: 100% !important;
    }
    .category-name-size{
        font-size: 12px !important
    }
    .category-image-mobile {
        width: 210px !important;
        padding-right: 0px !important;
    }
    @media (max-width: 575px) {
        .section-heading {
            margin-bottom: 5px !important;
        }
    }
    @media (max-width: 600px) {
        .category-section{
            display: block !important;
        }
        .navbar-brand {
            height: auto !important;
            width: 76px !important;
        }
        .desktop-category{
            display: none !important;
        }
    }
    #filterButton span{
        background: #292929 !important;
    }
    .recommended-product-section .product-slider .slick-slide .product-card{
        background-color: #ffffff !important;
    }
    .recommended-product-section .product-slider .slick-slide .product-card .product-img{
        border: none !important;
    }
    .recommended-product-section .product-slider .slick-slide .product-card .product-img img{
        object-fit: contain;
    }
    .item-details-card{
        box-shadow: none !important;
        border-radius: 13px !important;
        border: 1px solid #292929 !important; 
    }
    .product-slider .slick-arrow{
        display: none !important;
    }
</style>
@endif

@if($whatsappStore->id == 1600)
<style>
    .object-fit-footerlogo {
        border-radius: 10px !important;    
        object-fit: fill;
        height: 60px !important;
        width: auto !important;
    }
</style>
@endif


@php
    // Decode settings to populate values
    $settings = json_decode($whatsappStore->theme_settings, true) ?? [];
@endphp
<input type="hidden" id="wp_show_order_form" value="{{ isset($settings['wp_show_order_form']) && $settings['wp_show_order_form'] ? $settings['wp_show_order_form'] : '' }}">
<input type="hidden" id="gstPercentage" value="{{ $whatsappStore->gst_percent ?? 0 }}">
@include('whatsapp_stores.templates.payment_success_popup')
@include('whatsapp_stores.templates.userForm')

<input type="hidden" id="mobileDiscountSettings" value="{{ $whatsappStore->mobile_discount_settings }}">

<footer class="bg-dark text-white pt-5 pb-4 position-relative">
    <div class="container-new">
        <div class="row">

            {{-- Newsletter --}}
            <div class="col-md-3 mb-4" style="margin-bottom: 30px !important;">
                <form action="/contact#ContactFooter" method="post" class="d-flex flex-column gap-2">
                        @if (request()->getHost() === 'staging.vcardking.com') 
                    <a class="navbar-brand p-0 m-0" style="margin-bottom: 10px !important;"
                        href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}">
                        @else
                    <a class="navbar-brand p-0 m-0" style="margin-bottom: 10px !important;"
                        href="{{ route('whatsapp.store.show') }}">
                        @endif

                        <img src="{{ $whatsappStore->logo_url }}" alt="logo"
                            class="w-80 h-80 object-fit-footerlogo" loading="lazy" />
                    </a>
                    <small class="text-white text-decoration-none">{{ $whatsappStore->footer_text }}</small>
                </form>
            </div>

            {{-- Quick Links --}}
            <div class="col-md-3 mb-3 ">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-white title-text font-weight-title mb-3" data-bs-toggle="collapse" data-bs-target="#footerQuickLinks">Quick Links</h5>
                    <div class="footer-toggle d-md-none" data-bs-toggle="collapse" data-bs-target="#footerQuickLinks" aria-expanded="false">
                        <i class="fas fa-chevron-down rotate-icon transition"></i>
                    </div>
                </div>
                <div id="footerQuickLinks" class="collapse d-md-block">

                        @if (request()->getHost() === 'staging.vcardking.com') 
                    <ul class="list-unstyled footer-links mt-3 mt-md-0">
                        <li class="py-1"><a href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}"
                                class="text-white title-text text-decoration-none">Home</a></li>
                        <li class="py-1"><a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}"
                                class="text-white title-text text-decoration-none">Our Product</a></li>
                        @if (!empty($whatsappStore->about_us))
                            <li class="py-1"><a href="{{ route('whatsapp.store.about', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">About Us</a></li>
                        @endif
                    </ul>
                        @else
                    <ul class="list-unstyled footer-links mt-3 mt-md-0">
                        <li class="py-1"><a href="{{ route('whatsapp.store.show') }}"
                                class="text-white title-text text-decoration-none">Home</a></li>
                        <li class="py-1"><a href="{{ route('whatsapp.store.products') }}"
                                class="text-white title-text text-decoration-none">Our Product</a></li>
                        @if (!empty($whatsappStore->about_us))
                            <li class="py-1"><a href="{{ route('whatsapp.store.about') }}"
                                    class="text-white title-text text-decoration-none">About Us</a></li>
                        @endif
                    </ul>
                        @endif




                </div>
            </div>

            {{-- Support & Services --}}
            <div class="col-md-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-white title-text font-weight-title mb-3" data-bs-toggle="collapse" data-bs-target="#footerSupport">Support & Services</h5>
                    <div class="footer-toggle d-md-none" data-bs-toggle="collapse" data-bs-target="#footerSupport" aria-expanded="false">
                        <i class="fas fa-chevron-down rotate-icon transition"></i>
                    </div>
                </div>
                <div id="footerSupport" class="collapse d-md-block">



                        @if (request()->getHost() === 'staging.vcardking.com') 
                    <ul class="list-unstyled footer-links mt-3 mt-md-0">
                        @if (!empty($whatsappStore->privacy_policy))                        
                            <li class="py-1"><a href="{{ route('whatsapp.store.privacy', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">Privacy Policy</a></li>
                        @endif
                        @if (!empty($whatsappStore->contact_us))
                            <li class="py-1"><a href="{{ route('whatsapp.store.contactUs', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">Contact Us</a></li>
                        @endif                        
                        @if (!empty($whatsappStore->terms_conditions))
                            <li class="py-1"><a href="{{ route('whatsapp.store.terms', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">Terms & Conditions</a></li>
                        @endif
                        @if (!empty($whatsappStore->shipping_payment_policy))
                            <li class="py-1"><a href="{{ route('whatsapp.store.shipping', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">Shipping & Payment</a></li>
                        @endif
                        @if (!empty($whatsappStore->refunds_cancellation))
                            <li class="py-1"><a href="{{ route('whatsapp.store.refunds', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="text-white title-text text-decoration-none">Refunds & Cancellation</a></li>
                        @endif
                        
                    </ul>
                        @else
                    <ul class="list-unstyled footer-links mt-3 mt-md-0">
                        @if (!empty($whatsappStore->privacy_policy))                        
                            <li class="py-1"><a href="{{ route('whatsapp.store.privacy') }}"
                                    class="text-white title-text text-decoration-none">Privacy Policy</a></li>
                        @endif
                        @if (!empty($whatsappStore->contact_us))
                            <li class="py-1"><a href="{{ route('whatsapp.store.contactUs') }}"
                                    class="text-white title-text text-decoration-none">Contact Us</a></li>
                        @endif                        
                        @if (!empty($whatsappStore->terms_conditions))
                            <li class="py-1"><a href="{{ route('whatsapp.store.terms') }}"
                                    class="text-white title-text text-decoration-none">Terms & Conditions</a></li>
                        @endif
                        @if (!empty($whatsappStore->shipping_payment_policy))
                            <li class="py-1"><a href="{{ route('whatsapp.store.shipping') }}"
                                    class="text-white title-text text-decoration-none">Shipping & Payment</a></li>
                        @endif
                        @if (!empty($whatsappStore->refunds_cancellation))
                            <li class="py-1"><a href="{{ route('whatsapp.store.refunds') }}"
                                    class="text-white title-text text-decoration-none">Refunds & Cancellation</a></li>
                        @endif
                        
                    </ul>
                        @endif



                </div>
            </div>

            {{-- Contact Details --}}
            <div class="col-md-3 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-white title-text font-weight-title mb-3" data-bs-toggle="collapse" data-bs-target="#footerContact">Talk To Us</h5>
                    <div class="footer-toggle d-md-none" data-bs-toggle="collapse" data-bs-target="#footerContact" aria-expanded="false">
                        <i class="fas fa-chevron-down rotate-icon transition"></i>
                    </div>
                </div>
                <div id="footerContact" class="collapse d-md-block">
                    <p class="mt-3 mt-md-0"><i class="fas fa-map-marker-alt title-text me-2"></i> {{ $whatsappStore->address }}</p>
                    <p><i class="fas fa-phone me-2"></i>
                        <a href="tel:+{{ $whatsappStore->region_code }}{{ $whatsappStore->whatsapp_no }}"
                            class="text-white title-text text-decoration-none">
                            +{{ $whatsappStore->region_code }} {{ $whatsappStore->whatsapp_no }}
                        </a>
                    </p>
                    @if($whatsappStore->id == 208)
                    <p><i class="fas fa-phone me-2"></i>
                        <a href="tel:+917043226206"
                            class="text-white title-text text-decoration-none">
                            +91 7043226206
                        </a>
                    </p>
                    @endif
                    @if($whatsappStore->id == 550)
                    <p><i class="fas fa-phone me-2"></i>
                        <a href="tel:+919875271041"
                            class="text-white title-text text-decoration-none">
                            +91 9875271041
                        </a>
                    </p>
                    @endif
                    @if($whatsappStore->id == 1973)
                    <p><i class="fas fa-phone me-2"></i>
                        <a href="tel:+919727444779"
                            class="text-white title-text text-decoration-none">
                            +91 9727444779
                        </a>
                    </p>
                    @endif
                </div>
            </div>
        </div>

                @if($whatsappStore->id == 530)
        <div style="text-align: center;margin-bottom: 0px;margin-bottom: 17px;">
            <a href="https://chat.whatsapp.com/H6GZ6XoicDsL7n2ZFHblnY" class="wa-channel-btn" target="_blank" style="
                display: inline-flex;
                align-items:center;
                gap:10px;
                background:#25D366;
                color:white;
                padding:12px 20px;
                border-radius:8px;
                font-family:Arial, sans-serif;
                font-size:16px;
                font-weight:600;
                text-decoration:none;
                transition:all 0.3s ease;
            ">
                
<!--?xml version="1.0" encoding="utf-8"?--><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="
    height: auto;
    width: 24px;
">
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

                <span>Join to WhatsApp Group</span>
            </a>
            </div>
        @endif

        {{-- Social Links --}}
        <div class="text-center mb-3">
            @include('whatsapp_stores.templates.footer_social')
        </div>

        {{-- Copyright --}}
        <div class="text-center">
            <small>© {{ now()->year }} {{ $whatsappStore->store_name }}. All Rights Reserved.</small>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if(window.location.href.includes("product-details")){
                function extractId(url) {
                const parts = url.split('/');
                
                // Find the first numeric segment in the path
                   for (let part of parts) {
                     if (/^\d+$/.test(part)) {
                       return part;
                     }
                   }
                
                   return null;
                 }
                 let productId = extractId(window.location.href);
                 if(localStorage.getItem(storeAlias + "p_prod_id") == productId){
                     return;
                 }else{
                     startProductViewSession(productId);
                 }
            }else{
                let storeAlias = $("#storeAlias").val();
                localStorage.removeItem(storeAlias + "p_sc_id");
                localStorage.removeItem(storeAlias + "p_prod_id");
            }
        });
    </script>
</footer>


@if($whatsappStore->id == 2013)
    <a href="https://www.meesho.com/boyzf?ms=2&page=" target="_blank" style="
    position: fixed;
    right: 15px;
    bottom: 162px;
    z-index: 100;
    background: #580A46;
    padding: 10px;
    border-radius: 32px;
    border: 1px solid #580A46;
">
<img src="https://staging.vcardking.com/uploads/meeshologo.png" style="
    height: 35px;
    width: 35px;
">
</a>
<a href="https://www.flipkart.com/search?q=zayden+car+freshener&sid=1mt%2Cbpx&as=on&as-show=on&otracker=AS_QueryStore_OrganicAutoSuggest_4_10_na_na_na&otracker1=AS_QueryStore_OrganicAutoSuggest_4_10_na_na_na&as-pos=4&as-type=HISTORY&suggestionId=zayden+car+freshener%7CCar+Air+Purifiers+and+Air+Fresheners&requestId=8762acce-45a6-4b71-850b-9ae9518181cb" target="_blank" style="
    position: fixed;
    right: 15px;
    bottom: 95px;
    z-index: 100;
    background: #ffffff;
    padding: 10px;
    border-radius: 32px;
    border: 1px solid #f7e82f;
">
<!--?xml version="1.0" encoding="utf-8"?--><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 713.39 707.4" style="enable-background:new 0 0 713.39 707.4;height: 35px;width: 35px;" xml:space="preserve"><style type="text/css">.st0{fill:url(#SVGID_1_);stroke:#FCD109;stroke-width:0.094;} .st1{fill:#F8F3B5;stroke:#F8F3B5;stroke-width:0.094;} .st2{fill:#F7B402;stroke:#F7B402;stroke-width:0.094;} .st3{fill:#BDA727;stroke:#BDA727;stroke-width:0.094;} .st4{fill:#F7E62D;stroke:#F7E62D;stroke-width:0.094;} .st5{fill:url(#SVGID_2_);stroke:#FCD109;stroke-width:0.094;} .st6{fill:url(#SVGID_3_);stroke:#FCD109;stroke-width:0.094;} .st7{fill:url(#SVGID_4_);stroke:#FCD109;stroke-width:0.094;} .st8{fill:#0D69B3;stroke:#0D69B3;stroke-width:0.094;} .st9{fill:#107BD4;stroke:#107BD4;stroke-width:0.094;} .st10{fill:#FFFFFF;stroke:#FFFFFF;stroke-width:0.094;} .st11{clip-path:url(#SVGID_6_);} .st12{fill:none;stroke:#D1D1D1;stroke-width:2;}</style><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="356.4805" y1="493.1343" x2="356.4805" y2="1080.8978" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)"><stop offset="0" style="stop-color:#F7E830"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st0" d="M712.87,122.59c-0.3-1-0.6-2-1-3c-236.9,0.1-473.7,0-710.5,0.1c-0.6,0.7-1,1.4-1.1,2.3c0,183.7,0,367.3-0.1,551	c1.5,9.8,6.9,18.7,14.1,25.4c0.3,0.1,1,0.2,1.3,0.3c3.7,3.9,9,5.8,14,7.6c3.7-0.2,7.3,1.4,11,1h294c2.8-0.1,5.7,0.4,8.4-0.7	c0.1-0.4,0.2-1.1,0.3-1.5c0.1-0.5,0.2-1.6,0.3-2.2c6.3-35.2,12.4-70.5,19.1-105.7l0.6-4.5c-27.2-0.1-54.5,0-81.7-0.1	c-6.6-0.2-13.4,0-20-0.8c-11.3-0.5-22.7-0.1-34-1.2c-14,0-27.9-1.3-41.9-1.3c-11-1.1-22.1-0.7-33.2-1.2c-7.2-0.9-14.6-0.5-21.9-0.8	c-11.9-1.3-24-0.4-35.9-1.7c-12.6,0.1-25.2-1-37.8-1.3c0.1-0.1,0.2-0.5,0.2-0.6c4.2,0.1,8.3-0.2,12.5-0.3c9.3-1.2,18.7-0.4,28-1.7	c9.7,0,19.3-1.3,29-1.3c8.6-1.2,17.3-0.5,25.9-1.7c10.1,0,20-1.3,30.1-1.4c8.3-1.1,16.7-0.5,25-1.6c9.7,0.1,19.3-1.4,29-1.3	c9.5-1.1,19.2-0.8,28.7-1.8c-0.9-3.7-1.6-7.4-2.4-11.1c-0.7-2.3-3.5-1.8-5.3-2.1c-21.7-3.1-43.3-6.2-64.9-9.2	c1.4-1.1,3.3-0.6,4.9-0.8c16.8-1.3,33.5-2.8,50.3-4c3.8-0.2,7.5-0.9,11.3-1c-1.7-5.2-2.7-10.9-5-15.7	c-35.9-5.5-71.8-10.4-107.6-16.3c9.3-1.5,18.7-2.2,28-3.2l0.8-0.3c29.7-3.1,59.5-6.6,89.2-9.5c37.7-0.2,75.3-0.1,113,0	c1.2-0.2,3.3,0.4,3.5-1.3c3.1-16.2,6.1-32.4,9.2-48.6c4.3-22.5,11.1-44.7,21.6-65.2c16.5-33,42.6-61,74.4-79.6	c29.7-17.4,64.1-25.8,98.3-27.4c11.1-1,22.3-0.7,33.3,0.7c7.2,1.7,14.6,3.7,20.3,8.6c4.7,3.8,7.5,9.4,9.6,15	c4.6,13.3,7.2,27.1,9.4,41c0.1,5.6,1.1,11.9-1.9,17c-2.8,5-8.4,7.4-13.7,8.9c-19.3,5-39.5,0.3-58.8,5c-15.9,3.4-30.7,12.2-40.8,24.9	c-11.9,14.8-18.2,33.2-21.7,51.6c-2.7,16.4-6.1,32.8-8.8,49.3c19,0.1,38.1-0.1,57.2,0.1c7.6,0,15.4,4.2,18.5,11.4	c4,9.2,3.1,19.6,1.8,29.3c-1.6,10.9-4.2,21.7-9.1,31.7c-4.1,8.5-10.9,16.3-20.2,19.3c-4.8,1.9-10,1.5-15.1,1.5	c-16.8,0-33.6,0.2-50.4,0c-2.7,12.3-4.5,24.9-6.9,37.4c-4.4,24.3-8.7,48.7-13.1,73.1c-0.1,0.8-0.2,2.5-0.2,3.4	c7.9,0.4,15.8,0,23.7,0.2c58.6,0,117.3-0.1,176,0c6.3,0.2,12.7-1.3,18.2-4.4c3.3-1.2,5.3-4.1,8.2-5.7c2.8-1.6,3.6-4.9,6-7	c2.6-4.6,5.3-9.4,5.5-14.8c0.3,0,1.1-0.1,1.5-0.2C712.77,490.59,713.07,306.59,712.87,122.59z"></path><path class="st1" d="M93.47,1.59c8.5-2.7,17.4-0.9,26.1-1.5c163.3,0.1,326.6,0,489.9,0c9.7-0.4,18.2,5.1,27.2,7.9	c7.2,2.9,14.7,5.2,21.9,8.3c1.5,0.6,2.6,1.9,3.7,3c-0.1,13.2,0,26.5,0,39.8c0.1,3.5-0.5,7.1,0.7,10.5c2.1,0.3,3.2,1.9,4.6,3.2	c6.6,3,12.2,7.9,18.2,11.9c9,6.4,18.6,12,27.4,18.6c0.4,2.6,0.1,5.3-0.7,7.7c-0.9,2.8-0.3,5.8-0.6,8.6c-236.9,0.1-473.7,0-710.5,0.1	c-0.5-3.3,0.4-6.6-1-9.7c-0.2-2.6-1.1-6,1.4-7.8c10-7,20.6-13.3,30.4-20.7c6.1-3.9,12-7.9,17.9-11.9c1.2-2,0.8-4.5,0.8-6.7	c0-14.5,0-29,0.1-43.5c3.4-4.4,9.3-4.9,14-7.1C74.47,8.69,84.07,5.19,93.47,1.59 M94.07,3.29c-12.8,4.9-25.7,9.6-38.5,14.5	c-1.7,0.3-2.6,1.8-3.5,3.1c0.1,0.8,0.2,2.2,0.2,3c-0.1,12,0,24-0.1,36c0.1,3-0.3,6,0.8,8.7c-1.3,1.3-2.7,2.6-4.3,3.6	c-14.5,9.4-28.5,19.6-43,28.9c-2.5,1.5-5.3,3.5-4.5,6.8c-0.5,1.8,0.4,3.3,2.3,2.8c31.4-0.2,62.7,0.2,94.1-0.3c46.7,0,93.3,0.1,140,0	l0.7-0.3c2.1,0.5,4.2,0.3,6.4,0.3c84.6,0,169.2,0.1,253.9,0c26.6,0.1,53.3,0,80,0c44,0,88.1,0.4,132.1,0.2c1.3-0.3,1.7-1.2,1.2-2.8	c-0.1-1.6,0.5-3.8-1.2-4.8c-7-3.3-13-8.4-19.7-12.4c-2.4-2-5.5-3.1-7.3-5.8c-6.9-3.9-13.3-8.7-20.1-13c-1.3-0.8-2.3-2.1-3.4-3.2	c0.6-2.1,0.8-4.4,0.8-6.6c-0.1-12.7,0-25.4-0.1-38.1c0.3-2,0.2-4.3-1.6-5.6c-12-4.3-23.9-8.9-35.8-13.3c-3.7-1.8-7.8-2.8-11.8-3.4	h-511.1C98.37,1.69,96.27,2.79,94.07,3.29L94.07,3.29z"></path><path class="st2" d="M52.27,23.89c8.8,3.7,18.2,5.8,27.1,9.4c4.8,1.9,6.3,7.1,8.4,11.3c-2.1,2.1-4.6,3.8-7.1,5.4	c-9.2,6.2-18.6,12.2-27.7,18.6c-1.1-2.7-0.7-5.7-0.8-8.7C52.27,47.89,52.17,35.89,52.27,23.89z M633.77,33.29	c8.9-3.5,18.2-5.9,27.1-9.4c0.1,12.7,0,25.4,0.1,38.1c0,2.2-0.2,4.5-0.8,6.6c-7.8-5.4-15.7-10.5-23.5-15.8c-3.8-2.8-8-4.9-11.4-8.3	C627.37,40.29,628.97,35.19,633.77,33.29L633.77,33.29z"></path><path class="st3" d="M204.87,37.39c11-2.6,23.3,7.2,22.4,18.7c0.1,11.3-11.8,20.5-22.7,17.9c-4.4-1.5-8.6-3.8-11.3-7.7	c-3.5-5.3-4.3-12.4-1.5-18.2C193.77,42.49,199.17,38.69,204.87,37.39L204.87,37.39z M490.17,43.69c4.6-5.1,11.9-8,18.7-6.2	c5.1,1.5,10.1,4.8,12.3,9.8c4.4,8.6,1,20.2-7.6,24.7c-7.6,4.2-17.2,2.2-23-3.9C484.67,61.39,484.27,50.39,490.17,43.69z"></path><path class="st4" d="M80.67,49.99c2.5-1.6,5-3.3,7.1-5.4l0.7,0.7c0.7,5.2,0.2,10.5,0.4,15.7c-0.3,15.6,0.3,31.3-0.4,46.9	c-29.1,0-58.2-0.2-87.3,0c-0.8-3.3,2-5.3,4.5-6.8c14.5-9.3,28.5-19.5,43-28.9c1.6-1,3-2.3,4.3-3.6	C62.07,62.19,71.47,56.19,80.67,49.99z M624.27,47.99c0-1.3,0.3-2.4,1-3.5c3.4,3.4,7.6,5.5,11.4,8.3c7.8,5.3,15.7,10.4,23.5,15.8	c1.1,1.1,2.1,2.4,3.4,3.2c6.8,4.3,13.2,9.1,20.1,13c1.8,2.7,4.9,3.8,7.3,5.8c6.7,4,12.7,9.1,19.7,12.4c1.7,1,1.1,3.2,1.2,4.8	c-29.1,0.1-58.1-0.1-87.2,0.1c-0.5-4-0.2-8-0.3-11.9C624.37,79.99,624.17,63.99,624.27,47.99L624.27,47.99z"></path><radialGradient id="SVGID_2_" cx="353.4156" cy="761.2123" r="478.08" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)" gradientUnits="userSpaceOnUse"><stop offset="0.596" style="stop-color:#F29405"></stop><stop offset="0.736" style="stop-color:#F7D01E"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></radialGradient><path class="st5" d="M711.87,107.79c-29.1,0.1-58.1-0.1-87.2,0.1c-0.5-4-0.2-8-0.3-11.9c0-16-0.2-32-0.1-48c0-1.3,0.3-2.4,1-3.5	c2.1-4.2,3.7-9.3,8.5-11.2c8.9-3.5,18.2-5.9,27.1-9.4c0.3-2,0.2-4.3-1.6-5.6c-12-4.3-23.9-8.9-35.8-13.3c-3.7-1.8-7.8-2.8-11.8-3.4	h-511.1c-2.2,0.1-4.3,1.2-6.5,1.7c-12.8,4.9-25.7,9.6-38.5,14.5c-1.7,0.3-2.6,1.8-3.5,3.1c0.1,0.8,0.2,2.2,0.2,3	c8.8,3.7,18.2,5.8,27.1,9.4c4.8,1.9,6.3,7.1,8.4,11.3l0.7,0.7c0.7,5.2,0.2,10.5,0.4,15.7c-0.3,15.6,0.3,31.3-0.4,46.9	c-29.1,0-58.2-0.2-87.3,0c-0.5,1.8,0.4,3.3,2.3,2.8c31.4-0.2,62.7,0.2,94.1-0.3c46.7,0,93.3,0.1,140,0l0.7-0.3	c2.1,0.5,4.2,0.3,6.4,0.3c84.6,0,169.2,0.1,253.9,0c26.6,0.1,53.3,0,80,0c44,0,88.1,0.4,132.1,0.2	C711.97,110.29,712.37,109.39,711.87,107.79L711.87,107.79z M191.77,48.09c2-5.6,7.4-9.4,13.1-10.7c11-2.6,23.3,7.2,22.4,18.7	c0.1,11.3-11.8,20.5-22.7,17.9c-4.4-1.5-8.6-3.8-11.3-7.7C189.77,60.99,188.97,53.89,191.77,48.09L191.77,48.09z M490.17,43.69	c4.6-5.1,11.9-8,18.7-6.2c5.1,1.5,10.1,4.8,12.3,9.8c4.4,8.6,1,20.2-7.6,24.7c-7.6,4.2-17.2,2.2-23-3.9	C484.67,61.39,484.27,50.39,490.17,43.69z"></path><linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="520.03" y1="514.347" x2="520.197" y2="542.18" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)"><stop offset="0" style="stop-color:#FADA1C"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st6" d="M515.66,151.73c1.4,0.3-7.29-8.35-5.59-8.75c1.6,0.2,7.67-4.51,15-0.67c7.33,3.84,5.51,12.83,4.68,16.17	c-0.99,3.97-3.52,6.5-5.52,8.5c-1.1,0.9-3.57,2.3-5.07,2.2c0.9-4.9-2-5.7-2.2-10.7L515.66,151.73z"></path><linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="-811.1298" y1="513.0134" x2="-810.9628" y2="540.8463" gradientTransform="matrix(-1 0 0 1 -618.3428 -373.5461)"><stop offset="0" style="stop-color:#FADA1C"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st7" d="M195.99,157.16c-0.2,5-3.1,5.8-2.2,10.7c-1.5,0.1-3.97-1.3-5.07-2.2c-2-2-4.52-4.53-5.51-8.5	c-0.83-3.33-2.65-12.32,4.68-16.17s13.4,0.87,15,0.67c1.7,0.4-6.99,9.05-5.59,8.75L195.99,157.16L195.99,157.16z"></path><path class="st3" d="M502.57,215.79c1.5-1.31,2.5-1.31,4.5-1.31c-12,26-26,52-47.05,72.24c-2.25,2.01-4.63,3.87-7.12,5.58	c-2.41,1.76-4.77,3.42-7.12,5.1c-2.3,1.6-4.59,3.2-6.81,4.88c-5.7,3.1-10.7,7.4-17,9.3c-11.5,5.5-23.9,9.2-36.4,11.8	c-4.9,0.8-9.9,2-14.9,2.1c-6.2,1.8-12.8,0.5-19.1,0.9c-3.5,0.6-6.6-1.4-10-1c-2.95-0.42-5.89-0.92-8.82-1.5	c-2.97-0.61-5.92-1.31-8.84-2.1c-45.84-14.3-90.84-49.3-103.95-96.64c-0.59-3.19-0.89-6.42-0.89-9.67c1.4,2.8,2.85,5.58,4.35,8.33	c18.65,40.67,55.65,72.67,99.36,82.32c3.55,1.62,7.39,1.05,10.79,2.45c3.1,0,6.1-0.1,9.1,0.9c10.3,0.2,20.6,0.1,30.9,0.1	c1.4,0.1,2.7-0.6,4.1-0.9c17.17-0.58,33.99-5.26,49.65-12.36c3.13-1.42,6.22-2.94,9.25-4.54c2.65-1.4,5.25-2.91,7.77-4.54	c2.48-1.6,4.88-3.3,7.22-5.1c18.51-14.66,34.51-33.66,45.38-55.51C499,222.71,500.9,219.07,502.57,215.79z"></path><path class="st8" d="M486.27,304.69c29.7-17.4,64.1-25.8,98.3-27.4c11.1-1,22.3-0.7,33.3,0.7c7.2,1.7,14.6,3.7,20.3,8.6	c-2.9,0.2-5.7-1.1-8.6-1.5c-8.2-1.6-16.7-1-25-1.2c-24.1,0-48.4,1.9-71.7,8.5c-12.2,3.7-24.4,8-35.5,14.4	c-19.2,10.6-36.5,24.6-50.5,41.4c-25,28.7-39.7,65.1-46.8,102.2c-3.4,19.9-7.3,39.7-10.4,59.7c-5,0.5-10.1,0.2-15.1,0.2	c-22-0.1-44-0.2-66-0.4c-4.7,0.2-9.3-0.9-14-0.6c-40,0.2-80-0.1-120-0.1l0.8-0.3c29.7-3.1,59.5-6.6,89.2-9.5	c37.7-0.2,75.3-0.1,113,0c1.2-0.2,3.3,0.4,3.5-1.3c3.1-16.2,6.1-32.4,9.2-48.6c4.3-22.5,11.1-44.7,21.6-65.2	C428.37,351.29,454.47,323.29,486.27,304.69z"></path><path class="st9" d="M532.87,292.39c23.3-6.6,47.6-8.5,71.7-8.5c8.3,0.2,16.8-0.4,25,1.2c2.9,0.4,5.7,1.7,8.6,1.5	c4.7,3.8,7.5,9.4,9.6,15c4.6,13.3,7.2,27.1,9.4,41c0.1,5.6,1.1,11.9-1.9,17c-2.8,5-8.4,7.4-13.7,8.9c-19.3,5-39.5,0.3-58.8,5	c-15.9,3.4-30.7,12.2-40.8,24.9c-11.9,14.8-18.2,33.2-21.7,51.6c-2.7,16.4-6.1,32.8-8.8,49.3c-1.2,3.7-1.9,7.7-2.6,11.6	c18.9,0.3,37.8,0,56.7,0.2c7.2-0.2,14.4,0.2,21.6-0.3c4,9.2,3.1,19.6,1.8,29.3c-1.6,10.9-4.2,21.7-9.1,31.7	c-4.1,8.5-10.9,16.3-20.2,19.3c-4.8,1.9-10,1.5-15.1,1.5c-16.8,0-33.6,0.2-50.4,0c-2.7,12.3-4.5,24.9-6.9,37.4	c-4.4,24.3-8.7,48.7-13.1,73.1c-0.1,0.8-0.2,2.5-0.2,3.4v0.1c-43.7,0-87.3,0.1-131,0c0.1-0.4,0.2-1.1,0.3-1.5	c0.1-0.5,0.2-1.6,0.3-2.2c0.1,0.8,0.2,2.3,0.3,3c2.7,0.3,7.6,1.7,8.3-2.2c6.8-36.8,13.1-73.8,20.1-110.6c-2.7-0.6-5.5-0.6-8.3-0.1	c-0.4,1.4-0.8,2.8-1.3,4.2l0.6-4.5c-27.2-0.1-54.5,0-81.7-0.1c-6.6-0.2-13.4,0-20-0.8c-11.3-0.5-22.7-0.1-34-1.2	c-14,0-27.9-1.3-41.9-1.3c-11-1.1-22.1-0.7-33.2-1.2c-7.2-0.9-14.6-0.5-21.9-0.8c-11.9-1.3-24-0.4-35.9-1.7	c-12.6,0.1-25.2-1-37.8-1.3c0.1-0.1,0.2-0.5,0.2-0.6c4.2,0.1,8.3-0.2,12.5-0.3c9.3-1.2,18.7-0.4,28-1.7c9.7,0,19.3-1.3,29-1.3	c8.6-1.2,17.3-0.5,25.9-1.7c10.1,0,20-1.3,30.1-1.4c8.3-1.1,16.7-0.5,25-1.6c9.7,0.1,19.3-1.4,29-1.3c9.5-1.1,19.2-0.8,28.7-1.8	c-0.9-3.7-1.6-7.4-2.4-11.1c-0.7-2.3-3.5-1.8-5.3-2.1c-21.7-3.1-43.3-6.2-64.9-9.2c1.4-1.1,3.3-0.6,4.9-0.8	c16.8-1.3,33.5-2.8,50.3-4c3.8-0.2,7.5-0.9,11.3-1c-1.7-5.2-2.7-10.9-5-15.7c-35.9-5.5-71.8-10.4-107.6-16.3	c9.3-1.5,18.7-2.2,28-3.2c40,0,80,0.3,120,0.1c4.7-0.3,9.3,0.8,14,0.6c22,0.2,44,0.3,66,0.4c5,0,10.1,0.3,15.1-0.2	c3.1-20,7-39.8,10.4-59.7c7.1-37.1,21.8-73.5,46.8-102.2c14-16.8,31.3-30.8,50.5-41.4C508.47,300.39,520.67,296.09,532.87,292.39z"></path><path class="st8" d="M511.47,499.29c19,0.1,38.1-0.1,57.2,0.1c7.6,0,15.4,4.2,18.5,11.4c-7.2,0.5-14.4,0.1-21.6,0.3	c-18.9-0.2-37.8,0.1-56.7-0.2C509.57,506.99,510.27,502.99,511.47,499.29L511.47,499.29z M363.97,592.99c2.8-0.5,5.6-0.5,8.3,0.1	c-7,36.8-13.3,73.8-20.1,110.6c-0.7,3.9-5.6,2.5-8.3,2.2c-0.1-0.7-0.2-2.2-0.3-3c6.3-35.2,12.4-70.5,19.1-105.7	C363.17,595.79,363.57,594.39,363.97,592.99L363.97,592.99z"></path><path class="st10" d="M520.22,154.53c-0.8-1.5-0.9-3.3-0.9-5l-0.8,0.1c-1.2-4.4-4.9-8.6-9.7-8.8c-3.6-0.3-8.1-0.2-10.2,3.2	c-4,5.4-2.1,12.3-2.3,18.4c0,0.4,0.1,1.1,0.1,1.5c0,4.1-0.5,8.1-1.2,12.1c-0.6,1.2-0.9,2.5-0.9,3.9c-1.7,9.4-5.1,18.7-9.7,27.2	c-0.9,1.2-1.6,2.5-1.9,3.9c-3,5.2-6.6,10-10.3,14.8c-0.6,0.5-1.1,1.1-1.6,1.7c-2.6,3.2-5.4,5.9-8.3,8.7c-0.7,0.4-1.2,0.9-1.8,1.3	c-3.4,3.3-7.2,6.4-11.3,8.9c-0.5,0.3-1,0.7-1.6,1.1c-25.6,16.9-56.7,23.9-87,24.2c-25.7,0.8-51.6-4.7-74.8-15.8	c-0.4-0.2-1.4-0.6-1.8-0.8c-3.9-2.1-7.9-3.9-11.5-6.5c-0.8-0.4-1.6-0.9-2.5-1.3c-3.7-2.2-7.2-4.6-10.5-7.4c-1.1-1-2.3-1.8-3.5-2.7	c-3.6-2.9-7.3-6-10.4-9.5c-0.8-0.9-1.6-1.7-2.4-2.5c-10.9-11.3-19.4-25.1-23.9-40.1c-4.3-11.9-3.7-24.9-4.2-37.4	c-3.6-5.5-11.2-8.6-17.2-5.2c-2.5,1.8-2.8,5.1-4.7,7.4c-3.1,33,11,65.9,33.5,89.7c0,0.8,0.4,1.3,1.1,1.6c4,3.7,7.9,7.5,11.9,11.1	c0.7,0.7,1.5,1.4,2.4,2c4,3.3,8.3,6.3,12.5,9.4c0.8,0.6,1.6,1.1,2.5,1.6c5.5,3.2,10.7,7,16.6,9.2c0.4,0.3,1.1,0.8,1.5,1	c19,9.1,39.5,15.3,60.5,17.3c2.3,0,4.6,0.2,6.9,0.7c10,0.6,20,0.3,30,0.1c30.9-2.7,62.8-10.2,88.6-28.4l0.3,0.4	c0.8-0.7,1.5-1.3,2.3-1.9c4.1-3,8.1-6.2,12.1-9.5c0.9-0.7,1.9-1.5,2.8-2.4c4.4-4.8,9.5-9.2,13.2-14.7l0.6,0.3c0.3-0.5,0.8-1.5,1.1-2	c3.4-4.6,6.5-9.4,9.5-14.2c0.2-0.3,0.7-0.8,0.9-1.1l-0.4-0.4c0.3-0.4,1-1.2,1.3-1.6c5.5-11.2,10.4-22.9,12.1-35.3	c0.7-0.3,1.1-0.9,1.1-1.6c0.1-4,1.5-7.8,1.1-11.8C520.32,164.53,520.42,159.53,520.22,154.53L520.22,154.53z"></path><g><defs><path id="SVGID_5_" d="M520.22,154.53c-0.8-1.5-0.9-3.3-0.9-5l-0.8,0.1c-1.2-4.4-4.9-8.6-9.7-8.8c-3.6-0.3-8.1-0.2-10.2,3.2 c-4,5.4-2.1,12.3-2.3,18.4c0,0.4,0.1,1.1,0.1,1.5c0,4.1-0.5,8.1-1.2,12.1c-0.6,1.2-0.9,2.5-0.9,3.9c-1.7,9.4-5.1,18.7-9.7,27.2 c-0.9,1.2-1.6,2.5-1.9,3.9c-3,5.2-6.6,10-10.3,14.8c-0.6,0.5-1.1,1.1-1.6,1.7c-2.6,3.2-5.4,5.9-8.3,8.7c-0.7,0.4-1.2,0.9-1.8,1.3 c-3.4,3.3-7.2,6.4-11.3,8.9c-0.5,0.3-1,0.7-1.6,1.1c-25.6,16.9-56.7,23.9-87,24.2c-25.7,0.8-51.6-4.7-74.8-15.8 c-0.4-0.2-1.4-0.6-1.8-0.8c-3.9-2.1-7.9-3.9-11.5-6.5c-0.8-0.4-1.6-0.9-2.5-1.3c-3.7-2.2-7.2-4.6-10.5-7.4c-1.1-1-2.3-1.8-3.5-2.7 c-3.6-2.9-7.3-6-10.4-9.5c-0.8-0.9-1.6-1.7-2.4-2.5c-10.9-11.3-19.4-25.1-23.9-40.1c-4.3-11.9-3.7-24.9-4.2-37.4 c-3.6-5.5-11.2-8.6-17.2-5.2c-2.5,1.8-2.8,5.1-4.7,7.4c-3.1,33,11,65.9,33.5,89.7c0,0.8,0.4,1.3,1.1,1.6c4,3.7,7.9,7.5,11.9,11.1 c0.7,0.7,1.5,1.4,2.4,2c4,3.3,8.3,6.3,12.5,9.4c0.8,0.6,1.6,1.1,2.5,1.6c5.5,3.2,10.7,7,16.6,9.2c0.4,0.3,1.1,0.8,1.5,1 c19,9.1,39.5,15.3,60.5,17.3c2.3,0,4.6,0.2,6.9,0.7c10,0.6,20,0.3,30,0.1c30.9-2.7,62.8-10.2,88.6-28.4l0.3,0.4 c0.8-0.7,1.5-1.3,2.3-1.9c4.1-3,8.1-6.2,12.1-9.5c0.9-0.7,1.9-1.5,2.8-2.4c4.4-4.8,9.5-9.2,13.2-14.7l0.6,0.3 c0.3-0.5,0.8-1.5,1.1-2c3.4-4.6,6.5-9.4,9.5-14.2c0.2-0.3,0.7-0.8,0.9-1.1l-0.4-0.4c0.3-0.4,1-1.2,1.3-1.6 c5.5-11.2,10.4-22.9,12.1-35.3c0.7-0.3,1.1-0.9,1.1-1.6c0.1-4,1.5-7.8,1.1-11.8C520.32,164.53,520.42,159.53,520.22,154.53 L520.22,154.53z"></path></defs><clipPath id="SVGID_6_"><use xlink:href="#SVGID_5_" style="overflow:visible"></use></clipPath><g class="st11"><path class="st12" d="M185.74,151.16c8.11,2.54,26.73-3.85,32,2 M190.4,175.82c7.77-2.7,24.43-9.1,31.33-5.33 M198.4,200.49 c3.76,1.22,11.16-5.38,14.83-7.31c5.47-2.88,11.08-5.08,17.17-6.02 M210.4,226.49c3.87-5.5,8.51-10.08,14.1-13.98 c5.55-3.87,20.72-14.23,27.23-10.68 M221.74,245.16c4.4-3.49,6.19-9.68,10.8-13.35c5.58-4.44,14.14-5.24,19.86-7.98 M240.57,258.99c1.32-9.67,11.13-21.33,20.5-20.5 M255.07,272.49c4.95-0.5,9.14-11.58,12.49-15.33 c5.02-5.62,10.21-7.36,16.85-9.34 M283.74,284.49c-0.32-7,6.91-27.05,15.33-26 M305.07,291.16c-0.35-8.27,3.92-33.14,14-34 M327.07,304.49c-1.91-11.56-1.79-28.29,7.33-36.67 M354.4,307.16c-1.02-9.64-10.59-29.12,0-36.67 M383.74,300.49 c-4.57-5.3-7.23-26.21-5.33-32 M411.74,295.82c-3.53-6.4-7.9-12.42-9.23-19.85c-0.8-4.44,0.6-10.77-0.1-14.15 M435.07,285.82 c-7.65-5-9.77-23.39-7.33-31.33 M457.74,275.82c-5.44-11.67-11.24-20.72-11.33-34 M479.74,254.49c-8.45-5.69-19.24-16.02-18-27.33 M503.07,236.49c-12.84-2.85-28.26-14.34-36-24.67 M513.74,214.49c-9.27-1.99-39.88-13.93-38-26 M523.74,191.16 c-12.91-4.73-31.69-8.99-42-18 M530.4,169.82c-8.13,0.7-19.78-3.24-28.05-4.67c-9.18-1.58-17.69-4.68-26.62-6.67 M522.4,149.16 c-15.68,0.94-30.4-4.43-44.67-9.33"></path></g></g></svg>
</a>
@endif


@if($whatsappStore->id == 1700)
<a href="https://www.amazon.in/s?k=OLFENZA&ref=bl_dp_s_web_0" target="_blank" style="position: fixed;right: 15px;bottom: 99px;z-index: 100;background: #ffffff;padding: 10px;border-radius: 32px;border: 1px solid #ff9a00;">
<svg width="800px" height="800px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="height: 35px;width: 35px;">
    
    <title>Amazon-color</title>
    <desc>Created with Sketch.</desc>
    <defs>

</defs>
    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Color-" transform="translate(-601.000000, -560.000000)">
            <g id="Amazon" transform="translate(601.000000, 560.000000)">
                <path d="M25.4026553,25.9595294 C24.660417,27.4418824 23.3876054,28.3962353 22.0103725,28.7181176 C21.8015298,28.7181176 21.4826213,28.8225882 21.1637129,28.8225882 C18.835399,28.8225882 17.458166,27.0211765 17.458166,24.3727059 C17.458166,20.9788235 19.4703937,19.392 22.0103725,18.6465882 C23.3876054,18.3303529 24.9793255,18.2230588 26.5682233,18.2230588 L26.5682233,19.4964706 C26.5682233,21.9331765 26.6726447,23.8390588 25.4026553,25.9595294 L25.4026553,25.9595294 Z M26.5682233,13.3524706 C25.1909904,13.4569412 23.5992703,13.5614118 22.0103725,13.7703529 C19.574815,14.0922353 17.1392576,14.5157647 15.1298521,15.4701176 C11.2098182,17.0597647 8.55977364,20.4508235 8.55977364,25.4287059 C8.55977364,31.6856471 12.5842289,34.8621176 17.6726531,34.8621176 C19.3659723,34.8621176 20.7432053,34.6475294 22.0103725,34.3341176 C24.0282445,33.696 25.7187415,32.5298824 27.7309692,30.4094118 C28.8965372,31.9990588 29.2182679,32.7444706 31.2276733,34.4385882 C31.7582467,34.6475294 32.28882,34.6475294 32.7093276,34.3341176 C33.9821392,33.2724706 36.208854,31.3637647 37.3715998,30.3049412 C37.9021732,29.8814118 37.7977518,29.2432941 37.4760212,28.7181176 C36.3132753,27.2329412 35.1448851,25.9595294 35.1448851,23.0992941 L35.1448851,13.5614118 C35.1448851,9.53505882 35.4666157,5.82494118 32.5004849,3.072 C30.0649275,0.849882353 26.2493149,0 23.2831841,0 L22.0103725,0 C16.6115064,0.313411765 10.8937319,2.64564706 9.61809814,9.32329412 C9.40643324,10.1731765 10.0442501,10.4894118 10.4675799,10.5938824 L16.3998415,11.3364706 C17.0348362,11.2291765 17.3537447,10.6983529 17.458166,10.1731765 C17.9859172,7.84094118 19.8937235,6.67482353 22.0103725,6.46023529 L22.4365245,6.46023529 C23.7093361,6.46023529 25.086569,6.99105882 25.8259851,8.05270588 C26.6726447,9.32329412 26.5682233,11.0202353 26.5682233,12.5054118 L26.5682233,13.3524706 L26.5682233,13.3524706 Z" fill="#343B45">

</path>
                <path d="M47.9943556,35.9463529 L47.9943556,35.9435294 C47.971778,35.4437647 47.8673567,35.0625882 47.658514,34.7463529 L47.6359364,34.7152941 L47.6105366,34.6842353 C47.3988717,34.4527059 47.1956734,34.3651765 46.9755419,34.2691765 C46.3179696,34.0150588 45.3612442,33.8795294 44.2097872,33.8767059 C43.382883,33.8767059 42.4713128,33.9557647 41.5540982,34.1562353 L41.551276,34.0941176 L40.6284171,34.4018824 L40.6114839,34.4103529 L40.0893771,34.5797647 L40.0893771,34.6023529 C39.47696,34.8564706 38.9209869,35.1727059 38.4045245,35.5482353 C38.0827939,35.7882353 37.8175072,36.1072941 37.8033962,36.5957647 C37.7949296,36.8611765 37.9303952,37.1661176 38.1533489,37.3468235 C38.3763025,37.5275294 38.6359448,37.5896471 38.8645429,37.5896471 C38.9181647,37.5896471 38.9689643,37.5868235 39.0141194,37.5783529 L39.0592746,37.5755294 L39.093141,37.5698824 C39.5446928,37.4738824 40.2022651,37.4089412 40.9727253,37.3016471 C41.6331198,37.2282353 42.3330251,37.1745882 42.9397978,37.1745882 C43.368772,37.1717647 43.7554132,37.2028235 44.0206999,37.2592941 C44.1533432,37.2875294 44.2521202,37.3214118 44.3057419,37.3496471 C44.3254973,37.3552941 44.3396083,37.3637647 44.3480749,37.3694118 C44.3593637,37.4061176 44.3762969,37.5021176 44.3734747,37.6348235 C44.3791191,38.1430588 44.164632,39.0861176 43.8683012,40.0065882 C43.5804369,40.9270588 43.2304843,41.8503529 42.999064,42.4630588 C42.94262,42.6042353 42.9059314,42.7595294 42.9059314,42.9289412 C42.900287,43.1745882 43.0018862,43.4738824 43.2163733,43.6715294 C43.425216,43.8691765 43.696147,43.9482353 43.9219229,43.9482353 L43.9332117,43.9482353 C44.2718756,43.9454118 44.5597398,43.8098824 44.8080933,43.6150588 C47.1505182,41.5087059 47.9661336,38.1430588 48,36.2484706 L47.9943556,35.9463529 Z M41.0489247,38.8658824 C40.8090378,38.8630588 40.5635065,38.9195294 40.3349084,39.0268235 C40.0780883,39.1284706 39.8156239,39.2470588 39.5672704,39.3515294 L39.2032068,39.504 L38.7290774,39.6931765 L38.7290774,39.6988235 C33.5785648,41.7882353 28.16841,43.0136471 23.1618295,43.1209412 C22.9783866,43.1265882 22.7921215,43.1265882 22.614323,43.1265882 C14.7403887,43.1322353 8.31706456,39.4785882 1.83729642,35.8785882 C1.61152053,35.76 1.37727804,35.6978824 1.15150215,35.6978824 C0.860815683,35.6978824 0.561662624,35.808 0.344353327,36.0112941 C0.12704403,36.2174118 -0.00277710907,36.5138824 4.50895989e-05,36.816 C-0.00277710907,37.2084706 0.208887791,37.5698824 0.505218651,37.8042353 C6.58705678,43.0870588 13.25309,47.9943529 22.2192152,48 C22.3941915,48 22.57199,47.9943529 22.7497885,47.9915294 C28.453452,47.8644706 34.902176,45.936 39.9087564,42.7905882 L39.9398006,42.7708235 C40.5945507,42.3783529 41.2493008,41.9322353 41.8673623,41.4381176 C42.2511813,41.1529412 42.516468,40.7068235 42.516468,40.2437647 C42.4995348,39.4221176 41.8024517,38.8658824 41.0489247,38.8658824 Z" id="Fill-237" fill="#FF9A00">

</path>
            </g>
        </g>
    </g>
</svg>
</a>
<a href="https://www.meesho.com/ts2a4?_ms=2&page=1" target="_blank" style="
    position: fixed;
    right: 15px;
    bottom: 166px;
    z-index: 100;
    background: #580A46;
    padding: 10px;
    border-radius: 32px;
    border: 1px solid #580A46;
">
<img src="https://staging.vcardking.com/uploads/meeshologo.png" style="
    height: 35px;
    width: 35px;
">




</a>
<a href="https://www.flipkart.com/search?q=olfenza+car+freshener" target="_blank" style="
    position: fixed;
    right: 15px;
    bottom: 236px;
    z-index: 100;
    background: #ffffff;
    padding: 10px;
    border-radius: 32px;
    border: 1px solid #f7e82f;
">
<!--?xml version="1.0" encoding="utf-8"?--><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 713.39 707.4" style="enable-background:new 0 0 713.39 707.4;height: 35px;width: 35px;" xml:space="preserve"><style type="text/css">.st0{fill:url(#SVGID_1_);stroke:#FCD109;stroke-width:0.094;} .st1{fill:#F8F3B5;stroke:#F8F3B5;stroke-width:0.094;} .st2{fill:#F7B402;stroke:#F7B402;stroke-width:0.094;} .st3{fill:#BDA727;stroke:#BDA727;stroke-width:0.094;} .st4{fill:#F7E62D;stroke:#F7E62D;stroke-width:0.094;} .st5{fill:url(#SVGID_2_);stroke:#FCD109;stroke-width:0.094;} .st6{fill:url(#SVGID_3_);stroke:#FCD109;stroke-width:0.094;} .st7{fill:url(#SVGID_4_);stroke:#FCD109;stroke-width:0.094;} .st8{fill:#0D69B3;stroke:#0D69B3;stroke-width:0.094;} .st9{fill:#107BD4;stroke:#107BD4;stroke-width:0.094;} .st10{fill:#FFFFFF;stroke:#FFFFFF;stroke-width:0.094;} .st11{clip-path:url(#SVGID_6_);} .st12{fill:none;stroke:#D1D1D1;stroke-width:2;}</style><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="356.4805" y1="493.1343" x2="356.4805" y2="1080.8978" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)"><stop offset="0" style="stop-color:#F7E830"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st0" d="M712.87,122.59c-0.3-1-0.6-2-1-3c-236.9,0.1-473.7,0-710.5,0.1c-0.6,0.7-1,1.4-1.1,2.3c0,183.7,0,367.3-0.1,551	c1.5,9.8,6.9,18.7,14.1,25.4c0.3,0.1,1,0.2,1.3,0.3c3.7,3.9,9,5.8,14,7.6c3.7-0.2,7.3,1.4,11,1h294c2.8-0.1,5.7,0.4,8.4-0.7	c0.1-0.4,0.2-1.1,0.3-1.5c0.1-0.5,0.2-1.6,0.3-2.2c6.3-35.2,12.4-70.5,19.1-105.7l0.6-4.5c-27.2-0.1-54.5,0-81.7-0.1	c-6.6-0.2-13.4,0-20-0.8c-11.3-0.5-22.7-0.1-34-1.2c-14,0-27.9-1.3-41.9-1.3c-11-1.1-22.1-0.7-33.2-1.2c-7.2-0.9-14.6-0.5-21.9-0.8	c-11.9-1.3-24-0.4-35.9-1.7c-12.6,0.1-25.2-1-37.8-1.3c0.1-0.1,0.2-0.5,0.2-0.6c4.2,0.1,8.3-0.2,12.5-0.3c9.3-1.2,18.7-0.4,28-1.7	c9.7,0,19.3-1.3,29-1.3c8.6-1.2,17.3-0.5,25.9-1.7c10.1,0,20-1.3,30.1-1.4c8.3-1.1,16.7-0.5,25-1.6c9.7,0.1,19.3-1.4,29-1.3	c9.5-1.1,19.2-0.8,28.7-1.8c-0.9-3.7-1.6-7.4-2.4-11.1c-0.7-2.3-3.5-1.8-5.3-2.1c-21.7-3.1-43.3-6.2-64.9-9.2	c1.4-1.1,3.3-0.6,4.9-0.8c16.8-1.3,33.5-2.8,50.3-4c3.8-0.2,7.5-0.9,11.3-1c-1.7-5.2-2.7-10.9-5-15.7	c-35.9-5.5-71.8-10.4-107.6-16.3c9.3-1.5,18.7-2.2,28-3.2l0.8-0.3c29.7-3.1,59.5-6.6,89.2-9.5c37.7-0.2,75.3-0.1,113,0	c1.2-0.2,3.3,0.4,3.5-1.3c3.1-16.2,6.1-32.4,9.2-48.6c4.3-22.5,11.1-44.7,21.6-65.2c16.5-33,42.6-61,74.4-79.6	c29.7-17.4,64.1-25.8,98.3-27.4c11.1-1,22.3-0.7,33.3,0.7c7.2,1.7,14.6,3.7,20.3,8.6c4.7,3.8,7.5,9.4,9.6,15	c4.6,13.3,7.2,27.1,9.4,41c0.1,5.6,1.1,11.9-1.9,17c-2.8,5-8.4,7.4-13.7,8.9c-19.3,5-39.5,0.3-58.8,5c-15.9,3.4-30.7,12.2-40.8,24.9	c-11.9,14.8-18.2,33.2-21.7,51.6c-2.7,16.4-6.1,32.8-8.8,49.3c19,0.1,38.1-0.1,57.2,0.1c7.6,0,15.4,4.2,18.5,11.4	c4,9.2,3.1,19.6,1.8,29.3c-1.6,10.9-4.2,21.7-9.1,31.7c-4.1,8.5-10.9,16.3-20.2,19.3c-4.8,1.9-10,1.5-15.1,1.5	c-16.8,0-33.6,0.2-50.4,0c-2.7,12.3-4.5,24.9-6.9,37.4c-4.4,24.3-8.7,48.7-13.1,73.1c-0.1,0.8-0.2,2.5-0.2,3.4	c7.9,0.4,15.8,0,23.7,0.2c58.6,0,117.3-0.1,176,0c6.3,0.2,12.7-1.3,18.2-4.4c3.3-1.2,5.3-4.1,8.2-5.7c2.8-1.6,3.6-4.9,6-7	c2.6-4.6,5.3-9.4,5.5-14.8c0.3,0,1.1-0.1,1.5-0.2C712.77,490.59,713.07,306.59,712.87,122.59z"></path><path class="st1" d="M93.47,1.59c8.5-2.7,17.4-0.9,26.1-1.5c163.3,0.1,326.6,0,489.9,0c9.7-0.4,18.2,5.1,27.2,7.9	c7.2,2.9,14.7,5.2,21.9,8.3c1.5,0.6,2.6,1.9,3.7,3c-0.1,13.2,0,26.5,0,39.8c0.1,3.5-0.5,7.1,0.7,10.5c2.1,0.3,3.2,1.9,4.6,3.2	c6.6,3,12.2,7.9,18.2,11.9c9,6.4,18.6,12,27.4,18.6c0.4,2.6,0.1,5.3-0.7,7.7c-0.9,2.8-0.3,5.8-0.6,8.6c-236.9,0.1-473.7,0-710.5,0.1	c-0.5-3.3,0.4-6.6-1-9.7c-0.2-2.6-1.1-6,1.4-7.8c10-7,20.6-13.3,30.4-20.7c6.1-3.9,12-7.9,17.9-11.9c1.2-2,0.8-4.5,0.8-6.7	c0-14.5,0-29,0.1-43.5c3.4-4.4,9.3-4.9,14-7.1C74.47,8.69,84.07,5.19,93.47,1.59 M94.07,3.29c-12.8,4.9-25.7,9.6-38.5,14.5	c-1.7,0.3-2.6,1.8-3.5,3.1c0.1,0.8,0.2,2.2,0.2,3c-0.1,12,0,24-0.1,36c0.1,3-0.3,6,0.8,8.7c-1.3,1.3-2.7,2.6-4.3,3.6	c-14.5,9.4-28.5,19.6-43,28.9c-2.5,1.5-5.3,3.5-4.5,6.8c-0.5,1.8,0.4,3.3,2.3,2.8c31.4-0.2,62.7,0.2,94.1-0.3c46.7,0,93.3,0.1,140,0	l0.7-0.3c2.1,0.5,4.2,0.3,6.4,0.3c84.6,0,169.2,0.1,253.9,0c26.6,0.1,53.3,0,80,0c44,0,88.1,0.4,132.1,0.2c1.3-0.3,1.7-1.2,1.2-2.8	c-0.1-1.6,0.5-3.8-1.2-4.8c-7-3.3-13-8.4-19.7-12.4c-2.4-2-5.5-3.1-7.3-5.8c-6.9-3.9-13.3-8.7-20.1-13c-1.3-0.8-2.3-2.1-3.4-3.2	c0.6-2.1,0.8-4.4,0.8-6.6c-0.1-12.7,0-25.4-0.1-38.1c0.3-2,0.2-4.3-1.6-5.6c-12-4.3-23.9-8.9-35.8-13.3c-3.7-1.8-7.8-2.8-11.8-3.4	h-511.1C98.37,1.69,96.27,2.79,94.07,3.29L94.07,3.29z"></path><path class="st2" d="M52.27,23.89c8.8,3.7,18.2,5.8,27.1,9.4c4.8,1.9,6.3,7.1,8.4,11.3c-2.1,2.1-4.6,3.8-7.1,5.4	c-9.2,6.2-18.6,12.2-27.7,18.6c-1.1-2.7-0.7-5.7-0.8-8.7C52.27,47.89,52.17,35.89,52.27,23.89z M633.77,33.29	c8.9-3.5,18.2-5.9,27.1-9.4c0.1,12.7,0,25.4,0.1,38.1c0,2.2-0.2,4.5-0.8,6.6c-7.8-5.4-15.7-10.5-23.5-15.8c-3.8-2.8-8-4.9-11.4-8.3	C627.37,40.29,628.97,35.19,633.77,33.29L633.77,33.29z"></path><path class="st3" d="M204.87,37.39c11-2.6,23.3,7.2,22.4,18.7c0.1,11.3-11.8,20.5-22.7,17.9c-4.4-1.5-8.6-3.8-11.3-7.7	c-3.5-5.3-4.3-12.4-1.5-18.2C193.77,42.49,199.17,38.69,204.87,37.39L204.87,37.39z M490.17,43.69c4.6-5.1,11.9-8,18.7-6.2	c5.1,1.5,10.1,4.8,12.3,9.8c4.4,8.6,1,20.2-7.6,24.7c-7.6,4.2-17.2,2.2-23-3.9C484.67,61.39,484.27,50.39,490.17,43.69z"></path><path class="st4" d="M80.67,49.99c2.5-1.6,5-3.3,7.1-5.4l0.7,0.7c0.7,5.2,0.2,10.5,0.4,15.7c-0.3,15.6,0.3,31.3-0.4,46.9	c-29.1,0-58.2-0.2-87.3,0c-0.8-3.3,2-5.3,4.5-6.8c14.5-9.3,28.5-19.5,43-28.9c1.6-1,3-2.3,4.3-3.6	C62.07,62.19,71.47,56.19,80.67,49.99z M624.27,47.99c0-1.3,0.3-2.4,1-3.5c3.4,3.4,7.6,5.5,11.4,8.3c7.8,5.3,15.7,10.4,23.5,15.8	c1.1,1.1,2.1,2.4,3.4,3.2c6.8,4.3,13.2,9.1,20.1,13c1.8,2.7,4.9,3.8,7.3,5.8c6.7,4,12.7,9.1,19.7,12.4c1.7,1,1.1,3.2,1.2,4.8	c-29.1,0.1-58.1-0.1-87.2,0.1c-0.5-4-0.2-8-0.3-11.9C624.37,79.99,624.17,63.99,624.27,47.99L624.27,47.99z"></path><radialGradient id="SVGID_2_" cx="353.4156" cy="761.2123" r="478.08" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)" gradientUnits="userSpaceOnUse"><stop offset="0.596" style="stop-color:#F29405"></stop><stop offset="0.736" style="stop-color:#F7D01E"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></radialGradient><path class="st5" d="M711.87,107.79c-29.1,0.1-58.1-0.1-87.2,0.1c-0.5-4-0.2-8-0.3-11.9c0-16-0.2-32-0.1-48c0-1.3,0.3-2.4,1-3.5	c2.1-4.2,3.7-9.3,8.5-11.2c8.9-3.5,18.2-5.9,27.1-9.4c0.3-2,0.2-4.3-1.6-5.6c-12-4.3-23.9-8.9-35.8-13.3c-3.7-1.8-7.8-2.8-11.8-3.4	h-511.1c-2.2,0.1-4.3,1.2-6.5,1.7c-12.8,4.9-25.7,9.6-38.5,14.5c-1.7,0.3-2.6,1.8-3.5,3.1c0.1,0.8,0.2,2.2,0.2,3	c8.8,3.7,18.2,5.8,27.1,9.4c4.8,1.9,6.3,7.1,8.4,11.3l0.7,0.7c0.7,5.2,0.2,10.5,0.4,15.7c-0.3,15.6,0.3,31.3-0.4,46.9	c-29.1,0-58.2-0.2-87.3,0c-0.5,1.8,0.4,3.3,2.3,2.8c31.4-0.2,62.7,0.2,94.1-0.3c46.7,0,93.3,0.1,140,0l0.7-0.3	c2.1,0.5,4.2,0.3,6.4,0.3c84.6,0,169.2,0.1,253.9,0c26.6,0.1,53.3,0,80,0c44,0,88.1,0.4,132.1,0.2	C711.97,110.29,712.37,109.39,711.87,107.79L711.87,107.79z M191.77,48.09c2-5.6,7.4-9.4,13.1-10.7c11-2.6,23.3,7.2,22.4,18.7	c0.1,11.3-11.8,20.5-22.7,17.9c-4.4-1.5-8.6-3.8-11.3-7.7C189.77,60.99,188.97,53.89,191.77,48.09L191.77,48.09z M490.17,43.69	c4.6-5.1,11.9-8,18.7-6.2c5.1,1.5,10.1,4.8,12.3,9.8c4.4,8.6,1,20.2-7.6,24.7c-7.6,4.2-17.2,2.2-23-3.9	C484.67,61.39,484.27,50.39,490.17,43.69z"></path><linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="520.03" y1="514.347" x2="520.197" y2="542.18" gradientTransform="matrix(1 0 0 1 0.14 -373.5461)"><stop offset="0" style="stop-color:#FADA1C"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st6" d="M515.66,151.73c1.4,0.3-7.29-8.35-5.59-8.75c1.6,0.2,7.67-4.51,15-0.67c7.33,3.84,5.51,12.83,4.68,16.17	c-0.99,3.97-3.52,6.5-5.52,8.5c-1.1,0.9-3.57,2.3-5.07,2.2c0.9-4.9-2-5.7-2.2-10.7L515.66,151.73z"></path><linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="-811.1298" y1="513.0134" x2="-810.9628" y2="540.8463" gradientTransform="matrix(-1 0 0 1 -618.3428 -373.5461)"><stop offset="0" style="stop-color:#FADA1C"></stop><stop offset="1" style="stop-color:#FDCB06"></stop></linearGradient><path class="st7" d="M195.99,157.16c-0.2,5-3.1,5.8-2.2,10.7c-1.5,0.1-3.97-1.3-5.07-2.2c-2-2-4.52-4.53-5.51-8.5	c-0.83-3.33-2.65-12.32,4.68-16.17s13.4,0.87,15,0.67c1.7,0.4-6.99,9.05-5.59,8.75L195.99,157.16L195.99,157.16z"></path><path class="st3" d="M502.57,215.79c1.5-1.31,2.5-1.31,4.5-1.31c-12,26-26,52-47.05,72.24c-2.25,2.01-4.63,3.87-7.12,5.58	c-2.41,1.76-4.77,3.42-7.12,5.1c-2.3,1.6-4.59,3.2-6.81,4.88c-5.7,3.1-10.7,7.4-17,9.3c-11.5,5.5-23.9,9.2-36.4,11.8	c-4.9,0.8-9.9,2-14.9,2.1c-6.2,1.8-12.8,0.5-19.1,0.9c-3.5,0.6-6.6-1.4-10-1c-2.95-0.42-5.89-0.92-8.82-1.5	c-2.97-0.61-5.92-1.31-8.84-2.1c-45.84-14.3-90.84-49.3-103.95-96.64c-0.59-3.19-0.89-6.42-0.89-9.67c1.4,2.8,2.85,5.58,4.35,8.33	c18.65,40.67,55.65,72.67,99.36,82.32c3.55,1.62,7.39,1.05,10.79,2.45c3.1,0,6.1-0.1,9.1,0.9c10.3,0.2,20.6,0.1,30.9,0.1	c1.4,0.1,2.7-0.6,4.1-0.9c17.17-0.58,33.99-5.26,49.65-12.36c3.13-1.42,6.22-2.94,9.25-4.54c2.65-1.4,5.25-2.91,7.77-4.54	c2.48-1.6,4.88-3.3,7.22-5.1c18.51-14.66,34.51-33.66,45.38-55.51C499,222.71,500.9,219.07,502.57,215.79z"></path><path class="st8" d="M486.27,304.69c29.7-17.4,64.1-25.8,98.3-27.4c11.1-1,22.3-0.7,33.3,0.7c7.2,1.7,14.6,3.7,20.3,8.6	c-2.9,0.2-5.7-1.1-8.6-1.5c-8.2-1.6-16.7-1-25-1.2c-24.1,0-48.4,1.9-71.7,8.5c-12.2,3.7-24.4,8-35.5,14.4	c-19.2,10.6-36.5,24.6-50.5,41.4c-25,28.7-39.7,65.1-46.8,102.2c-3.4,19.9-7.3,39.7-10.4,59.7c-5,0.5-10.1,0.2-15.1,0.2	c-22-0.1-44-0.2-66-0.4c-4.7,0.2-9.3-0.9-14-0.6c-40,0.2-80-0.1-120-0.1l0.8-0.3c29.7-3.1,59.5-6.6,89.2-9.5	c37.7-0.2,75.3-0.1,113,0c1.2-0.2,3.3,0.4,3.5-1.3c3.1-16.2,6.1-32.4,9.2-48.6c4.3-22.5,11.1-44.7,21.6-65.2	C428.37,351.29,454.47,323.29,486.27,304.69z"></path><path class="st9" d="M532.87,292.39c23.3-6.6,47.6-8.5,71.7-8.5c8.3,0.2,16.8-0.4,25,1.2c2.9,0.4,5.7,1.7,8.6,1.5	c4.7,3.8,7.5,9.4,9.6,15c4.6,13.3,7.2,27.1,9.4,41c0.1,5.6,1.1,11.9-1.9,17c-2.8,5-8.4,7.4-13.7,8.9c-19.3,5-39.5,0.3-58.8,5	c-15.9,3.4-30.7,12.2-40.8,24.9c-11.9,14.8-18.2,33.2-21.7,51.6c-2.7,16.4-6.1,32.8-8.8,49.3c-1.2,3.7-1.9,7.7-2.6,11.6	c18.9,0.3,37.8,0,56.7,0.2c7.2-0.2,14.4,0.2,21.6-0.3c4,9.2,3.1,19.6,1.8,29.3c-1.6,10.9-4.2,21.7-9.1,31.7	c-4.1,8.5-10.9,16.3-20.2,19.3c-4.8,1.9-10,1.5-15.1,1.5c-16.8,0-33.6,0.2-50.4,0c-2.7,12.3-4.5,24.9-6.9,37.4	c-4.4,24.3-8.7,48.7-13.1,73.1c-0.1,0.8-0.2,2.5-0.2,3.4v0.1c-43.7,0-87.3,0.1-131,0c0.1-0.4,0.2-1.1,0.3-1.5	c0.1-0.5,0.2-1.6,0.3-2.2c0.1,0.8,0.2,2.3,0.3,3c2.7,0.3,7.6,1.7,8.3-2.2c6.8-36.8,13.1-73.8,20.1-110.6c-2.7-0.6-5.5-0.6-8.3-0.1	c-0.4,1.4-0.8,2.8-1.3,4.2l0.6-4.5c-27.2-0.1-54.5,0-81.7-0.1c-6.6-0.2-13.4,0-20-0.8c-11.3-0.5-22.7-0.1-34-1.2	c-14,0-27.9-1.3-41.9-1.3c-11-1.1-22.1-0.7-33.2-1.2c-7.2-0.9-14.6-0.5-21.9-0.8c-11.9-1.3-24-0.4-35.9-1.7	c-12.6,0.1-25.2-1-37.8-1.3c0.1-0.1,0.2-0.5,0.2-0.6c4.2,0.1,8.3-0.2,12.5-0.3c9.3-1.2,18.7-0.4,28-1.7c9.7,0,19.3-1.3,29-1.3	c8.6-1.2,17.3-0.5,25.9-1.7c10.1,0,20-1.3,30.1-1.4c8.3-1.1,16.7-0.5,25-1.6c9.7,0.1,19.3-1.4,29-1.3c9.5-1.1,19.2-0.8,28.7-1.8	c-0.9-3.7-1.6-7.4-2.4-11.1c-0.7-2.3-3.5-1.8-5.3-2.1c-21.7-3.1-43.3-6.2-64.9-9.2c1.4-1.1,3.3-0.6,4.9-0.8	c16.8-1.3,33.5-2.8,50.3-4c3.8-0.2,7.5-0.9,11.3-1c-1.7-5.2-2.7-10.9-5-15.7c-35.9-5.5-71.8-10.4-107.6-16.3	c9.3-1.5,18.7-2.2,28-3.2c40,0,80,0.3,120,0.1c4.7-0.3,9.3,0.8,14,0.6c22,0.2,44,0.3,66,0.4c5,0,10.1,0.3,15.1-0.2	c3.1-20,7-39.8,10.4-59.7c7.1-37.1,21.8-73.5,46.8-102.2c14-16.8,31.3-30.8,50.5-41.4C508.47,300.39,520.67,296.09,532.87,292.39z"></path><path class="st8" d="M511.47,499.29c19,0.1,38.1-0.1,57.2,0.1c7.6,0,15.4,4.2,18.5,11.4c-7.2,0.5-14.4,0.1-21.6,0.3	c-18.9-0.2-37.8,0.1-56.7-0.2C509.57,506.99,510.27,502.99,511.47,499.29L511.47,499.29z M363.97,592.99c2.8-0.5,5.6-0.5,8.3,0.1	c-7,36.8-13.3,73.8-20.1,110.6c-0.7,3.9-5.6,2.5-8.3,2.2c-0.1-0.7-0.2-2.2-0.3-3c6.3-35.2,12.4-70.5,19.1-105.7	C363.17,595.79,363.57,594.39,363.97,592.99L363.97,592.99z"></path><path class="st10" d="M520.22,154.53c-0.8-1.5-0.9-3.3-0.9-5l-0.8,0.1c-1.2-4.4-4.9-8.6-9.7-8.8c-3.6-0.3-8.1-0.2-10.2,3.2	c-4,5.4-2.1,12.3-2.3,18.4c0,0.4,0.1,1.1,0.1,1.5c0,4.1-0.5,8.1-1.2,12.1c-0.6,1.2-0.9,2.5-0.9,3.9c-1.7,9.4-5.1,18.7-9.7,27.2	c-0.9,1.2-1.6,2.5-1.9,3.9c-3,5.2-6.6,10-10.3,14.8c-0.6,0.5-1.1,1.1-1.6,1.7c-2.6,3.2-5.4,5.9-8.3,8.7c-0.7,0.4-1.2,0.9-1.8,1.3	c-3.4,3.3-7.2,6.4-11.3,8.9c-0.5,0.3-1,0.7-1.6,1.1c-25.6,16.9-56.7,23.9-87,24.2c-25.7,0.8-51.6-4.7-74.8-15.8	c-0.4-0.2-1.4-0.6-1.8-0.8c-3.9-2.1-7.9-3.9-11.5-6.5c-0.8-0.4-1.6-0.9-2.5-1.3c-3.7-2.2-7.2-4.6-10.5-7.4c-1.1-1-2.3-1.8-3.5-2.7	c-3.6-2.9-7.3-6-10.4-9.5c-0.8-0.9-1.6-1.7-2.4-2.5c-10.9-11.3-19.4-25.1-23.9-40.1c-4.3-11.9-3.7-24.9-4.2-37.4	c-3.6-5.5-11.2-8.6-17.2-5.2c-2.5,1.8-2.8,5.1-4.7,7.4c-3.1,33,11,65.9,33.5,89.7c0,0.8,0.4,1.3,1.1,1.6c4,3.7,7.9,7.5,11.9,11.1	c0.7,0.7,1.5,1.4,2.4,2c4,3.3,8.3,6.3,12.5,9.4c0.8,0.6,1.6,1.1,2.5,1.6c5.5,3.2,10.7,7,16.6,9.2c0.4,0.3,1.1,0.8,1.5,1	c19,9.1,39.5,15.3,60.5,17.3c2.3,0,4.6,0.2,6.9,0.7c10,0.6,20,0.3,30,0.1c30.9-2.7,62.8-10.2,88.6-28.4l0.3,0.4	c0.8-0.7,1.5-1.3,2.3-1.9c4.1-3,8.1-6.2,12.1-9.5c0.9-0.7,1.9-1.5,2.8-2.4c4.4-4.8,9.5-9.2,13.2-14.7l0.6,0.3c0.3-0.5,0.8-1.5,1.1-2	c3.4-4.6,6.5-9.4,9.5-14.2c0.2-0.3,0.7-0.8,0.9-1.1l-0.4-0.4c0.3-0.4,1-1.2,1.3-1.6c5.5-11.2,10.4-22.9,12.1-35.3	c0.7-0.3,1.1-0.9,1.1-1.6c0.1-4,1.5-7.8,1.1-11.8C520.32,164.53,520.42,159.53,520.22,154.53L520.22,154.53z"></path><g><defs><path id="SVGID_5_" d="M520.22,154.53c-0.8-1.5-0.9-3.3-0.9-5l-0.8,0.1c-1.2-4.4-4.9-8.6-9.7-8.8c-3.6-0.3-8.1-0.2-10.2,3.2 c-4,5.4-2.1,12.3-2.3,18.4c0,0.4,0.1,1.1,0.1,1.5c0,4.1-0.5,8.1-1.2,12.1c-0.6,1.2-0.9,2.5-0.9,3.9c-1.7,9.4-5.1,18.7-9.7,27.2 c-0.9,1.2-1.6,2.5-1.9,3.9c-3,5.2-6.6,10-10.3,14.8c-0.6,0.5-1.1,1.1-1.6,1.7c-2.6,3.2-5.4,5.9-8.3,8.7c-0.7,0.4-1.2,0.9-1.8,1.3 c-3.4,3.3-7.2,6.4-11.3,8.9c-0.5,0.3-1,0.7-1.6,1.1c-25.6,16.9-56.7,23.9-87,24.2c-25.7,0.8-51.6-4.7-74.8-15.8 c-0.4-0.2-1.4-0.6-1.8-0.8c-3.9-2.1-7.9-3.9-11.5-6.5c-0.8-0.4-1.6-0.9-2.5-1.3c-3.7-2.2-7.2-4.6-10.5-7.4c-1.1-1-2.3-1.8-3.5-2.7 c-3.6-2.9-7.3-6-10.4-9.5c-0.8-0.9-1.6-1.7-2.4-2.5c-10.9-11.3-19.4-25.1-23.9-40.1c-4.3-11.9-3.7-24.9-4.2-37.4 c-3.6-5.5-11.2-8.6-17.2-5.2c-2.5,1.8-2.8,5.1-4.7,7.4c-3.1,33,11,65.9,33.5,89.7c0,0.8,0.4,1.3,1.1,1.6c4,3.7,7.9,7.5,11.9,11.1 c0.7,0.7,1.5,1.4,2.4,2c4,3.3,8.3,6.3,12.5,9.4c0.8,0.6,1.6,1.1,2.5,1.6c5.5,3.2,10.7,7,16.6,9.2c0.4,0.3,1.1,0.8,1.5,1 c19,9.1,39.5,15.3,60.5,17.3c2.3,0,4.6,0.2,6.9,0.7c10,0.6,20,0.3,30,0.1c30.9-2.7,62.8-10.2,88.6-28.4l0.3,0.4 c0.8-0.7,1.5-1.3,2.3-1.9c4.1-3,8.1-6.2,12.1-9.5c0.9-0.7,1.9-1.5,2.8-2.4c4.4-4.8,9.5-9.2,13.2-14.7l0.6,0.3 c0.3-0.5,0.8-1.5,1.1-2c3.4-4.6,6.5-9.4,9.5-14.2c0.2-0.3,0.7-0.8,0.9-1.1l-0.4-0.4c0.3-0.4,1-1.2,1.3-1.6 c5.5-11.2,10.4-22.9,12.1-35.3c0.7-0.3,1.1-0.9,1.1-1.6c0.1-4,1.5-7.8,1.1-11.8C520.32,164.53,520.42,159.53,520.22,154.53 L520.22,154.53z"></path></defs><clipPath id="SVGID_6_"><use xlink:href="#SVGID_5_" style="overflow:visible"></use></clipPath><g class="st11"><path class="st12" d="M185.74,151.16c8.11,2.54,26.73-3.85,32,2 M190.4,175.82c7.77-2.7,24.43-9.1,31.33-5.33 M198.4,200.49 c3.76,1.22,11.16-5.38,14.83-7.31c5.47-2.88,11.08-5.08,17.17-6.02 M210.4,226.49c3.87-5.5,8.51-10.08,14.1-13.98 c5.55-3.87,20.72-14.23,27.23-10.68 M221.74,245.16c4.4-3.49,6.19-9.68,10.8-13.35c5.58-4.44,14.14-5.24,19.86-7.98 M240.57,258.99c1.32-9.67,11.13-21.33,20.5-20.5 M255.07,272.49c4.95-0.5,9.14-11.58,12.49-15.33 c5.02-5.62,10.21-7.36,16.85-9.34 M283.74,284.49c-0.32-7,6.91-27.05,15.33-26 M305.07,291.16c-0.35-8.27,3.92-33.14,14-34 M327.07,304.49c-1.91-11.56-1.79-28.29,7.33-36.67 M354.4,307.16c-1.02-9.64-10.59-29.12,0-36.67 M383.74,300.49 c-4.57-5.3-7.23-26.21-5.33-32 M411.74,295.82c-3.53-6.4-7.9-12.42-9.23-19.85c-0.8-4.44,0.6-10.77-0.1-14.15 M435.07,285.82 c-7.65-5-9.77-23.39-7.33-31.33 M457.74,275.82c-5.44-11.67-11.24-20.72-11.33-34 M479.74,254.49c-8.45-5.69-19.24-16.02-18-27.33 M503.07,236.49c-12.84-2.85-28.26-14.34-36-24.67 M513.74,214.49c-9.27-1.99-39.88-13.93-38-26 M523.74,191.16 c-12.91-4.73-31.69-8.99-42-18 M530.4,169.82c-8.13,0.7-19.78-3.24-28.05-4.67c-9.18-1.58-17.69-4.68-26.62-6.67 M522.4,149.16 c-15.68,0.94-30.4-4.43-44.67-9.33"></path></g></g></svg>
</a>
@endif

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://mercury.phonepe.com/web/bundle/checkout.js"></script>
