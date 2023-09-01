<?php

namespace App\Livewire\Layouts\Includes;

use App\Models\Language;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class Header extends Component
{
    public $languages;
    protected $listeners = [
        'changeLanguage',
    ];

    public function changeLanguage($code)
    {
        session(['locale' => $code]);
        App::setLocale($code);
        return redirect()->to(url()->previous());
    }

    public function render()
    {
        $language = Language::where('status', 1)->get();
        return view('livewire.layouts.includes.header', compact('language'));
    }
}
