<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Faq;
use Livewire\Component;

class Affiliate extends Component
{
    public $localeid;
    public $faqsrecords;
    public $selectedCategory = 7;

    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('affiliate', $this->localeid);
    }
    public function render()
    {
        $this->faqsrecords = Faq::where('language_id', $this->localeid)->where('status', 1)->where('faq_type', $this->selectedCategory)->get();
        return view('livewire.frontend.pages.affiliate');
    }
}
