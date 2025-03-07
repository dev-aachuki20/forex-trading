<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use App\Models\Faq;
use Livewire\Component;

class SurgeTraderAudition extends Component
{
    public $faqsrecords;
    public $localeid;
    public $selectedCategory = 2;
    public $pageDetail;

    protected $listeners = ['socialMediaModal'];

    public function mount()
    {
        $this->pageDetail = getPageContent('surge-trader-audition', $this->localeid);
    }
    public function render()
    {
        $this->faqsrecords = Faq::where('language_id', $this->localeid)->where('status', 1)->where('faq_type', $this->selectedCategory)->get();
        return view('livewire.frontend.pages.how-funding-works.surge-trader-audition');
    }
    
    public function socialMediaModal(){
        $this->dispatch('openSocialMediaModal');
    }
}
