<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FaqType extends Model
{
    use SoftDeletes;

    public $table = 'faq_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        // 'language_id',
        // 'key',
        'title',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
