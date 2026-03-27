<style>
    .social-media-container a{
                background: white;
            border-radius: 50px;
            font-size: 21px;
            width: 30px;
            height: 30px;
            display: inline-block;
            position: relative;
    }
    .social-media-container a svg{
        height: 22px;
    }
    .social-media-container a i, .social-media-container a svg{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@php
    $socialIcons = [
        'website'   => '<i class="fas fa-globe text-primary"></i>',
        'twitter'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 448 512" width="30" height="30"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>',
        'facebook'  => '<i class="fab fa-facebook-square text-primary"></i>',
        'instagram' => '<i class="fab fa-instagram text-danger"></i>',
        'youtube'   => '<i class="fab fa-youtube text-danger"></i>',
        'tumblr'    => '<i class="fab fa-tumblr-square text-dark"></i>',
        'reddit'    => '<i class="fab fa-reddit-alien text-danger"></i>',
        'linkedin'  => '<i class="fab fa-linkedin text-primary"></i>',
        'whatsapp'  => '<i class="fab fa-whatsapp text-success"></i>',
        'pinterest' => '<i class="fab fa-pinterest text-danger"></i>',
        'tiktok'    => '<i class="fab fa-tiktok text-danger"></i>',
    ];
@endphp
<div class="social-media-container">
    @foreach ($socialIcons as $platform => $icon)
    @if (!empty($socialLinks->$platform))
        <a href="{{ $socialLinks->$platform }}" target="_blank" class="mt-2 me-2">
            {!! $icon !!}
        </a>
    @endif
@endforeach
</div>