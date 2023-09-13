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
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
        'googleplus_link',
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


    public function brandLogoImage()
    {
        return $this->morphMany(Uploads::class, 'uploadsable')->where('type', 'brand-logo');
    }

    public function getBrandImageUrlAttribute()
    {
        $imageUrls = [];

        foreach ($this->brandLogoImage as $image) {
            $imageUrls[] = $image;
        }
        return $imageUrls;
    }
}
