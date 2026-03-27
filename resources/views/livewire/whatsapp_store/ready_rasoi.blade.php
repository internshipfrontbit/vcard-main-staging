        <!-- ================= FILTER SIDEBAR ================= -->
         
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                        @foreach ($products as $product)
    {{-- Added 'col-6' for 2 items per row on mobile. 'col-sm-6' and up remains standard. --}}
    <div class="col-xl-3 col-lg-4 col-sm-6 col-6 mb-6">
        
        {{-- Card: p-2 on mobile (tight), p-4 on desktop (original spacious look) --}}
        <div class="product-card bg-cream/30 rounded-[1.5rem] sm:rounded-[2.5rem] p-2 sm:p-4 premium-shadow hover-scale overflow-hidden h-full">
            
            {{-- Image: h-32 on mobile, h-64 on desktop --}}
            <div class="relative h-32 sm:h-64 w-full rounded-[1rem] sm:rounded-[1.5rem] overflow-hidden mb-2 sm:mb-6">
                @if (request()->getHost() === 'staging.vcardking.com') 
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                @else
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}">
                @endif
                <img src="{{ $product->images_url[0] ?? '' }}" class="w-full h-full object-contain product-image">
                
                    </a>
                
            </div>
            
            <div class="px-1 sm:px-2">
                @if (request()->getHost() === 'staging.vcardking.com') 
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$whatsappStore->url_alias, $product->id]) }}">
                @else
                    <a href="{{ $whatsappStore->id == 345 ? 'javascript:void(0)' : route('whatsapp.store.product.details', [$product->id]) }}">
                @endif
                    {{-- Name: text-sm on mobile, text-xl on desktop --}}
                    <h4 class="text-sm sm:text-xl font-extrabold mb-1 product-name leading-tight sm:leading-normal h-[40px] sm:h-[55px] line-clamp-2">{{ $product->name }}</h4>
                </a>
                
                <p class="text-gray-500 text-xs sm:text-sm mb-2 sm:mb-4 italic product-category truncate">{{ $product->category->name }}</p>
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2 sm:mb-6">
                    <div>
                        <span class="selling_price d-none">{{ $product->selling_price }}</span>
                        {{-- Price: text-lg on mobile, text-2xl on desktop --}}
                        <span class="text-lg sm:text-2xl font-black text-magenta">{{ $product->currency->currency_icon }}{{ $product->selling_price }}</span>
                        <span class="text-gray-400 line-through text-xs sm:text-sm ml-1 sm:ml-2"><span class="currency_icon">{{ $product->currency->currency_icon }}</span>{{ $product->net_price }}</span>
                    </div>
                    {{-- Discount Badge: responsive font and padding --}}
                    <div class="bg-yellowAccent/20 px-2 sm:px-3 py-1 rounded-lg text-[10px] sm:text-xs font-bold text-orange-600 w-fit mt-1 sm:mt-0">
                        {{ round((($product->selling_price - $product->net_price) / $product->selling_price) * 100) }}% OFF
                    </div>
                </div>
                
                {{-- Buttons: Stacked on mobile (grid-cols-1) to fit 2-card layout, side-by-side on desktop (md:grid-cols-2) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 sm:gap-3">
                    <input type="hidden" value="">
                    
                    {{-- Add to Cart: Smaller text/padding on mobile --}}
                    <button class="addToCartBtn bg-yellowAccent font-bold py-2 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm hover:shadow-md transition @if($product->available_stock == 0) disabled @endif" style="height: auto !important;width: auto !important;" data-id="{{ $product->id }}">
                        Add Cart
                    </button>
                    
                    {{-- Order Now: Smaller text/padding on mobile --}}
                    <button class="bg-magenta text-white font-bold py-2 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm hover:opacity-90 transition flex items-center justify-center gap-1" style="background: #025d18;" onclick="prepareAndSendWpMessageDirect({{ $product->id }},'{{addslashes(e($product->name))}}','{{ $product->currency->currency_icon }}','{{$product->selling_price}}')">
                        <i class="fa-brands fa-whatsapp text-sm sm:text-lg"></i> 
                        <span>Order</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
        </div>
        <div class="mt-4 d-flex justify-content-center custom-pagination">
                {{ $products->links() }}
            </div>
            </div>
        </div>
        

        

