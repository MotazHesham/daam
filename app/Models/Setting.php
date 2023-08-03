<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'logo',
        'chairman_image',
        'about_image',
        'vision_image',
        'mission_image',
        'profile',
        'iskan_info',
        'iskan_tutorial',
    ];

    protected $fillable = [
        'website_name',
        'email',
        'phone_number',
        'facebook',
        'instagram',
        'address',
        'description',
        'vision',
        'mission',
        'whatsapp',
        'twitter',
        'divorced_count',
        'widow_count',
        'child_count',
        'unit_count',
        'building_count',
        'beneficiary_count',
        'chairman_description',
        'iskan_description',
        'iskan_terms',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getChairmanImageAttribute()
    {
        $file = $this->getMedia('chairman_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getAboutImageAttribute()
    {
        $file = $this->getMedia('about_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getVisionImageAttribute()
    {
        $file = $this->getMedia('vision_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getMissionImageAttribute()
    {
        $file = $this->getMedia('mission_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getProfileAttribute()
    {
        return $this->getMedia('profile')->last();
    }

    public function getIskanInfoAttribute()
    {
        return $this->getMedia('iskan_info')->last();
    }

    public function getIskanTutorialAttribute()
    {
        return $this->getMedia('iskan_tutorial')->last();
    }
}
