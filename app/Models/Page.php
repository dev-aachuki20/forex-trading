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
        'parent_page_id',
        'title',
        'sub_title',
        'slug',
        'type',
        'description',
        'template_name',
        'link',
        'created_by'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Page $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (Page $model) {
            if ($model->type != 3) {
                $model->slug = $model->generateSlug($model->title);
            }
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
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
