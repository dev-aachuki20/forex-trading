<?php

namespace App\Livewire\Admin\SiteSetting;

use App\Models\SiteSetting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $tab = 'site', $settings = null, $state = [];
    protected $listeners = [
        'changeTab', 'copyTextAlert',
    ];
    public function mount()
    {

        $this->settings = SiteSetting::where('group', $this->tab)->where('status', 1)->get();
        $this->state = $this->settings->pluck('value', 'key')->toArray();
    }
    public function changeTab($tab)
    {
        $this->tab = $tab;
        $this->mount();
        $this->initializePlugins();
    }
    public function render()
    {
        $allSettingType = SiteSetting::groupBy('group')->pluck('group');
        return view('livewire.admin.site-setting.index', compact('allSettingType'));
    }
}
