<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestSubscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscriber_email',
        'phone_number',
        'is_accept',
        'language_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
