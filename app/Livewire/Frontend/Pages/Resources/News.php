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

    public $tabId;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $allNews = [];
        $allNews = ModelsNews::where('language_id', $this->tabId)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.news', compact('allNews'));
    }
}
