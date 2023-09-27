<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\News as ModelsNews;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class News extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $localeid;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $pageDetail;
    public $sectionDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('news', $this->localeid);
        $this->sectionDetail = getSectionContent('latest_surgetrader_news', $this->localeid);
    }
    public function render()
    {
        $allNews = [];
        $allNews = ModelsNews::where('language_id', $this->localeid)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.news', compact('allNews'));
    }
}
