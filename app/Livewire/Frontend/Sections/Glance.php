<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Glance as ModelsGlance;
use Livewire\Component;

class Glance extends Component
{
    public $localeid;
    public $glanceRecord = [];
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('glance', $this->localeid);
    }
    public function render()
    {
        $this->glanceRecord = ModelsGlance::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.glance');
    }
}
