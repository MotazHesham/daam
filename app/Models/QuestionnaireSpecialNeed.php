<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireSpecialNeed extends Model
{
    use HasFactory;
    public $table = 'questionnaire_special_needs';

    protected $fillable = [
        'name',
        'phone',
        'marige_status',
        'relation',
        'has_special_needs',
        'age_range',
        'special_need_education',
        'special_need_type'
    ];
    
    public const AGE_RANGE_SELECT = [
        'under_18' => 'أقل من 18 سنة',
        '18_35' => '18-35 سنة',
        '35_50' => '35-50 سنة', 
    ];

    public const SPECIAL_NEED_EDUCATION_SELECT = [
        'master_or_doctorate' => 'دراسات عليا ماجستير او دكتوراه',
        'bachelor' => 'بكالوريس',
        'high_school' => 'ثانويه عامة',
        'middle_school' => 'المتوسطه',
        'elementary_school' => 'الابتدائيه',
        'non_literate' => 'غير متعلم',
    ];

    public const MARIGE_STATUS_SELECT = [ 
        'single' => 'مطلقة',
        'widowed' => 'ارملة',
    ];

    public const HAS_SPECIAL_NEEDS_SELECT = [
        1 => 'نعم',
        0 => 'لا',
    ];

    public const RELATION_SELECT = [
        'son' => 'ابن',
        'daughter' => 'ابنة',
        'self' => 'انتي بنفسك', 
    ];
}
