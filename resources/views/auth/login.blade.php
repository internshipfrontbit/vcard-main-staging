@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
    <div class="login-section bg-white overflow-hidden position-relative h-100">
        <div class="top-vector">
            <img src="{{ asset('assets/images/top-vector.png') }}">
        </div>
        <div class="bottom-vector">
            <img src="{{ asset('assets/images/bottom-vector.png') }}">
        </div>
        <div class="row">
            <div class="col-md-6 col-12 p-0">
                <div class="login-img d-sm-block d-none">
                    <img src="{{ asset($registerImage) }}" alt="Register Image" class="w-100 h-100">
                </div>
            </div>
            <div class="col-md-6 col-12 p-0 d-flex flex-column justify-content-center login-section" @if(getLanguageByKey(checkFrontLanguageSession()) == 'Arabic') dir="rtl" @endif>
                <div class="login-form">
                    <div class="px-sm-10 px-6 mb-5  h-100 w-100">
                        <div class="text-center d-flex justify-content-center align-items-center login-app-name">
                            <div class="image image-mini me-3 mb-0">
                                <a href="{{ route('home') }}" class="image">
                                    <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid logo-fix-size">
                                </a>
                            </div>
                            <span class="text-gray-900 fs-1 fw-bold">{{ getAppName() }}</span>
                        </div>
                        <div class="row element">
                            <div class="col-md-12 width-540 mt-5">
                                @include('flash::message')
                                @include('layouts.errors')
                            </div>
                            <h1 class="text-center mb-7 mt-5 fs-2 fw-bold">{{ __('auth.sign_in') }}</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
                                <div class="d-grid mt-4">
                                    @if(config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect'))
                                        <a href="{{route('social.login','google')}}"
                                           class="btn btn-danger d-flex align-items-center justify-content-center mb-sm-5 mb-4" style="color: var(--color-text, #000);border: 3px solid var(--color-border-strong, #000);border-radius: 8px;background-color: var(--color-bg, #ffffff);font-size: 16px;font-weight: 600;">
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 13px;height: 23px;">
                                                <rect width="24" height="24" transform="translate(0 0.537109)" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.04 12.7984C23.04 11.983 22.9668 11.1989 22.8309 10.4462H12V14.8946H18.1891C17.9225 16.3321 17.1123 17.55 15.8943 18.3655V21.2509H19.6109C21.7855 19.2489 23.04 16.3007 23.04 12.7984Z" fill="#4285F4"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 24.0369C15.1049 24.0369 17.7081 23.0072 19.6108 21.2508L15.8942 18.3653C14.8644 19.0553 13.5472 19.4631 11.9999 19.4631C9.00467 19.4631 6.46945 17.4401 5.56513 14.7219H1.72308V17.7015C3.61536 21.4599 7.50445 24.0369 11.9999 24.0369Z" fill="#34A853"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56523 14.7222C5.33523 14.0322 5.20455 13.2952 5.20455 12.5372C5.20455 11.7793 5.33523 11.0422 5.56523 10.3522V7.37268H1.72318C0.944318 8.92518 0.5 10.6815 0.5 12.5372C0.5 14.3929 0.944318 16.1493 1.72318 17.7018L5.56523 14.7222Z" fill="#FBBC05"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 5.61097C13.6883 5.61097 15.2042 6.1912 16.396 7.33075L19.6944 4.03234C17.7029 2.17665 15.0997 1.03711 11.9999 1.03711C7.50445 1.03711 3.61536 3.61415 1.72308 7.37256L5.56513 10.3521C6.46945 7.63393 9.00468 5.61097 11.9999 5.61097Z" fill="#EA4335"/>
                                                </svg>{{__('messages.placeholder.login_via_google')}}
                                        </a>
                                    @endif
                                    @if(config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
                                        <a href="{{route('social.login','facebook')}}"
                                           class="btn btn-info d-flex align-items-center justify-content-center">
                                            <i class="fa-brands fa-facebook-f fs-2 me-3"></i>{{__('messages.placeholder.login_via_facebook')}}
                                        </a>
                                    @endif
                                </div>
                                @if(request()->get('ghughu') && request()->get('ghughu') == "HelloABMJ")
                                    <p class="text-center mb-0" style="display: block;height: 60px;width: 100%;font-size: 16px;line-height: 60px;color: var(--color-text-secondary, #666);">or</p>
                                    <div class="mb-sm-7 mb-4 element">
                                        <label for="email" class="form-label">
                                            {{ __('messages.user.email') . ':' }}<span class="required"></span>
                                        </label>
                                        <input name="email" type="email" class="form-control" id="email"
                                            aria-describedby="emailHelp" required
                                            placeholder=" {{ __('messages.user.email') }}" value="{{ old('email', \Cookie::get('email', '')) }}">
                                    </div>
                                    <div class="mb-sm-7 mb-4 element">
                                        <div class="d-flex justify-content-between">
                                            <label for="password"
                                                class="form-label">{{ __('messages.user.password') . ':' }}<span
                                                    class="required"></span></label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                    class="link-info fs-6 text-decoration-none">
                                                    {{ __('messages.common.forgot_your_password') . '?' }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="mb-3 position-relative ">
                                            <input name="password" type="password" class="form-control" id="password" required
                                                placeholder="{{ __('messages.user.password') }}" aria-label="Password"
                                                data-toggle="password" @if (\Cookie::has('password')) value="{{ \Cookie::get('password') }}" @endif>
                                            <span
                                                class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-sm-7 mb-4 form-check element">
                                        <input type="checkbox" class="form-check-input form-solid" id="remember"
                                        name="remember" @if (\Cookie::has('remember')) checked @endif>
                                        <label class="form-check-label"
                                            for="remember_me">{{ __('messages.common.remember_me') }}</label>
                                    </div>
                                    <div class="d-grid element">
                                        <button type="submit" class="btn login-btn">{{ __('messages.common.login') }}</button>
                                    </div>
                                @endif
                                @if (getSuperAdminSettingValue('register_enable'))
                                    <div class="d-flex align-items-center mb-10 mt-4 element">
                                        <span class="text-gray-700 me-2">{{ __('messages.common.new_here') . '?' }}</span>
                                        <a href="{{ route('register') }}" class="link-info fs-6 text-decoration-none">
                                            {{ __('messages.common.create_an_account') }}
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <footer style="position: relative;z-index: 1000;">
                    <div class="container-fluid padding-0 mb-5 copy-right">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 w-100">
                                <div class="copyright text-center text-muted">
                                    {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }} <a
                                        href="{{ route('home') }}" class="font-weight-bold ml-1"
                                        target="_blank">{{ getAppName() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection