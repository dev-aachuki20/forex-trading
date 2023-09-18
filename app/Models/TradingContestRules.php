<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradingContestRules extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable =
    [
        'language_id',
        'trading_contest_id',
        'instruction',
        'title',
        'description',
        'rules',
        'created_by',
        'deleted_at',
        'deleted_by',
    ];

    public function tradingContest()
    {
        return $this->belongsTo(TradingContest::class);
    }
}
