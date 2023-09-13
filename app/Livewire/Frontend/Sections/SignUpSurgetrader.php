<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class SignUpSurgetrader extends Component
{
    public $search = '';
    public $statusText = 'Active';
    public $activeTab = 1;
    public $languageId;


    public $sectionDetail;
    public $localeid;
    public $first_name, $last_name, $email, $mobile_no, $address, $city, $state, $zipcode, $country, $website, $instagram_handle, $youtube_handle, $twitter_handle, $purpose;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('Sign_up_for_the_surgetrader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.sign-up-surgetrader');
    }

    public function submit()
    {
        dd('dfd');
    }
}
