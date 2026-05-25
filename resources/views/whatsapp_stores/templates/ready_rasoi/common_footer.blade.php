 <footer class="relative bg-deepCharcoal text-white md:pt-24 pt-12 pb-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-yellowAccent"></div>
        <img src="https://staging.vcardking.com/assets/img/whatsapp_stores/readyrasoi/bg-vector-2.png" class="absolute top-10 right-0 w-96 opacity-10 pointer-events-none" alt="pattern">

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-4 md:gap-12 gap-8 border-b border-gray-800 md:pb-16 pb-6 mb-8">
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ request()->getHost() === 'staging.vcardking.com' ? route('whatsapp.store.show', $whatsappStore->url_alias) : route('whatsapp.store.show') }}">
                        <img src="{{ $whatsappStore->logo_url }}" alt="logo" class="w-50" style="background: #efe0d4;padding: 12px;border-radius: 10px;">
                    </a>
                    <p class="mt-6 text-gray-400 leading-relaxed italic border-l-2 border-magenta pl-4">
                        "{{ $whatsappStore->footer_text }}"
                    </p>
                    <div class="flex gap-4 mt-8">
                        

                        @foreach ($socialIcons as $platform => $icon)
                            @if (!empty($socialLinks?->$platform))
                                <a href="{{ $socialLinks->$platform }}"
                                target="_blank"
                                class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-magenta transition">
                                    {!! $icon !!}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-yellowAccent md:mb-8 mb-4 uppercase tracking-widest text-sm">Quick Navigation</h4>
                    @if (request()->getHost() === 'staging.vcardking.com') 
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li><a href="{{ route('whatsapp.store.show', $whatsappStore->url_alias) }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> Home</a></li>
                        <li><a href="{{ route('whatsapp.store.products', $whatsappStore->url_alias) }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> Explore Menu</a></li>
                        @if (!empty($whatsappStore->about_us))
                        <li><a href="{{ route('whatsapp.store.about', $whatsappStore->url_alias) }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> About Us</a></li>
                        @endif
                    </ul>
                    @else
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li><a href="{{ route('whatsapp.store.show') }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> Home</a></li>
                        <li><a href="{{ route('whatsapp.store.products') }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> Explore Menu</a></li>
                        @if (!empty($whatsappStore->about_us))
                        <li><a href="{{ route('whatsapp.store.about') }}" class="hover:text-white transition flex items-center gap-2"><span class="w-1 h-1 bg-magenta"></span> About Us</a></li>
                        @endif
                    </ul>
                    @endif
                </div>

                <div>
                    <h4 class="font-bold text-yellowAccent md:mb-8 mb-4 uppercase tracking-widest text-sm">Support & Info</h4>
                    @if (request()->getHost() === 'staging.vcardking.com') 
                    <ul class="space-y-4 text-gray-400 font-medium">
                        @if (!empty($whatsappStore->privacy_policy))                        
                            <li><a href="{{ route('whatsapp.store.privacy', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="hover:text-white transition">Privacy Policy</a></li>
                        @endif
                        @if (!empty($whatsappStore->contact_us))
                            <li><a href="{{ route('whatsapp.store.contactUs', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="hover:text-white transition">Contact Us</a></li>
                        @endif                        
                        @if (!empty($whatsappStore->terms_conditions))
                            <li><a href="{{ route('whatsapp.store.terms', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="hover:text-white transition">Terms & Conditions</a></li>
                        @endif
                        @if (!empty($whatsappStore->shipping_payment_policy))
                            <li><a href="{{ route('whatsapp.store.shipping', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="hover:text-white transition">Shipping & Payment</a></li>
                        @endif
                        @if (!empty($whatsappStore->refunds_cancellation))
                            <li><a href="{{ route('whatsapp.store.refunds', ['alias' => $whatsappStore->url_alias]) }}"
                                    class="hover:text-white transition">Refunds & Cancellation</a></li>
                        @endif
                    </ul>
                    @else
                    <ul class="space-y-4 text-gray-400 font-medium">
                        @if (!empty($whatsappStore->privacy_policy))                        
                            <li><a href="{{ route('whatsapp.store.privacy') }}"
                                    class="hover:text-white transition">Privacy Policy</a></li>
                        @endif
                        @if (!empty($whatsappStore->contact_us))
                            <li><a href="{{ route('whatsapp.store.contactUs') }}"
                                    class="hover:text-white transition">Contact Us</a></li>
                        @endif                        
                        @if (!empty($whatsappStore->terms_conditions))
                            <li><a href="{{ route('whatsapp.store.terms') }}"
                                    class="hover:text-white transition">Terms & Conditions</a></li>
                        @endif
                        @if (!empty($whatsappStore->shipping_payment_policy))
                            <li><a href="{{ route('whatsapp.store.shipping') }}"
                                    class="hover:text-white transition">Shipping & Payment</a></li>
                        @endif
                        @if (!empty($whatsappStore->refunds_cancellation))
                            <li><a href="{{ route('whatsapp.store.refunds') }}"
                                    class="hover:text-white transition">Refunds & Cancellation</a></li>
                        @endif
                    </ul>
                    @endif
                </div>

                <div class="bg-gray-900/50 p-6 rounded-3xl border border-gray-800">
                    <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Reach Us Directly</h4>
                    <p class="text-gray-400 text-sm mb-4"><i class="fa-solid fa-location-dot text-magenta mr-2"></i> {{ $whatsappStore->address }}</p>
                    <a href="tel:+{{ $whatsappStore->region_code }}{{ $whatsappStore->whatsapp_no }}" class="text-xl font-bold text-magenta block mb-6 hover:text-yellowAccent transition">+{{ $whatsappStore->region_code }} {{ $whatsappStore->whatsapp_no }}</a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-xs font-medium">
                <p>© 2026 Readyरसोई. Handcrafted for the Indian Palate.</p>
                <div class="flex gap-6">
                    <span>Made with ❤️ in India</span>
                </div>
            </div>
        </div>
    </footer>