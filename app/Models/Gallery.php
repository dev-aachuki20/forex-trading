<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'galleries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'title',
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

    public function galleryImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'gallery-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->galleryImage) {
            return $this->galleryImage->file_url;
        }
        return "";
    }
}
