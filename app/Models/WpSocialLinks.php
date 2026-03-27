<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WpSocialLinks extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'wp_social_links';

    /**
     * @var string[]
     */
    protected $fillable = [
        'wp_store_id',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'tumblr',
        'reddit',
        'linkedin',
        'whatsapp',
        'pinterest',
        'tiktok',
        'snapchat',
    ];

    protected $casts = [
        'wp_store_id' => 'integer',
        'website' => 'string',
        'twitter' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'youtube' => 'string',
        'tumblr' => 'string',
        'reddit' => 'string',
        'linkedin' => 'string',
        'whatsapp' => 'string',
        'pinterest' => 'string',
        'tiktok' => 'string',
        'snapchat' => 'string',
    ];

    protected $appends = ['social_icon'];

    const SOCIAL_ICON = 'icon';

    public function whatsappStore(): BelongsTo
    {
        return $this->belongsTo(WhatsappStore::class, 'wp_store_id');
    }

    public function getSocialIconAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::SOCIAL_ICON)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('web/media/avatars/user.png');
    }

    public function icon()
    {
        return $this->hasMany(SocialIcon::class, 'social_link_id');
    }
}

