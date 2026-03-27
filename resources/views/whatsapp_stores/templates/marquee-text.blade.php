<style>

    .new-marquee-wrapper {
        width: 100%;
        overflow: hidden;
        background: #fff;
        color: #494747;
        font-weight: 600;
        padding: 6px 0;
        font-size: 14px;
        box-sizing: border-box;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        position: relative;
    }

    .new-marquee-content {
        display: inline-flex;
        white-space: nowrap;
        will-change: transform;
    }

    .new-marquee-text {
        white-space: nowrap;
        padding-right: 50px; /* space between messages */
    }
    
    @keyframes scroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    } 
    
    
</style>



@if (!empty($whatsappStore->offer_text))
    <div class="new-marquee-wrapper {{ $whatsappStore->is_full_screen == 0 ? 'container pl-0 pr-0' : ''  }}">
        <div class="new-marquee-content">
            @for ($i = 0; $i < 20; $i++)
                <div class="new-marquee-text">
                    {{ $whatsappStore->offer_text }}
                </div>
            @endfor
        </div>
    </div>
@endif  



<script>

document.querySelectorAll(".new-marquee-content").forEach((el) => {
    let wrapper = el.parentElement;
    let wrapperWidth = wrapper.offsetWidth;
    let contentWidth = el.scrollWidth;

    // pixels per second speed (constant speed for all)
    let speed = 100; // adjust → 100px/sec

    // duration = distance / speed
    let duration = (contentWidth + wrapperWidth) / speed;

    el.style.animation = `scroll ${duration}s linear infinite`;
});
</script>