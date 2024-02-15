<?php

namespace App\Livewire\Frontend\Partials;

use App\Models\Language;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Header extends Component
{
    public $languages;
    public $showDisclaimer = true;
    public $locale;
    public $langCode = 'en';
    public $localeid;
    protected $listeners = [
        // 'changeLanguage',
        'setCookies',
    ];
    public function mount()
    {
        $this->langCode = Language::where('id', $this->localeid)->value('code');
        if (Cookie::get('cookie_accepted')) {
            $this->showDisclaimer = false;
        }
    }
    // public function changeLanguage($code)
    // {
    //     session(['locale' => $code]);
    //     App::setLocale($code);
    //     // Cache::put('locale', App::currentLocale());
    //     return redirect()->to(url()->previous());
    // }

    public function render()
    {
        $language = Language::where('status', 1)->get();
        return view('livewire.frontend.partials.header', compact('language'));
    }
    
    public function setCookies()
    {
        $this->showDisclaimer = false;
        Cookie::queue('cookie_accepted', true, 43200);
        $this->dispatch('removeCookieClass');
    }
}
