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
use Illuminate\Validation\Rule;


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

    public $uuid, $course_id = null, $name, $description, $image, $originalImage, $status = 1;
    // $video, $originalVideo, $videoExtenstion;
    public $removeImage = false;
    //  $removeVideo = false;

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
            'uuid', 'image', 'courseDuration', 'originalImage', 'name', 'description', 'search', 'status'
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
            'name' => 'required|unique:courses,name,NULL,id,deleted_at,NULL|max:100',
            'description'     => ['required'],
            'status'          => ['required'],
            'image'           => ['required'],
            // 'image'        => ['required', 'file', 'mimes:svg'],
            // 'video'        => ['nullable'],
        ]);
        $this->uuid     = Str::uuid();
        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        // $validatedData['duration']    = $this->courseDuration ?? null;
        $validatedData['uuid']        = $this->uuid;

        try {
            $courses = Course::create($validatedData);
            $dateFolder = date("Y-m-W");
            $tmpImagePath = 'upload/image/' . $dateFolder . '/' . $this->image;
            uploadFile($courses, $tmpImagePath, 'course/image/', "course-image", "original", "save", null);

            $this->formMode = false;
            $this->reset(['uuid']);
            $this->alert('success',  getLocalization('added_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage().'->'.$e->getLine());
            $this->alert('error', trans('messages.error_message'));
        }
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
        // $this->originalVideo   = $course->course_video_url;
        // $this->courseDuration   = $course->duration;

        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray = [
            // 'name'            => ['required', 'max:100', 'unique:courses,name,' . $this->course_id],
            'name'            => ['required','max:100',Rule::unique('courses', 'name')->ignore($this->course_id)->whereNull('deleted_at')],
            'description'     => ['required'],
            'status'          => ['required'],
        ];

        // $existingCourse = Course::where('name', $this->name)
        //     ->where('id', '!=', $this->course_id)
        //     ->first();


        // if ($existingCourse) {
        //     $this->addError('name', 'The name has already been taken.');
        //     return;
        // }

        if ($this->image || $this->removeImage) {
            // $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');

            $validatedArray['image'] = 'required';
        }
        
        $validatedData = $this->validate($validatedArray);

        try {
            $validatedData['status'] = $this->status;
            $course = Course::find($this->course_id);
            // Check if the image has been changed
            $uploadImageId = null;
            $dateFolder = date("Y-m-W");

            if ($this->image) {
                $uploadImageId = $course->courseImage->id;
                $tmpImagePath = 'upload/image/' . $dateFolder . '/' . $this->image;
                uploadFile($course, $tmpImagePath, 'course/image/', "course-image", "original", "update", $uploadImageId);
            }

            $course->update($validatedData);

            $this->formMode = false;
            $this->updateMode = false;
            $this->alert('success',  getLocalization('updated_success'));
        } catch (\Exception $e) {
            // dd($e->getMessage().'->'.$e->getLine());
            $this->alert('error', trans('messages.error_message'));
        }
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
        $model->lectures()->delete();
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
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
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
        
        // If the course is deactivated, deactivate related lectures
        $model->lectures()->update(['status' =>  $status]);
        
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex, 'activeTab' => $this->activeTab]);
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
