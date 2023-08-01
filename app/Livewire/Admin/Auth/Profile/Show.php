<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $userdata, $name, $email, $phone;
    
    public function mount()
    {
        $this->userdata = Auth::user();
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->name = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.admin.auth.profile.show');
    }
}
