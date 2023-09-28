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
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'language_id',
        'page_keys',
        'section_key',
        'title',
        'description',
        'slug',
        'other_details',
        'is_image',
        'is_multiple_image',
        'is_video',
        'status',
        'created_by',
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


    // Philanthropy Image
    // 1
    public function philanthropyImageOne()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'philanthropy-image-one');
    }

    public function getPhilanthropyImageOneUrlAttribute()
    {
        if ($this->philanthropyImageOne) {
            return $this->philanthropyImageOne->file_url;
        }
        return "";
    }

    // 2
    public function philanthropyImageTwo()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'philanthropy-image-two');
    }

    public function getPhilanthropyImageTwoUrlAttribute()
    {
        if ($this->philanthropyImageTwo) {
            return $this->philanthropyImageTwo->file_url;
        }
        return "";
    }

    // 3
    public function philanthropyImageThree()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'philanthropy-image-three');
    }

    public function getPhilanthropyImageThreeUrlAttribute()
    {
        if ($this->philanthropyImageThree) {
            return $this->philanthropyImageThree->file_url;
        }
        return "";
    }

    // 4
    public function philanthropyImageFour()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'philanthropy-image-four');
    }

    public function getPhilanthropyImageFourUrlAttribute()
    {
        if ($this->philanthropyImageFour) {
            return $this->philanthropyImageFour->file_url;
        }
        return "";
    }
    // end Philanthropy Image












    public function multipleImages()
    {
        return $this->morphMany(Uploads::class, 'uploadsable')->where('type', 'setting-multiple-image');
    }

    public function getMultipleImageUrlsAttribute()
    {
        $imageUrls = [];

        foreach ($this->multipleImages as $image) {
            $imageUrls[] = $image;
        }
        return $imageUrls;
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
