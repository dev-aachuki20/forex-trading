<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\App;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.admin.auth.logout');
    }

    public function logout()
    {
        Auth::logout();
        Cache::forget('locale');
        Cache::get('locale');
        // App::setLocale('locale', app()->getLocale());
        // App::currentLocale();
        return redirect()->route('auth.admin.login', app()->getLocale());
    }
}
