<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhatsappStore extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, BelongsToTenant;

    const LOGO = 'whatsapp-logo';
    const COVER_IMAGE = 'whatsapp-cover-image';
    const COVER_VIDEO = 'whatsapp-cover-video';
    const EXTRA_COVER_IMAGES = 'extra-cover-images'; // ✅ define constant

    protected $fillable = [
        'url_alias',
        'store_name',
        'region_code',
        'whatsapp_no',
        'address',
        'store_id',
        'tenant_id',
        'template_id',
        'offer_text',
        'about_us',
        'privacy_policy',
        'terms_conditions',
        'shipping_payment_policy',
        'refunds_cancellation',  
        'youtube_banner_url',
        'footer_text',
        'contact_us',
        'is_full_screen',
        'is_rental',
        'is_auto_scroll',
        'minimum_order_amount',
        'courier_charge',

        'site_title',
        'home_title',
        'meta_keyword',
        'meta_description',
        'google_analytics',   

        'custom_category',

        'wp_razorpay_enabled',
        'wp_razorpay_key',
        'wp_razorpay_secret',   
        'payment_methods',
        'is_show_razorpay',   
        
        'meta_pixel',
        'product_gride',
        'image_show',  
        'dis_perc',
        
        'dropdown_settings',

        'theme_settings',
        'mobile_discount_settings'
    ];

    protected $appends = [
        'logo_url',
        'cover_url',
        'video_cover_url',
        'extra_cover_images_url', // ✅ fixed comma missing
    ];

    public function getLogoUrlAttribute()
    {
        $media = $this->getMedia(self::LOGO)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('images/default-logo.png');
    }

    public function getCoverUrlAttribute()
    {
        $media = $this->getMedia(self::COVER_IMAGE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('images/default-cover.png');
    }

    public function getExtraCoverImagesUrlAttribute()
    {
        $mediaItems = $this->getMedia(self::EXTRA_COVER_IMAGES);
        return $mediaItems->map(function ($media) {
            return $media->getFullUrl();
        })->toArray();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::EXTRA_COVER_IMAGES)
            ->useDisk(config('app.media_disc'));
    }


    public function template()
    {
        return $this->belongsTo(WpStoreTemplate::class, 'template_id');
    }

    public function products()
    {
        return $this->hasMany(WhatsappStoreProduct::class, 'whatsapp_store_id');
    }
    
    public function socialLink()
    {
        return $this->hasOne(WpSocialLinks::class, 'wp_store_id');
    }

    public function getVideoCoverUrlAttribute()
    {
        $media = $this->getMedia(self::COVER_VIDEO)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return '';
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'whatsapp_store_id')
        ->orderByRaw('CASE WHEN position_set = 0 THEN 1 ELSE 0 END')
        ->orderBy('position_set');
    }
    public static $rules = [
        'url_alias' => 'required|string|min:3|max:100|unique:whatsapp_stores,url_alias',
        'store_name' => 'required',
        'region_code' => 'required',
        'whatsapp_no' => 'required|numeric',
        'logo' => 'file|image|mimes:jpg,png,jpeg|max:1024', // Max 1MB
        'cover_img' => 'file|image|mimes:jpg,png,jpeg|max:1024', // Max 1MB
        'cover_video'  => 'nullable|file|mimetypes:video/mp4|max:10240',
        'extra_cover_img.*' => 'nullable|image|mimes:jpeg,png,jpg|max:3024',
    ];
}
