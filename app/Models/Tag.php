<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    public function blogs() {
        return $this->belongsToMany(Blog::class);
    }

}
