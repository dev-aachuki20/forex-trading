<?php

namespace App\Livewire\Layouts\Includes;

use App\Models\Language;
use Livewire\Component;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Header extends Component
{
    public $languages;
    protected $listeners = [
        'changeLanguage'
    ];

    public function changeLanguage($code)
    {
        app()->setLocale($code);
        Cache::put('locale', App::currentLocale());
        return redirect()->to(url()->previous());
    }

    public function render()
    {
        $language = Language::where('status', 1)->get();
        return view('livewire.layouts.includes.header', compact('language'));
    }
}
