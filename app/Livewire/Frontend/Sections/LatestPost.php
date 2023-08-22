<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Blog;
use Livewire\Component;

class LatestPost extends Component
{
    public $latestPost;
    public function render()
    {
        $this->latestPost = Blog::orderBy('id', 'desc')->get();
        return view('livewire.frontend.sections.latest-post');
    }
}
