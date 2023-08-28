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

    public $tabId;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $allBlogs = [];
        $allBlogs = Blog::where('language_id', $this->tabId)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.traders-corner-blog',compact('allBlogs'));
    }
}
