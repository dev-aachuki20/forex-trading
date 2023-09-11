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
    // public $sectionDetail1;
    // public $sectionDetail2;
    // public $sectionDetail3;
    // public $sectionDetail4;
    // public $sectionDetail5;
    // public $sectionDetail6;
    public function mount()
    {
        $this->pageDetail     = getPageContent('faq', $this->localeid);
        $this->sectionDetail  = getSectionContent('how_can_we_help', $this->localeid);
        // $this->sectionDetail1 = getSectionContent('new_to_surgetrader', $this->localeid);
        // $this->sectionDetail2 = getSectionContent('audition_process', $this->localeid);
        // $this->sectionDetail3 = getSectionContent('trading_rules', $this->localeid);
        // $this->sectionDetail4 = getSectionContent('funded_accounts', $this->localeid);
        // $this->sectionDetail5 = getSectionContent('platform_dashboard', $this->localeid);
        // $this->sectionDetail6 = getSectionContent('orders_and_billing', $this->localeid);
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
