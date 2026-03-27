<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhatsappStoreProduct extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, BelongsToTenant;

    const PRODUCT_IMAGES = 'product-image';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'selling_price',
        'net_price',
        'currency_id',
        'whatsapp_store_id',
        'tenant_id',
        'total_stock',
        'available_stock',
        'color',
        'sizes',
        'youtube_link',
        'affiliate_url',
        'cartoon_qty',
        'html_code',
        'p_code',
        'atribute_title',
        'p_brand',
        'attributes',
        'dis_amt',
        'order_qty',
        'qty_price',
        'dis_qty',
        'dis_free',
        'dis_text',
        'position'
    ];

    protected $appends = [
        'images_url',
    ];

public function getImagesUrlAttribute()
{
    $mediaItems = $this->getMedia(self::PRODUCT_IMAGES);

    if ($mediaItems->isEmpty()) {
        // Return default image URL when no image is uploaded
        return [asset('images/default-product.png')]; // Change path as needed
    }

    return $mediaItems->map(function ($media) {
        return $media->getFullUrl();
    })->toArray();
}

    static $rules = [
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:product_categories,id',
        'currency_id' => 'required|exists:currencies,id',
        'total_stock' => 'required',
        'images' => 'array|min:1',
        'images.*' => 'image|mimes:jpg,png,jpeg,webp|max:10048'
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::PRODUCT_IMAGES)
            ->useDisk(config('app.media_disc'));
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function whatsappStore()
    {
        return $this->belongsTo(WhatsappStore::class);
    }

    public function ordersItems()
    {
        return $this->hasMany(WpOrderItem::class, 'product_id');
    }
}