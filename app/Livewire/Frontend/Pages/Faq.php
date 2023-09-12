<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    public $faqsrecords;
    public $localeid;
    public $selectedCategory = 1;
    public $pageDetail;
    public $sectionDetail;
    public function mount()
    {
        $this->pageDetail     = getPageContent('faq', $this->localeid);
        $this->sectionDetail  = getSectionContent('how_can_we_help', $this->localeid);
    }
    public function selectCategory($key)
    {
        $this->selectedCategory = $key;
    }

    public function render()
    {
        $this->faqsrecords = ModelsFaq::where('language_id', $this->localeid)->where('status', 1)->orderBy('faq_type', 'asc')->get()->groupBy('faq_type');
        return view('livewire.frontend.pages.faq');
    }
}
