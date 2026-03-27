<div class="modal fade" id="SizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">

            <div class="modal-body p-0 border-0">
                <div class="row overflow-auto justify-content-center">
                    <div class="col-12 col-lg-4">
                        <div class="table-details d-flex flex-column h-100 justify-content-between">
                                @if($whatsappStore->id == 77 || $whatsappStore->id == 1158)
                                    <h2 class="fs-20 fw-5 text-black mb-0">Select Color & Size</h2>
                                @else
                                    <h2 class="fs-20 fw-5 text-black mb-0">Select Size</h2>
                                @endif
                            <div id="totalDetails1" class="flex-grow-1">
                                @if($whatsappStore->id == 77 || $whatsappStore->id == 1158)
                                <style>
                                            .color-swatch {
                                                width: 30px;
                                                height: 30px;
                                                border-radius: 50%;
                                                display: inline-block;
                                                margin: 5px;
                                                border: 2px solid #c1c1c1fa;
                                                cursor: pointer;
                                                transition: border 0.2s ease;
                                            }
                                        
                                            .color-swatch.selected {
                                                border: 3px solid #0d6efd;
                                            }
                                        </style>
                                        <div class="mt-4" style="font-size: 17px;font-weight: 600;">Size:</div>
                                        <div class="form-group mt-2 mb-4 text-center" id="sizeContainer">
                                            

                                        
                                        </div>
                                        <div class="mt-4" style="font-size: 17px;font-weight: 600;">Color:</div>
                                        <div class="form-group mt-2 mb-4 text-center" id="colorContainer" style="display: flex;flex-wrap: wrap;">
                                            
    
                                        
                                        </div>
                                        <input type="hidden" id="selectedColorNew" name="selected_color" value="WHITE">
                                @else
                                    <div class="form-group mt-4 mb-4 text-center" id="sizeContainer">
                                            

                                        
                                        </div>
                                @endif
                            </div>
                            <div class="mb-15">
                                <button class="btn btn-primary w-100 fs-18 fw-5" style="border-radius: 10px;" onclick="orderNowButtonClick()">
                                    {{ __('messages.whatsapp_stores_templates.order_now') }}
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
