<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'package_name',
        'description',
        'price',
        'language_id',
        'status',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
