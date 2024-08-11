<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireVolunteer extends Model
{

    public $table = 'questionnaire_volunteers';

    protected $dates = [
        'created_at',
        'updated_at', 
    ];

    protected $fillable = [ 
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9', 
        'suggestion', 
        'updated_at',
        'deleted_at',
    ];

    public const ANSWER_SELECT = [
        1 => 'غير راضي',
        2 => 'محايد',
        3 => 'راضي', 
    ];
    public const Q_SELECT = [
        'question_1' => 'ما مدى رضاك عن إعلان الجمعية عن الفرص التطوعية المتوفرة لديها ؟',
        'question_2' => 'ما مدى رضاك عن تحفيز وتشجيع الجمعية للمتطوعين ؟',
        'question_3' => 'ما مدى رضاك عن تعامل الموظفين والادارة مع المتطوعين ؟',
        'question_4' => 'مدى سهولة الانضمام للفرصة ؟',
        'question_5' => 'الارشاد والتوجيه ومتابعة اجراءات التسجيل في الفرصة التطوعية ؟',
        'question_6' => 'مدى حرص مسؤول التطوع على الإجابة عن اسئلتك ؟',
        'question_7' => 'مدى استفادتكم من هذه الفرصة التطوعية ؟',
        'question_8' => 'مدى رضاك عن أداء القائمين على الفرصة ؟',
        'question_9' => 'مدى رغبتك في تكرار تجربة التطوع لدى دعم مستقبلا ؟', 
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}