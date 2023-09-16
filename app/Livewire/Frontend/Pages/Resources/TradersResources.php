<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\TraderResource;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class TradersResources extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $localeid;
    public $pageDetail;
    public $sectionDetail;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $primaryresources;

    public $showFullText = false;

    public $searchVal;

    public function mount()
    {
        $this->pageDetail = getPageContent('traders-resources', $this->localeid);
        $this->sectionDetail = getSectionContent('featured', $this->localeid);
        $this->primaryresources = TraderResource::where('language_id', $this->localeid)->where('status', 1)->where('is_primary', 1)->first();
    }

    public function toggleText()
    {
        $this->showFullText = !$this->showFullText;
    }

    public function submitSearch(){

    }

    public function render()
    {
        $resources = [];
        $resources = TraderResource::where('language_id', $this->localeid)->where('status', 1)->where('is_primary', 0)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.traders-resources', compact('resources'));
    }
}
