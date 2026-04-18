<style>
          .newWhatsappButton{
              background: #25d366 !important;
          }
          .newWhatsappButton:hover{
              color: #000000 !important;
          }

    .iti__flag {
              background-image: url('https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/img/flags.png') !important;
              background-size: 5652px 15px;
              background-repeat: no-repeat;
    }           
      </style>


 <div class="modal fade"  data-bs-backdrop="static"
     data-bs-keyboard="false" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif id="userFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered order-modal-dialog">
         <div class="modal-content" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
             <div class="modal-header px-0 pt-0">
                 <input type="hidden" value="{{ $whatsappStore->id }}" id="whatsappStoreId">
                 <h5 class="modal-title fs-20 fw-6" id="exampleModalLabel">
                     User Details
                 </h5>
             </div>
             <div class="modal-body pb-0">
                 <div>
                     
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="mb-3 form-group">
                                     <label for="name" class="form-label">{{ __('messages.common.name') }}:
                                     </label><span class="text-danger">*</span>
                                     <input type="text" required class="form-control" name="name" id="name"
                                         placeholder="{{ __('messages.common.name') }}">
                                     <input type="hidden" name="baseUrl" id="baseUrl"
                                         value="{{ config('app.url') }}">
                                     <input type="hidden" id="storeAlias" name="url_alias"
                                         value="{{ $whatsappStore->url_alias }}">
                                     <input type="hidden" id="wpRegionCode" value="{{ $whatsappStore->region_code }}">
                                     <input type="hidden" id="whatsappNo" value="{{ $whatsappStore->whatsapp_no }}">
                                     <input type="hidden" id="productBuyUrl"
                                         value="{{ url(route('whatsapp.store.product.buy')) }}">
                                 </div>
                             </div>
                          
                                <div class="col-sm-12">
                                     <div class="form-group mb-3 phone-block {{ app()->getLocale() == 'ar' ? 'rtl-phone-input' : '' }}">
                                     <label for="phoneNumber" class="form-label required">
                                         {{ __('messages.whatsapp_stores.whatsapp_no') }}:
                                     </label><span class="text-danger">*</span>
                                     {{ Form::text('phone', isset($whatsappStore) ? (isset($whatsappStore->region_code) ? '+' . $whatsappStore->region_code . '' . '' : '') : null, ['class' => 'form-control','maxlength' => 10,'minlength' => 10, 'placeholder' => __('messages.whatsapp_stores.whatsapp_no'), 'id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                                     <!-- <input type="text" required name="phone" id="phoneNumber" class="form-control "
                                         placeholder="{{ __('messages.whatsapp_stores.whatsapp_no') }}"
                                         onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" /> -->

                                     <input type="hidden" name="region_code" value="{{ $whatsappStore->region_code }}"
                                         id="prefix_code" />
                                     </div>
                                </div>
                         </div>
                         <button type="submit" class="btn btn-primary m-0 w-100" disabled onclick="submitUserDetails()">
                              Submit
                         </button>
                 </div>
             </div>
         </div>
     </div>
 </div>