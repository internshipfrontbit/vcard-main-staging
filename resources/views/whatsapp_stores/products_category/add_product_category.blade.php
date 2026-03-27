<div class="modal fade" id="addProductCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.whatsapp_stores.new_product_category') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="whatsappStoreProductCategoryForm">
                    <input type="hidden" value="{{ $whatsappStore->id }}" name="whatsappStoreId">
                    <div class="form-group">
                        <label class="form-label required">{{ __('messages.common.name') . ':' }}</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="{{ __('messages.whatsapp_stores.category_placeholder') }}" required>
                    </div>
                    
                        <div class="form-group mt-5">
                            <label class="form-label required">Category Position</label>
                            <input type="text" class="form-control" name="position_set"
                                placeholder="Enter category position number" required>
                        </div>
                    
                    <div class="mb-3 mt-5" io-image-input="true">
                        <label for="productCategoryPreview" class="form-label">{{ __('messages.vcard.image') . ':' }}</label>
                        <span data-bs-toggle="tooltip" data-placement="top"
                            data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                            <i class="fas fa-question-circle ml-1 general-question-mark"></i>
                        </span>
                        <div class="d-block">
                            <div class="image-picker">
                                <input type="hidden" id="categoryDefaultImage" value="{{ asset('images/category.png') }}">
                                <div class="image previewImage" id="productCategoryPreview" style="background-image: url({{ asset('images/category.png') }})" >
                                </div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                    data-placement="top" data-bs-original-title="{{ __('messages.tooltip.image') }}">
                                    <label>
                                        <i class="fa-solid fa-pen"></i>
                                        <input type="file" id="image" name="image"
                                            class="image-upload file-validation d-none" accept="image/*" />
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="productCategorySave" class="btn btn-primary m-0">{{ __('crud.save') }}
                </button>
                </form>
                <button class="btn btn-secondary my-0 ms-5 me-0"
                    data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('#image').addEventListener('change', function (event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        if (!file) return;

        const maxFileSizeBytes = 1 * 1024 * 1024; // 1MB
        const maxWidth = 800; // Resize width limit

        if (file.size <= maxFileSizeBytes) {
            // Directly show preview if file is under 1MB
            const previewDiv = document.getElementById('productCategoryPreview');
            const objectURL = URL.createObjectURL(file);
            previewDiv.style.backgroundImage = `url(${objectURL})`;
            return;
        }

        // Start compression for images over 1MB
        const reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function (readerEvent) {
            const img = new Image();
            img.src = readerEvent.target.result;

            img.onload = function () {
                const canvas = document.createElement('canvas');
                let width = img.width;
                let height = img.height;

                if (width > maxWidth) {
                    height *= maxWidth / width;
                    width = maxWidth;
                }

                canvas.width = width;
                canvas.height = height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, width, height);

                canvas.toBlob(function (blob) {
                    const compressedFile = new File([blob], file.name, { type: file.type });

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(compressedFile);
                    fileInput.files = dataTransfer.files;

                    // Update preview with compressed version
                    const previewDiv = document.getElementById('productCategoryPreview');
                    const objectURL = URL.createObjectURL(blob);
                    previewDiv.style.backgroundImage = `url(${objectURL})`;
                }, file.type, 0.7); // Compression quality
            };
        };
    });
</script>

