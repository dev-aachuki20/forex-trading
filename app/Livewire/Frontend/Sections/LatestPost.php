<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Blog;
use Livewire\Component;

class LatestPost extends Component
{
    public $latestPost;
    public $localeid;

    public function render()
    {
        $this->latestPost = Blog::where('status', 1)->where('language_id', $this->localeid)->orderBy('id', 'desc')->take('5')->get();
        return view('livewire.frontend.sections.latest-post');
    }
}
