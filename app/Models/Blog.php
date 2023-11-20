<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'publish_date',
        'tags',
        'author_name',
        'author_description',
        'category',
        'status',
        'language_id',
        'created_by',
        'publish_date',
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


    public function selectedTags() {
        return $this->belongsToMany(Tag::class);
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

    public function authorImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'blog-author-image');
    }

    public function getAuthorImageUrlAttribute()
    {
        if ($this->authorImage) {
            return $this->authorImage->file_url;
        }
        return "";
    }
}
