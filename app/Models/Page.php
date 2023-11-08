<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Sluggable;


class Page extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public $table = 'pages';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'language_id',
        'page_key',
        'title',
        'sub_title',
        'slug',
        'created_by',
        'status',
        'is_visible',
    ];

    protected $casts = [
        'type' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Page $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (Page $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function uploads()
    {
        return $this->morphOne(Uploads::class, 'uploadsable');
    }

    public function image()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'page-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return $this->image->file_url;
        }
        return "";
    }
}
