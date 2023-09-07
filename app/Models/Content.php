<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory;
    use SoftDeletes, Sluggable;
    public $table = 'contents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'status',
        'language_id',
        'course_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Content $model) {
            $model->created_by = auth()->user()->id;
        });

        static::creating(function (Content $model) {
            $model->slug = $model->generateSlug($model->name);
        });

        static::updating(function (Content $model) {
            $model->slug = $model->generateSlug($model->name);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecture()
    {
        return $this->hasMany(Lecture::class);
    }
}
