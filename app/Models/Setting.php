<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public $table = 'settings';
    protected $fillable = [
        'title',
        'type',
        'description',
        'slug',
        'language_id',
        'status',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Setting $model) {
            $model->created_by = auth()->user()->id;
        });

        static::creating(function (Setting $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (Setting $model) {
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
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'setting-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return $this->image->file_url;
        }
        return "";
    }

    public function video()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'setting-video');
    }

    public function getVideoUrlAttribute()
    {
        if ($this->video) {
            return $this->video->file_url;
        }
        return "";
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
