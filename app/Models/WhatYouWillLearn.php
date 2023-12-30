<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatYouWillLearn extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'what_you_will_learn';
    protected $guarded = [];
}
