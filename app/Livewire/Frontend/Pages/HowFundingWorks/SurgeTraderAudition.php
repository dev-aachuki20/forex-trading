<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use App\Models\Faq;
use Livewire\Component;

class SurgeTraderAudition extends Component
{
    public $faqsrecords;
    public $localeid;
    public $selectedCategory = 2;
    public $pageDetail;

    protected $listeners = ['socialMediaModal'];

    public function mount()
    {
        $this->pageDetail = getPageContent('surge-trader-audition', $this->localeid);
    }
    public function render()
    {
        $this->faqsrecords = Faq::where('language_id', $this->localeid)->where('status', 1)->where('faq_type', $this->selectedCategory)->get();
        return view('livewire.frontend.pages.how-funding-works.surge-trader-audition');
    }
    
    public function socialMediaModal($faqId){
        $faq = Faq::find($faqId);
        $textContent = $faq->question."\n".strip_tags($faq->answer);
        $image = $faq->image_url ? env('APP_URL').asset($faq->image_url) :  '';
        $video = $faq->faqVideo ? env('APP_URL').asset($faq->faqVideo->file_url) : '';

        $this->dispatch('openSocialMediaModal',['textContent'=>$textContent,'image'=>$image,'video'=>$video]);
    }
}
