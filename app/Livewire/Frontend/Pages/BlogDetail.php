<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogDetail extends Component
{
    public $slug, $localeid;
    public $blogDetails, $latestPost;

    public function render()
    {
        $this->blogDetails = Blog::where('slug', $this->slug)->where('language_id', $this->localeid)->first();
        $this->latestPost = Blog::where('language_id', $this->localeid)->where('slug', '!=', $this->slug)->where('status', 1)->orderBy('id', 'desc')->take('5')->get();
        return view('livewire.frontend.pages.blog-detail');
    }
}
