<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\FeaturedManager;

class Features extends Component
{
    public $features;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('features', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        $this->features = FeaturedManager::where('status', 1)->where('language_id', $this->localeid)->get();
        return view('livewire.frontend.sections.features');
    }
}
