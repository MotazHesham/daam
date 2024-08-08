<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireCourse extends Model
{

    public $table = 'questionnaire_courses';

    protected $dates = [
        'created_at',
        'updated_at', 
    ];

    const COURSE_TYPE = [
        '1' => 'تقييم دورة تدريبية بمكتب التطوير المؤسسي',
        '2' => 'تقييم دورة تدريبية بمكتب التطوير المؤسسي قسم الجودة',
    ];

    protected $fillable = [
        'course_type',
        'course_name',
        'trainer',
        'date',
        'job', 
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
        'question_11',
        'question_12',
        'question_13',
        'question_14',
        'question_15',
        'question_16',
        'question_17',
        'suggestion', 
        'updated_at',
        'deleted_at',
    ];
    
    public const ANSWER_SELECT = [
        1 => 'ضعيف',
        2 => 'مقبول',
        3 => 'جيد',
        4 => 'جيد جدا',
        5 => 'ممتاز',
    ];
    public const Q_SELECT = [ 
        'question_1' => 'المدرب	التزم المدرب بالحضور في مواعيده المحددة',
        'question_2' => 'عرض المدرب المادة التدريبية وقدمها بصورة جيدة',
        'question_3' => 'انعكست خبرة المدرب على أدائه',
        'question_4' => 'استخدم المدرب أساليب تدريبية متنوعة بمهارة',
        'question_5' => 'سيطر المدرب جيداً على سير العملية التدريبية',
        'question_6' => 'يتقبل المدرب الاقتراحات والنقد',

        'question_7' => 'المادة التدريبية واضحة ومفهومة',
        'question_8' => 'غطت المادة التدريبية موضوعات الدورة',
        'question_9' => 'محتويات الدورة منظمة ومترابطة وغير متكررة',
        'question_10' => 'المادة التدريبية مطبوعة بجودة عالية',

        'question_11' => 'كان مستوى المتدربين العلمي والوظيفي متقارب',
        'question_12' => 'سادت المشاركة الجماعية والتفاعل أجواء التدريب',

        'question_13' => 'كانت قاعة التدريب مناسبة',
        'question_14' => 'كانت التسهيلات المقدمة حسب المستوى المطلوب',
        'question_15' => 'كانت الأجهزة والمعدات اللازمة للدورة متوفرة وملائمة',

        'question_16' => 'حققت الدورة توقعات المتدربات منها',
        'question_17' => 'بشكل عام، يمكن القول أن الدورة كانت جيدة',
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
}