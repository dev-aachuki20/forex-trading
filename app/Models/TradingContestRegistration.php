<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingContestRegistration extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'language_id',
        'trading_contest_id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'nick_name',
        'country_name',
        'trading_account_no',
        'accept_term_condition',
        'created_by',
        'deleted_at',
        'deleted_by',
    ];

    public function tradingContest()
    {
        return $this->belongsTo(TradingContest::class);
    }

    public function winnerPlace()
    {
        return $this->hasOne(TradingContestWinnerPlace::class, 'trading_contest_registration_id');
    }
}
