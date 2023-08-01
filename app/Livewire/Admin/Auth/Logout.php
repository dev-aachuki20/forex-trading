<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Logout extends Component
{
    // protected $listeners = ['logout'];
    public function render()
    {
        return view('livewire.admin.auth.logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.admin.login');
    }
}
