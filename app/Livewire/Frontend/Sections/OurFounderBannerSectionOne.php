<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OurFounderBannerSectionOne extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('our_founder_banner_section_one', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.our-founder-banner-section-one');
    }
}
