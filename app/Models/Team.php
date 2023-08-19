<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $table = 'teams';
    protected $fillable = [
        'name',
        'designation',
        'description',
        'type',
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
        static::creating(function (Team $model) {
            $model->created_by = auth()->user()->id;
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    # profile image
    public function teamImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'team');
    }

    public function getImageUrlAttribute()
    {
        if ($this->teamImage) {
            return $this->teamImage->file_url;
        }
        return "";
    }
    # facebook image
    public function fbImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'facebook');
    }

    public function getFbImageUrlAttribute()
    {
        if ($this->fbImage) {
            return $this->fbImage->file_url;
        }
        return "";
    }
    # twitter image
    public function twitterImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'twitter');
    }

    public function getTwitterImageUrlAttribute()
    {
        if ($this->twitterImage) {
            return $this->twitterImage->file_url;
        }
        return "";
    }
    # instagram image
    public function instaImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'instagram');
    }

    public function getInstaImageUrlAttribute()
    {
        if ($this->instaImage) {
            return $this->instaImage->file_url;
        }
        return "";
    }
    # youtube image
    public function youtubeImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'youtube');
    }

    public function getYoutubeImageUrlAttribute()
    {
        if ($this->youtubeImage) {
            return $this->youtubeImage->file_url;
        }
        return "";
    }
    # google image
    public function googleImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'google');
    }

    public function getGoogleImageUrlAttribute()
    {
        if ($this->googleImage) {
            return $this->googleImage->file_url;
        }
        return "";
    }


    public function brandLogoImage()
    {
        return $this->morphMany(Uploads::class, 'uploadsable')->where('type', 'brand-logo');
    }

    public function getBrandImageUrlAttribute()
    {
        $imageUrls = [];

        foreach ($this->brandLogoImage as $image) {
            $imageUrls[] = $image->file_url;
        }
        return $imageUrls;
    }
}
