<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TradingContestWinnerPlace extends Model
{
    use HasFactory, Sluggable;
    protected $fillable =
    [
        'language_id',
        'trading_contest_id',
        'title',
        'slug',
        'position',
        'trading_contest_registration_id',
        'created_by',
        'deleted_at',
        'deleted_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (TradingContestWinnerPlace $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (TradingContestWinnerPlace $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function tradingContest()
    {
        return $this->belongsTo(TradingContest::class);
    }

    public function registration()
    {
        return $this->belongsTo(TradingContestRegistration::class, 'trading_contest_registration_id');
    }
}
