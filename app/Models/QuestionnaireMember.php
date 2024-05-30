<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireMember extends Model
{

    public $table = 'questionnaire_members';

    protected $dates = [
        'created_at',
        'updated_at', 
    ];

    protected $fillable = [
        'company_name',
        'name',
        'phone',
        'email', 
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'suggestion', 
        'created_at',
        'updated_at',
    ];
    public const Q_SELECT = [
        'question_1'   => 'هل أهداف الجمعية واضحة ومحددة بشكل كاف؟', 
        'question_2'   => 'ما مدى تقييمك لأسلوب التواصل من الجمعية؟', 
        'question_3'   => 'ما مدى تقييمك لدرجة التواصل من الجمعية؟', 
        'question_4'   => 'ما درجة الاجابة على طلباتكم واستفساراتكم ومقترحاتكم', 
        'question_5'   => 'ما مدى وصول تقارير الجمعية بشكل دوري لكم', 
        'question_6'   => 'هل تقوم الجمعية باطلاعكم على إنجازاتها بشكل دوري', 
        'question_7'   => 'ما مدى رضاك بشكل عام عن الجمعية',  
    ]; 

    public const ANSWER_SELECT = [ 
        1 => 1, 
        2 => 2, 
        3 => 3, 
        4 => 4, 
        5 => 5, 
    ]; 

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    } 
}