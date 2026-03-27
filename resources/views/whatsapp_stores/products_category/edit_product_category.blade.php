<div class="modal fade" id="editProductCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.whatsapp_stores.edit_product_category') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductCategoryForm">
                    <input type="hidden" value="{{ $whatsappStore->id }}" name="whatsappStoreId">
                    <input type="hidden" name="productCategoryId" id="editProductCategoryId">
                    <div class="form-group">
                        <label class="form-label required">{{ __('messages.common.name') . ':' }}</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="{{ __('messages.whatsapp_stores.category_placeholder') }}" id="editProductCategoryName" required>
                    </div>
                    
                        <div class="form-group mt-5">
                            <label class="form-label required">Category Position</label>
                            <input type="text" class="form-control" name="position_set"
                                placeholder="Enter category position number" id="editProductPositionSet" required>
                        </div>
                    
                    <div class="mb-3 mt-5" io-image-input="true">
                        <label for="editProductCategoryPreview" class="form-label">{{ __('messages.vcard.image') . ':' }}</label>
                    <span data-bs-toggle="tooltip" data-placement="top"
                        data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                        <i class="fas fa-question-circle ml-1 general-question-mark"></i>
                    </span>
                        <div class="d-block">
                            <div class="image-picker">
                                <div class="image previewImage" id="editProductCategoryPreview">
                                </div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                    data-placement="top" data-bs-original-title="{{ __('messages.tooltip.image') }}">
                                    <label>
                                        <i class="fa-solid fa-pen"></i>
                                        <input type="file" id="image" name="image"
                                            class="image-upload file-validation d-none"  accept="image/*" />
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="editProductCategorySave" class="btn btn-primary m-0">{{ __('crud.save') }}
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
        const editInput = document.querySelector('#editProductCategoryPreview')
            ?.closest('.image-picker')
            ?.querySelector('input[type="file"][name="image"]');

        if (!editInput) return;

        editInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const maxFileSizeBytes = 1 * 1024 * 1024; // 1MB
            const maxWidth = 800;
            const quality = 0.7;
            const preview = document.getElementById('editProductCategoryPreview');

            if (file.size <= maxFileSizeBytes) {
                const objectURL = URL.createObjectURL(file);
                preview.style.backgroundImage = `url(${objectURL})`;
                return;
            }

            const reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    let width = img.width;
                    let height = img.height;

                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob(function (blob) {
                        const compressedFile = new File([blob], file.name, { type: file.type });
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(compressedFile);
                        editInput.files = dataTransfer.files;

                        const objectURL = URL.createObjectURL(blob);
                        preview.style.backgroundImage = `url(${objectURL})`;
                    }, file.type, quality);
                };
            };
        });
    });
</script>