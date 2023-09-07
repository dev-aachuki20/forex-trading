<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Language;
use App\Models\Content;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
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
    public $courseDuration = null;

    public $uuid, $course_id = null, $name, $description, $image, $originalImage, $video, $originalVideo, $videoExtenstion, $status = 1;
    public $removeImage = false, $removeVideo = false;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'updatecourseDuration'
    ];

    public function updatecourseDuration($videoTime)
    {
        $this->courseDuration = Carbon::parse($videoTime)->format('H:i:s');
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
            'uuid', 'image', 'video', 'courseDuration', 'originalImage', 'originalVideo', 'name', 'description', 'search', 'status'
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

        $allCourses = [];
        if ($this->activeTab) {
            $allCourses = Course::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.courses.index', compact('allCourses', 'languagedata'));
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name'            => ['required', 'max:100', 'unique:courses,name'],
            'description'     => ['required'],
            'status'          => ['required'],
            'image'           => ['required', 'file', 'mimes:svg'],
            'video'           => ['nullable'],
        ], [
            // 'image.required' => 'The image field is required.',
            'image.mimes' => 'The image must be an SVG file.',
        ]);

        $this->uuid     = Str::uuid();

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        $validatedData['duration']    = $this->courseDuration ?? null;
        $validatedData['uuid']        = $this->uuid;

        $courses = Course::create($validatedData);

        # upload the course image
        if ($this->image) {
            uploadImage($courses, $this->image, 'course/images/', "course-image", 'original', 'save', null);
        }

        # Upload the course video
        if ($this->video) {
            uploadImage($courses, $this->video, 'course/video/', "course-video", 'original', 'save', null);
        }

        # Start to update course duration
        $total_duration = Content::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');
        Course::find($courses->id)->update(['duration' => $total_duration]);

        $this->formMode = false;
        $this->reset(['uuid']);
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $course = Course::findOrFail($id);
        $this->name            = $course->name;
        $this->course_id       = $id;
        $this->description     = $course->description;
        $this->status          = $course->status;
        $this->originalImage   = $course->course_image_url;
        $this->originalVideo   = $course->course_video_url;
        $this->courseDuration   = $course->duration;

        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray = [
            'name'            => ['required', 'max:100', 'unique:courses,name,' . $this->course_id],
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
        $validatedData['duration'] = $this->courseDuration;

        $course = Course::find($this->course_id);
        # Check if the image has been changed
        $uploadId = null;

        if ($this->image) {
            if ($course->courseImage) {
                $uploadId = $course->courseImage->id;
                uploadImage($course, $this->image, 'course/image/', "course-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($course, $this->image, 'course/image/', "course-image", 'original', 'save', null);
            }
        }

        $course->update($validatedData);

        //Start to update package duration
        $total_duration = Content::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');
        Course::find($course->id)->update(['duration' => $total_duration]);
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
        $model = Course::find($deleteId);

        if ($model->courseImage) {
            $uploadImageId = $model->courseImage->id;
            deleteFile($uploadImageId);
        }

        if ($model->courseVideo) {
            $uploadVideoId = $model->courseVideo->id;
            deleteFile($uploadVideoId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->course_id = $id;
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
            'inputAttributes' => ['courseid' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $courseid = $data['inputAttributes']['courseid'];
        $model = Course::find($courseid);
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

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
