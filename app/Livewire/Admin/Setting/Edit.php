<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Language;
use App\Models\Setting;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Edit extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public $activeLangTab = 1, $activePage, $activeSection;

    public $languagedata, $sectionDetails, $langSections;

    public  $settingId = null, $section_key,$title, $description,  $image, $originalImage, $originalVideo, $videoExtenstion, $video, $status = 1;

    public $removeImage = false, $removeVideo = false;

    public $imgExtensions;
    public $is_image = 0, $is_video = 0;

    protected $listeners = [
        'setDescription', 'funRemoveImage', 'funRemoveVideo','pluginLoader'
    ];

    public function mount($page_key)
    {
        $this->activePage = $page_key;

        $this->languagedata =  Language::where('status', 1)->get();

        $this->langSections = Setting::whereJsonContains('page_keys', $page_key)->where('language_id', $this->activeLangTab)->get();

        $this->sectionDetails = Setting::whereJsonContains('page_keys', $page_key)->where('language_id', $this->activeLangTab)->first();

        $this->activeSection = $this->sectionDetails->id ?? '';

        $this->switchSectionTab($this->activeSection);
    }

    public function render()
    {
        return view('livewire.admin.setting.edit');
    }

    public function setDescription($description)
    {
        $this->description = $description;
        $this->initializePlugins();
    }

    public function funRemoveImage()
    {
        $this->removeImage = true;
        $this->initializePlugins();
    }

    public function funRemoveVideo()
    {
        $this->removeVideo = true;
        $this->initializePlugins();
    }

    public function switchLangTab($langId)
    {
        $this->activeLangTab = $langId;
        $this->langSections = Setting::whereJsonContains('page_keys', $this->activePage)->where('language_id', $this->activeLangTab)->get();
        $this->sectionDetails = Setting::whereJsonContains('page_keys', $this->activePage)->where('language_id', $this->activeLangTab)->first();
        $this->activeSection = $this->sectionDetails->id ?? '';

        $this->switchSectionTab($this->activeSection);
    }

    public function switchSectionTab($section_id)
    {
        $this->reset(['settingId', 'title', 'description', 'status', 'originalImage', 'originalVideo', 'is_image', 'is_video', 'removeVideo', 'removeImage','imgExtensions','section_key','image','video']);
        
        $this->originalImage = null;
        $this->activeSection = $section_id;

        $this->sectionDetails = Setting::where('id', $section_id)->where('language_id', $this->activeLangTab)->first();


        $this->settingId     = $section_id;
        $this->section_key   = $this->sectionDetails->section_key ?? '';
        $this->title         = $this->sectionDetails->title ?? '';
        $this->description   = $this->sectionDetails->description ?? '';
        $this->status        = $this->sectionDetails->status ?? 1;
        $this->originalImage = $this->sectionDetails->image_url ?? '';
        $this->originalVideo = $this->sectionDetails->video_url ?? '';
        $this->is_image = $this->sectionDetails->is_image ?? 0;
        $this->is_video = $this->sectionDetails->is_video ?? 0;

        if ($this->is_image == 1 && !is_null($this->sectionDetails->other_details)) {
            $this->imgExtensions = $this->sectionDetails->other_details;
        }
        $this->initializePlugins();
    }

    public function updateSection()
    {
        $allowedExtensions = $this->imgExtensions ?? null;

        $validationColumns = [
            'title'           => 'required|max:' . config('constants.textlength'),
            'status'          => 'required',
        ];

        if($this->section_key != 'as-seen-on'){
            $validationColumns['description']     = 'required';
        }else{
            $validationColumns['description']     = '';
        }

        if ($this->image) {
            $validationColumns['image']= 'required|file|valid_extensions:'.$this->imgExtensions;
        }

        $validatedData = $this->validate($validationColumns,[
            'image.valid_extensions' => 'The image must be '.$allowedExtensions.' file.',
        ]);

        $setting = Setting::find($this->settingId);

        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            if ($setting->image) {
                $uploadId = $setting->image->id;
                uploadImage($setting, $this->image, 'setting/images/', "setting-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($setting, $this->image, 'setting/images/', "setting-image", 'original', 'save', $uploadId);
            }
        }

        if ($this->removeImage) {
            if ($setting->image) {
                $uploadVideoId = $setting->image->id;
                deleteFile($uploadVideoId);
            }
        }

        # Check if the video has been changed
        $uploadVideoId = null;
        if (!empty($this->video)) {
            if ($setting->video) {
                $uploadVideoId = $setting->video->id;
                uploadImage($setting, $this->video, 'setting/video/', "setting-video", 'original', 'update', $uploadVideoId);
            } else {
                uploadImage($setting, $this->video, 'setting/video/', "setting-video", 'original', 'save', $uploadVideoId);
            }
        }

        if ($this->removeVideo) {
            if ($setting->video) {
                $uploadVideoId = $setting->video->id;
                deleteFile($uploadVideoId);
            }
        }

        unset($validatedData['image']);
        Setting::where('id', $this->settingId)->update($validatedData);
        // $this->updateMode = false;

        $this->alert('success',  getLocalization('updated_success'));
    }


    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function pluginLoader($status){
        if($status){
            $this->dispatch('loadPlugins');
        }
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
