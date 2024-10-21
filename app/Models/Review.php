<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const REVIEW_RADIO = [
        'good'     => 'راضي',
        'not_good' => 'غير راضي',
    ];

    protected $fillable = [
        'role_id',
        'identity_number',
        'phone_number',
        'name',
        'review',
        'reason',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
