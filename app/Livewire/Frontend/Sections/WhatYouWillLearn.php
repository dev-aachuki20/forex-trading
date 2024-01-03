<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\WhatYouWillLearn as ModelsWhatYouWillLearn;
use Livewire\Component;

class WhatYouWillLearn extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('what_you_will_learn', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }

    public function render()
    {
        $getData = ModelsWhatYouWillLearn::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.what-you-will-learn', compact('getData'));
    }
}
