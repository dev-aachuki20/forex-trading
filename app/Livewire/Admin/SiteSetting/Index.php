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

    public $tab = 'site', $settings = null, $fileState = [], $state = [];

    protected $listeners = [
        'changeTab', 'copyTextAlert',
    ];
    public function mount()
    {
        $this->initializePlugins();

        $this->fileState['remove_site_logo'] = false;
        $this->fileState['remove_favicon'] = false;
        $this->fileState['remove_footer_logo'] = false;
        $this->fileState['remove_tradable_asset_logo'] = false;

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
    public function update()
    {
        $rules = [];
        $dimensionsDetails['site_logo']     = '';
        $dimensionsDetails['favicon']       = '';
        $dimensionsDetails['footer_logo']   = '';
        $dimensionsDetails['tradable_asset_logo']   = '';
        foreach ($this->settings as $setting) {
            if ($setting) {

                if ($setting->type == 'text') {
                    $rules['state.' . $setting->key] = 'required|string';
                }

                if ($setting->type == 'number') {
                    $rules['state.' . $setting->key] = 'required|numeric';
                }

                if ($setting->type == 'textarea') {
                    $rules['state.' . $setting->key] = ($setting->group != 'mail') ? 'required|string' : 'string';
                }
                if ($setting->type == 'image') {
                    if($setting->details){
                        $dimensions = explode(' × ', $setting->details);
                        $dimensionsDetails[$setting->key] = $setting->details;
                        $rules['state.' . $setting->key] = 'nullable|image|dimensions:max_width=' . $dimensions[0] . ',max_height=' . $dimensions[1] . '|max:' . config('constants.img_max_size') . '|mimes:jpeg,png,jpg,svg,PNG,JPG,SVG|';
                    }else{
                        $rules['state.' . $setting->key] = 'nullable|image|max:' . config('constants.img_max_size') . '|mimes:jpeg,png,jpg,svg,PNG,JPG,SVG|';
                    }
                    
                }
            }
        }

        $customMessages = [
            'required' => 'The field is required.',
            'state.site_logo' => 'The site logo must be an image.',
            'state.site_logo.mimes' => 'The site logo must be jpeg,png,jpg,PNG,JPG.',
            'state.site_logo.max'   => 'The site logo maximum size is ' . config('constants.img_max_size') . ' KB.',
            'state.site_logo.dimensions' => 'The site logo size must be ' . $dimensionsDetails['site_logo'],
            'state.site_logo.dimensions' => 'The site logo size must be ' . $dimensionsDetails['footer_logo'],
            'state.favicon.dimensions' => 'The favicon size must be ' . $dimensionsDetails['favicon'],
            'state.tradable_asset_logo' => 'The tradable asset logo must be an image.',
            'state.tradable_asset_logo.max'   => 'The tradable asset logo maximum size is ' . config('constants.img_max_size') . ' KB.',
            'state.tradable_asset_logo.mimes' => 'The tradable asset logo must be jpeg,png,jpg,PNG,JPG.',

        ];

        $validatedData = $this->validate($rules, $customMessages);

        foreach ($validatedData['state'] as $key => $stateVal) {
            $setting = SiteSetting::where('key', $key)->first();

            $setting_value = $stateVal;

            if ($setting->type == 'image') {

                $uploadId = $setting->image ? $setting->image->id : null;

                if ($stateVal && (!$this->fileState['remove_'.$key])) {
                    if ($uploadId) {
                        uploadImage($setting, $stateVal, 'settings/images/', "setting", 'original', 'update', $uploadId);
                    } else {
                        uploadImage($setting, $stateVal, 'settings/images/', "setting", 'original', 'save', null);
                    }
                } else {
                    if ($uploadId && $this->fileState['remove_'.$key]) {
                        deleteFile($uploadId);
                        $this->fileState['remove_'.$key] = false;
                    }
                }

                $setting_value = null;
            }

            $setting->value = $setting_value;
            $setting->save();
        }

        $this->alert('success', trans('messages.edit_success_message'));
    }


    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }


    public function copyTextAlert()
    {
        $this->alert('success', 'Copied Successfully!');
    }
}
