<div class="row mb-40">
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
            <span style="background: #c29c77;padding: 4px 7px;border-radius: 6px;"><svg fill="#ffffff" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="filter" class="icon glyph" style="height: 20px;width: 20px;"><path d="M20.62,3.17A2,2,0,0,0,18.8,2H5.2A2,2,0,0,0,3.7,5.32L9,11.38V21a1,1,0,0,0,.47.85A1,1,0,0,0,10,22a1,1,0,0,0,.45-.11l4-2A1,1,0,0,0,15,19V11.38l5.3-6.06A2,2,0,0,0,20.62,3.17Z"></path></svg></span>
        </div>
    </div>
    <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 ? 'col-xl-2': 'col-xl-3'}} col-lg-4 collapse-mobile" id="filterMenu">
        <div class="items-tabs">
            <div class="row mx-0 mb-30">
                <div class="col-4 ps-0 px-1">
                    <input type="number" min="0" wire:model.defer="minPrice" class="form-control" id="minCustomPrice"
                        placeholder="{{ __('messages.whatsapp_stores_templates.min') }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                </div>
                <div class="col-4 px-1">
                    <input type="number" min="1" wire:model.defer="maxPrice" class="form-control" id="maxCustomPrice"
                        placeholder="{{ __('messages.whatsapp_stores_templates.max') }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                </div>
                <div class="col-4 pe-0 px-1">
                    <button wire:click="applyPriceFilter" class="apply-btn btn btn-primary w-100" id="customPriceApply">
                        {{ __('messages.whatsapp_stores_templates.apply') }}
                    </button>
                </div>
            </div>
            @if($whatsappStore->id != 64)
            <div class="mb-30">
                
                <div class="heading-text mb-4">
                    <h3> {{ __('messages.whatsapp_stores_templates.date_posted') }}</h3>
                </div>
               
                <div>
                    <div class="form-check mb-2">
                        <input class="form-check-input {{ app()->getLocale() == 'ar' ? 'float-end' : '' }}" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            wire:model.live="dateFilter" value="3_days" />
                        <label class="form-check-label fs-16 fw-5 {{ app()->getLocale() == 'ar' ? 'me-4' : '' }}" for="flexRadioDefault1">
                            3 {{ __('messages.whatsapp_stores_templates.days_ago') }}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input {{ app()->getLocale() == 'ar' ? 'float-end' : '' }}" type="radio" wire:model.live="dateFilter" value="1_week"
                            name="flexRadioDefault" id="flexRadioDefault2" />
                        <label class="form-check-label fs-16 fw-5 {{ app()->getLocale() == 'ar' ? 'me-4' : '' }}" for="flexRadioDefault2">
                            1 {{ __('messages.whatsapp_stores_templates.week_ago') }}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input {{ app()->getLocale() == 'ar' ? 'float-end' : '' }}" type="radio" wire:model.live="dateFilter" value="1_month"
                            name="flexRadioDefault" id="flexRadioDefault3" />
                        <label class="form-check-label fs-16 fw-5 {{ app()->getLocale() == 'ar' ? 'me-4' : '' }}" for="flexRadioDefault3">
                            1 {{ __('messages.whatsapp_stores_templates.month_ago') }}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input {{ app()->getLocale() == 'ar' ? 'float-end' : '' }}" type="radio" wire:model.live="dateFilter" value="6_months"
                            name="flexRadioDefault" id="flexRadioDefault4" />
                        <label class="form-check-label fs-16 fw-5 {{ app()->getLocale() == 'ar' ? 'me-4' : '' }}" for="flexRadioDefault4">
                            6 {{ __('messages.whatsapp_stores_templates.months_ago') }}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input {{ app()->getLocale() == 'ar' ? 'float-end' : '' }}" type="radio" wire:model.live="dateFilter" value="1_year"
                            name="flexRadioDefault" id="flexRadioDefault5" />
                        <label class="form-check-label fs-16 fw-5 {{ app()->getLocale() == 'ar' ? 'me-4' : '' }}" for="flexRadioDefault5">
                            1 {{ __('messages.whatsapp_stores_templates.year_ago') }}
                        </label>
                    </div>
                </div>
            </div>
            @endif
            
                <div class="desktop-category">
                <div class="heading-text mb-3">
                    <h3>{{ __('messages.whatsapp_stores_templates.all_categories') }}</h3>
                </div>
                <div>
                    @foreach ($categories as $category)
                        <div class="category-item position-relative">
                            <button
                            class="category-button w-100 {{ $categorySelected == $category->id ? 'active-category' : '' }}"
                                type="button" onclick="setCategory({{ $category->id }})">
                                <div class="category-category-img">
                                    <img src="{{ $category->image_url }}" class="w-100 rounded" alt="category" />
                                </div>
                                <span class="text-start flex-grow-1 product-category-jk-filtter"> {{ $category->name }}</span>
                            </button>
                            @if($whatsappStore->id == 322)
                             <i class="fa-solid fa-share-nodes share-button-category" onclick="categoryShare(930)"></i>
                            @endif
                        </div>
                    @endforeach
                    <script>
                        function setCategory(id){
                            let urlObj = new URL(window.location.href);

                            // Set new category ID
                            urlObj.searchParams.set("category", id); // replace 200 with the new ID
                            
                            // Get the updated URL
                            let updatedUrl = urlObj.toString();
                            
                            
                            window.location.href = updatedUrl;
                            window.location.relod();
                        }
                    </script>
                </div>

            </div>
          
            
            <div class="mt-5">
                <button type="button" wire:click="resetFilters" class="apply-btn btn btn-primary w-100">
                    {{ __('messages.whatsapp_stores_templates.reset_filters') }}
                </button>
            </div>

        </div>
    </div>
    <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 ? 'col-xl-10': 'col-xl-9'}} col-lg-8 mt-2">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-sm-6 mb-20">
                <div class="position-relative">
                    <input type="text" wire:model.live="search" id="productSearch"
                        placeholder="{{ __('messages.whatsapp_stores_templates.search_products') }}"
                        class="form-control ps-45"/>
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
            <div class="col-xl-4 col-sm-6 mb-20" wire:ignore>
                <div class="dropdown">
                    <button class="serach-dropdown text-start w-100" type="button" id="customSelectBtn"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.whatsapp_stores_templates.search_price_range') }}
                    </button>
                    <ul class="dropdown-menu w-100" id="customSelectMenu">
                        <li><a class="dropdown-item drop-item-select" href="#" wire:click.prevent="setPriceSortOrder('1')"
                                data-value="1">{{ __('messages.whatsapp_stores_templates.low_to_high') }}</a></li>
                        <li><a class="dropdown-item drop-item-select" href="#" wire:click.prevent="setPriceSortOrder('2')"
                                data-value="2">{{ __('messages.whatsapp_stores_templates.high_to_low') }}</a></li>

                    </ul>
                </div>

                <!-- Hidden Select Element -->
                <select id="hiddenSelect" class="d-none">
                    <option value="1">Price: Low to High</option>
                    <option value="2">Price: High to Low</option>
                </select>

            </div>
        </div>
        <div class="section-heading" style="display: flex;justify-content: space-between;position: relative">
            

            @if($whatsappStore->id == 208)
                <h2 style="position: relative;top: 13px;">{{ __('messages.whatsapp_stores_templates.all_items') }}</h2>
                <img src="https://staging.vcardking.com/assets/img/whatsapp_stores/beauty_products/accordion-arrow.png" style="height: 6px;position: absolute;right: 11px;top: 18px;">
                <select wire:model.live="stockFilter" class="custom-filter-dropdown form-control" style="width: 170px">
                    <option value="available" selected>Available</option>
                    <option value="out_of_stock">Out of Stock</option>
                    <option value="all">All</option>
                </select>
            @else
                <h2>{{ __('messages.whatsapp_stores_templates.all_items') }}</h2>
            @endif
        </div>
        <input type="hidden" id="categorySelected" value="{{$categorySelected}}">
        @if($whatsappStore->id == 1500)
        <div class="category-section px-20 pt-10 mb-2 pb-1 position-relative" style="display: none;">
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
                <style>
                    .mobile-scroll {
                        flex-wrap: nowrap;
                        overflow-x: auto;
                        overflow-y: hidden;
                        scroll-behavior: smooth;
                        -webkit-overflow-scrolling: touch;
                    }


                </style>
                <div class="row category-image-container mobile-scroll" style="{{$whatsappStore->id == 322 ? 'flex-wrap: wrap' : 'flex-wrap: nowrap;'}}">
                    @foreach ($whatsappStore->categories as $category)
                        <div class="col-xl-2 col-md-3 col-sm-6 mb-3 category-image-mobile position-relative" style="{{ $whatsappStore->id == 322 ? 'width: 97%' : ''  }}">
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
                                <div class="category-item {{ $categorySelected == $category->id ? 'active' : '' }}" id="category-{{ $category->id }}"  style="position:relative;">
                                    <div class="category-img">
                                        <img src="{{ $category->image_url }}" alt="category"
                                            class="w-100 h-100 object-fit-cover rounded" loading="lazy" />
                                    </div>
                                  
                                    <h3 class="category-name-size fs-18 fw-6 mb-0 text-break">{{ $category->name }}</h3>
                                   
                                </div>
                            </a>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    let catgeoryId = document.getElementById("categorySelected").value;
                                    const element = document.getElementById("category-"+catgeoryId);
                                    if (element) {
                                        element.scrollIntoView({
                                            behavior: "smooth",
                                            block: "center",
                                            inline: "center"
                                        });
                                    }
                                });
                            </script>
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
        @endif
        <style>
                    .mobile-card .item-img{
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
                    .mobile-card .item-img span{
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
                    .text-gray-200-Blue {
                        color: #1269B0 !important;
                    }
                </style>
        <div class="row custom-row product-gap-row products-section">
            @foreach ($products as $product)
                <div class="col-xl-3 col-sm-6 mb-20">
                    <div class="item-card h-100">
                        <div class="d-flex flex-column h-100 {{$whatsappStore->id == 345 ? 'mobile-card' : ''}}">

                                        @if (request()->getHost() === 'staging.vcardking.com') 
                                       <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$urlAlias, $product->id]) }}"
                                        @else
                                      <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}"
                                        @endif

                                        
                                        
                                style="color: #212529;" class="d-block h-100">

                                <input type="hidden" value="{{$product->atribute_title}}" id="product_attr_title_{{$product->id}}"> 
                                <input type="hidden" value="{{$product->attributes}}" id="product_attr_attribu_{{$product->id}}">
                                <input type="hidden" value="{{$product->order_qty}}" id="product_order_qty_attribu_{{$product->id}}">
                                <input type="hidden" value="{{$product->qty_price}}" id="product_qty_price_attribu_{{$product->id}}">
                                <div class="flex-grow-1 h-100">
                                    <div class="item-img">
                                        @if($whatsappStore->id == 345)
                                            <div class="mobile-card-save">Save {{ $product->currency->currency_icon }}{{$product->net_price - $product->selling_price}}</div>
                                        @endif
                                        @if($whatsappStore->id == 345)
                                            <span>{{ $product->name }}</span>
                                        @else
                                        <img src="{{ $product->images_url[0] ?? '' }}" alt="item"
                                            class="w-100 h-100 object-fit-cover product-image" />
                                        @endif    
                                    </div>
                                    <div class="item-details">
                                        
                                                @if($product->p_code)
                                                 <p class="fs-14 fw-5 mb-1 product-category">#{{ $product->p_code }}</p>
                                                @endif 

                                            <h5 class="fs-20 fw-6 mb-1 product-name {{$whatsappStore->id == 345 ? 'd-none' : ''}}">{{ $product->name }}</h5>
                                            
                                             @if($whatsappStore->id != 1185)
                                                <p class="fs-16 fw-5 mb-1 product-category product-category-jk-filtter {{$whatsappStore->id == 345 ? 'd-none' : ''}}">{{ $product->category->name }}</p>
                                           @endif

                                        <p class="fs-18 fw-7">
                                            @if (!empty($product->selling_price))
                                            @if($whatsappStore->id != 702)
                                                <span class="currency_icon">{{ $product->currency->currency_icon }}</span>
                                            @endif

                                                <span class="selling_price">{{ $product->selling_price }}

                                                          @if($whatsappStore->id == 702)
                                                           %
                                                          @endif

                                                </span>
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
                                    </div>
                                </div>
                            </a>

                            @if($product->affiliate_url)
                                <div>
                                                    <!--- Amaaxon Button -->
                                                    <a href="{{ $product->affiliate_url }}" target="_blank" style="background: #ffd814;border-radius: 10px;width: 100%;text-align: center;">
                                                    <div >
                                                        <svg style="width: 200px" class="cursor-pointer" width="260" height="44" viewBox="0 0 260 44" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            
                            @if($whatsappStore->id != 396 && $whatsappStore->id != 322 && $whatsappStore->id != 619 && $whatsappStore->id != 860 && $whatsappStore->id != 1518 && $whatsappStore->id != 983)
                                @if($whatsappStore->id == 344 || $whatsappStore->id == 348 || $whatsappStore->id == 1502)
                                    <button class="addToCartBtn" id="product-{{ $product->id }}" style="display: none;" data-id="{{ $product->id }}"></button>
                                    <button type="button" data-id="{{ $product->id }}"
                                   class="btn btn-primary d-flex attributeAskButton justify-content-center align-items-center mx-auto gap-2 w-100 mb-1 @if($product->available_stock == 0) disabled @endif"
                                                style="@if($product->available_stock == 0) background-color: red !important; border-color: red !important; @endif" onclick="openSizeModel({{$product->id}},'{{$product->sizes}}')">
                                @else
                                        <button type="button" data-id="{{ $product->id }}"
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
                                                        @if($whatsappStore->id == 1555)
                                                            <span>Book Now</span>
                                                        @else
                                                            <span>{{ __('messages.whatsapp_stores_templates.add_to_cart') }}</span>
                                                        @endif
                                                    @else
                                                        {{ __('messages.whatsapp_stores.out_of_stock') }}
                                                    @endif
                            </button>
                             @endif
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
                                            
                                            
                                          @elseif($whatsappStore->id != 64 && $whatsappStore->id != 125 && $whatsappStore->id != 208 && $whatsappStore->id != 651 && $whatsappStore->id != 721 && $whatsappStore->id != 41 && $whatsappStore->id != 707 && $whatsappStore->id != 796 && $whatsappStore->id != 1010 && $whatsappStore->id != 1151 && $whatsappStore->id != 1555)
                                @if($whatsappStore->id == 344 || $whatsappStore->id == 348 || $whatsappStore->id == 1502)
                            <button type="button" data-id="{{ $product->id }}"
                                class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}',0,true,undefined,'{{$product->sizes}}')">
                                @else
                            <button type="button" data-id="{{ $product->id }}"
                                class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')">    
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
                                @if($whatsappStore->id == 322 || $whatsappStore->id == 860 || $whatsappStore->id == 1518 || $whatsappStore->id == 983)
                                                Inquiry Now
                                            @else
                                              @if($whatsappStore->id == 550)
                                            Book now
                                            @else
                                            {{ __('messages.whatsapp_stores_templates.order_now') }}
                                            @endif                                             
                                            @endif
                            </button>
                            @else
                              @if($whatsappStore->id == 125 || $whatsappStore->id == 651 || $whatsappStore->id == 1010 || $whatsappStore->id == 721 || $whatsappStore->id == 41 || $whatsappStore->id == 707 || $whatsappStore->id == 983)
                               @if($product->available_stock > 0)
                                    <button type="button" data-id="{{ $product->id }}"
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
                                </button>
                              @endif
                             @endif
                            @endif

                            @endif

                            @if($whatsappStore->id == 1555)
                                <a href="tel:9687159253" class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
                                
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
                                    Call Now
                                </a>
                            @endif

                            
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-4 d-flex justify-content-center custom-pagination">
                {{ $products->links() }}
            </div>
            @if ($products->count() == 0)
                <div>
                    <h2 class="text-center">{{ __('messages.whatsapp_stores.no_items_found') }}</h2>
                </div>
            @endif
        </div>
    </div>
</div>
</div>

