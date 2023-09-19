<?php

namespace App\Livewire\Admin\TradingContestWinnerPlaces;

use App\Models\TradingContestWinnerPlace;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public function mount($winnerPlace_id)
    {
        $this->details = TradingContestWinnerPlace::find($winnerPlace_id);
    }
    public function render()
    {
        return view('livewire.admin.trading-contest-winner-places.show');
    }
    public function getPositionSuffix($position)
    {
        if ($position % 10 == 1 && $position % 100 != 11) {
            return 'st';
        } elseif ($position % 10 == 2 && $position % 100 != 12) {
            return 'nd';
        } elseif ($position % 10 == 3 && $position % 100 != 13) {
            return 'rd';
        } else {
            return 'th';
        }
    }
}
