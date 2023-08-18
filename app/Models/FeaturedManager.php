<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Sluggable;

class FeaturedManager extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public $table = 'featured_managers';
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
        static::creating(function (FeaturedManager $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (FeaturedManager $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function featuredImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'featured-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->featuredImage) {
            return $this->featuredImage->file_url;
        }
        return "";
    }

    public function featuredPdf()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'featured-pdf');
    }

    public function getPdfUrlAttribute()
    {
        if ($this->featuredPdf) {
            return $this->featuredPdf->file_url;
        }
        return "";
    }
}
