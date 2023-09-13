<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Affiliate extends Model
{
    use HasFactory, SoftDeletes, Sluggable, LivewireAlert;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'address',
        'city',
        'state',
        'zipcode',
        'country',
        'website',
        'instagram_handle',
        'youtube_handle',
        'twitter_handle',
        'purpose',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
