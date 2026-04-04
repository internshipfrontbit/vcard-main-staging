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


@if($whatsappStore->id == 692 || 1151)        
<style>
  .centered-img {
    display: block;
    margin: 0 auto;
    width: 62%;        /* default for desktop */
    height: auto;      /* keep aspect ratio */
    margin-bottom: 20px;
  }

  /* For mobile screens (max 768px) */
  @media (max-width: 768px) {
    .centered-img {
      width: 100%;
    }
  }
</style>     
@endif


 <div class="modal fade" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif id="orderNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered order-modal-dialog">
         <div class="modal-content" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
             <div class="modal-header px-0 pt-0">
                 <input type="hidden" value="{{ $whatsappStore->id }}" id="whatsappStoreId">
                 <h5 class="modal-title fs-20 fw-6" id="exampleModalLabel">
                     {{ __('messages.whatsapp_stores.order_details') }}
                 </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body pb-0">
                 <div>
                     <form id="orderForm">
                         <div class="row">

                                 @if($whatsappStore->id == 10000692)       
                                     <img src="https://staging.vcardking.com/assets/692.png" alt="692" class="centered-img">
                                @endif
                                 @if($whatsappStore->id == 1151)       
                                     <img src="https://staging.vcardking.com/uploads/microveda.jpeg" alt="692" class="centered-img">
                                @endif

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


                                 @if($whatsappStore->id == 1065)   
                                 <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                         <label for="email_address" class="form-label">Email Address:
                                         </label><span class="text-danger">*</span>
                                         <input type="text" required class="form-control" name="email_address" id="email_address"
                                         placeholder="Email Address">
                                     </div>
                                 </div>     
                                 
                                 <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                         <label for="unit_number" class="form-label">House / Unit Number:
                                         </label><span class="text-danger">*</span>
                                         <input type="text" required class="form-control" name="unit_number" id="unit_number"
                                         placeholder="House / Unit Number">
                                     </div>
                                 </div>  
                                  @endif

                                

                                 <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                        @if($whatsappStore->id == 530)
                                            <label for="name" class="form-label">City:
                                         </label><span class="text-danger">*</span>
                                         <textarea class="form-control" id="address" name="address" rows="1" required
                                             placeholder="City"></textarea>
                                        @else
                                            <label for="name" class="form-label">{{ $whatsappStore->id == 860 || $whatsappStore->id == 1518 ? 'Message' : __('messages.setting.address') }}:
                                         </label><span class="text-danger">*</span>
                                         <textarea class="form-control" id="address" name="address" rows="3" required
                                             placeholder="{{ $whatsappStore->id == 860 || $whatsappStore->id == 1518 ? 'Message' : __('messages.setting.address') }}"></textarea>
                                        @endif
                                        
                                     </div>
                                 </div>

                                 @if($whatsappStore->id == 1488 || $whatsappStore->id == 1)
                                  <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                       
                                            <label for="name" class="form-label">City:
                                         </label><span class="text-danger">*</span>
                                         <textarea class="form-control" id="city" name="city" rows="1" required
                                             placeholder="City"></textarea>
                                 
                                     </div>
                                 </div>
                                 @endif

                                 
                                  @if($whatsappStore->id == 1065)   
                                 <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                         <label for="city" class="form-label">City:
                                         </label><span class="text-danger">*</span>
                                         <input type="text" required class="form-control" name="city" id="city"
                                         placeholder="City">
                                     </div>
                                 </div>
                                 
                                 <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                         <label for="postal_code" class="form-label">Postal Code:
                                         </label><span class="text-danger">*</span>
                                         <input type="text" required class="form-control" name="postal_code" id="postal_code"
                                         placeholder="Postal Code">
                                     </div>
                                 </div> 
                                 
                                                                  
                                <div class="col-sm-12">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="upstairs_delivery" name="upstairs_delivery" value="yes">
                                        <label class="form-check-label" for="upstairs_delivery">
                                            Upstairs Delivery ($2.25 additional per upstairs delivery only Otw no delivery charges)
                                        </label>
                                    </div>
                                </div>   
                                
                                <div class="col-sm-12">
                                    <div class="mb-3 form-group">
                                        <label for="delivery_start_date" class="form-label">Delivery Start Date:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" required class="form-control" name="delivery_start_date" id="delivery_start_date"
                                        min="" onfocus="this.min = new Date().toISOString().split('T')[0]">
                                    </div>
                                </div>                                
                                 
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label for="delivery_instructions" class="form-label">
                                        Delivery Instructions for Drivers:
                                    </label>
                                    <span class="text-danger">*</span>
                                    <div class="select-wrapper">
                                        <select id="delivery_instructions" name="delivery_instructions" class="form-control" required>
                                            <option value="Hang or leave in a safe place at the Main Door" selected>Hang or leave in a safe place at the Main Door</option>
                                            <option value="Hang or leave in a safe place at the Basement Door">Hang or leave in a safe place at the Basement Door</option>
                                            <option value="Ground Floor Delivery — Leave in a safe place or as guided by concierge">Ground Floor Delivery — Leave in a safe place or as guided by concierge</option>
                                            <option value="Other — Specify details in the Note Box">Other — Specify details in the Note Box</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12">
                                     <div class="mb-3 form-group">
                                         <label for="extra_notes" class="form-label">Extra Items (Notes):
                                         </label><span class="text-danger"></span>
                                         <textarea class="form-control" id="extra_notes" name="extra_notes" rows="3" 
                                             placeholder="Extra Items"></textarea>
                                     </div>
                                 </div>                                                               
                             @endif

                                 @if($whatsappStore->id == 236 || $whatsappStore->id == 188 || $whatsappStore->id == 41 || $whatsappStore->id == 1488 || $whatsappStore->id == 1 || $whatsappStore->id == 1463)
                                     <div class="col-sm-12">
                                         <div class="mb-3 form-group">
                                             <label for="name" class="form-label">{{ 'Pincode' }}:
                                             </label><span class="text-danger">*</span>
                                             <input type="text" required name="pincode" id="pincode" class="form-control "
                                                 placeholder="Enter Pincode" oninput="handlePincodeInput()" />
                                         </div>
                                     </div>
                                     @if($whatsappStore->id == 1463)
                                      <div class="my-2">
                                        <div class="row text-secondary">

                                            <div class="col-6">
                                            <b>Sub Total:</b>
                                            </div>
                                            <div class="col-6 text-end">
                                            <b id="subtotalnew">0</b>
                                            </div>

                                            <div class="col-6">
                                            <b>Shipping Charge:</b>
                                            </div>
                                            <div class="col-6 text-end">
                                            <b id="courierApplyCharge">0</b>
                                            </div>

                                            <div class="col-12">
                                            <hr class="my-1">
                                            </div>

                                            <div class="col-6">
                                            <b>Total:</b>
                                            </div>
                                            <div class="col-6 text-end">
                                            <b id="finalTotal">0</b>
                                            </div>

                                        </div>
                                        </div>
                                     @endif
                                 @endif

                            
                                @if($whatsappStore->wp_razorpay_enabled == "1" && $whatsappStore->payment_methods == "true")
                                    <div class="col-sm-12">
                                        <div class="mb-3 form-group">
                                            <label for="paymentMethod" class="form-label">
                                                {{ __('Payment Method') }}:
                                            </label>
                                            <span class="text-danger">*</span>
                                            <div class="select-wrapper">
                                                <select id="paymentMethod" name="payment_method" class="form-control" required>
                                                    <option value="online" selected>Pay Online</option>
                                                    <option value="cash">Cash On Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                @endif  
                                
                            <input type="hidden" id="wpRazorpayEnabled" value="{{ $whatsappStore->wp_razorpay_enabled }}">                                
                           

                            @if($whatsappStore->id == 1201)
                                @php
                                    $dropdownData = json_decode($whatsappStore->dropdown_settings ?? '{}', true);
                                    $materials = $dropdownData['materials'] ?? [];
                                    $brandsWithModels = $dropdownData['brands'] ?? []; 
                                @endphp

                                {{-- 1. MATERIAL --}}
                                <div class="col-sm-12">
                                    <div class="mb-3 form-group">
                                        <label class="form-label">Cover Material <span class="text-danger">*</span></label>
                                        {{-- Added onchange to update hidden field --}}
                                        <select name="cover_material" id="select_material" class="form-control" onchange="combineDropdownData()" required>
                                            <option value="">Select Material</option>
                                            @foreach($materials as $mat)
                                                <option value="{{ $mat }}">{{ $mat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- 2. BRAND --}}
                                <div class="col-sm-12">
                                    <div class="mb-3 form-group">
                                        <label class="form-label">Phone Brand <span class="text-danger">*</span></label>
                                        <select name="phone_brand" id="userPhoneBrand" class="form-control" onchange="updateModels(); combineDropdownData()" required>
                                            <option value="">Select Brand</option>
                                            @foreach(array_keys($brandsWithModels) as $brandName)
                                                <option value="{{ $brandName }}">{{ $brandName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- 3. MODEL --}}
                                <div class="col-sm-12">
                                    <div class="mb-3 form-group">
                                        <label class="form-label">Phone Model <span class="text-danger">*</span></label>
                                        {{-- Added onchange to update hidden field --}}
                                        <select name="phone_model" id="userPhoneModel" class="form-control" onchange="combineDropdownData()" disabled required>
                                            <option value="">Select Brand First</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="dropdown_settings_order" id="dropdown_settings_order_input" value="">                   
                            @endif
                            
                            

                            
                             
                         </div>
                          @if($whatsappStore->id == 1463)
                          <button type="submit" class="newWhatsappButton btn btn-primary m-0 w-100" disabled>
                               @if($whatsappStore->wp_razorpay_enabled == "1")

                               Pay Now
                               
                               @else
                                                
                                @if($whatsappStore->id == 692)
                                     Place Order
                                @else
                                    Send Order on WhatsApp
                                @endif
                              @endif  
                                
                         </button>
                          @else   
                          <button type="submit" class="newWhatsappButton btn btn-primary m-0 w-100">
                               @if($whatsappStore->wp_razorpay_enabled == "1")

                               Pay Now
                               
                               @else
                                                
                                @if($whatsappStore->id == 692)
                                     Place Order
                                @else
                                    Send Order on WhatsApp
                                @endif
                              @endif  
                                
                         </button>                   
                          @endif                               
                         
                     </form>
                 </div>
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


@if($whatsappStore->id == 1201)
<script>
    var allBrandModels = @json($brandsWithModels);

    // 1. Update Models when Brand changes
    function updateModels() {
        var brandSelect = document.getElementById("userPhoneBrand");
        var modelSelect = document.getElementById("userPhoneModel");
        var selectedBrand = brandSelect.value;

        modelSelect.innerHTML = '<option value="">Select Model</option>';
        modelSelect.disabled = true;

        if (selectedBrand && allBrandModels[selectedBrand]) {
            var models = allBrandModels[selectedBrand];
            
            models.forEach(function(modelName) {
                var option = document.createElement("option");
                option.value = modelName;
                option.text = modelName;
                modelSelect.appendChild(option);
            });
            modelSelect.disabled = false;
        }
    }

    // 2. Combine all 3 values into the Hidden Input
    function combineDropdownData() {
        var mat = document.getElementById("select_material").value;
        var brand = document.getElementById("userPhoneBrand").value;
        var model = document.getElementById("userPhoneModel").value;
        
        // Only update if selections are made
        var resultString = "";
        
        if(mat)   resultString += "Material: " + mat;
        if(brand) resultString += ", Brand: " + brand;
        if(model) resultString += ", Model: " + model;

        // Set the value to the hidden input
        document.getElementById("dropdown_settings_order_input").value = resultString;
        
        // Debugging: View in console
        console.log("Saving to DB:", resultString);
    }
</script>
@endif