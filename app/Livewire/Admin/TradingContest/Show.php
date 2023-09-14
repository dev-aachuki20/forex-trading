<?php

namespace App\Livewire\Admin\TradingContest;

use App\Models\TradingContest;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public function mount($contest_id)
    {
        $this->details = TradingContest::find($contest_id);
    }
    public function render()
    {
        return view('livewire.admin.trading-contest.show');
    }
}
