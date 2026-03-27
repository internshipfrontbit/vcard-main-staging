<div class="row social-links-add">
    {{ Form::label('social-links', __('messages.feature.social_links').':', ['class' => 'form-label']) }}
    <div class="col-lg-6 mb-7 mt-1">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fas fa-globe fa-2x text-primary mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('website', $setting->website, ['class' => 'form-control', 'placeholder' => __('messages.form.website')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-sm-0 p-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 448 512" width="30"
                    height="30">
                    <path
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z" />
                </svg>
            </div>
            <div class="col-sm-11">
                {!! Form::text('twitter', $setting->twitter, ['class' => 'form-control', 'placeholder' => __('messages.form.twitter')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-facebook-square fa-2x text-primary mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('facebook', $setting->facebook, ['class' => 'form-control', 'placeholder' => __('messages.form.facebook')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-instagram fa-2x text-danger mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('instagram', $setting->instagram, ['class' => 'form-control', 'placeholder' => __('messages.form.instagram')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-youtube fa-2x text-danger mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('youtube', $setting->youtube, ['class' => 'form-control', 'placeholder' => __('messages.form.youtube')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-tumblr-square fa-2x text-dark mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('tumblr', $setting->tumblr, ['class' => 'form-control', 'placeholder' => __('messages.form.tumblr')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-reddit-alien fa-2x text-danger mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('reddit', $setting->reddit, ['class' => 'form-control', 'placeholder' => __('messages.form.reddit')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-linkedin fa-2x text-primary mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('linkedin', $setting->linkedin, ['class' => 'form-control', 'placeholder' => __('messages.form.linkedin')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-whatsapp fa-2x text-success mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('whatsapp', $setting->whatsapp, ['class' => 'form-control', 'placeholder' => __('messages.form.whatsapp')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-pinterest fa-2x text-danger mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('pinterest', $setting->pinterest, ['class' => 'form-control', 'placeholder' => __('messages.form.pinterest')]) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="row">
            <div class="col-sm-1 mb-3 mb-sm-0">
                <i class="fab fa-tiktok fa-2x text-danger mt-3 me-3"></i>
            </div>
            <div class="col-sm-11">
                {!! Form::text('tiktok', $setting->tiktok, ['class' => 'form-control', 'placeholder' => __('messages.form.tiktok')]) !!}
            </div>
        </div>
    </div>
    <div class="d-flex">
        <button class="btn btn-primary me-3" onclick="saveSocialMediaLinks({{$whatsappStore->id}})">Save</button>
        <a href="" type="reset" class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>