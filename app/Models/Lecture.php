<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use HasFactory;
    use SoftDeletes, Sluggable;

    public $table = 'lectures';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uuid',
        'course_id',
        // 'content_id',
        'name',
        'slug',
        'description',
        'duration',
        'status',
        'language_id',
        'created_by',
        'total_views',
        'like',
        'dislike',
        'created_at',
        'updated_at',
        'deleted_at',
        
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Lecture $model) {
            $model->created_by = auth()->user()->id;
        });

        static::creating(function (Lecture $model) {
            $model->slug = $model->generateSlug($model->name);
        });

        static::updating(function (Lecture $model) {
            $model->slug = $model->generateSlug($model->name);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function lectureImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'lectures-image');
    }

    public function getLectureImageUrlAttribute()
    {
        if ($this->lectureImage) {
            return $this->lectureImage->file_url;
        }
        return "";
    }

    public function lectureVideo()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'lectures-video');
    }

    public function getLectureVideoUrlAttribute()
    {
        if ($this->lectureVideo) {
            return $this->lectureVideo->file_url;
        }
        return "";
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
