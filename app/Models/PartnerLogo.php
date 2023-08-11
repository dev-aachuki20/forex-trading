<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PartnerLogo extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'partner_logos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'brand_name',
        'status',
        'language_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function partnerLogoImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'partner-logo-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->partnerLogoImage) {
            return $this->partnerLogoImage->file_url;
        }
        return "";
    }
}
