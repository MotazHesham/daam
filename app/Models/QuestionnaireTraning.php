<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireTraning extends Model
{

    public $table = 'questionnaire_traning';

    protected $dates = [
        'created_at',
        'updated_at', 
    ];

    protected $fillable = [
        'name',
        'job',
        'job_address',
        'program_name',
        'date_joinned',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
        'question_11',
        'suggestion', 
        'updated_at',
        'deleted_at',
    ];
    public const Q_SELECT = [
        'question_6'   => 'تطور مهارة وقدرة المتدربة في مجال عملها',
        'question_7'   => 'القدرة على تطوير آليات جديدة تساهم في تطوير بيئة العمل',
        'question_8' => 'تحفيز المتدربة على نقل المعرفة للزميلات في مجال العمل',
        'question_9' => 'تحسن الفهم والادراك للمهام والواجبات الوظيفية',
        'question_10' => 'زيادة الرغبة في حضور برامج مشابهة', 
    ]; 

    public const ANSWER_SELECT = [
        1 => 'غير موافق بشدة',
        2 => 'غير موافق',
        3 => 'محايد',
        4 => 'أوافق',
        5 => 'أوافق وبشدة',
    ];
    
    public const Q_11_SELECT = [
        '1'   => 'عدم وجود معوقات',
        '2'   => 'عدم توفر الموارد لتطبيق ماتم اكتسابه من المعارف والمهارات',
        '3' => 'عدم ملائمة البرنامج لمجال العمل',
        '4' => 'أخرى', 
    ]; 

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getDateJoinnedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateJoinnedAttribute($value)
    {
        $this->attributes['date_joinned'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}