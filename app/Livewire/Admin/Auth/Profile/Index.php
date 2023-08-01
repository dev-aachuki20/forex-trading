<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $userdata, $name, $email, $phone;
    public $profileMode = 'view', $editprofileMode = false;

    protected $listeners = [
        'updatedProfileMode',
    ];

   
    public function mount()
    {
        $this->userdata = Auth::user();
        $this->email = $this->userdata->email;
        $this->phone = $this->userdata->phone;
        $this->name = $this->userdata->name;
    }

    public function updatedProfileMode(){
        dd('fdj');
        // $this->editprofileMode = true;
    }


    public function render()
    {
        return view('livewire.admin.auth.profile.index');
    }

    
}
