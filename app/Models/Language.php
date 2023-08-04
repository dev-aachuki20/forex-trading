<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Language extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'code',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function languageImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'language');
    }

    public function getImageUrlAttribute()
    {
        if ($this->languageImage) {
            return $this->languageImage->file_url;
        }
        return "";
    }
}
