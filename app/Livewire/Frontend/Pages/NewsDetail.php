<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewsDetail extends Component
{
    public $slug, $localeid;
    public $newsDetails, $latestNews;

    public function render()
    {
        $this->newsDetails = News::where('slug', $this->slug)->where('language_id', $this->localeid)->first();
        $this->latestNews = News::where('language_id', $this->localeid)->where('slug', '!=', $this->slug)->where('status', 1)->orderBy('id', 'desc')->take('5')->get();
        return view('livewire.frontend.pages.news-detail');
    }
}
