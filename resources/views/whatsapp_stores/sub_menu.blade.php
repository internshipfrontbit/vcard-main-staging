<style>
.new-tag {
  background-color: #5660d9;
  color: #fff;
  font-size: 12px;
  padding: 2px 6px;
  border-radius: 10px;
  font-weight: bold;
}    

.glow {
  background: linear-gradient(
    to right,
    #5660d9 20%,
    #ffffff 40%,
    #5660d9 60%
  );
  background-size: 200% auto;
  color: white;
  animation: shimmernew 2s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

@keyframes shimmernew {
  to {
    background-position: 200% center;
  }
}
    
</style>
<div id="mySidebar" class="sidebar d-lg-block d-xl-block">
    <a href="javascript:void(0)" class="closebtn d-lg-none d-block pt-3" onclick="closeNav()">×</a>
    <ul class="nav nav-tabs-1 mb-sm-7 mb-5 pb-1 flex-nowrap text-nowrap flex-sm-column d-sm-flex d-block">
        <div class="d-sm-flex flex-sm-column overflow-auto">
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3 {{ isset($partName) && $partName == 'basics' ? 'active' : '' }} "
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'basics']) }}">
                        <i class="fa-solid fa-circle-question p-1 icon-color-bs-blue"></i>
                        {{ __('messages.vcard.basic_details') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 {{ isset($partName) && $partName == 'basics' ? 'active' : '' }} "
                        href="{{ route('whatsapp.stores') . '?part=basics' }}">
                        <i class="fa-solid fa-circle-question p-1 icon-color-bs-blue"></i>
                        {{ __('messages.vcard.basic_details') }}
                    </a>
                @endif
            </li>
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'whatsapp-template' ? 'active' : '' }} "
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'whatsapp-template']) }}">
                        <i class="fa-solid fa-file-lines p-1 text-success"></i>
                        {{ __('messages.whatsapp_stores.whatsapp_templates') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa-solid fa-file-lines p-1 text-success"></i>
                        {{ __('messages.whatsapp_stores.whatsapp_templates') }}
                    </a>
                @endif

            </li>
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'products-categories' ? 'active' : '' }} "
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'products-categories']) }}">
                        <i class="fa-solid fa-layer-group p-1 text-warning"></i>
                        {{ __('messages.whatsapp_stores.products_categories') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50 disabled " href="#">
                        <i class="fa-solid fa-layer-group p-1 text-warning"></i>
                        {{ __('messages.whatsapp_stores.products_categories') }}
                    </a>
                @endif
            </li>
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'products' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'products']) }}">
                        <i class="fa-solid fa-boxes-stacked p-1 text-primary"></i>
                        {{ __('messages.whatsapp_stores.products') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa-solid fa-boxes-stacked p-1 text-primary"></i>
                        {{ __('messages.whatsapp_stores.products') }}
                    </a>
                @endif
            </li>
            
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3   {{ isset($partName) && $partName == 'customOrder' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'customOrder']) }}">
                        <i class="fas fa-money-bills icon-color-bs-darkyellow"></i>
                        {{ __('messages.product_orders') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fas fa-money-bills icon-color-bs-darkyellow"></i>
                        {{ __('messages.product_orders') }}
                    </a>
                @endif
            </li>
            
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'social-links' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'social-links']) }}">
                        <i class="fa-solid fa-globe p-1 text-primary"></i>
                        {{ __('messages.social.social_links') }}
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa-solid fa-globe p-1 text-primary"></i>
                        {{ __('messages.social.social_links') }}
                    </a>
                @endif
            </li>
            
           <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'youtube-embed' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'youtube-embed']) }}">
                        <i class="fab fa-youtube p-1 text-danger"></i>
                        Trending Video
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fab fa-youtube p-1 text-danger"></i>
                        Trending Video
                        <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li> 
           <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'other' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'other']) }}">
                        <i class="fas fa-rocket p-1 text-primary me-1"></i>
                        New Features
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fas fa-rocket p-1 text-primary me-1"></i>
                       New Features
                       <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li>   
           <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'pages' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'pages']) }}">
                        <i class="fas fa-file text-primary" style="margin-right: 9px;margin-left: 5px;"></i>
                        Pages
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fas fa-file text-primary" style="margin-right: 9px;margin-left: 5px;"></i>
                        Pages
                        <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li>
           <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'custom-theme' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'custom-theme']) }}">
                        <i class="fa fa-sliders icon-color-bs-darkyellow" style="margin-right: 9px;margin-left: 5px;"></i>
                        Customize Theme
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa fa-sliders icon-color-bs-darkyellow" style="margin-right: 9px;margin-left: 5px;"></i>
                        Customize Theme
                        <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li>   
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'payment' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'payment']) }}">
                        <i class="fa-solid fa-money-bill-wave" style="margin-right: 9px;margin-left: 5px;"></i>
                        Payment config
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa-solid fa-money-bill-wave" style="margin-right: 9px;margin-left: 5px;"></i>
                        Payment config
                        <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li> 
            <li class="nav-item nav-item-1 position-relative">
                @if (isset($whatsappStore))
                    <a class="nav-link-1 nav-link p-3  {{ isset($partName) && $partName == 'seo' ? 'active' : '' }}"
                        href="{{ route('whatsapp.stores.edit', ['whatsappStore' => $whatsappStore->id, 'part' => 'seo']) }}">
                        <i class="fa-solid fa-magnifying-glass p-1 icon-color-bs-green"></i>
                        {{ __('messages.plan.seo') }}
                        <span class="new-tag glow">NEW</span>
                    </a>
                @else
                    <a class="nav-link-1 nav-link p-3 opacity-50  disabled" href="#">
                        <i class="fa-solid fa-magnifying-glass p-1 icon-color-bs-green"></i>
                        {{ __('messages.plan.seo') }}
                        <span class="new-tag glow">NEW</span>
                    </a>
                @endif
            </li>                                   

        </div>
    </ul>
</div>


<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        //   document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        //   document.getElementById("main").style.marginLeft= "0";
    }
</script>
