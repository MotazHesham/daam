<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Mempership extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'memperships';

    protected $appends = [
        'identity_photo',
        'receipt_photo',
    ];

    protected $dates = [
        'birth_date',
        'identity_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'last_name',
        'birth_place',
        'birth_date',
        'identity_num',
        'identity_from',
        'identity_date',
        'city',
        'district',
        'street',
        'address',
        'qualification',
        'job',
        'job_company',
        'other_jobs',
        'phone',
        'phone_2',
        'postal_box',
        'postal_code',
        'email',
        'certificate_sent',
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

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIdentityDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIdentityDateAttribute($value)
    {
        $this->attributes['identity_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIdentityPhotoAttribute()
    {
        return $this->getMedia('identity_photo')->last();
    }

    public function getReceiptPhotoAttribute()
    {
        return $this->getMedia('receipt_photo')->last();
    }
}