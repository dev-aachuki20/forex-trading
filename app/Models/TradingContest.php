<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradingContest extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable =
    [
        'language_id',
        'title',
        'slug',
        'start_date_time',
        'end_date_time',
        'status',
        'created_by',
        'deleted_at',
        'deleted_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (TradingContest $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (TradingContest $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function winnerPlaces()
    {
        return $this->hasMany(TradingContestWinnerPlace::class);
    }

    public function rules()
    {
        return $this->hasOne(TradingContestRules::class);
    }

    public function registrations()
    {
        return $this->hasMany(TradingContestRegistration::class);
    }
}
