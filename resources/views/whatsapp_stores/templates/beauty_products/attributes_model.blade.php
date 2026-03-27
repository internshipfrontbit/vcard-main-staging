<div class="modal fade" id="AttributeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="width: 447px;margin: auto;">

            <div class="modal-body p-0 border-0">
                <div class="row overflow-auto justify-content-center">
                    <div class="col-12 col-lg-12 col-12">
                        <div class="table-details d-flex flex-column h-100 justify-content-between">
                                <style>
                                    
                                    .product-box.activeclass{
                                        border: 1px solid #c29c77 !important;
                                        outline: 1px solid #c29c77 !important;
                                    }
                                    
                                    .product-box.activeclass .attribute{
                                        border-bottom: 1px solid #c29c77 !important !important;
                                    }
                                    
                                        .product-box .attribute {
                                        font-weight: bold;
                                        font-size: 14px;
                                        padding: 8px;
                                        border-bottom: 1px solid #c29c77;
                                    }
                                    .product-box {
                                        width: 120px;
                                        border: 1px solid #ccc;
                                        border-radius: 8px;
                                        text-align: center;
                                        font-family: Arial, sans-serif;
                                        overflow: hidden;
                                        cursor: pointer;
                                    }
                                
                                    .product-box .attribute {
                                      font-weight: bold;
                                      font-size: 14px;
                                      padding: 8px;
                                      border-bottom: 1px solid #ddd;
                                    }
                                
                                    .product-box .price {
                                      font-size: 14px;
                                      color: #333;
                                      padding: 8px;
                                    }
                                    .asttribute-item-container{
                                        display: flex;
                                        flex-wrap: wrap;
                                        justify-content: space-around;
                                        gap: 11px;
                                    }
                                </style>
                                <h2 class="fs-20 fw-5 text-black mb-0" id="attributeTitle"></h2>
                                        <div class="form-group mt-4 mb-4 text-center" >
                                            
                                            <div class="asttribute-item-container" id="attributeContainer">
                                                
                                            </div>
                                        
                                        </div>
                                <input type="hidden" id="selectedAttribute" name="selected_attribute" value="">
                                <input type="hidden" id="isOpenFrom" name="selected_attribute" value="">
                                <input type="hidden" id="attrProductId" name="selected_attribute" value="">
                                <div class="mb-15">
                                    <button class="btn btn-primary w-100 fs-18 fw-5" style="border-radius: 10px;" onclick="attributeSelectButtonClick()">
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