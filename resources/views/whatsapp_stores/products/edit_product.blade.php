<div class="modal fade" id="editWpStoreProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.vcard.edit_product') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editWhatsappStoreProductForm">
                    <input type="hidden" value="{{ $whatsappStore->id }}" name="whatsapp_store_id">
                    <input type="hidden" name="id" id="editProductID">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.common.name') . ':' }}</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="{{ __('messages.form.product') }}" required id="editProductName">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">{{ 'MRP' . ':' }}</label>
                                <input type="number" id="editProductNetPrice" class="form-control" step="any" name="net_price"
                                    placeholder="{{ 'MRP' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label
                                    class="form-label">{{ __('messages.whatsapp_stores.selling_price') . ':' }}</label>
                                <input type="number" id="editProductSellingPrice" step="any" class="form-control"
                                    name="selling_price"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_selling_price') }}">
                            </div>
                        </div>
                        @php
                            $isMobile = request()->header('User-Agent') && preg_match('/Mobile|Android|iPhone/', request()->header('User-Agent'));
                        @endphp
                        @if(!$isMobile)
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label
                                    class="form-label required">{{ __('messages.whatsapp_stores.category') . ':' }}</label>
                                <select name="category_id" class="form-control wpStoreCategory" required
                                    data-control="select2" data-dropdown-parent="#editWpStoreProductModal">
                                    <option value="">{{ __('messages.whatsapp_stores.select_category') }}</option>
                                    @foreach ($productsCategories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.setting.currency') . ':' }}</label>
                                <select name="currency_id" class="form-control wpStoreCategory" required
                                    data-control="select2" data-dropdown-parent="#editWpStoreProductModal">
                                    <option value="">{{ __('messages.setting.select_currency') }}</option>
                                    @foreach (getCurrencies() as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label
                                    class="form-label required">{{ __('messages.whatsapp_stores.category') . ':' }}</label>
                                <select name="category_id" class="form-control wpStoreCategory" required
                                    >
                                    <option value="">{{ __('messages.whatsapp_stores.select_category') }}</option>
                                    @foreach ($productsCategories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.setting.currency') . ':' }}</label>
                                <select name="currency_id" class="form-control wpStoreCategory" required
                                    >
                                    <option value="">{{ __('messages.setting.select_currency') }}</option>
                                    @foreach (getCurrencies() as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 208 || $whatsappStore->id == 424 || $whatsappStore->id == 1488)
                        <div class="col-md-4 mt-5">
                            <div class="form-group">
                                <label class="form-label">Product Code</label>
                                <input class="form-control" name="p_code"id="editProductCode"
                                    placeholder="Enter Product Code">
                            </div>
                        </div>  
                        @endif                                       
                        <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 424  ? 'col-md-4':'col-md-6'}} mt-5">
                            <div class="form-group">
                                <label class="form-label required">{{ __('messages.whatsapp_stores.total_stock') . ':' }}</label>
                                <input type="number" class="form-control product-total-stock" name="total_stock" id="editProductTotalStock"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_total_stock') }}" required>
                            </div>
                        </div>
                        <div class="{{$whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 424  ? 'col-md-4':'col-md-6'}} mt-5">
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.whatsapp_stores.available_stock') . ':' }}</label>
                                <input type="number" class="form-control product-avilable-stock" name="available_stock" id="editProductAvilableStock"
                                    placeholder="{{ __('messages.whatsapp_stores.enter_available_stock') }}">
                            </div>
                        </div>
                         @if($whatsappStore->id == 223)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'HTML Code' . ':' }}</label>
                                    <textarea type="text" class="form-control product-html-code" id="productHTMLCode"  name="html_code" placeholder="Enter HTML Code" rows="10"></textarea>
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 210 || $whatsappStore->id == 962)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Affiliate Url' . ':' }}</label>
                                    <input type="text" class="form-control productaffiliateurl" id="productaffiliateurl" name="affiliate_url"
                                        placeholder="Enter affiliate url">
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 208 || $whatsappStore->id == 1488)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Cartoon Quantity' . ':' }}</label>
                                    <input type="text" class="form-control product-cartoon-quantity" id="productcartoonQuantity" name="cartoon_qty"
                                        placeholder="Enter Cartoon Quantity">
                                </div>
                            </div>
                        @endif
                        @if($whatsappStore->id == 236 || $whatsappStore->id == 344 || $whatsappStore->id == 364 || $whatsappStore->id == 530 || $whatsappStore->id == 77 || $whatsappStore->id == 1158 || $whatsappStore->id == 348 || $whatsappStore->id == 1323 || $whatsappStore->id == 1502)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Sizes' . ':' }}</label>
                                    <input type="text" class="form-control product-affiliate-url" id="hiddentags" name="sizes"
                                        placeholder="Ex: M,S,XL,XXL">
                                </div>
                            </div>
                        @endif

                        @if($whatsappStore->id == 77)
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Brand' . ':' }}</label>
                                    <input type="text" class="form-control" id="editProductBrand" name="p_brand"
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
                                <div class="w-100 h-auto" id="colorPickerUpdateInputs">
                                    
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 755 || $whatsappStore->id == 424 || $whatsappStore->id == 1209 || $whatsappStore->id == 1238)
                         <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Attribute Title' . ':' }}</label>
                                    <input type="text" id="editattributetitle" class="form-control" name="atribute_title"
                                        placeholder="Enter Attribute Title">
                                </div>
                            </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label class="form-label">{{ 'Attributes' . ':' }}</label>
                                <div id="attributeUpdateInputs">
                                    
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($whatsappStore->id == 741)
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Price Quantity' . ':' }}</label>
                                    <input type="text" id="editorderqty" class="form-control" name="order_qty"
                                        placeholder="Enter quantity for apply price">
                                </div>
                            </div>
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Quantity Price' . ':' }}</label>
                                    <input type="text" id="editqtyprice" class="form-control" name="qty_price"
                                        placeholder="Enter quantity price">
                                </div>
                            </div>
                        @endif

                        @if($whatsappStore->id == 1209)
                        
                        <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Discount Offer' . ':' }}</label>
                                    <input type="text" id="editDisFree" class="form-control" name="dis_free"
                                        placeholder="Enter discount offer">
                                </div>
                            </div>
                             <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label class="form-label">{{ 'Discount Text' . ':' }}</label>
                                    <input type="text" id="editDisText" class="form-control" name="dis_text"
                                        placeholder="Enter discount Text">
                                </div>
                            </div>
                        @endif
                        
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label for="description" class="form-label required">
                                    {{ __('messages.vcard.description') }}:
                                </label>
                                <div id="editWpStoreProductDescriptionQuill" class="editor-height"
                                    style="height: 150px">
                                </div>
                                <input type="hidden" name="description" id="editWpStoreProductDescriptionData">
                            </div>
                        </div>
                        
                        
                            <div class="col-sm-12 mt-5 col-lg-12 {{$whatsappStore->id == 345 ? 'd-none' : ''}}">
                            <div class="mb-3" io-image-input="true">
                                <div class="d-flex">
                                    @if($whatsappStore->id == 58)
                                        <!--<label for="editProductPreview"-->
                                        <!--class="form-label required">{{ __('messages.whatsapp_stores.product_images') }} <span style="font-weight: 800;color: #6571ff;">(Max 10MB File support)</span> :</label>-->
                                    @else
                                        <!--<label for="editProductPreview"-->
                                        <!--class="form-label required">{{ __('messages.whatsapp_stores.product_images') }} <span style="font-weight: 800;color: #6571ff;">(Max 1MB File support)</span> :</label>-->
                                    @endif
                                    
                                    <span data-bs-toggle="tooltip" style="position: relative;top: -2px;left: 4px;" data-placement="top"
                                        data-bs-original-title="{{ __('messages.tooltip.wp_product_img') }}">
                                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                                    </span>
                                    
                                </div>
                                <div class="d-flex align-items-start flex-wrap" id="editWpStoreImageContainer">
                                    <div class="d-block">
                                        <div class="image-picker">
                                            <div class="image previewImage ms-4 mt-1" id="editProductPreview"
                                                style="background-image: url('{{ asset('assets/images/default_service.png') }}')">
                                            </div>
                                            <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                data-bs-toggle="tooltip" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.image') }}">
                                                <label>
                                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                    <input type="file" id="editProductIcon" name="images[]"
                                                        class="image-upload file-validation d-none" accept="image/*"
                                                         />
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex flex-wrap mt-3" id="newSelectedImagesPreview"></div>

                                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label class="form-label">Youtube Link</label>
                                <input type="text" class="form-control" name="youtube_link"  id="editProductYoutubeLink"
                                    placeholder="Enter Youtube Link">
                            </div>
                        </div>        
                        
                        <div class="col-md-6 mt-5 d-none">
                            <div class="form-group">
                                <label class="form-label required">Production Position</label>
                                <input type="number" class="form-control" name="position" id="editProductPosition"
                                placeholder="Enter category position number">
                            </div>
                        </div>
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="editWPStoreProductSave" class="btn btn-primary m-0">{{ __('crud.save') }}
                </button>
                </form>
                <button class="btn btn-secondary my-0 ms-5 me-0"
                    data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editWpStoreProductModal');
    const newPreviewContainer = document.getElementById('newSelectedImagesPreview');

    modal.addEventListener('shown.bs.modal', function () {
        const input = document.getElementById('editProductIcon');
        if (!input || !newPreviewContainer) return;

        input.addEventListener('change', async function (e) {
            const files = e.target.files;
            if (!files.length) return;

            const dataTransfer = new DataTransfer();
            newPreviewContainer.innerHTML = ""; 

            for (let file of files) {
                let finalFile = file;

                // ✅ Guarantee under 1MB
                if (file.size > 1024 * 1024) {
                    finalFile = await compressToUnder1MB(file);
                }

                dataTransfer.items.add(finalFile);

                // ✅ Preview
                const reader = new FileReader();
                reader.onload = function (event) {
                    const imgDiv = document.createElement("div");
                    imgDiv.classList.add("image", "previewImage", "ms-2", "mt-2");
                    imgDiv.style.backgroundImage = `url(${event.target.result})`;
                    imgDiv.style.width = "120px";
                    imgDiv.style.height = "120px";
                    imgDiv.style.backgroundSize = "cover";
                    imgDiv.style.borderRadius = "8px";
                    newPreviewContainer.appendChild(imgDiv);
                };
                reader.readAsDataURL(finalFile);
            }

            input.files = dataTransfer.files;
        });

        async function compressToUnder1MB(file) {
            let quality = 0.8;
            let maxWidth = 1920;
            let compressed = file;

            while (compressed.size > 1024 * 1024) {
                compressed = await compressImage(compressed, quality, maxWidth);
            

                if (compressed.size <= 1024 * 1024) break;

                // Lower quality first
                if (quality > 0.3) {
                    quality -= 0.1;
                } else if (maxWidth > 640) {
                    // If quality is already low, reduce resolution too
                    maxWidth -= 320;
                } else {
                    // Last fallback → convert to WebP (super compression)
                    compressed = await convertToWebP(compressed, 0.7);
                    break;
                }
            }

            return compressed;
        }

        function compressImage(file, quality, maxWidth) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                        let newWidth = img.width;
                        let newHeight = img.height;

                        if (img.width > maxWidth) {
                            const scale = maxWidth / img.width;
                            newWidth = maxWidth;
                            newHeight = img.height * scale;
                        }

                        const canvas = document.createElement('canvas');
                        canvas.width = newWidth;
                        canvas.height = newHeight;

                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, newWidth, newHeight);

                        canvas.toBlob((blob) => {
                            resolve(new File([blob], file.name, { type: file.type, lastModified: Date.now() }));
                        }, file.type, quality);
                    };
                };
            });
        }

        function convertToWebP(file, quality = 0.7) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                        const canvas = document.createElement('canvas');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);

                        canvas.toBlob((blob) => {
                            resolve(new File([blob], file.name.replace(/\.[^/.]+$/, ".webp"), { type: "image/webp", lastModified: Date.now() }));
                        }, "image/webp", quality);
                    };
                };
            });
        }
    });
});
</script>
