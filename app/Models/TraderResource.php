<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TraderResource extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public $table = 'trader_resources';
    protected $fillable = [
        'title',
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
        static::creating(function (TraderResource $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (TraderResource $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function resourceImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'trader-resources-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->resourceImage) {
            return $this->resourceImage->file_url;
        }
        return "";
    }

    public function resourcePdf()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'trader-resources-pdf');
    }

    public function getPdfUrlAttribute()
    {
        if ($this->resourcePdf) {
            return $this->resourcePdf->file_url;
        }
        return "";
    }
}
