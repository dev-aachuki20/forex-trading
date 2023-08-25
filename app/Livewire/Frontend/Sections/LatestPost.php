<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Blog;
use Livewire\Component;

class LatestPost extends Component
{
    public $latestPost;
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }

    public function render()
    {
        $this->latestPost = Blog::where('status', 1)->where('language_id', $this->tabId)->orderBy('id', 'desc')->take('5')->get();
        return view('livewire.frontend.sections.latest-post');
    }
}
