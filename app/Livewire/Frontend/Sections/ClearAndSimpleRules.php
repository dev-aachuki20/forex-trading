<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class ClearAndSimpleRules extends Component
{
    public $tradeWithUs;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('clear_and_simple_rules', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.clear-and-simple-rules');
    }
}
