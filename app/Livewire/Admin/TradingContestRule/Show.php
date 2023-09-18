<?php

namespace App\Livewire\Admin\TradingContestRule;

use App\Models\TradingContestRules;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public function mount($rule_id)
    {
        $this->details = TradingContestRules::find($rule_id);
    }
    public function render()
    {
        return view('livewire.admin.trading-contest-rule.show');
    }
}
