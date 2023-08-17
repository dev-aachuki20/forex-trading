<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Glance extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'glances';

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

    public function glanceImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'glance-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->glanceImage) {
            return $this->glanceImage->file_url;
        }
        return "";
    }
}
