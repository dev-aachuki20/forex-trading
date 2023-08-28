<?php

namespace App\Livewire\Frontend\Partials;

use app\Models\Language;
use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class Header extends Component
{
    public $languages;
    public $showDisclaimer = true;
    protected $listeners = [
        'changeLanguage',
        'setCookies',
    ];
    public function mount()
    {
        if (Cookie::get('cookie_accepted')) {
            $this->showDisclaimer = false;
        }
    }
    public function changeLanguage($code)
    {
        app()->setLocale($code);
        Cache::put('locale', App::currentLocale());
        return redirect()->to(url()->previous());
    }
    public function render()
    {
        $language = Language::where('status', 1)->get();
        return view('livewire.frontend.partials.header', compact('language'));
    }
    public function setCookies()
    {
        $this->showDisclaimer = false;
        Cookie::queue('cookie_accepted', true, 43200);
    }
}
