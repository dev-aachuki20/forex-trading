<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination, LivewireAlert;
    public $userdata, $name, $email, $phone, $image, $profileImageUrl, $about_admin;
    public $showprofileMode = true;
    public $editprofileMode = false;
    public $profileMode = true;
    public $activeTab = 'profile';

    protected $listeners = [
        'editProfile',
        'showProfile',
        'profilePictureUpdated',
    ];


    public function mount()
    {
        $this->userdata = Auth::user();
        $this->email = $this->userdata->email;
        $this->phone = $this->userdata->phone;
        $this->name = $this->userdata->name;
        $this->profileImageUrl = $this->userdata->profile_image_url ?? asset('admin/jpg/user.png');
    }

    public function switchTab($tab)
    {
        $this->resetPage();
        $this->activeTab = $tab;
        $this->dispatch('loadPlugins');
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

    public function updatedImage()
    {
        $auth = Auth::user();
        $uploadId = null;
        if ($auth->profileImage) {
            $uploadId = $auth->profileImage->id;
            uploadImage($auth, $this->image, 'profile/images/', "profile", 'original', 'update', $uploadId);
        } else {
            uploadImage($auth, $this->image, 'profile/images/', "profile", 'original', 'save', $uploadId);
        }

        $this->profileImageUrl = $auth->profile_image_url;

        $this->flash('success',  getLocalization('added_success'));
        return redirect()->route('auth.admin.profile_show');
        // return view('livewire.admin.auth.profile.index');
    }
}
