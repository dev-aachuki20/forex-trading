<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes, Sluggable;

    public $table = 'courses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',
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
        static::creating(function (Course $model) {
            $model->created_by = auth()->user()->id;
        });

        static::creating(function (Course $model) {
            $model->slug = $model->generateSlug($model->name);
        });

        static::updating(function (Course $model) {
            $model->slug = $model->generateSlug($model->name);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function courseImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'course-image');
    }

    public function getCourseImageUrlAttribute()
    {
        if ($this->courseImage) {
            return $this->courseImage->file_url;
        }
        return "";
    }

    public function courseVideo()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'course-video');
    }

    public function getCourseVideoUrlAttribute()
    {
        if ($this->courseVideo) {
            return $this->courseVideo->file_url;
        }
        return "";
    }

    public function content()
    {
        return $this->hasMany(Content::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function getTotalDurationAttribute()
    {
        $total_duration = $this->lectures()
            ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as total_duration')->where('status', 1)->value('total_duration');
        return $total_duration;
    }
}
