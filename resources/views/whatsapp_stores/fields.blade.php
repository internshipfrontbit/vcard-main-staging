<?php ?>
@if ($partName == 'basics')
    @if (isset($whatsappStore))
        {!! Form::open([
            'route' => ['whatsapp.stores.update', $whatsappStore->id],
            'method' => 'post',
            'files' => 'true',
            'id' => 'whatsappStoreForm'
        ]) !!}
    @endif
    <style>
        .visibility-hidden{
            display: none;
        }
        

    .instagram-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
      border: none;
      color: white;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      width: fit-content;
      white-space: nowrap;
      margin-top: 50px;
    }

    .instagram-btn:hover {
      transform: scale(1.05);
    }

    .instagram-icon {
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }
    
    .iti__flag {
  background-image: url('https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/img/flags.png') !important;
  background-size: 5652px 15px;
  background-repeat: no-repeat;
}
        
    </style>
    <input type="hidden" name="part" value="{{ $partName }}">
    <div class="container-fluid">
        <div class="row" id="basic">
            <div class="col-lg-6 mb-7">
                {{ Form::label('url_alias', __('messages.whatsapp_stores.store_unique_alias') . ':', ['class' => 'form-label required']) }}
                <div class="d-sm-flex">
                    <div class="input-group">
                        {{ Form::text('url_alias', isset($whatsappStore) ? $whatsappStore->url_alias : null, array_merge([
                            'class' => 'form-control ms-1 vcard-url-alias',
                            'id' => 'vcard-url-alias',
                            'placeholder' => 'your-business-name',
                            'onblur' => 'formatUrlAlias(this)',
                        ], (!empty($whatsappStore->url_alias) ? ['readonly' => 'readonly'] : []))) }}
                        
                        <script>
                            function formatUrlAlias(input) {
                                if (!input.readOnly) {
                                    let formatted = input.value.toLowerCase().trim().replace(/\s+/g, '-');
                                    input.value = formatted;
                                }
                            }
                        </script>
                         @if(isset($whatsappStore))
                            @php
                                $storeUrl = url("store/{$whatsappStore->url_alias}");
                            @endphp
                            <a class="btn btn-primary fs-6 text-white text-decoration-none mt-0" style="margin-right: 2px" href="https://qrcode.vcardking.com/?{{$storeUrl}}"
                                target="_blank">
                                
                                <img src="{{ asset('assets/images/qr.png') }}" width="16px" height="16px">
                            </a>
                        @endif
                        @if(isset($whatsappStore))
                            @php
                                $storeUrl = url("store/{$whatsappStore->url_alias}");
                            @endphp
                            <a class="btn btn-primary fs-6 text-white text-decoration-none mt-0" href="{{$storeUrl}}"
                                target="_blank">
                                
                                <img src="{{ asset('images/new-tab.svg') }}" width="16px" height="16px">
                            </a>
                        @endif
                            
                            <!--<button class="btn btn-secondary" type="button" id="generate-url-alias">-->
                            <!--    <i class="fa-solid fa-arrows-rotate"></i>-->
                            <!--</button>-->
                        
                    </div>
                </div>
                <p style="margin-bottom: 0px;margin-top: 10px;font-weight: 500;" class="text-secondary">*This is your website DOAMIN – not changeable later.</p>
                <div id="error-url-alias-msg" class="text-danger ms-2 fs-6 d-none fw-light">
                    {{ __('messages.vcard.already_alias_url') }}
                </div>
            </div>
            <div class="col-lg-6 mb-7">
                {{ Form::label('store_name', __('messages.whatsapp_stores.store_name') . ':', ['class' => 'form-label required']) }}
                {{ Form::text('store_name', isset($whatsappStore) ? $whatsappStore->store_name : null, ['class' => 'form-control ', 'placeholder' => __('messages.whatsapp_stores.store_name'), 'required']) }}
            </div>
            <div class="col-lg-6">
                <div class="form-group  mb-7">
                    {{ Form::label('whatsapp_no', __('messages.whatsapp_stores.whatsapp_no') . ':', ['class' => 'form-label required']) }}
                    {{ Form::text('whatsapp_no', isset($whatsappStore) ? (isset($whatsappStore->region_code) ? '+' . $whatsappStore->region_code . '' . $whatsappStore->whatsapp_no : $whatsappStore->whatsapp_no) : null, ['class' => 'form-control', 'placeholder' => __('messages.whatsapp_stores.whatsapp_no'), 'id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                    {{ Form::hidden('region_code', isset($whatsappStore) ? $whatsappStore->region_code : null, ['id' => 'prefix_code']) }}
                    <div class="mt-2">
                        <span id="valid-msg"
                            class="text-success d-none fw-400 fs-small mt-2">{{ __('messages.placeholder.valid_number') }}</span>
                        <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">Invalid
                            Number</span>
                    </div>
                </div>
                <div class="mb-7">
                    {{ Form::label('address', __('messages.setting.address') . ':', ['class' => 'form-label required']) }}
                    {{ Form::textarea('address', isset($whatsappStore) ? $whatsappStore->address : null, ['class' => 'form-control ', 'placeholder' => __('messages.setting.address'), 'required', 'rows' => 4]) }}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-7 {{ isset($whatsappStore) ? '' : 'visibility-hidden'  }}">
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage"
                        class="form-label">{{ __('messages.nfc.logo') . ':' }}</label>
                    <span data-bs-toggle="tooltip" data-placement="top"
                        data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                        <i class="fas fa-question-circle ml-1 general-question-mark"></i>
                    </span>
                    <div class="d-block">
                        <div class="image-picker">
                            <div class="image previewImage" id="exampleInputImage"
                                style="background-image: url('{{ !empty($whatsappStore->logo_url) ? $whatsappStore->logo_url : '' }}')">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                data-placement="top"
                                data-bs-original-title="{{ __('messages.whatsapp_stores.change_logo') }}">
                                <label>
                                    <i class="fa-solid fa-pen"></i>
                                    <input type="file" id="logo" name="logo"
                                        class="image-upload file-validation d-none" accept="image/*" />
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-7 {{ isset($whatsappStore) ? '' : 'visibility-hidden'  }}">
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage"
                        class="form-label">{{ __('messages.vcard.cover_image') . ':' }}</label>
                    <span data-bs-toggle="tooltip" data-placement="top"
                        data-bs-original-title="{{ __('messages.tooltip.app_logo') }}">
                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                    </span>
                    <div class="d-block">
                        <div class="images-picker">
                            <div class="image previewImage" id="coverPreview"
                                style="background-image: url('{{ !empty($whatsappStore->cover_url) ? $whatsappStore->cover_url : '' }}');">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                data-placement="top" data-bs-original-title="Best resolution for this image will be 1200 x 600">
                                <label>
                                    <i class="fa-solid fa-pen click-image" id="profileImageIcon"></i>
                                    <input type="file" id="coverImg" name="cover_img" class="d-none"
                                        accept="image/*, video/*" />
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-text">{{ __('messages.allowed_file_types') }}</div>
            </div>
            
            
            @if(isset($whatsappStore) && $whatsappStore->id == 344)
                <div class="col-lg-3 col-sm-6 mb-7">
                    <div class="mb-3" io-video-input="true">
                        <label for="coverVideo" class="form-label required">
                            {{ 'Cover video' . ':' }}
                        </label>
                        <span data-bs-toggle="tooltip" data-placement="top"
                              data-bs-original-title="{{ 'Cover video' }}">
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                        </span>
                        
                        <div class="d-block">
                            <div class="video-picker position-relative border rounded" style="height: 180px; background: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                                <video id="coverVideoPreview" width="100%" height="180" style="display: {{ !empty($whatsappStore->cover_video_url) ? 'block' : 'none' }};" controls>
                                    @if (!empty($whatsappStore->cover_video_url))
                                        <source src="{{ $whatsappStore->cover_video_url }}" type="video/mp4">
                                    @endif
                                    Your browser does not support the video tag.
                                </video>
                
                                @if (empty($whatsappStore->cover_video_url))
                                    <i class="fas fa-video fa-3x text-muted" id="videoPlaceholderIcon"></i>
                                @endif
                
                                <span class="picker-edit position-absolute bottom-0 end-0 m-2 rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                      data-placement="top" data-bs-original-title="{{ 'Upload Cover Video' }}">
                                    <label>
                                        <i class="fa-solid fa-pen click-image" id="profileImageIconNew"></i>
                                        <input type="file" id="coverVideo" name="cover_video" class="d-none"
                                               accept="video/mp4" onchange="previewCoverVideo(this)" />
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">allowed_file_types: (MP4, max 10MB)</div>
                </div>
            @endif

            <div class="d-flex">
                {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'vcardSaveBtn']) }}
                <a href="{{ route('whatsapp.stores') }}"
                    class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
            </div>
            <script>
                document.getElementById('vcardSaveBtn').addEventListener('click', function (e) {
                    // Trigger blur on all input/select/textarea fields inside the form
                    const form = document.getElementById('whatsappStoreForm');
                    const fields = form.querySelectorAll('input, select, textarea');
                
                    fields.forEach(field => field.blur());
                
                    // Allow time for onBlur handlers to execute (if needed)
                    setTimeout(() => {
                        form.submit(); // manually submit after all blur events
                    }, 50);
                
                    // Prevent default auto-submit for now
                    e.preventDefault();
                });
                </script>
            @if(isset($whatsappStore) && $whatsappStore->id == 461)    
            <div class="d-flex" style="justify-content: center;">
              <a href="#" class="instagram-btn">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" class="instagram-icon" alt="Instagram Icon" />
                Login with Instagram
              </a>
            </div>                
             @endif    
        </div>
    </div>
    <script>
    function previewCoverVideo(input) {
        const file = input.files[0];
        const preview = document.getElementById('coverVideoPreview');
        const placeholderIcon = document.getElementById('videoPlaceholderIcon');

        if (file && file.type === 'video/mp4') {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.style.display = 'block';
                preview.src = e.target.result;
                if (placeholderIcon) {
                    placeholderIcon.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        } else {
            input.value = ''; // Reset the input
        }
    }
    </script>

    {{ Form::close() }}
@endif

@if ($partName == 'whatsapp-template')
    <input type="hidden" id="whatsappStoreId" value="{{ $whatsappStore->id }}">
    <div class="container-fluid">
        <div class="col-lg-12 mb-3">
            <input type="hidden" name="part" value="{{ $partName }}">
            <label class="form-label required">{{ __('messages.vcard.select_template') }}
                :</label>
        </div>
        <div class="row">
            @foreach ($templates as $id => $url)
                @if($id != 6)
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-7">
                            <input type="hidden" name="template_id" id="themeInput"
                                value="{{ $whatsappStore->template_id }}" id="themeInput">
                            <div class="theme-img-radio img-thumbnail {{ $whatsappStore->template_id == $id ? 'img-border' : '' }}"
                                data-id="{{ $id }}">
                                <img src="{{ asset($url) }}" alt="Template" loading="lazy">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-lg-12 mt-2 d-flex">
            <button class="btn btn-primary me-3 wp-template-save">
                {{ __('messages.common.save') }}
            </button>
            <a href="{{ route('whatsapp.stores') }}"
                class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
        </div>
    </div>
@endif

@if ($partName == 'order-details')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="row">
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.whatsapp_stores.order_id') }}:</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->order_id }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.mail.name') }}</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->name }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.user.phone') }}:</label>
                    <span class="fs-4 text-gray-800" dir="ltr"
                        style='{{ getCurrentLanguageName() == 'ar' ? 'margin-right: 0px; margin-left: auto;"' : '' }}'>+{{ $wpOrder->region_code }}
                        {{ $wpOrder->phone }}</span>
                </div>


                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.setting.address') }}:</label>
                    <span class="fs-4 text-gray-800">{{ $wpOrder->address }}</span>
                </div>
                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                        class="pb-2 fs-4 text-gray-600">{{ __('messages.vcard.order_at') }}:</label>
                    <span class="fs-4 text-gray-800">
                        {{ getFormattedDateTime($wpOrder->created_at) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($partName == 'seo')
    <input type="hidden" id="whatsappStoreId" value="{{ $whatsappStore->id }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-7">
                {{ Form::label('Site title', __('messages.vcard.site_title') . ':', ['class' => 'form-label']) }}
                {{ Form::text('site_title', isset($whatsappStore) ? $whatsappStore->site_title : null, ['name' => 'site_title', 'class' => 'form-control', 'placeholder' => __('messages.form.site_title')]) }}
            </div>
            <div class="col-lg-6 mb-7">
                {{ Form::label('Home title', __('messages.vcard.home_title') . ':', ['class' => 'form-label']) }}
                {{ Form::text('home_title', isset($whatsappStore) ? $whatsappStore->home_title : null, ['name' => 'home_title', 'class' => 'form-control', 'placeholder' => __('messages.form.home_title')]) }}
            </div>
            <div class="col-lg-6 mb-7">
                {{ Form::label('Meta keyword', __('messages.vcard.meta_keyword') . ':', ['class' => 'form-label']) }}
                {{ Form::text('meta_keyword', isset($whatsappStore) ? $whatsappStore->meta_keyword : null, ['name' => 'meta_keyword', 'class' => 'form-control', 'placeholder' => __('messages.form.meta_keyword')]) }}
            </div>
            <div class="col-lg-6 mb-7">
                {{ Form::label('Meta Description', __('messages.vcard.meta_description') . ':', ['class' => 'form-label']) }}
                {{ Form::text('meta_description', isset($whatsappStore) ? $whatsappStore->meta_description : null, ['name' => 'meta_description', 'class' => 'form-control', 'placeholder' => __('messages.form.meta_description')]) }}
            </div>
            <style>
                
                .bg-opacity-10 {
                    bs-bg-opacity: 0.1;
                }
                .bg-info {
                    background-color: rgba(var(--bs-info-rgb), var(--bs-bg-opacity)) !important;
                }
                .rounded {
                    border-radius: 0.3125rem !important;
                }
                .gap-2 {
                    gap: .5rem !important;
                }
                .px-12 {
                    padding-inline: 0.75rem !important;
                }
                .py-10 {
                    padding-block: 0.625rem !important;
                }

                .text-info {
                    --bs-text-opacity: 1;
                    color: #598ffc !important;
                }
                .fi {
                    line-height: 1;
                }
                *, ::after, ::before {
                    box-sizing: border-box;
                }
                i {
                    font-style: italic;
                }
            </style>    
                            
            <div class="col-lg-12 mb-7">
                <div class="d-flex flex-column gap-1">
                    <label class="form-label mb-1">
                        {{ __('messages.vcard.google_analytics') }}:
                    </label>
                
                    <div class="bg-info bg-opacity-10 fs-12 px-12 py-10 text-dark rounded d-flex gap-2 align-items-center">
                        <i class="fas fa-lightbulb text-primary"></i>
                        <span>
                            How can setup google analytics? 
                            <a href="https://www.youtube.com/shorts/c0laz4Hnq_w" target="_blank"
                                class="text-decoration-underline fw-semibold">
                                Watch Now
                            </a>
                        </span>
                    </div>
                </div>

                {{ Form::textarea('google_analytics', isset($whatsappStore) ? $whatsappStore->google_analytics : null, [
                    'name' => 'google_analytics',
                    'class' => 'form-control mt-2',
                    'placeholder' => __('messages.form.google_analytics')
                ]) }}
            </div>
            
            <div class="col-lg-12 d-flex">
                <button type="submit" class="btn btn-primary me-3 wp-template-seo-save">
                    {{ __('messages.common.save') }}
                </button>
                <a href="{{ route('whatsapp.stores') }}"
                    class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
            </div>
        </div>
    </div>
@endif

<script>
    const MAX_SIZE = 1 * 1024 * 1024; // 1MB

    // Attach handler to both inputs
    document.getElementById('coverImg').addEventListener('change', (e) => handleImageChange(e, 'coverPreview'));
    document.getElementById('logo').addEventListener('change', (e) => handleImageChange(e, 'exampleInputImage'));

    async function handleImageChange(event, previewId) {
        const file = event.target.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        let finalFile = file;

        if (file.size > MAX_SIZE) {
            finalFile = await compressImage(file, 0.7);
        }

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(finalFile);
        event.target.files = dataTransfer.files;

        // Update preview
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(previewId).style.backgroundImage = `url(${e.target.result})`;
        };
        reader.readAsDataURL(finalFile);
    }

    function compressImage(file, quality = 0.7, maxWidth = 1200, maxHeight = 600) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (e) => {
                const img = new Image();
                img.src = e.target.result;
                img.onload = () => {
                    let width = img.width;
                    let height = img.height;

                    if (width > maxWidth || height > maxHeight) {
                        const scale = Math.min(maxWidth / width, maxHeight / height);
                        width *= scale;
                        height *= scale;
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob((blob) => {
                        const newFile = new File([blob], file.name, {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });
                        resolve(newFile);
                    }, 'image/jpeg', quality);
                };
            };
        });
    }
</script>

