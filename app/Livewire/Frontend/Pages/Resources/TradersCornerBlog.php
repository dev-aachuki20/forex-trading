<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Http\Request;

class TradersCornerBlog extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $localeid,$tag,$blogCategory;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $pageDetail;
    public $sectionDetail;
    public $allCategories = [];
    public $search, $selectedCategory;

    public function mount(Request $request, $tag = '', $blogCategory = '')
    {
        $this->pageDetail = getPageContent('traders-corner-blog', $this->localeid);
        $this->sectionDetail = getSectionContent('our_latest_blogs', $this->localeid);
        $this->allCategories = Blog::where('status',1)->where('language_id', $this->localeid)->groupBy('category')->pluck('category');
        $this->blogCategory = $request->route('category');        
    }
    
    
    public function render()
    {
        $categoryVal = $this->selectedCategory;
        $blogCategory = $this->blogCategory;
        $selectedTagTitle = $this->tag;

        $allBlogsQuery = Blog::where('language_id', $this->localeid)->where('status', 1);

        
        if ($blogCategory) {
            // Filter blogs by the category from the URL
            $allBlogsQuery->where('category', $blogCategory);
            $this->selectedCategory = $blogCategory; // Set the selected category to match the URL category
        } else {
            // If no category parameter in the URL, filter by selected category from dropdown
            if ($categoryVal) {
                $allBlogsQuery->where('category', 'like', $categoryVal);
            }
        }

        if($selectedTagTitle){
            $allBlogsQuery->whereHas('selectedTags', function ($q) use ($selectedTagTitle) {
                $q->where('title', $selectedTagTitle);
            });
        }

        // Apply search filter if search input is provided
        if ($this->search) {
            $allBlogsQuery->where('title', 'like', '%' . $this->search . '%');
        }

        // Fetch the blogs and paginate the results
        $allBlogs = $allBlogsQuery->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);

        return view('livewire.frontend.pages.resources.traders-corner-blog', compact('allBlogs'));
    }


    // for backup
    // public function render()
    // {
    //     $searchVal = $this->search;
    //     $categoryVal = $this->selectedCategory;

    //     $allBlogs = [];
    //     $selectedTagTitle = $this->tag;
    //     $blogCategory = $this->blogCategory;
    //     // $allBlogsQuery = Blog::where('language_id', $this->localeid)->where('status', 1);
    //     $allBlogs = Blog::where('language_id', $this->localeid)->where(function($query) use($searchVal,$categoryVal,$selectedTagTitle, $blogCategory){
    //         if($searchVal){
    //             $query->where('title','like','%'.$searchVal.'%');
    //         }

    //         if($categoryVal){
    //             $query->orWhere('category','like',$categoryVal);
    //         }

    //         if($blogCategory){
    //             $query->orWhere('category',$blogCategory);
    //             $this->blogCategoryFilter($blogCategory);
    //         }

    //         if($selectedTagTitle){
    //             $query->whereHas('selectedTags', function ($q) use ($selectedTagTitle) {
    //                 $q->where('title', $selectedTagTitle);
    //             });
    //         }

    //         // $allBlogs = $allBlogsQuery->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
           
    //     })
    //     ->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
    //     return view('livewire.frontend.pages.resources.traders-corner-blog', compact('allBlogs'));
    // }

    



    

    public function submitFilter(){
        $this->resetPage();
        $this->search = $this->search;
        $this->selectedCategory = $this->selectedCategory;
    }

    public function resetFilters(){
        $this->reset(['search','selectedCategory']);
    }

    public function blogCategoryFilter($blogCategory){
        $this->selectedCategory = $blogCategory;
    }
}
