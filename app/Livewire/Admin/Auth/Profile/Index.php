<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination;
    public $userdata, $name, $email, $phone, $image;
    // public $first_name, $last_name, $email_id, $mobile;
    public $showprofileMode = true;
    public $editprofileMode = false;
    public $profileMode = true;
    public $activeTab = 'profile';

    protected $listeners = [
        'editProfile',
        'showProfile',
    ];


    public function mount()
    {
        $this->userdata = Auth::user();
        $this->email = $this->userdata->email;
        $this->phone = $this->userdata->phone;
        $this->name = $this->userdata->name;
    }

    public function switchTab($tab)
    {
        $this->resetPage();
        $this->activeTab = $tab;
    }



    public function render()
    {
        return view('livewire.admin.auth.profile.index');
    }

    public function editProfile()
    {
        $this->editprofileMode = true;
        $this->showprofileMode = false;
    }

    public function showProfile()
    {
        $this->editprofileMode = false;
        $this->showprofileMode = true;
        $this->profileMode = true;
    }

    public function store()
    {
        $auth = Auth::user();
        uploadImage($auth, $this->image, 'profile/images/', "profile", 'original', 'save', null);
        // $this->formMode = false;
        $this->flash('success',  getLocalization('added_success'));
        return view('livewire.admin.auth.profile.index');
    }
}
