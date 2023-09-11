<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;

class TradersCornerBlog extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $localeid;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $pageDetail;
    public $sectionDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('traders-corner-blog', $this->localeid);
        $this->sectionDetail = getSectionContent('our_latest_blogs', $this->localeid);
    }

    public function render()
    {
        $allBlogs = [];
        $allBlogs = Blog::where('language_id', $this->localeid)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.traders-corner-blog', compact('allBlogs'));
    }
}
