
<style>
@media (max-width: 767px) {
    .top-margin {
        margin-top: 20px !important;
    }
}    
    
</style>


<div class="modal fade" id="addWpStoreProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.vcard.new_product') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="whatsappStoreProductForm">
                    <input type="hidden" value="{{ $whatsappStore->id }}" name="whatsapp_store_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.common.name') . ':' }}</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="{{ __('messages.form.product') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4 top-margin">
                            <div class="form-group">
                                <label class="form-label">{{ 'MRP' . ':' }}</label>
                                <input type="number" class="form-control" name="net_price" step="any"
                                    placeholder="{{ 'MRP' }}">
                            </div>
                        </div>
                        <div class="col-md-4 top-margin">
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.whatsapp_stores.selling_price') . ':' }}</label>
                                <input type="number" class="form-control" name="selling_price" step="any"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_selling_price') }}">
                            </div>
                        </div>
                        @php
                            $isMobile = request()->header('User-Agent') && preg_match('/Mobile|Android|iPhone/', request()->header('User-Agent'));
                        @endphp
                        @if(!$isMobile)
                        <div class="col-md-6 mt-6">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.whatsapp_stores.category') . ':' }}</label>
                                <select name="category_id" class="form-control wpStoreCategory" required
                                    data-control="select2" data-dropdown-parent="#addWpStoreProductModal">
                                    <option value="0">{{ __('messages.whatsapp_stores.select_category') }}</option>
                                    @foreach ($productsCategories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.setting.currency') . ':' }}</label>
                                <select name="currency_id" class="form-control wpStoreCurrency" required
                                    data-control="select2" data-dropdown-parent="#addWpStoreProductModal">
                                    <option value="0">{{ __('messages.setting.select_currency') }}</option>
                                    @foreach (getCurrencies() as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6 mt-6">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.whatsapp_stores.category') . ':' }}</label>
                                <select name="category_id" class="form-control wpStoreCategory" required
                                    >
                                    <option value="0">{{ __('messages.whatsapp_stores.select_category') }}</option>
                                    @foreach ($productsCategories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.setting.currency') . ':' }}</label>
                                <select name="currency_id" class="form-control wpStoreCurrency" required
                                    >
                                    <option value="0">{{ __('messages.setting.select_currency') }}</option>
                                    @foreach (getCurrencies() as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 208 || $whatsappStore->id == 1488)
                        <div class="col-md-4 mt-5">
                            <div class="form-group">
                                <label class="form-label">Product Code</label>
                                <input class="form-control" name="p_code"
                                    placeholder="Enter Product Code">
                            </div>
                        </div>  
                        @endif         

                        <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 424  ? 'col-md-4':'col-md-6'}} mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.whatsapp_stores.total_stock') . ':' }}</label>
                                <input type="number" class="form-control product-total-stock" name="total_stock"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_total_stock') }}" required>
                            </div>
                        </div>
                        <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 424  ? 'col-md-4':'col-md-6'}} mt-5">
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.whatsapp_stores.available_stock') . ':' }}</label>
                                <input type="number" class="form-control product-avilable-stock" name="available_stock"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_available_stock') }}">
                            </div>
                        </div>
                        @if($whatsappStore->id == 223)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'HTML Code' . ':' }}</label>
                                    <textarea type="text" class="form-control product-html-code" name="html_code" placeholder="Enter HTML Code use only (') Single Inverted Comma" rows="10"></textarea>
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 210 || $whatsappStore->id == 962)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Affiliate Url' . ':' }}</label>
                                    <input type="text" class="form-control product-affiliate-url" name="affiliate_url"
                                        placeholder="Enter affiliate url">
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 208 || $whatsappStore->id == 1488)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Cartoon Quantity' . ':' }}</label>
                                    <input type="text" class="form-control product-cartoon-quantity" name="cartoon_qty"
                                        placeholder="Enter Cartoon Quantity">
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 236 || $whatsappStore->id == 344 || $whatsappStore->id == 364 || $whatsappStore->id == 530 || $whatsappStore->id == 77 || $whatsappStore->id == 1158 || $whatsappStore->id == 348 || $whatsappStore->id == 1323 || $whatsappStore->id == 1502)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Sizes' . ':' }}</label>
                                    <input type="text" class="form-control product-affiliate-url" name="sizes"
                                        placeholder="S,M,XL,XXL">
                                </div>
                            </div>
                        @endif

                        @if($whatsappStore->id == 77)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Brand' . ':' }}</label>
                                    <input type="text" class="form-control product-affiliate-url" name="p_brand"
                                        placeholder="Enter Product Brand">
                                </div>
                            </div>
                        @endif                           
                        
                        <style>
                            .color-picker-container {
                                  display: flex;
                                align-items: center;
                                gap: 15px;
                                margin-bottom: 20px;
                            }
                            .color-picker-container input[type="color"] {
                              width: 57px;
                              height: 30px;
                              border: none;
                              cursor: pointer;
                            }
                            .color-picker-container div {
                              padding: 5px 9px;
                              border: none;
                              background-color: #007BFF;
                              color: white;
                              border-radius: 6px;
                              cursor: pointer;
                            }
                            .color-picker-container button:hover {
                              background-color: #0056b3;
                            }
                            #selected-colors {
                              display: flex;
                              flex-wrap: wrap;
                              justify-content: center;
                              gap: 15px;
                              margin-top: 20px;
                            }
                            .color-box {
                              display: flex;
                              align-items: center;
                              background-color: #f1f1f1;
                              padding: 10px 15px;
                              border-radius: 8px;
                            }
                            .swatch {
                              width: 30px;
                              height: 30px;
                              border-radius: 4px;
                              margin-right: 10px;
                              border: 1px solid #999;
                            }
                            .color-name-input {
                              border: 1px solid #ccc;
                              border-radius: 4px;
                              padding: 5px 8px;
                              font-size: 16px;
                              width: 140px;
                            }
                            .delete-btn {
                              margin-left: 10px;
                              background: red;
                              color: white;
                              border: none;
                              padding: 5px 8px;
                              cursor: pointer;
                              border-radius: 4px;
                            }
                        </style>
                         @if($whatsappStore->id == 191 || $whatsappStore->id == 77 || $whatsappStore->id == 1158)
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label class="form-label">{{ 'Colors' . ':' }}</label>
                                <div class="w-100 h-auto" id="colorPickerAddInputs">
                                    
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 755 || $whatsappStore->id == 424 || $whatsappStore->id == 1209 || $whatsappStore->id == 1238)
                         <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Attribute Title' . ':' }}</label>
                                    <input type="text" class="form-control" name="atribute_title"
                                        placeholder="Enter Attribute Title">
                                </div>
                            </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label class="form-label">{{ 'Attributes' . ':' }}</label>
                                <div id="attributeAddInputs">
                                    <div>
                                    <button type="button" class="btn btn-primary" id="addAttributeBtn">Add Attribute</button>
                                    </div>
                                    
                                    <div id="attributeContainer"></div>
                                    
                                    <!-- Hidden input to store JSON -->
                                    <input type="hidden" id="attributesJson" name="attributes" value="[]">
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 741)
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Price Quantity' . ':' }}</label>
                                    <input type="text" class="form-control" name="order_qty"
                                        placeholder="Enter quantity for apply price">
                                </div>
                            </div>
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Quantity Price' . ':' }}</label>
                                    <input type="text" class="form-control" name="qty_price"
                                        placeholder="Enter quantity price">
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 1209)
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Discount Offer' . ':' }}</label>
                                    <input type="text" class="form-control" name="dis_free"
                                        placeholder="Enter discount offer">
                                </div>
                            </div>
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Discount Text' . ':' }}</label>
                                    <input type="text" class="form-control" name="dis_text"
                                        placeholder="Enter discount Text">
                                </div>
                            </div>
                        @endif
                    
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label for="description" class="form-label required">
                                    {{ __('messages.vcard.description') }}:
                                </label>
                                <div id="wpStoreProductDescriptionQuill" class="editor-height" style="height: 150px"></div>
                                <input type="hidden" name="description" id="wpStoreProductDescriptionData">
                            </div>
                        </div>
                      
                        
                        <div class="mt-5 col-lg-12 {{$whatsappStore->id == 345 ? 'd-none' : ''}}">
                            <div class="mb-3" io-image-input="true">
                                <input type="hidden" id="wpProductDefaultImage" value="{{ asset('images/wp-product.png') }}">
                               
                                    @if($whatsappStore->id == 58)
                                        <!--<label for="productPreview"-->
                                        <!--class="form-label required">{{ __('messages.whatsapp_stores.product_images') }} <span style="font-weight: 800;color: #6571ff;">(Max 10MB File support)</span> :</label>-->
                                    @else
                                        <!--<label for="productPreview"-->
                                        <!--class="form-label required">{{ __('messages.whatsapp_stores.product_images') }} <span style="font-weight: 800;color: #6571ff;">(Max 1MB File support)</span> :</label>-->
                                    @endif
                                <span data-bs-toggle="tooltip" data-placement="top"
                                    data-bs-original-title="{{ __('messages.tooltip.wp_product_img') }}">
                                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                                </span>
                                <div class="d-flex align-items-start flex-wrap gap-4 mt-2" id="imageContainer">
                                    <div class="d-block image-picker-wrapper">
                                        <div class="image-picker">

                                            <div class="image previewImage" id="wpStoreProductPreview">
                                            </div>

                                            <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                data-bs-toggle="tooltip" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.image') }}">
                                                <label>
                                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                    <input type="file"  name="images[]"
                                                        class="image-upload file-validation d-none" accept="image/*"
                                                         multiple />
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label">Youtube Link</label>
                                <input type="text" class="form-control" name="youtube_link"
                                    placeholder="Enter Youtube Link">
                            </div>
                        </div>

                        <div class="col-md-6 mt-5 d-none">
                            <div class="form-group">
                                <label class="form-label required">Production Position</label>
                                <input type="number" class="form-control" name="position"
                                placeholder="Enter category position number">
                            </div>
                        </div>
                       
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="wpStoreProductSave" class="btn btn-primary m-0">{{ __('crud.save') }}
                </button>
                </form>
                <button class="btn btn-secondary my-0 ms-5 me-0"
                    data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.image-upload').forEach(input => {
    input.addEventListener('change', async function (e) {
        const files = Array.from(e.target.files);
        const compressedFiles = [];

        for (const file of files) {
            if (file.size > 1 * 1024 * 1024) { // >1MB
                const compressed = await compressImage(file, 0.7); // 70% quality
                compressedFiles.push(compressed);
            } else {
                compressedFiles.push(file);
            }
        }

        // Replace input files with compressed ones
        const dataTransfer = new DataTransfer();
        compressedFiles.forEach(file => dataTransfer.items.add(file));

        e.target.value = ""; // reset
        e.target.files = dataTransfer.files;
    });
});

function compressImage(file, quality = 0.7) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        const reader = new FileReader();

        reader.onload = (event) => {
            img.src = event.target.result;
        };

        img.onerror = reject;

        img.onload = () => {
            const canvas = document.createElement('canvas');

            let width = img.width;
            let height = img.height;
            const MAX_WIDTH = 1280;
            const MAX_HEIGHT = 1280;

            if (width > height && width > MAX_WIDTH) {
                height = Math.round((height * MAX_WIDTH) / width);
                width = MAX_WIDTH;
            } else if (height > MAX_HEIGHT) {
                width = Math.round((width * MAX_HEIGHT) / height);
                height = MAX_HEIGHT;
            }

            canvas.width = width;
            canvas.height = height;

            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);

            // Always normalize output type
            canvas.toBlob((blob) => {
                if (!blob) {
                    resolve(file); // fallback to original
                    return;
                }
                const compressedFile = new File([blob], file.name.replace(/\.[^.]+$/, ".jpg"), {
                    type: "image/jpeg",
                    lastModified: Date.now()
                });
                resolve(compressedFile);
            }, "image/jpeg", quality);
        };

        reader.readAsDataURL(file);
    });
}
</script>
