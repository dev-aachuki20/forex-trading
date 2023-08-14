<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Sluggable;

class News extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public $table = 'news';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'publish_date',
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
        static::creating(function (News $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (News $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function newsImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'news-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->blogImage) {
            return $this->blogImage->file_url;
        }
        return "";
    }
}
