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

class Beneficiary extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'beneficiaries';

    protected $appends = [
        'attachments',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MARRIGE_STATUS_SELECT = [
        'أرملة' => 'أرملة',
        'مطلقة' => 'مطلقة',
    ];

    public const STATUS_SELECT = [
        'specialist' => 'اخصائية',
        'manager'    => 'مدير القسم',
        'money'      => 'مالية',
        'done'       => 'انتهاء',
        'cancel'     => 'الغاء',
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'identity_num',
        'marrige_status',
        'needs_title',
        'needs',
        'age',
        'status',
        'user_id',
        'donation_id',
        'date',
        'amount',
        'notes',
        'cancel_reason',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donation()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }
}
