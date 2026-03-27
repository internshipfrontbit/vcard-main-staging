<div>
    <style>
        .hide-desktop{
            display: none !important;
        }
        @media(max-width: 600px){
            .hide-desktop{
                display: flex !important;
            }
            .collapse-mobile{
                height: 0;
                overflow: hidden;
            }
            .items-section .item-card .item-img img {
                aspect-ratio: unset !important;
            }
        }
    </style>
    <div class="d-flex justify-content-between hide-desktop">
                    <h2 class="w-75" style="font-weight: 600">Filters</h2>
                    <div class="w-25 mt-2 mb-3 d-flex justify-content-end" style="position: relative;top: -11px;" data-content="Show Filter" onclick="showFilter()" id="filterButton">
                        <span style="background: #770101;padding: 4px 7px;border-radius: 6px;"><svg fill="#ffffff" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="filter" class="icon glyph" style="height: 20px;width: 20px;"><path d="M20.62,3.17A2,2,0,0,0,18.8,2H5.2A2,2,0,0,0,3.7,5.32L9,11.38V21a1,1,0,0,0,.47.85A1,1,0,0,0,10,22a1,1,0,0,0,.45-.11l4-2A1,1,0,0,0,15,19V11.38l5.3-6.06A2,2,0,0,0,20.62,3.17Z"></path></svg></span>
                    </div>
                    <script>
                        function showFilter(){
                                if($("#filterButton").attr("data-content") == "Show Filter"){
                                    $("#filterButton").attr("data-content","Hide filter");
                                    $("#filterMenu").animate({ height: '600px' }, 300);
                                    setTimeout(() => {
                                        $("#filterMenu").css("height", "100%");    
                                    }, 400);   
                                }else{
                                    $("#filterButton").attr("data-content","Show Filter");
                                    $("#filterMenu").animate({ height: '0px' }, 300);
                                }
                                
                            }
                    </script>
                </div>
    <div class="row justify-content-between align-items-center  mb-20">
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="section-heading mb-sm-0 d-flex flex-row">
                
            </div>

        </div>

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="position-relative">
                <input type="text" wire:model.live="search"
                    placeholder="{{ __('messages.whatsapp_stores_templates.search_products') }}" id="productSearch"
                    class="form-control ps-45 border-0" />
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                        fill="none">
                        <path
                            d="M20.6677 19.8511L16.1664 15.3497C16.1661 15.3494 16.1661 15.349 16.1664 15.3488C17.1299 14.2124 17.6898 12.7888 17.7586 11.3005C17.9523 7.26831 14.7436 4.0226 10.7095 4.17169C7.15613 4.30618 4.30643 7.15589 4.17193 10.7093C4.02288 14.7434 7.26862 17.9521 11.3008 17.7582C12.7891 17.6894 14.2126 17.1295 15.349 16.1661C15.3491 16.166 15.3493 16.1659 15.3494 16.1659C15.3496 16.1659 15.3498 16.166 15.3499 16.1661L19.8513 20.6675C20.0785 20.8912 20.4441 20.8883 20.6677 20.6611C20.889 20.4364 20.889 20.0758 20.6677 19.8511ZM5.4683 12.2762C5.02515 10.2981 5.60401 8.34583 6.97507 6.9748C8.34614 5.60376 10.2983 5.02488 12.2765 5.46806C14.1481 5.88748 16.0458 7.78498 16.4652 9.65637C16.9087 11.6347 16.3297 13.5872 14.9586 14.9584C13.5875 16.3295 11.6349 16.9084 9.65651 16.4649C7.78512 16.0454 5.88772 14.1477 5.4683 12.2762Z"
                            fill="#999999" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-40">
        <div class="col-xl-3 col-lg-4 mb-40 collapse-mobile" id="filterMenu">
            <div class="items-filter-wrapper mb-3">
                <div class="row mx-0">
                    <div class="col-4 ps-0 px-1">
                        <input type="number" class="form-control" min="0"
                            placeholder="{{ __('messages.whatsapp_stores_templates.min') }}" wire:model.defer="minPrice"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                    </div>
                    <div class="col-4 px-1">
                        <input type="number" class="form-control" min="1"
                            placeholder="{{ __('messages.whatsapp_stores_templates.max') }}" wire:model.defer="maxPrice"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                    </div>
                    <div class="col-4 pe-0 px-1">
                        <button wire:click="applyPriceFilter" type="submit" class="apply-btn btn btn-primary w-100">
                            {{ __('messages.whatsapp_stores_templates.apply') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="items-filter-wrapper">
                <div class="p-2">
                    <div class="heading-text mb-3">
                        <h3 class="">{{ __('messages.whatsapp_stores_templates.all_categories') }}</h3>
                    </div>
                    <div>
                        @foreach ($categories as $category)
                            <div class="form-check d-flex align-items-center gap-3 mb-2 ps-0">
                                <input class="form-check-input m-0 p-0" type="checkbox"
                                    wire:model.live="categoryFilter" value="{{ $category->id }}"
                                    id="flexcheckboxCategory-{{ $category->id }}">
                                <label class="form-check-label fs-16 fw-5 lh-1"
                                    for="flexcheckboxCategory-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="items-filter-wrapper p-0 mb-3" wire:ignore>
                <div class="position-relative">
                    <div class="custom-select-box text-black d-flex align-items-center position-relative">
                        <div class="custom-arrow-select position-absolute d-flex align-items-center {{ app()->getLocale() == 'ar' ? 'rtl-arrow' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.41098 6.91098C4.25476 7.06725 4.16699 7.27918 4.16699 7.50015C4.16699 7.72112 4.25476 7.93304 4.41098 8.08931L9.41098 13.0893C9.56725 13.2455 9.77918 13.3333 10.0001 13.3333C10.2211 13.3333 10.433 13.2455 10.5893 13.0893L15.5893 8.08931C15.7411 7.93215 15.8251 7.72164 15.8232 7.50315C15.8213 7.28465 15.7337 7.07564 15.5792 6.92113C15.4247 6.76663 15.2156 6.67898 14.9971 6.67709C14.7787 6.67519 14.5681 6.75918 14.411 6.91098L10.0001 11.3218L5.58931 6.91098C5.43304 6.75476 5.22112 6.66699 5.00015 6.66699C4.77918 6.66699 4.56725 6.75476 4.41098 6.91098Z"
                                    fill="#27262E" />
                            </svg>
                        </div>
                        <span
                            class="select-text fs-16 fw-5 lh-1">{{ __('messages.whatsapp_stores_templates.search_price_range') }}</span>
                    </div>
                    <div class="custom-select-options">
                        <div class="custom-select-option fs-14 fw-6 text-black drop-item-select"
                            wire:click.prevent="setPriceSortOrder('1')" data-value="1">
                            {{ __('messages.whatsapp_stores_templates.low_to_high') }}</div>
                        <div class="custom-select-option fs-14 fw-6 text-black drop-item-select"
                            wire:click.prevent="setPriceSortOrder('2')" data-value="2">
                            {{ __('messages.whatsapp_stores_templates.high_to_low') }}</div>

                    </div>
                </div>
            </div>
             @if($whatsappStore->id != 652)
            <div class="items-filter-wrapper mb-3">
                <div class="p-2">
                    <div class="heading-text mb-3">
                        <h3 class="">{{ __('messages.whatsapp_stores_templates.date_posted') }}</h3>
                    </div>
                    <div>
                        <div class="form-check d-flex align-items-center gap-3 mb-2 ps-0">
                            <input class="form-check-input m-0 p-0" type="radio" id="inlineCheckbox1"
                                name="flexcheckboxDefault" wire:model.live="dateFilter" value="3_days">
                            <label class="form-check-label fs-16 fw-5 lh-1" for="inlineCheckbox1">3
                                {{ __('messages.whatsapp_stores_templates.days_ago') }}</label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-3 mb-2 ps-0">
                            <input class="form-check-input m-0 p-0" name="flexcheckboxDefault" type="radio"
                                wire:model.live="dateFilter" value="1_week" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label fs-16 fw-5 lh-1" for="inlineCheckbox2">1
                                {{ __('messages.whatsapp_stores_templates.week_ago') }}</label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-3 mb-2 ps-0">
                            <input class="form-check-input m-0 p-0" name="flexcheckboxDefault" type="radio"
                                wire:model.live="dateFilter" value="1_month" id="inlineCheckbox3" value="option3">
                            <label class="form-check-label fs-16 fw-5 lh-1" for="inlineCheckbox3">1
                                {{ __('messages.whatsapp_stores_templates.month_ago') }}</label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-3 mb-2 ps-0">
                            <input class="form-check-input m-0 p-0" name="flexcheckboxDefault"
                                wire:model.live="dateFilter" value="6_months" type="radio" id="inlineCheckbox4"
                                value="option4">
                            <label class="form-check-label fs-16 fw-5 lh-1" for="inlineCheckbox4">6
                                {{ __('messages.whatsapp_stores_templates.months_ago') }}</label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-3 mb-0 ps-0">
                            <input class="form-check-input m-0 p-0" name="flexcheckboxDefault"
                                wire:model.live="dateFilter" value="1_year" type="radio" id="inlineCheckbox4"
                                value="option4">
                            <label class="form-check-label fs-16 fw-5 lh-1" for="inlineCheckbox4"> 1
                                {{ __('messages.whatsapp_stores_templates.year_ago') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="row custom-row product-gap-row item-cards mb-40">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-sm-6 custom-margin-bottom mb-20">
                <div class="d-flex flex-column h-100 item-card justify-content-between">

                            @if (request()->getHost() === 'staging.vcardking.com') 
                            <a href="{{ route('whatsapp.store.product.details', [$urlAlias, $product->id]) }}"
                            @else
                            <a href="{{ route('whatsapp.store.product.details', [$product->id]) }}"
                            @endif

                    
                        class=" d-flex flex-column text-black">
                        <div class="item-img bg-yellow" style="position: relative;">
                            @if($whatsappStore->id == 1209 && $product->dis_free)
                                            <div style="
                                                position: absolute;
                                                background: #770101;
                                                padding: 5px 8px 3px 8px;
                                                border-radius: 10px;
                                                font-weight: 600;
                                                font-size: 14px;
                                                color: #fff;
                                                top: 9px;
                                                left: 8px;
                                            ">Get 1 {{ $product->dis_free }}</div>
                                            @endif
                            <img src="{{ $product->images_url[0] ?? '' }}" alt="item"
                                class="w-100 h-100 object-fit-cover product-image" loading="lazy" />
                        </div>
                       <div class="flex-grow-1">
                            <div class="item-details text-center">
                                <input type="hidden" value="{{$product->atribute_title}}" id="product_attr_title_{{$product->id}}"> 
                                <input type="hidden" value="{{$product->attributes}}" id="product_attr_attribu_{{$product->id}}">
                                <input type="hidden" value="{{$product->dis_free}}" id="product_dis_free_{{$product->id}}">
                                <input type="hidden" value="{{$product->dis_text}}" id="product_dis_text_{{$product->id}}">
                             <h5 class="fs-22 fw-6 mb-0 product-name">{{ $product->name }}</h5>
                             <p class="fs-16 fw-5 mb-1 text-gray-200 product-category">
                                 {{ $product->category->name }}</p>
                             <p class="fs-18 fw-6 mb-2">
                                 <span class="currency_icon">
                                     {{ $product->currency->currency_icon }}</span>
                                 <span class="selling_price">{{ $product->selling_price }}</span>
                                 @if ($product->net_price)
                                     <del class="fs-20 fw-5 text-gray-200">{{ $product->currency->currency_icon }}
                                         {{ $product->net_price }}</del>
                                 @endif
                             </p>
                            </div>
                       </div>
                    </a>
                    <div>
                         <button data-id="{{ $product->id }}"
                        class="@if($product->available_stock == 0) disabled @endif mb-2 btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100 addToCartBtn add-to-cart-w-140px">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 30 30" fill="none">
                                <path
                                    d="M4.06864 11.7857L6.75321 23.5389C6.8827 24.1133 7.20391 24.6265 7.66397 24.994C8.12403 25.3615 8.69552 25.5614 9.28435 25.5609H15.5766C15.804 25.5609 16.022 25.4706 16.1827 25.3098C16.3435 25.1491 16.4338 24.931 16.4338 24.7037C16.4338 24.4764 16.3435 24.2584 16.1827 24.0976C16.022 23.9369 15.804 23.8466 15.5766 23.8466H9.28435C8.87292 23.8466 8.51807 23.5603 8.42378 23.154L5.7375 11.3974C5.70906 11.2683 5.70992 11.1345 5.74001 11.0058C5.7701 10.8771 5.82866 10.7567 5.91138 10.6536C5.99409 10.5505 6.09887 10.4672 6.218 10.41C6.33713 10.3527 6.46759 10.3228 6.59978 10.3226H8.78378V12.3309C8.78378 12.5582 8.87409 12.7762 9.03483 12.9369C9.19558 13.0977 9.4136 13.188 9.64092 13.188C9.86825 13.188 10.0863 13.0977 10.247 12.9369C10.4078 12.7762 10.4981 12.5582 10.4981 12.3309V10.3217H20.1101V12.3309C20.1101 12.5582 20.2004 12.7762 20.3611 12.9369C20.5219 13.0977 20.7399 13.188 20.9672 13.188C21.1945 13.188 21.4126 13.0977 21.5733 12.9369C21.734 12.7762 21.8244 12.5582 21.8244 12.3309V10.3217H24.0084C24.1412 10.3219 24.2723 10.3521 24.3919 10.4099C24.5115 10.4678 24.6166 10.5518 24.6992 10.6558C24.7819 10.7598 24.8401 10.8811 24.8695 11.0107C24.8989 11.1403 24.8987 11.2748 24.8689 11.4043L22.9146 19.956C22.8896 20.0657 22.8864 20.1794 22.9053 20.2903C22.9241 20.4013 22.9647 20.5075 23.0246 20.6028C23.0845 20.6981 23.1625 20.7807 23.2543 20.8458C23.3462 20.911 23.4499 20.9574 23.5596 20.9824C23.6694 21.0075 23.783 21.0107 23.894 20.9918C24.0049 20.9729 24.1111 20.9324 24.2064 20.8725C24.3017 20.8126 24.3843 20.7345 24.4495 20.6427C24.5146 20.5509 24.561 20.4472 24.5861 20.3374L26.5378 11.7917C26.6282 11.4129 26.6312 11.0184 26.5465 10.6382C26.4619 10.258 26.2918 9.90213 26.0492 9.59743C25.8066 9.28838 25.4969 9.03862 25.1434 8.86708C24.79 8.69555 24.4021 8.60676 24.0092 8.60743H21.7532C21.3075 5.44457 18.5886 3 15.3041 3C12.0195 3 9.3015 5.44371 8.85492 8.60743H6.59978C5.80007 8.60743 5.05692 8.96829 4.55978 9.59743C4.31745 9.90112 4.14732 10.2559 4.06223 10.635C3.97715 11.0141 3.97934 11.4076 4.06864 11.7857ZM15.3041 4.71429C16.4197 4.71598 17.5 5.10517 18.3604 5.8153C19.2208 6.52543 19.8077 7.5124 20.0209 8.60743H10.5872C10.8004 7.5124 11.3874 6.52543 12.2477 5.8153C13.1081 5.10517 14.1885 4.71598 15.3041 4.71429Z"
                                    fill="currentColor" />
                                <path
                                    d="M20.9296 20.7959C20.7023 20.7959 20.4843 20.8862 20.3235 21.047C20.1628 21.2077 20.0725 21.4257 20.0725 21.653V23.0408H18.6848C18.4575 23.0408 18.2394 23.1311 18.0787 23.2918C17.9179 23.4526 17.8276 23.6706 17.8276 23.8979C17.8276 24.1252 17.9179 24.3432 18.0787 24.504C18.2394 24.6647 18.4575 24.755 18.6848 24.755H20.0734V26.1428C20.0734 26.3701 20.1637 26.5881 20.3244 26.7488C20.4851 26.9096 20.7032 26.9999 20.9305 26.9999C21.1578 26.9999 21.3758 26.9096 21.5366 26.7488C21.6973 26.5881 21.7876 26.3701 21.7876 26.1428V24.7542H23.1754C23.4027 24.7542 23.6207 24.6639 23.7814 24.5031C23.9422 24.3424 24.0325 24.1244 24.0325 23.897C24.0325 23.6697 23.9422 23.4517 23.7814 23.291C23.6207 23.1302 23.4027 23.0399 23.1754 23.0399H21.7868V21.653C21.7868 21.4257 21.6965 21.2077 21.5357 21.047C21.375 20.8862 21.157 20.7959 20.9296 20.7959Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        {{ __('messages.whatsapp_stores_templates.add_to_cart') }}
                    </button>
                    @if($whatsappStore->id != 26)
                    <button data-id="{{ $product->id }}"
                        class="mb-2 btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100 add-to-cart-w-140px" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{ $product->name }}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
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
                      
                </div>
                    
                    </div>
                @endforeach
                <div class="mt-4 d-flex justify-content-center custom-pagination">
                    {{ $products->links() }}
                </div>
                @if ($products->count() == 0)
                    <div class="no-items-found d-flex justify-content-center align-items-center">
                        <h2 class="text-center">{{ __('messages.whatsapp_stores.no_items_found') }}</h2>
                    </div>
                @endif
            </div>
            <div>

            </div>
        </div>
    </div>
</div>
