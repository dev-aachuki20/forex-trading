<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'language_id',
        'created_at',
        'updated_at',
    ];
}
