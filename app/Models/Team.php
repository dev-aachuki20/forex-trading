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
        $imageAllarray = [];
        if ($this->brandLogoImage) {
            foreach ($this->brandLogoImage as $key => $value) {
                $imageAllarray[] = $value->file_url;
                return $imageAllarray;
            }
        }
        return "";
    }
}
