@extends(homePageLayout())
@section('title')
    {{ __('Refund & Cancellation Policy') }}
@endsection
@section('content')
    <section class="top-margin-privacy">
        <div class="container p-t-100 padding-top-0">
            <div class="mt-100 px-2">{!! $setting['refund_cancellation'] !!}</div>
        </div>
    </section>
@endsection
