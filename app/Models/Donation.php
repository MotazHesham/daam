<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'donations';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TARGET_SELECT = [
        'widow'    => 'أرامل وأبنائهن',
        'divorced' => 'مطالقات وأبنائهن',
    ];
    public const EXPENSES_TYPE_SELECT = [
        'flat'    => 'قيمة',
        'percent' => 'نسبة',
    ];

    protected $fillable = [
        'company_name',
        'date',
        'amount',
        'expenses',
        'expenses_type',
        'total',
        'type',
        'exchange_period',
        'target',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'zakat'   => 'زكاة',
        'sdka'    => 'صدقة',
        'kfala'   => 'كفالة',
        'program' => 'برنامج',
        'waqf'    => 'وقف',
        'other'   => 'أخري',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    } 

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    
    public function beneficiaries(){
        return $this->hasMany(Beneficiary::class);
    }
}
