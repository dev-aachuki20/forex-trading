<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Faq as ModelsFaq;
use App\Models\FaqType;

use Livewire\Component;

class Faq extends Component
{
    public $faqsrecords;
    public $localeid;
    public $selectedCategory = 1;
    public $pageDetail;
    public $sectionDetail;
    public $allFaqTypes;

    protected $listeners = ['socialMediaModal'];

    public function mount()
    {
        $this->pageDetail     = getPageContent('faq', $this->localeid);
        $this->sectionDetail  = getSectionContent('how_can_we_help', $this->localeid);
        $this->allFaqTypes = FaqType::where('status',1)->get();
    }
    public function selectCategory($key)
    {
        $this->selectedCategory = $key;
    }

    public function render()
    {
        $this->faqsrecords = ModelsFaq::where('language_id', $this->localeid)
        ->whereHas('faqType', function ($q) {
            $q->where('status',1);
        })->where('status', 1)->where('faq_type','!=',7)->orderBy('faq_type', 'asc')->get()->groupBy('faq_type');

        return view('livewire.frontend.pages.faq');
    }

    public function socialMediaModal($faqId){
        $faq = ModelsFaq::find($faqId);
        $textContent = $faq->question."\n".strip_tags($faq->answer);
        $image = $faq->image_url ? env('APP_URL').asset($faq->image_url) :  '';
        $video = $faq->faqVideo ? env('APP_URL').asset($faq->faqVideo->file_url) : '';

        $this->dispatch('openSocialMediaModal',['textContent'=>$textContent,'image'=>$image,'video'=>$video]);
    }
}
