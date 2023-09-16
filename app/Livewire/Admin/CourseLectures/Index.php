<?php

namespace App\Livewire\Admin\CourseLectures;

use App\Models\Content;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Language;
use App\Models\Lecture;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Index extends Component

{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null;
    public $lectureDuration = null;

    public $uuid, $lecture_id, $content_id = null, $name, $description, $image, $originalImage, $video, $originalVideo, $videoExtenstion, $status = 1;
    public $removeImage = false, $removeVideo = false;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'updatelectureDuration'
    ];

    public function mount($uuid) # content uuid 
    {
        $this->content_id = Content::where('uuid', $uuid)->value('id');
    }

    public function updatelectureDuration($videoTime)
    {
        $this->lectureDuration = Carbon::parse($videoTime)->format('H:i:s');
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
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

    public function create()
    {
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
        $this->reset([
            'uuid', 'image', 'video', 'lectureDuration', 'originalImage', 'originalVideo', 'name', 'description', 'search', 'status'
        ]);
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        if (Str::contains('active', strtolower($searchValue))) {
            $statusSearch = 1;
        } else if (Str::contains('inactive', strtolower($searchValue))) {
            $statusSearch = 0;
        }
        $languagedata =  Language::where('status', 1)->get();

        $alllectures = [];
        if ($this->activeTab) {
            $alllectures = Lecture::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.course-lectures.index', compact('alllectures', 'languagedata'));
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name'            => ['required', 'max:100', 'unique:lectures,name'],
            'description'     => ['required'],
            'status'          => ['required'],
            'image'           => ['required'],
            'video'           => ['nullable'],
        ]);

        $this->uuid     = Str::uuid();

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        $validatedData['duration']    = $this->lectureDuration ?? null;
        $validatedData['uuid']        = $this->uuid;
        $validatedData['content_id']  = $this->content_id;

        $lectures = Lecture::create($validatedData);

        # upload the lectures image
        if ($this->image) {
            uploadImage($lectures, $this->image, 'lectures/images/', "lectures-image", 'original', 'save', null);
        }

        # Upload the lectures video
        if ($this->video) {
            uploadImage($lectures, $this->video, 'lectures/video/', "lectures-video", 'original', 'save', null);
        }

        # Start to update lectures duration
        $total_duration = Lecture::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');
        Content::find($this->content_id)->update(['duration' => $total_duration]);

        $this->formMode = false;
        $this->reset(['uuid']);
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $lecture = Lecture::findOrFail($id);
        $this->name            = $lecture->name;
        $this->lecture_id      = $id;
        $this->description     = $lecture->description;
        $this->status          = $lecture->status;
        $this->originalImage   = $lecture->lecture_image_url;
        $this->originalVideo   = $lecture->lecture_video_url;
        $this->lectureDuration   = $lecture->duration;

        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray = [
            'name'            => ['required', 'max:100', 'unique:lectures,name,' . $this->lecture_id],
            'description'     => ['required'],
            'status'          => ['required'],
        ];

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }

        if ($this->video) {
            $validatedArray['video'] = 'required|file|mimes:mp4,avi,mov,wmv,webm,flv|max:' . config('constants.video_max_size');
        }

        $validatedData = $this->validate($validatedArray);
        $validatedData['status'] = $this->status;
        $validatedData['duration'] = $this->lectureDuration;

        $lectures = Lecture::find($this->lecture_id);
        # Check if the image has been changed
        $uploadId = null;

        if ($this->image) {
            if ($lectures->lectureImage) {
                $uploadId = $lectures->lectureImage->id;
                uploadImage($lectures, $this->image, 'lectures/image/', "lectures-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($lectures, $this->image, 'lectures/image/', "lectures-image", 'original', 'save', null);
            }
        }

        $lectures->update($validatedData);

        //Start to update package duration
        $total_duration = Lecture::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');
        Content::find($this->content_id)->update(['duration' => $total_duration]);
        //End to update package duration

        $this->formMode = false;
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
            'inputAttributes' => ['deleteId' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $deleteId = $data['inputAttributes']['deleteId'];
        $model = Lecture::find($deleteId);

        if ($model->lectureImage) {
            $uploadImageId = $model->lectureImage->id;
            deleteFile($uploadImageId);
        }

        if ($model->lectureVideo) {
            $uploadVideoId = $model->lectureVideo->id;
            deleteFile($uploadVideoId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->lecture_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
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
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['lectureid' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $lectureid = $data['inputAttributes']['lectureid'];
        $model = Lecture::find($lectureid);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
