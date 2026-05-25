<style>
/* --- Ready Rasoi Main Theme Scope --- */
.ready-rasoi-theme {
    --rr-magenta: #d50170;
    --rr-yellow: #feff03;
    --rr-cream: #f2e8de;
    --rr-dark: #1a1a1a;
    --rr-gray: #6b7280;
    --rr-border: #e5e7eb;
}

/* Modal Shape */
.ready-rasoi-theme .modal-content {
    border-radius: 1.5rem;
    border: none;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    padding: 0px !important
}

/* Header */
.ready-rasoi-theme .modal-header {
    background: #fff;
    padding: 1.5rem;
    border-bottom: 1px solid var(--rr-border);
    display: flex;
    align-items: center;
}
.ready-rasoi-theme .modal-title {
    font-weight: 700;
    color: var(--rr-dark);
    font-size: 1.25rem;
}
.ready-rasoi-theme .btn-close {
    background-size: 0.8em;
    opacity: 0.5;
    transition: opacity 0.2s;
}
.ready-rasoi-theme .btn-close:hover { opacity: 1; }

/* Body */
.ready-rasoi-theme .modal-body {
    background-color: rgba(242, 232, 222, 0.3); /* Cream Tint */
    padding: 1.5rem;
}

/* --- Form Styling --- */
.ready-rasoi-theme .form-label {
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--rr-dark);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 6px;
}
.ready-rasoi-theme .form-label i {
    color: var(--rr-magenta); /* Icon Color */
}

/* Inputs & Textarea */
.ready-rasoi-theme .form-control {
    border-radius: 0.75rem; /* Rounded Inputs */
    border: 1px solid #d1d5db;
    padding: 0.75rem 1rem;
    font-size: 0.95rem;
    color: var(--rr-dark);
    background-color: #fff;
    transition: all 0.2s;
}

.ready-rasoi-theme .form-control:focus {
    border-color: var(--rr-magenta);
    box-shadow: 0 0 0 4px rgba(213, 1, 112, 0.1); /* Magenta Glow */
    outline: none;
}

.ready-rasoi-theme textarea.form-control {
    border-radius: 1rem;
    resize: none;
}

/* Phone Input (intl-tel-input specific overrides) */
.ready-rasoi-theme .iti { width: 100%; }
.ready-rasoi-theme .iti__flag-container {
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
}
/* Ensure the phone input aligns with other inputs */
.ready-rasoi-theme .iti input { 
    border-radius: 0.75rem !important;
}

/* Submit Button */
.ready-rasoi-theme .btn-whatsapp-submit {
    background-color: var(--rr-magenta);
    color: #fff;
    font-weight: 700;
    border-radius: 50px; /* Pill Shape */
    padding: 0.85rem;
    font-size: 1rem;
    border: none;
    box-shadow: 0 4px 10px rgba(213, 1, 112, 0.3);
    transition: transform 0.2s, background-color 0.2s;
    margin-top: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.ready-rasoi-theme .btn-whatsapp-submit:hover {
    background-color: #be0062;
    transform: translateY(-2px);
    color: #fff;
}

.iti__flag {
              background-image: url('https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/img/flags.png') !important;
              background-size: 5652px 15px;
              background-repeat: no-repeat;
    }           
</style>

<div class="modal fade ready-rasoi-theme" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif id="orderNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered order-modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">
                    Order Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="orderForm">
                    <input type="hidden" value="3" id="whatsappStoreId">
                    <input type="hidden" name="baseUrl" id="baseUrl" value="{{ config('app.url') }}">
                    <input type="hidden" id="storeAlias" name="url_alias" value="{{ $whatsappStore->url_alias }}">
                    <input type="hidden" id="wpRegionCode" value="{{ $whatsappStore->region_code }}">
                    <input type="hidden" id="whatsappNo" value="{{ $whatsappStore->whatsapp_no }}">
                    <input type="hidden" id="productBuyUrl" value="{{ url(route('whatsapp.store.product.buy')) }}">
                    <input type="hidden" name="region_code" value="91" id="prefix_code">
                    <input type="hidden" id="wpRazorpayEnabled" value="{{ $whatsappStore->wp_razorpay_enabled }}">

                    <div class="mb-4">
                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" required="" class="form-control" name="name" id="name" placeholder="Enter your full name">
                    </div>

                    <div class="mb-4 phone-block">
                        <label for="phoneNumber" class="form-label">
                            WhatsApp No <span class="text-danger">*</span>
                        </label>
                        {{ Form::text('phone', isset($whatsappStore) ? (isset($whatsappStore->region_code) ? '+' . $whatsappStore->region_code . '' . '' : '') : null, ['class' => 'form-control', 'placeholder' => __('messages.whatsapp_stores.whatsapp_no'), 'id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                                     <!-- <input type="text" required name="phone" id="phoneNumber" class="form-control "
                                         placeholder="{{ __('messages.whatsapp_stores.whatsapp_no') }}"
                                         onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" /> -->

                                     <input type="hidden" name="region_code" value="{{ $whatsappStore->region_code }}"
                                         id="prefix_code" />
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label">
                            Delivery Address <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="address" name="address" rows="3" required="" placeholder="House No, Street, City, Pincode..."></textarea>
                    </div>

                    <button type="submit" class="btn w-100 btn-whatsapp-submit" style="background: #025d18 !important;border-radius: 10px !important;color: #ffffff !important;">
                        <i class="fa-brands fa-whatsapp fa-lg mr-2"></i>
                        <span>Send Order on WhatsApp</span>
                    </button>

                </form>
            </div>
            
        </div>
    </div>
</div>


 <script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const dateInput = document.getElementById('delivery_start_date');

    dateInput.min = new Date().toISOString().split('T')[0];

    dateInput.addEventListener('click', function() {
        this.showPicker();
    });
  });
</script>

