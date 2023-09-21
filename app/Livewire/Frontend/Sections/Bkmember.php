<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Team;

class Bkmember extends Component
{
    public $localeid;
    public $bkmembers = [], $memebr_type = 2;
    public $sectionDetail;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('trading_group_access_training', $this->localeid);

        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        $this->bkmembers = Team::where('language_id', $this->localeid)->where('type', $this->memebr_type)->where('status', 1)->get();
        return view('livewire.frontend.sections.bkmember');
    }
}
