<style>
    .btn-close{
        display: block !important;
    }
        .dd { position: relative; max-width: 100%; font-family: system-ui, Arial, sans-serif; }
  .dd-input-wrap { position: relative; }
  .dd-input { width: 100%; padding: 10px 36px 10px 12px; border: 1px solid #ccc; border-radius: 8px; outline: none; }
  .dd-input:focus { border-color: #888; }
  .dd-toggle { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); border: none; background: transparent; cursor: pointer; font-size: 16px; }
  .dd-toggle:after { content: "▾"; }
  .dd-list { position: absolute; left: 0; right: 0; background: #fff; border: 1px solid #ddd; border-top: none; border-radius: 0 0 8px 8px; box-shadow: 0 6px 18px rgba(0,0,0,.08); max-height: 260px; overflow: auto; z-index: 50; }
  .dd-item { padding: 8px 10px; cursor: pointer; }
  .dd-item:hover, .dd-item.dd-active { background: #f2f2f2; }
  .dd-empty { padding: 10px; color: #888; }
</style>
<div class="modal fade" id="wpStoreShowProductOrderModal" tabindex="-1" aria-modal="true" role="dialog">
    @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488) 
    <div class="modal-dialog modal-xl">
    @else
    <div class="modal-dialog modal-lg ">    
    @endif    
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.whatsapp_stores.order_details') }}</h2>
                @if($whatsappStore->id == 1488)
                        <span class="assign-button-container" style="margin-left: 145px;">
                            
                        </span>
                    @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ __('messages.whatsapp_stores.order_id') . ':' }}
                        </label>
                        <p id="orderId" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ __('messages.common.name') . ':' }}
                        </label>
                        <p id="orderName" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ __('messages.common.phone') . ':' }}
                        </label>
                        <p id="orderPhone" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ __('messages.common.status') . ':' }}
                        </label>
                        <p id="orderStatus" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ 'Payment Status' . ':' }}
                        </label>
                        <p id="paymentOrderStatus" class="text-gray-600 fw-bold mb-0"></p>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            {{ __('messages.setting.address') }}:
                        </label>
                        <div id="orderAddress" class="d-flex flex-wrap"></div>
                    </div>
                    @if($whatsappStore->id == 236 || $whatsappStore->id == 188 || $whatsappStore->id == 41 || $whatsappStore->id == 1463)
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Pincode:
                        </label>
                        <div id="orderPincode" class="d-flex flex-wrap"></div>
                    </div>
                    @endif
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Payment Mode:
                        </label>
                        <div id="paymentMode" class="d-flex flex-wrap"></div>
                    </div>      
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Payment Id:
                        </label>
                        <div id="paymentId" class="d-flex flex-wrap"></div>
                    </div>  


                       @if($whatsappStore->id == 1065)                  
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                        Email Addess:
                        </label>
                        <div id="orderEmailAddress" class="d-flex flex-wrap"></div>
                    </div> 
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Unit Number:
                        </label>
                        <div id="orderUnitNumber" class="d-flex flex-wrap"></div>
                    </div> 
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                           Order City:
                        </label>
                        <div id="orderCity" class="d-flex flex-wrap"></div>
                    </div> 
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                           Postal Code:
                        </label>
                        <div id="orderPostalCode" class="d-flex flex-wrap"></div>
                    </div> 

                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                           Upstairs Delivery:
                        </label>
                        <div id="orderUpstairsDelivery" class="d-flex flex-wrap"></div>
                    </div> 
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Delivery StartDate:
                        </label>
                        <div id="orderDeliveryStartDate" class="d-flex flex-wrap"></div>
                    </div> 
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Delivery Instructions:
                        </label>
                        <div id="orderDeliveryInstructions" class="d-flex flex-wrap"></div>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                         Extra Notes:
                        </label>
                        <div id="orderExtraNotes" class="d-flex flex-wrap"></div>
                    </div>                      
                    @endif


                     @if($whatsappStore->id == 1201 )
                    <div class="col-sm-6 mb-5">
                        <label class="form-label fs-6 text-gray-700">
                            Cover Type:
                        </label>
                        <div id="dropdownSetting" class="d-flex flex-wrap"></div>
                    </div>  
                     @endif

                </div>
                <h3>{{ __('messages.whatsapp_stores.order_items') }}</h3>
                <div class="mt-2 table-responsive table-striped overflow-auto">
                    @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                    <div class="py-4">
                        <div>
                            <div class="row">
                                <div class="col-md-6" id="productDropdownContainer">
                                    <input class="form-control w-100" type="text" placeholder="Select Product">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control w-100" type="number" id="productqtyinput" placeholder="Quantity">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control w-100" type="number" id="productpriceinput" placeholder="Price">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100" onclick="addProduct()"> <i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.vcard.product_name') }}</th>
                                @if($whatsappStore->id == 236 || $whatsappStore->id == 344 || $whatsappStore->id == 364 || $whatsappStore->id == 77 || $whatsappStore->id == 1323)
                                    <th>{{ 'Size' }}</th>
                                @endif
                                @if($whatsappStore->id == 191 || $whatsappStore->id == 77)
                                    <th>{{ 'Color' }}</th>
                                @endif
                                <th>{{ __('messages.whatsapp_stores_templates.quantity') }}</th>
                                <th>{{ __('messages.common.price') }}</th>
                                <th>{{ __('messages.whatsapp_stores_templates.total_price') }}</th>
                                @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="product-list"></tbody>
                        <tfoot>
                            @if($whatsappStore->id == 721 || $whatsappStore->id == 41)
                            <tr>
                            <td colspan="4" class="text-end">Courier Charges:</td>
                                        <td id="orderCourierCharges" class="fw-bold">
                                        </td>
                            </tr>            
                            @endif
                            @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                            <tr>
                                
                                        <td colspan="4" class="text-end">Auto Charges:</td>
                                        <td id="orderAutoCharges" class="fw-bold" colspan="2"><input type="number" value="0" class="form-control" oninput="applyAutoCharges()"></td>
                                
                            </tr>
                            <tr>
                                
                                        <td colspan="4" class="text-end">Courier Charges:</td>
                                        <td id="orderCourierCharges" class="fw-bold" colspan="2"><input type="number" value="0" class="form-control" oninput="applyAutoCharges()">
                                        </td>
                                
                            </tr>
                            @endif
                            
                            @if($whatsappStore->dis_perc != 0)
                            <tr>
                                @if($whatsappStore->id == 236 || $whatsappStore->id == 344 || $whatsappStore->id == 364)
                                    <td colspan="5" class="text-end">Discount:</td>
                                @elseif($whatsappStore->id == 191)
                                    <td colspan="6" class="text-end">Discount:</td>
                                @else
                                    <td colspan="4" class="text-end">Discount:</td>
                                @endif
                                @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                                    <td id="discountAmount" class="fw-bold" colspan="2"></td>
                                 @else
                                    <td id="discountAmount" class="fw-bold"></td>
                                 @endif
                            </tr>
                            @endif
                            <tr>
                                @if($whatsappStore->id == 236 || $whatsappStore->id == 344 || $whatsappStore->id == 364)
                                    <td colspan="5" class="text-end">{{ __('messages.whatsapp_stores.grand_total') }}:</td>
                                @elseif($whatsappStore->id == 191)
                                    <td colspan="6" class="text-end">{{ __('messages.whatsapp_stores.grand_total') }}:</td>
                                @else
                                    <td colspan="4" class="text-end">{{ __('messages.whatsapp_stores.grand_total') }}:</td>
                                @endif
                                @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                                    <td id="orderGrandTotal" class="fw-bold" colspan="2"></td>
                                 @else
                                    <td id="orderGrandTotal" class="fw-bold"></td>
                                 @endif
                            </tr>
                        </tfoot>
                    </table>
                    @if($whatsappStore->id == 676 || $whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    Advance Payment <span id="advanceText"></span>                                    
                                </label>
                                <input class="form-control" type="number" id="orderAdvancePayment" value="" placeholder="Enter advance amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    Remaining payment
                                </label>
                                <input class="form-control" type="number" value="" id="orderRemainPayment" readonly="">
                            </div>
                        </div>
                        
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                            <label class="form-label">
                                    Notes
                                </label>
                            <textarea class="form-control" id="orderNotes" placeholder="Enter notes"></textarea>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                <div class="modal-footer text-end">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-primary" onclick="updateInvoiceDetails()" id="updateOrderInvoiceButton"><i style="display: none;" class="fas fa-circle-notch fa-spin"></i> Update</button>
                </div>
            @endif
            @if($whatsappStore->id == 676 || $whatsappStore->id == 188)
                <div class="modal-footer text-end">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-primary" onclick="updateAdvanceInvoice()"><i style="display: none;" class="fas fa-circle-notch fa-spin"></i> Update</button>
                </div>
            @endif
        </div>
    </div>
</div>
