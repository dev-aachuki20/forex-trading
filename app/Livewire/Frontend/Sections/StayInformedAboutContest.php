<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\ContestSubscriber;
use Livewire\Component;

class StayInformedAboutContest extends Component
{
    public $localeid;
    public $sectionDetail;
    public $subscriber_email, $phone_number, $is_accept;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('stay-informed-about-contest', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.stay-informed-about-contest');
    }

    public function storeContestInformUserlist()
    {
        $validatedData = $this->validate([
            'subscriber_email' => 'required|email:dns|unique:contest_subscribers,subscriber_email',
            'phone_number' => 'nullable|numeric|digits:10',
            'is_accept' => 'accepted',
        ], [
            'subscriber_email.required' => 'Email is required',
            'is_accept.accepted' => 'You must accept the terms and conditions.',
        ]);
        $validatedData['language_id'] = $this->localeid;
        ContestSubscriber::create($validatedData);
        $this->alert('success',  getLocalization('subscriber_contest_success_message'));
        $this->reset([
            'subscriber_email', 'phone_number', 'is_accept'
        ]);
    }
}
