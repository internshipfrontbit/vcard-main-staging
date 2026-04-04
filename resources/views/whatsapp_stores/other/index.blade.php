<div class="col-lg-6 mb-4">
    <!-- Offer Text -->
    <label for="offer-text" style="margin-bottom: 10px;">Offer Text</label>
    <div class="youtube-link-input-group">
        <input type="text" id="offer-text" class="form-control" placeholder="Enter Offer Text"
            value="{{ $whatsappStore->offer_text }}">
    </div>
    
        <!-- YoutubeUrl -->
    <label for="youtube-banner-url" style="margin-bottom: 10px; margin-top: 10px;">Slider Video Banner</label>
    <div class="youtube-link-input-group">
        <input type="text" id="youtube-banner-url" name="youtube_banner_url" class="form-control"
            placeholder="Enter Youtube video link"
            value="{{ $whatsappStore->youtube_banner_url }}">
        <small id="youtube-banner-url-error" class="text-danger d-none">Please enter a valid Youtube video link.</small>
    </div>
    
        <!-- Offer Text -->
    <label for="footer-text" style="margin-bottom: 10px; margin-top: 10px;">Footer Text</label>
    <div class="youtube-link-input-group">
        <input type="text" id="footer-text" class="form-control" placeholder="Enter Footer Text"
            value="{{ $whatsappStore->footer_text }}">
    </div>

    @if($whatsappStore->id == 424 || $whatsappStore->id == 721 || $whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 41 || $whatsappStore->id == 584 || $whatsappStore->id == 796 || $whatsappStore->id == 1327 || $whatsappStore->id == 1238)

    <label for="minimum-order-amount" style="margin-bottom: 10px; margin-top: 10px;">Minimum Order Amount</label>
    <div class="youtube-link-input-group">
        <input type="number" id="minimum-order-amount" class="form-control" placeholder="Enter Minimum Order Amount"
            value="{{ $whatsappStore->minimum_order_amount }}">
    </div>

    @endif

    @if($whatsappStore->id == 424 || $whatsappStore->id == 721 || $whatsappStore->id == 41 || $whatsappStore->id == 1238)

    <label for="courier-charge" style="margin-bottom: 10px; margin-top: 10px;">Courier Charge</label>
    <div class="youtube-link-input-group">
        <input type="number" id="courier-charge" class="form-control" placeholder="Enter Courier Charge"
            value="{{ $whatsappStore->courier_charge }}">
    </div>

    @endif

    
        <label for="dis-percent" style="margin-bottom: 10px; margin-top: 10px;">Discount Percentage</label>
        <div class="youtube-link-input-group">
            <input type="number" id="dis-percent" class="form-control" placeholder="Enter Discount Percentage"
                value="{{ $whatsappStore->dis_perc }}">
        </div>
    

        

@if($whatsappStore->id == 424 || $whatsappStore->id == 564 || $whatsappStore->id == 348 || $whatsappStore->id == 208 || $whatsappStore->id == 676 || $whatsappStore->id == 446 || $whatsappStore->id == 908 ||  $whatsappStore->id == 923 || $whatsappStore->id == 970 || $whatsappStore->id == 1014 || $whatsappStore->id == 1106 || $whatsappStore->id == 1209 || $whatsappStore->id == 1378 || $whatsappStore->id == 1443 || $whatsappStore->id == 1500 || $whatsappStore->id == 1444 || $whatsappStore->id == 1583)
    <!-- Extra Cover Image Upload -->
<div class="form-group mt-3">
    <label for="extra_cover_img">Extra Cover Images (Optional)</label>
    <input type="file" name="extra_cover_img[]" multiple class="form-control" accept="image/*" onchange="previewExtraImages(event,{{ $whatsappStore->id }},{{ $whatsappStore->getMedia('extra-cover-images')->count() }})">
    <small class="text-muted">Upload multiple images (jpeg/png/jpg).</small>

    @if(false) {{-- placeholder, will be shown via JS if images selected --}}
        <div>
            <label class="mt-3">Selected Image</label>
            <!-- Preview Selected Images -->
            <div id="extraImagePreview" class="d-flex flex-wrap mt-3 gap-2"></div>
        </div>
    @else
        <!-- Still render the preview container so JS can fill it -->
        <div id="extraImagePreviewContainer" style="display:none;">
            <label class="mt-3">Selected Image</label>
            <div id="extraImagePreview" class="d-flex flex-wrap mt-3 gap-2"></div>
        </div>
    @endif


    @if($whatsappStore->getMedia('extra-cover-images')->count() > 0)
    <div>
           <label class="mt-3 mb-3">Already Uploaded Images:</label>
        <div class="d-flex flex-wrap gap-2">
            @foreach($whatsappStore->getMedia('extra-cover-images') as $media)
                <div style="position: relative; display: inline-block;">
                    <img src="{{ $media->getUrl() }}" style="height: 65px; width: 130px;object-fit: contain; border: 1px solid #ccc; border-radius: 4px;" />

                    <!-- Close Icon -->
                    <span
                        onclick="deleteExtraCoverImage('{{ $media->id }}')"
                        style="
                            position: absolute;
                            top: -6px;
                            right: -6px;
                            background: red;
                            color: white;
                            border-radius: 50%;
                            width: 18px;
                            height: 18px;
                            text-align: center;
                            line-height: 18px;
                            font-size: 12px;
                            cursor: pointer;
                            font-weight: bold;
                        ">&times;</span>
                </div>
            @endforeach
        </div>     
        
        
    </div>

    @endif
</div>

@endif

    <div>  
        <button class="btn btn-primary mt-4" onclick="saveOfferText({{ $whatsappStore->id }})">Save</button>
    </div>

</div>


<script>
    document.getElementById('youtube-banner-url').addEventListener('input', function () {
        const input = this.value.trim();
        const errorEl = document.getElementById('youtube-banner-url-error');

        // Regex to match typical YouTube video URLs
const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)/;

        if (input === '' || youtubeRegex.test(input)) {
            this.classList.remove('is-invalid');
            errorEl.classList.add('d-none');
        } else {
            this.classList.add('is-invalid');
            errorEl.classList.remove('d-none');
        }
    });


function previewExtraImages(event,storeid,count) {
    const files = event.target.files;

    // Limit max selection to 4
    console.log("uploaded count: ", count)
    
    if(storeid == 715){
        if ((files.length + count) > 9) {
        alert("You can only select up to 9 images.");
        event.target.value = '';
        document.getElementById('extraImagePreview').innerHTML = '';
        document.getElementById('extraImagePreviewContainer').style.display = 'none';
        return;            
        }
        
    } else if(storeid == 970){
        if ((files.length + count) > 8) {
        alert("You can only select up to 8 images.");
        event.target.value = '';
        document.getElementById('extraImagePreview').innerHTML = '';
        document.getElementById('extraImagePreviewContainer').style.display = 'none';
        return;            
        }
        
    } else if ((files.length + count)  > 4) {
        alert("You can only select up to 4 images.");
        event.target.value = '';
        document.getElementById('extraImagePreview').innerHTML = '';
        document.getElementById('extraImagePreviewContainer').style.display = 'none';
        return;
    }

    const previewContainer = document.getElementById('extraImagePreview');
    const labelContainer = document.getElementById('extraImagePreviewContainer');
    const compressedFiles = [];

    previewContainer.innerHTML = '';

    if (files.length > 0) {
        labelContainer.style.display = 'block';

        let processed = 0;

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const handleFile = f => {
                compressedFiles.push(f);
                showPreview(f, previewContainer);
                processed++;

                // When all files processed, replace input's FileList
                if (processed === files.length) {
                    const dataTransfer = new DataTransfer();
                    compressedFiles.forEach(cf => dataTransfer.items.add(cf));
                    event.target.files = dataTransfer.files; // Replace with compressed files
                }
            };

 
            let sizeLimit = (storeid == 208) ? (3 * 1024 * 1024) : (1 * 1024 * 1024);

            if (file.size <= sizeLimit) {
                handleFile(file); // Skip compression
            } else {
                compressImage(file, 0.7, handleFile);
            }
        });
    } else {
        labelContainer.style.display = 'none';
    }
}



/**
 * Compress image file
 * @param {File} file - Original image
 * @param {Number} quality - Compression quality (0.1 - 1)
 * @param {Function} callback - Returns compressed File
 */
function compressImage(file, quality, callback) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = e => {
        const img = new Image();
        img.src = e.target.result;

        img.onload = () => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            // Resize image if larger than 1024px
            let width = img.width;
            let height = img.height;
            const maxSize = 1024;
            if (width > maxSize || height > maxSize) {
                if (width > height) {
                    height *= maxSize / width;
                    width = maxSize;
                } else {
                    width *= maxSize / height;
                    height = maxSize;
                }
            }

            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);

            canvas.toBlob(blob => {
                callback(new File([blob], file.name, {
                    type: file.type,
                    lastModified: Date.now()
                }));
            }, file.type, quality);
        };
    };
}

/**
 * Show image preview
 */
function showPreview(file, container) {
    const img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style.height = '80px';
    img.style.border = '1px solid #ccc';
    img.style.borderRadius = '4px';
    img.style.marginRight = '5px';
    container.appendChild(img);
}
    
    

</script>