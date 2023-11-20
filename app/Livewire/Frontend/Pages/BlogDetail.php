<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogDetail extends Component
{
    public $slug, $localeid;
    public $blogDetails, $latestPost;
    public $pageDetail;
    
    protected $listeners = ['shareSocialMedia'];

    public function mount()
    {
        $this->pageDetail = getPageContent('blogs-slug',$this->localeid);

    }

    public function render()
    {
        // $this->blogDetails = Blog::where('slug', $this->slug)->where('language_id', $this->localeid)->first();
        $this->blogDetails = Blog::where('id', $this->slug)->where('language_id', $this->localeid)->first();
        $this->latestPost = Blog::where('language_id', $this->localeid)->where('slug', '!=', $this->slug)->where('status', 1)->orderBy('id', 'desc')->take(5)->get();

        $allTags = Tag::get();
        return view('livewire.frontend.pages.blog-detail',compact('allTags'));
    }

    public function shareSocialMedia($mediaName){
        $textContent = $this->blogDetails->title."\n".strip_tags($this->blogDetails->description);
        $image = $this->blogDetails->image_url ? env('APP_URL').asset($this->blogDetails->image_url) :  '';
       
        $this->dispatch('shareSocialMedia',['textContent'=>$textContent,'image'=>$image,'media_name'=>$mediaName]);
    }


}
