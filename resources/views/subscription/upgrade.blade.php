@extends('layouts.app')
@section('title')
    {{ __('messages.subscription.upgrade_plan') }}
@endsection
@section('content')
<style>
    @media(max-width: 600px){
        .btn.btn-primary.d-flex.justify-content-center.align-items-center.mx-auto.gap-2.mt-4{
                right: 11% !important;
        }    
    }
    
</style>
    <div class="container-fluid">
        @include('flash::message')
        <div class="card subscription">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="nav-group mx-auto">
                        <ul class="nav nav-pills">
                            @if ($monthlyPlans->isNotEmpty())
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#monthly" class="nav-link active">
                                        {{ __('messages.plan.monthly') }}</a>
                                </li>
                            @endif
                            @if ($yearlyPlans->isNotEmpty())
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#yearly"
                                        class="nav-link {{ $monthlyPlans->isNotEmpty() ? '' : 'active' }}">
                                        {{ __('messages.plan.yearly') }}</a>
                                </li>
                            @endif
                            @if ($unLimitedPlans->isNotEmpty())
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#unlimited"
                                        class="nav-link {{ $monthlyPlans->isNotEmpty() || $yearlyPlans->isNotEmpty() ? '' : 'active' }}">
                                        {{ __('messages.plan.unlimited') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @php
                        $activeTab = '';
                        if ($monthlyPlans->isNotEmpty()) {
                            $activeTab = 'monthly';
                        } elseif ($yearlyPlans->isNotEmpty()) {
                            $activeTab = 'yearly';
                        } elseif ($unLimitedPlans->isNotEmpty()) {
                            $activeTab = 'unlimited';
                        }
                    @endphp
                    <div class="col-12 text-gray-700 h5 text-center pt-10">
                        <div class="tab-content">
                            @if ($monthlyPlans->isNotEmpty())
                                <div class="tab-pane {{ $activeTab == 'monthly' ? 'show active' : '' }}" id="monthly">
                                    <div class="row justify-content-center">
                                        @forelse($monthlyPlans as $plan)
                                            @php
                                                if (
                                                    $plan->custom_select == 1 &&
                                                    $plan->planCustomFields->isNotEmpty()
                                                ) {
                                                    $plan->price = $plan->planCustomFields[0]->custom_vcard_price;
                                                }
                                            @endphp
                                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                                <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                    <h1>{!! $plan->name !!}</h1>
                                                    @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                        <h1 class="pricing-amount" id="priceDisplay">
                                                            <span
                                                                id="currentPrice-{{ $plan->id }}">{{ currencyFormat($plan->planCustomFields[0]->custom_vcard_price, 2, $plan->currency->currency_code) }}</span>
                                                        </h1>
                                                    @else
                                                        <h1 class="pricing-amount">
                                                            {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }}
                                                        </h1>
                                                    @endif
                                                    <div class="card-body ps-3 pe-3 pb-0 pt-1 ">
                                                        @if ($plan->trial_days > 0)
                                                            <div class="d-flex justify-content-between">
                                                                @if(false)
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                    {{ __('messages.subscription.trial_plan') . ': 30 Minutes' }}
                                                                </small>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="card-body p-3 ">
                                                        <div class="pricing-description text-start">
                                                            <div
                                                                class="mb-3 {{ $plan->custom_select == '1' && $plan->planCustomFields->isNotEmpty() ? '' : 'pb-5' }}">
                                                                @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                                    <div class="d-flex justify-content-between mb-4">
                                                                        <small class="text-muted"
                                                                            @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                            {{ __('messages.plan.no_of_vcards') }}
                                                                        </small>
                                                                        <select id="vcardNumberSelect-{{ $plan->id }}"
                                                                            class="form-select vcard-numbers"
                                                                            style="width: auto;"
                                                                            data-plan-id="{{ $plan->id }}">
                                                                            @foreach ($plan->planCustomFields as $customField)
                                                                                @php
                                                                                    $formattedPrice = currencyFormat(
                                                                                        $customField->custom_vcard_price,
                                                                                        2,
                                                                                        $plan->currency->currency_code,
                                                                                    );
                                                                                @endphp
                                                                                <option value="{{ $customField->id }}"
                                                                                    data-price="{{ $formattedPrice }}"
                                                                                    data-currency="{{ $plan->currency->currency_code }}">
                                                                                    {{ $customField->custom_vcard_number }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @else
                                                                    <small class="text-muted"
                                                                        @if (getLogInUser()->language == 'ar') style="margin-left: 290px" @endif>
                                                                        {{ __('messages.plan.no_of_vcards') . ' : ' . $plan->no_of_vcards }}</small>
                                                                @endif
                                                            </div>
                                                            <div class="mb-6">
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 320px" @endif>
                                                                    {{ __('messages.plan.storage_limit') . ' : ' . $plan->storage_limit }}</small>
                                                            </div>
                                                            @foreach (getPlanFeature($plan) as $feature => $value)
                                                                <div class="d-flex justify-content-between mb-4">
                                                                    <p class="fw-normal">
                                                                        {{ __('messages.feature.' . $feature) }}
                                                                    </p>
                                                                    @if ($value)
                                                                        <i class="fa-solid fa-circle-check fs-2"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-circle-xmark fs-2"></i>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="flex-center flex-row-fluid pt-5">
                                                        @if (
                                                            !empty(getCurrentSubscription()) &&
                                                                $plan->id == getCurrentSubscription()->plan_id &&
                                                                !getCurrentSubscription()->isExpired())
                                                            @if ($plan->price != 0 || (($plan->price == 0 || $plan->price != 0) && $plan->trial_days > 0))
                                                                <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                    {{ __('messages.subscription.currently_active') }}</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('messages.subscription.renew_free_plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if (
                                                                !empty(getCurrentSubscription()) &&
                                                                    !getCurrentSubscription()->isExpired() &&
                                                                    ($plan->price == 0 || $plan->price != 0))
                                                                @if ($plan->hasZeroPlan->count() == 0 && ($plan->price > 0 || $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.switch_plan') }}</a>
                                                                @else
                                                                    @if ($plan->price == 0 && $plan->trial_days > 0)
                                                                        <a data-turbo="false"
                                                                            href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                            class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                            id="planId{{ $plan->id }}"
                                                                            data-id="{{ $plan->id }}"
                                                                            data-plan-price="{{ $plan->price }}">
                                                                            {{ __('messages.subscription.switch_plan') }}</a>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                            {{ __('messages.subscription.renew_free_plan') }}
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if (($plan->price != 0 && $plan->hasZeroPlan->count() == 0) || ($plan->price == 0 && $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto  {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.choose_plan') }}</a>
                                                                        
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                        {{ __('messages.subscription.renew_free_plan') }}
                                                                    </button>
                                                                @endif
                                                                <a href="https://wa.me/917984847580?text=Interested in {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }} plan. Please guide." style="text-decoration: none !important;">
                                <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 mt-4" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366 !important;position: absolute;right: 26%;top: 61%;padding: 6px;">
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
                                   
                            </button>
                        </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="not-plan">
                                                <span
                                                    class="text-muted h1">{{ __('messages.subscription.no_plan_available') }}</span>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            @endif
                            @if ($yearlyPlans->isNotEmpty())
                                <div class="tab-pane {{ $activeTab == 'yearly' ? 'show active' : '' }}" id="yearly">
                                    <div class="row justify-content-center">
                                        @forelse($yearlyPlans as $plan)
                                            @php
                                                if (
                                                    $plan->custom_select == 1 &&
                                                    $plan->planCustomFields->isNotEmpty()
                                                ) {
                                                    $plan->price = $plan->planCustomFields[0]->custom_vcard_price;
                                                }
                                            @endphp
                                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                                <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                    <h1>{!! $plan->name !!}</h1>
                                                    @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                        <h1 class="pricing-amount priceDisplayclass" id="priceDisplay">
                                                            <span
                                                                id="currentPrice-{{ $plan->id }}">{{ currencyFormat($plan->planCustomFields[0]->custom_vcard_price, 2, $plan->currency->currency_code) }}</span>
                                                        </h1>
                                                    @else
                                                        <h1 class="pricing-amount">
                                                            {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }}
                                                        </h1>
                                                    @endif
                                                    <div class="card-body ps-3 pe-3 pb-0 pt-1 ">
                                                        @if ($plan->trial_days > 0)
                                                            @if(false)
                                                            <div class="d-flex justify-content-between">
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                    {{ __('messages.subscription.trial_plan') . ': 30 Minutes' }}
                                                                </small>
                                                            </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="card-body p-3">
                                                        @if(false)
                                                        <div class="pricing-description text-start">
                                                            <div
                                                                class="mb-3 {{ $plan->custom_select == '1' && $plan->planCustomFields->isNotEmpty() ? '' : 'pb-5' }}">
                                                                @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                                    <div class="d-flex justify-content-between mb-4">
                                                                        <small class="text-muted"
                                                                            @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                            {{ __('messages.plan.no_of_vcards') }}
                                                                        </small>
                                                                        <select id="vcardNumberSelect-{{ $plan->id }}"
                                                                            class="form-select vcard-numbers"
                                                                            style="width: auto;"
                                                                            data-plan-id="{{ $plan->id }}">
                                                                            @foreach ($plan->planCustomFields as $customField)
                                                                                @php
                                                                                    $formattedPrice = currencyFormat(
                                                                                        $customField->custom_vcard_price,
                                                                                        2,
                                                                                        $plan->currency->currency_code,
                                                                                    );
                                                                                @endphp
                                                                                <option value="{{ $customField->id }}"
                                                                                    data-price="{{ $formattedPrice }}"
                                                                                    data-currency="{{ $plan->currency->currency_code }}">
                                                                                    {{ $customField->custom_vcard_number }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @else
                                                                    <small class="text-muted"
                                                                        @if (getLogInUser()->language == 'ar') style="margin-left: 290px" @endif>
                                                                        {{ __('messages.plan.no_of_vcards') . ' : ' . $plan->no_of_vcards }}
                                                                    </small>
                                                                @endif
                                                            </div>
                                                            <div class="mb-6">
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 320px" @endif>
                                                                    {{ __('messages.plan.storage_limit') . ' : ' . $plan->storage_limit }}</small>
                                                            </div>
                                                            @foreach (getPlanFeature($plan) as $feature => $value)
                                                                <div class="d-flex justify-content-between mb-4">
                                                                    <p class="fw-normal">
                                                                        {{ __('messages.feature.' . $feature) }}
                                                                    </p>
                                                                    @if ($value)
                                                                        <i class="fa-solid fa-circle-check fs-2"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-circle-xmark fs-2"></i>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex-center flex-row-fluid pt-5">
                                                        @if (
                                                            !empty(getCurrentSubscription()) &&
                                                                $plan->id == getCurrentSubscription()->plan_id &&
                                                                !getCurrentSubscription()->isExpired())
                                                            @if ($plan->price != 0 || (($plan->price == 0 || $plan->price != 0) && $plan->trial_days > 0))
                                                                <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                    {{ __('messages.subscription.currently_active') }}</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('messages.subscription.renew_free_plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if (
                                                                !empty(getCurrentSubscription()) &&
                                                                    !getCurrentSubscription()->isExpired() &&
                                                                    ($plan->price == 0 || $plan->price != 0))
                                                                @if ($plan->hasZeroPlan->count() == 0 && ($plan->price > 0 || $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.switch_plan') }}</a>
                                                                @else
                                                                    @if ($plan->price == 0 && $plan->trial_days > 0)
                                                                        <a data-turbo="false"
                                                                            href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                            class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                            id="planId{{ $plan->id }}"
                                                                            data-id="{{ $plan->id }}"
                                                                            data-plan-price="{{ $plan->price }}">
                                                                            {{ __('messages.subscription.switch_plan') }}</a>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                            {{ __('messages.subscription.renew_free_plan') }}
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if (($plan->price != 0 && $plan->hasZeroPlan->count() == 0) || ($plan->price == 0 && $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.choose_plan') }}</a>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                        {{ __('messages.subscription.renew_free_plan') }}
                                                                    </button>
                                                                @endif
                                                                 <a href="https://wa.me/917984847580?text=Interested in {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }} plan. Please guide." style="text-decoration: none !important;">
                                <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 mt-4" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366 !important;position: absolute;right: 26%;top: 61%;padding: 6px;">
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
                                   
                            </button>
                        </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="not-plan">
                                                <span
                                                    class="text-muted h1">{{ __('messages.subscription.no_plan_available') }}</span>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            @endif
                            @if ($unLimitedPlans->isNotEmpty())
                                <div class="tab-pane {{ $activeTab == 'unlimited' ? 'show active' : '' }}"
                                    id="unlimited">
                                    <div class="row justify-content-center">
                                        @forelse($unLimitedPlans as $plan)
                                            @php
                                                if (
                                                    $plan->custom_select == 1 &&
                                                    $plan->planCustomFields->isNotEmpty()
                                                ) {
                                                    $plan->price = $plan->planCustomFields[0]->custom_vcard_price;
                                                }
                                            @endphp
                                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                                <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                    <h1>{!! $plan->name !!}</h1>
                                                    @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                        <h1 class="pricing-amount priceDisplayclass" id="priceDisplay">
                                                            <span
                                                                id="currentPrice-{{ $plan->id }}">{{ currencyFormat($plan->planCustomFields[0]->custom_vcard_price, 2, $plan->currency->currency_code) }}</span>
                                                        </h1>
                                                    @else
                                                        <h1 class="pricing-amount">
                                                            {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }}
                                                        </h1>
                                                    @endif
                                                    <div class="card-body ps-3 pe-3 pb-0 pt-1 ">
                                                        @if ($plan->trial_days > 0)
                                                            @if(false)
                                                            <div class="d-flex justify-content-between">
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                    {{ __('messages.subscription.trial_plan') . ': 30 Minutes' }}
                                                                </small>
                                                            </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="card-body p-3">
                                                        <div class="pricing-description text-start">
                                                            <div
                                                                class="mb-3 {{ $plan->custom_select == '1' && $plan->planCustomFields->isNotEmpty() ? '' : 'pb-5' }}">
                                                                @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                                    <div class="d-flex justify-content-between mb-4">
                                                                        <small class="text-muted"
                                                                            @if (getLogInUser()->language == 'ar') style="margin-left: 30px" @endif>
                                                                            {{ __('messages.plan.no_of_vcards') }}
                                                                        </small>
                                                                        <select id="vcardNumberSelect-{{ $plan->id }}"
                                                                            class="form-select vcard-numbers"
                                                                            style="width: auto;"
                                                                            data-plan-id="{{ $plan->id }}">
                                                                            @foreach ($plan->planCustomFields as $customField)
                                                                                @php
                                                                                    $formattedPrice = currencyFormat(
                                                                                        $customField->custom_vcard_price,
                                                                                        2,
                                                                                        $plan->currency->currency_code,
                                                                                    );
                                                                                @endphp
                                                                                <option value="{{ $customField->id }}"
                                                                                    data-price="{{ $formattedPrice }}"
                                                                                    data-currency="{{ $plan->currency->currency_code }}">
                                                                                    {{ $customField->custom_vcard_number }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @else
                                                                    <small class="text-muted"
                                                                        @if (getLogInUser()->language == 'ar') style="margin-left: 290px" @endif>
                                                                        {{ __('messages.plan.no_of_vcards') . ' : ' . $plan->no_of_vcards }}
                                                                    </small>
                                                                @endif
                                                            </div>
                                                            <div class="mb-6">
                                                                <small class="text-muted"
                                                                    @if (getLogInUser()->language == 'ar') style="margin-left: 320px" @endif>
                                                                    {{ __('messages.plan.storage_limit') . ' : ' . $plan->storage_limit }}</small>
                                                            </div>
                                                            @foreach (getPlanFeature($plan) as $feature => $value)
                                                                <div class="d-flex justify-content-between mb-4">
                                                                    <p class="fw-normal">
                                                                        {{ __('messages.feature.' . $feature) }}</p>
                                                                    @if ($value)
                                                                        <i class="fa-solid fa-circle-check fs-2"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-circle-xmark fs-2"></i>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="flex-center flex-row-fluid pt-5">
                                                        @if (
                                                            !empty(getCurrentSubscription()) &&
                                                                $plan->id == getCurrentSubscription()->plan_id &&
                                                                !getCurrentSubscription()->isExpired())
                                                            @if ($plan->price != 0 || (($plan->price == 0 || $plan->price != 0) && $plan->trial_days > 0))
                                                                <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                    {{ __('messages.subscription.currently_active') }}</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('messages.subscription.renew_free_plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if (
                                                                !empty(getCurrentSubscription()) &&
                                                                    !getCurrentSubscription()->isExpired() &&
                                                                    ($plan->price == 0 || $plan->price != 0))
                                                                @if ($plan->hasZeroPlan->count() == 0 && ($plan->price > 0 || $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.switch_plan') }}</a>
                                                                @else
                                                                    @if ($plan->price == 0 && $plan->trial_days > 0)
                                                                        <a data-turbo="false"
                                                                            href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                            class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                            id="planId{{ $plan->id }}"
                                                                            data-id="{{ $plan->id }}"
                                                                            data-plan-price="{{ $plan->price }}">
                                                                            {{ __('messages.subscription.switch_plan') }}</a>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                            {{ __('messages.subscription.renew_free_plan') }}
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if (($plan->price != 0 && $plan->hasZeroPlan->count() == 0) || ($plan->price == 0 && $plan->trial_days > 0))
                                                                    <a data-turbo="false"
                                                                        href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                        class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                        data-id="{{ $plan->id }}"
                                                                        id="planId{{ $plan->id }}"
                                                                        data-plan-price="{{ $plan->price }}">
                                                                        {{ __('messages.subscription.choose_plan') }}</a>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                        {{ __('messages.subscription.renew_free_plan') }}
                                                                    </button>
                                                                @endif
                                                                 <a href="https://wa.me/917984847580?text=Interested in {{ currencyFormat($plan->price, 2, $plan->currency->currency_code) }} plan. Please guide." style="text-decoration: none !important;">
                                <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 mt-4" style="background: #25d366 !important;color: #ffffff !important;border: 1px solid #25d366 !important;position: absolute;right: 26%;top: 95%;padding: 6px;">
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
                                   
                            </button>
                        </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="not-plan">
                                                <span
                                                    class="text-muted h1">{{ __('messages.subscription.no_plan_available') }}</span>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <a href="https://wa.me/917984847580?text=Interested in a plan. Please guide.?" style="text-decoration: none !important;">
                                <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 mt-4" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important;">
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
                                   <b>I want to buy a plan. Please guide me.</b>
                            </button>
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
