<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'report_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'yearly'        => 'تقارير سنوية',
        'money'         => 'تقارير مالية',
        'questionnaire' => 'استبيانات',
    ];

    protected $fillable = [
        'type',
        'name',
        'published',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function reports(){
        return $this->hasMany(Report::class,'category_id');
    }
}
