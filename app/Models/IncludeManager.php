<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncludeManager extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'include_managers';

    protected $fillable = [
        'title',
        'description',
        'status',
        'language_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function includeManagerImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'include-manager-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->includeManagerImage) {
            return $this->includeManagerImage->file_url;
        }
        return "";
    }
}
