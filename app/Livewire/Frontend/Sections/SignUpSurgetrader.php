<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Affiliate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class SignUpSurgetrader extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $search = '';
    public $statusText = 'Active';
    public $activeTab = 1;
    public $languageId;


    public $sectionDetail;
    public $localeid;
    public $first_name, $last_name, $email, $mobile_no, $address, $city, $state, $zipcode, $country, $website, $instagram_handle, $youtube_handle, $twitter_handle, $purpose;
    public $status = 1, $is_affiliate_accept;
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
        $validatedData = $this->validate([
            'first_name'        => ['required', 'string','regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'last_name'         => ['required', 'string','regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'email'             => ['required', 'email:dns','unique:affiliates,email,NULL,id,deleted_at,NULL'],
            'mobile_no'         => ['nullable'],
            'address'           => ['required'],
            'city'              => ['required'],
            'state'             => ['nullable'],
            'zipcode'           => ['nullable'],
            'country'           => ['nullable'],
            'website'           => ['nullable'],
            'instagram_handle'  => ['nullable'],
            'youtube_handle'    => ['nullable'],
            'twitter_handle'    => ['nullable'],
            'purpose'           => ['nullable'],
            'is_affiliate_accept'=> ['required','accepted'],
        ],[
            'is_affiliate_accept.required'=>'You must accept the affiliate agreement.',
        ]);



        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;

        unset($validatedData['is_affiliate_accept']);

        $affiliate = Affiliate::create($validatedData);
        $this->alert('success',  getLocalization('added_success'));
    }
}
