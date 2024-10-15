<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VolunteerTask extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'volunteer_tasks';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const VISIT_TYPE_SELECT = [
        'قسم الاسكان'  => 'قسم الاسكان',
        'لجنة التسكين' => 'لجنة التسكين',
    ];

    public const STATUS_SELECT = [
        'pending' => 'قيد الانتظار',
        'working' => 'قيد التنفيذ',
        'done'    => 'تم الانتهاء',
        'cancel'  => 'تم الالغاء',
    ];

    protected $fillable = [
        'volunteer_id',
        'name',
        'address',
        'phone',
        'details',
        'visit_type',
        'date',
        'arrive_time',
        'leave_time',
        'status',
        'cancel_reason',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
