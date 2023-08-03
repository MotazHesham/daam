<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'contact'   => 'تواصل',
        'suggest'   => 'مقترح',
        'complaint' => 'شكوي',
    ];

    protected $fillable = [
        'type',
        'name',
        'job',
        'email',
        'phone_number',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
