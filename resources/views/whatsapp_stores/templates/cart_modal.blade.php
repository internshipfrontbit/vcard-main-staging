      <!-- Modal -->
      <style>
          .newWhatsappButton{
              background: #25d366 !important;
          }
          .newWhatsappButton:hover{
              color: #000000 !important;
          }
          
          input.no-spinner::-webkit-inner-spin-button, 
          input.no-spinner::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
            }
        
        /* Hide arrows for Firefox */
            input.no-spinner {
                -moz-appearance: textfield;
            }
      </style>
      <input type="hidden" id="minimum_order_amount" value="{{$whatsappStore->minimum_order_amount}}"> 
      <input type="hidden" id="courier_charge" value="{{$whatsappStore->courier_charge}}"> 
      <input type="hidden" id="discount_percentage" value="{{$whatsappStore->dis_perc}}"> 
      <div class="modal fade" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
                  <div class="modal-header px-0 pt-0">
                      <input type="hidden" value="{{ $whatsappStore->id }}" id="whatsappStoreId">
                      <h5 class="modal-title fs-20 fw-6" id="exampleModalLabel">
                          {{ __('messages.whatsapp_stores_templates.cart_items') }} 
                          @if($whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 721 || $whatsappStore->id == 584 || $whatsappStore->id == 796 || $whatsappStore->id == 1327)
                            <span>(Minimum order amount is ₹{{$whatsappStore->minimum_order_amount}})</span>
                          @endif
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body pb-0">
                      <div class="overflow-auto">
                          <table class="table table-borderless mb-20">
                              <thead>
                                  <tr class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                                      <th class="fw-6 fs-16 pt-0">{{ __('messages.whatsapp_stores.products') }}</th>
                                      @if($whatsappStore->id == 344 || $whatsappStore->id == 364 ||  $whatsappStore->id == 348)
                                        <th class="fw-6 fs-16 pt-0">Size</th>
                                      @endif
                                      @if($whatsappStore->id == 364 || $whatsappStore->id == 7 ||  $whatsappStore->id == 396)
                                        <th class="fw-6 fs-16 pt-0">Color</th>
                                      @endif
                                      <th class="fw-6 fs-16 pt-0">{{ __('messages.common.price') }}</th>
                                      <th class="fw-6 fs-16 pt-0 text-center">
                                          {{ __('messages.whatsapp_stores_templates.quantity') }}</th>
                                      <th class="fw-6 fs-16 pt-0 pe-0 text-end">
                                          {{ __('messages.whatsapp_stores_templates.total_price') }}</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody id="cartItems">

                              </tbody>
                              <tfoot>
                                  <tr class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                                      <td></td>
                                      <td></td>
                                      <td></td>

                                      <td class="fs-18 fw-6 text-end pe-0 mt-2 " id="grandTotalLine" >
                                        @if(($whatsappStore->id == 721 || $whatsappStore->id == 424 || $whatsappStore->id == 41 || $whatsappStore->id == 1238) && $whatsappStore->courier_charge != 0)
                                            <span class="courier-class" style="color: #959595;font-size: 14px;margin-bottom: -22px;margin-top: 6px;display: block;">+ Courier Charge: <span id="courierCharge">{{$whatsappStore->courier_charge}}</span></span> <br>
                                        @endif
                                        @if($whatsappStore->dis_perc)
                                        <span class="discount-class text-success" style="font-size: 14px;margin-bottom: -22px;margin-top: 6px;display: block;">- Discount: <span id="discountAmount">0</span></span> <br>
                                        @endif
                                        
                                        
                                        <span>{{ __('messages.whatsapp_stores.grand_total') }}: <span id="grandTotal">0</span></span>
                                      </td>

                                      <td></td>

                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                     
                    @if($whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 721 || $whatsappStore->id == 584 || $whatsappStore->id == 796 || $whatsappStore->id == 1327)
                         <button type="button"
                          class="newWhatsappButton btn btn-primary m-0 w-100 order-btn" id="hideOrderButton" onclick="displayErrorMessage('Minimum order amount is ₹{{$whatsappStore->minimum_order_amount}}')">
                          Send Order on WhatsApp
                         </button>
                         <button style="display: none;" type="button" data-bs-toggle="modal" id="showOrderButton" data-bs-target="#orderNowModal"
                          class="newWhatsappButton btn btn-primary m-0 w-100 order-btn">
                          Send Order on WhatsApp
                         </button>
                    @else
                        @if($whatsappStore->id == 1209)
                            <button type="button" onclick="directWhatsappShare()"
                                class="newWhatsappButton btn btn-primary m-0 w-100">
                                Send Order on WhatsApp
                            </button>
                        @else
                            <button type="button" data-bs-toggle="modal" data-bs-target="#orderNowModal"
                                class="newWhatsappButton btn btn-primary m-0 w-100 order-btn">
                                Send Order on WhatsApp
                            </button>
                        @endif

                    @endif
                      
                     
                                    
                      
                      
                  </div>
              </div>
          </div>
      </div>
      
