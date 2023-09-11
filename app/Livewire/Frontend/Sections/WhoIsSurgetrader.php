<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class WhoIsSurgetrader extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('who_is_surgetrader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.who-is-surgetrader');
    }
}
