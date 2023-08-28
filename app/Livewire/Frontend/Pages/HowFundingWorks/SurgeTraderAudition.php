<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use App\Models\Faq;
use Livewire\Component;

class SurgeTraderAudition extends Component
{
    public $faqsrecords;
    public $tabId;
    public $selectedCategory = 2;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }

    public function render()
    {
        $this->faqsrecords = Faq::where('language_id', $this->tabId)->where('status', 1)->where('faq_type', $this->selectedCategory)->get();
        return view('livewire.frontend.pages.how-funding-works.surge-trader-audition');
    }
}
