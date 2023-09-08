<?php

namespace App\Livewire\Admin\Setting;

use Livewire\Component;
use App\Models\Language;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public  $activeTab = 1;

    public  $settingId = null, $title, $description,  $image, $originalImage, $originalVideo, $videoExtenstion, $video, $status = 1, $button_one, $button_two, $link_one, $link_two;

    public $languageId;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];

    public function render()
    {
        $statusSearch = 0;
        $searchValue = $this->search;
        $searchTerms = config('constants.setting_types');

        foreach ($searchTerms as  $key => $searchTerm) {
            if (Str::contains(strtolower($searchValue), strtolower($searchTerm))) {
                $statusSearch = $key;
            }
        }
        $languagedata = Language::where('status', 1)->get();

        $settings = [];
        if ($this->activeTab == $this->activeTab) {
            $settings = Setting::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')->orWhere('section_key', $statusSearch)->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.setting.index', compact('settings', 'languagedata'));
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }


    public function sortBy($columnName)
    {
        $this->resetPage();
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    // public function create()
    // {
    //     $this->resetPage('page');
    //     $this->formMode = true;
    //     $this->languageId = Language::where('id', $this->activeTab)->value('id');
    //     $this->initializePlugins();
    //     $this->reset([
    //         'image', 'originalImage', 'originalVideo', 'title', 'description', 'type', 'video', 'search', 'status'
    //     ]);
    // }

    public function cancel()
    {
        $this->updateMode = false;
        $this->viewMode = false;
    }

    public function store()
    {
        $validatedata = $this->validate([
            'title'           => 'required|max:' . config('constants.titlelength'),
            'description'     => 'required',
            'type'            => 'required',
            'status'          => 'required',
            'image'           => 'required',
            'video'           => 'required',
        ]);

        $validatedata['language_id'] = $this->languageId;


        $setting = Setting::where('deleted_at', null)->where('title', $this->title)->where('type', $this->type)->first();

        if (!$setting) {
            $setting = Setting::create($validatedata);

            // upload the image
            if ($this->image) {
                uploadImage($setting, $this->image, 'setting/images/', "setting-image", 'original', 'save', null);
            }

            //Upload video
            if ($this->video) {
                uploadImage($setting, $this->video, 'setting/video/', "setting-video", 'original', 'save', null);
            }
        }
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $sections = Setting::where('id', $id)->where('deleted_at', null)->first();
        $this->settingId     = $id;
        $this->title         = $sections->title;
        $this->description   = $sections->description;
        $this->link_one      = $sections->link_one;
        $this->link_two      = $sections->link_two;
        $this->button_one    = $sections->button_one;
        $this->button_two    = $sections->button_two;
        $this->status        = $sections->status;
        $this->originalImage = $sections->image_url;
        $this->originalVideo = $sections->video_url;

        // $this->videoExtenstion = $record->faqVideo->extension;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate(
            [
                'title'           => 'required|max:' . config('constants.textlength'),
                'description'     => 'required',
                // 'image'           => 'nullable|file|mimes:,jpg,jpeg,png,svg',
                // 'video'           => 'nullable',
                'status'          => 'required',
                'link_one'        => 'nullable',
                'link_two'        => 'nullable',
                'button_one'      => 'nullable',
                'button_two'      => 'nullable',
            ]
        );

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

        Setting::where('id', $this->settingId)->update($validatedData);
        $this->updateMode = false;

        $this->alert('success',  getLocalization('updated_success'));
    }

    public function delete($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to delete it.',
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'deleteConfirm',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['delid' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $delid = $data['inputAttributes']['delid'];
        $model = Setting::find($delid);

        if ($model->image) {
            $uploadImageId = $model->image->id;
            deleteFile($uploadImageId);
        }

        if ($model->video) {
            $uploadvideoId = $model->video->id;
            deleteFile($uploadvideoId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function toggle($id, $toggleIndex)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['settingId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $settingId = $data['inputAttributes']['settingId'];
        $model = Setting::find($settingId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex]);
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->settingId = $id;
        $this->viewMode  = true;
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
