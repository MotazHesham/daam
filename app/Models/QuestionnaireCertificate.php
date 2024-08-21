<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireCertificate extends Model
{

    public $table = 'questionnaire_certificate';

    protected $dates = [
        'created_at',
        'updated_at', 
    ]; 
    protected $fillable = [
        'course_name',
        'name',
        'phone', 
        'updated_at',
        'deleted_at',
    ]; 
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    } 
}