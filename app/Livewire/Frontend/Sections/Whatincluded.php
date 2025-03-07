<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\IncludeManager;
use Livewire\Component;

class Whatincluded extends Component
{
    public $localeid;
    public $includes = [];
    public $sectionDetail;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('what_included', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        $this->includes = IncludeManager::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.whatincluded');
    }
}
