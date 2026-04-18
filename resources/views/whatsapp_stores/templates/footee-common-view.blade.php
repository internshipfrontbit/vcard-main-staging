<style>


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

@include('whatsapp_stores.templates.payment_success_popup')

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
                </div>
            </div>
        </div>

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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://mercury.phonepe.com/web/bundle/checkout.js"></script>
