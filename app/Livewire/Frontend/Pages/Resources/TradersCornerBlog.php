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

    public $localeid,$tag;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $pageDetail;
    public $sectionDetail;
    public $allCategories = [];
    public $search, $selectedCategory;

    public function mount($tag = '')
    {
        $this->pageDetail = getPageContent('traders-corner-blog', $this->localeid);
        $this->sectionDetail = getSectionContent('our_latest_blogs', $this->localeid);
        $this->allCategories = Blog::where('status',1)->where('language_id', $this->localeid)->groupBy('category')->pluck('category');
        
    }

    public function render()
    {
        $searchVal = $this->search;
        $categoryVal = $this->selectedCategory;

        $allBlogs = [];
        $selectedTagTitle = $this->tag;
        $allBlogs = Blog::where('language_id', $this->localeid)->where(function($query) use($searchVal,$categoryVal,$selectedTagTitle){
            if($searchVal){
                $query->where('title','like','%'.$searchVal.'%');
            }

            if($categoryVal){
                $query->orWhere('category','like',$categoryVal);
            }

            if($selectedTagTitle){
                $query->whereHas('selectedTags', function ($q) use ($selectedTagTitle) {
                    $q->where('title', $selectedTagTitle);
                });
            }
           
        })
        ->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.traders-corner-blog', compact('allBlogs'));
    }

    public function submitFilter(){
        $this->resetPage();
        $this->search = $this->search;
        $this->selectedCategory = $this->selectedCategory;
    }

    public function resetFilters(){
        $this->reset(['search','selectedCategory']);
    }
}
