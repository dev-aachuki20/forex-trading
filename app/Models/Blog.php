<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'publish_date',
        'category',
        'status',
        'language_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Blog $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (Blog $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function blogImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'blog-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->blogImage) {
            return $this->blogImage->file_url;
        }
        return "";
    }
}
