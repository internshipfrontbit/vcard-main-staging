@extends(homePageLayout())
@section('title')
    {{ __('Shipping & Delivery Policy') }}
@endsection
@section('content')
    <section class="top-margin-privacy">
        <div class="container p-t-100 padding-top-0">
            <div class="mt-100 px-2">{!! $setting['shipping_delivery'] !!}</div>
        </div>
    </section>
@endsection
