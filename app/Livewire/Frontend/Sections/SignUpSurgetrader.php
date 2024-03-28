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
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.sign-up-surgetrader');
    }

    public function submit()
    {
        $messages = [
            'first_name.required'           => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.first_name'))]),
            'first_name.string'             => __('validation.string', ['attribute' => strtolower(__('cruds.user.fields.first_name'))]),
            'last_name.required'            => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.last_name'))]),
            'last_name.string'              => __('validation.string', ['attribute' => strtolower(__('cruds.user.fields.last_name'))]),
            'mobile_no.numeric'             => __('validation.numeric', ['attribute' => strtolower(__('cruds.user.fields.phone'))]),
            'mobile_no.digits'              => __('validation.digits', ['attribute' => strtolower(__('cruds.user.fields.phone')), 'digits' => 10]),
            'zipcode.numeric'               => __('validation.numeric', ['attribute' => strtolower(__('cruds.user.profile.pin_code'))]),
            'zipcode.digits'                => __('validation.digits', ['attribute' => strtolower(__('cruds.user.profile.pin_code')), 'digits' => 6]),
            'email.required'                => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.email'))]),
            'email.email'                   => __('validation.email', ['attribute' => strtolower(__('cruds.user.fields.email'))]),
            'email.unique'                  => __('validation.unique', ['attribute' => strtolower(__('cruds.user.fields.email'))]),
            'address.required'              => __('validation.required', ['attribute' => strtolower(__('cruds.user.profile.address'))]),
            'city.required'                 => __('validation.required', ['attribute' => strtolower(__('cruds.user.profile.city'))]),
            'is_affiliate_accept.required'  => __('validation.accepted', ['attribute' => __('cruds.user.profile.affiliate_agreement')]),
        ];

        $validatedData = $this->validate([
            'first_name'            => ['required', 'string', 'regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'last_name'             => ['required', 'string', 'regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'email'                 => ['required', 'email:dns', 'unique:affiliates,email,NULL,id,deleted_at,NULL'],
            'mobile_no'             => ['nullable', 'numeric', 'digits:10'],
            'address'               => ['required'],
            'city'                  => ['required'],
            'state'                 => ['nullable'],
            'zipcode'               => ['nullable', 'numeric', 'digits:6'],
            'country'               => ['nullable'],
            'website'               => ['nullable'],
            'instagram_handle'      => ['nullable'],
            'youtube_handle'        => ['nullable'],
            'twitter_handle'        => ['nullable'],
            'purpose'               => ['nullable'],
            'is_affiliate_accept'   => ['required', 'accepted'],
        ], $messages);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;

        unset($validatedData['is_affiliate_accept']);

        $affiliate = Affiliate::create($validatedData);
        $this->reset();
        $this->alert('success',  getLocalization('added_success'));

    }
}
