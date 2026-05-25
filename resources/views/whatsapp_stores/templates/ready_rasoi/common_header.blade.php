<header class="fixed top-0 w-full z-50 bg-cream/90 backdrop-blur-md border-b border-magenta/10">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <a href="{{ request()->getHost() === 'staging.vcardking.com' ? route('whatsapp.store.show', $whatsappStore->url_alias) : route('whatsapp.store.show') }}">
                    <img src="{{ $whatsappStore->logo_url }}" alt="logo" class="md:w-40 w-[114px]">
                </a>
            </div>
            <nav class="hidden md:flex gap-8 font-bold text-gray-800">
                @if (request()->getHost() === 'staging.vcardking.com')
                    <a href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}" class="hover:text-magenta transition {{ request()->is('*products*') || request()->is('*product-details*') || request()->is('*about-us*') ? '' : 'text-magenta' }}">Home</a> 
                @else
                    <a href="{{ route('whatsapp.store.show') }}" class="hover:text-magenta transition {{ request()->is('*products*') || request()->is('*product-details*') ? '' : 'text-magenta' }}">Home</a> 
                @endif        

                @if (request()->getHost() === 'staging.vcardking.com')
                            <a href="{{ route('whatsapp.store.products',$whatsappStore->url_alias) }}" class="hover:text-magenta transition {{ request()->is('*products*') || request()->is('*product-details*') ? 'text-magenta' : '' }}">Products</a>
                          @else
                            <a href="{{ route('whatsapp.store.products') }}" class="hover:text-magenta transition {{ request()->is('*products*') || request()->is('*product-details*') ? 'text-magenta' : '' }}">Products</a>
                          @endif
                
                @if (!empty($whatsappStore->about_us))
                    <a href="{{ request()->getHost() === 'staging.vcardking.com' ? route('whatsapp.store.about', $whatsappStore->url_alias) : route('whatsapp.store.about') }}" class="hover:text-magenta transition {{ request()->is('*about-us*') ? 'text-magenta' : '' }}">About Us</a>
                @endif
            </nav>
            <div class="flex items-center gap-5">
                <div class="relative cursor-pointer" id="addToCartViewBtn">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-magenta text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full font-bold product-count-badge"></span>
                </div>
            </div>
        </div>
    </header>