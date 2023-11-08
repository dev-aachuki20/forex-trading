<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class BkForexMembership extends Component
{
    public $localeid;
    public $pageDetail;

    public function mount()
    {
        $this->pageDetail = getPageContent('bk-forex-membership', $this->localeid);
        if(!$this->pageDetail->is_visible){
            $this->skipRender(); 
            return abort(404);
        }
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.bk-forex-membership');
    }
}
