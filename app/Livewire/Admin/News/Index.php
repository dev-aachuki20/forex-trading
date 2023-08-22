<?php

namespace App\Livewire\Admin\News;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Language;
use App\Models\News;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;
    public $news_id = null, $title, $description, $image = null, $originalImage, $link;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction'
    ];


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
        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $allNews = [];
        if ($getlangId) {
            $allNews = News::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.news.index', compact('allNews', 'languagedata'));
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->resetInputFields();
        $this->activeTab = $tab;
        $this->search = '';
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
        $this->resetInputFields();
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->status = 1;
        $this->image = null;
    }

    public function store()
    {

        $validatedData = $this->validate([
            'title'           => ['required', 'max:255', 'unique:news,title'],
            'description'     => ['nullable'],
            'status'          => ['required'],
            'image'           => ['required'],
        ]);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        $news = News::create($validatedData);


        uploadImage($news, $this->image, 'news/image/', "news-image", 'original', 'save', null);

        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $news = News::findOrFail($id);

        $this->title           = $news->title;
        $this->news_id         = $id;
        $this->description     = $news->description;
        $this->status          = $news->status;
        $this->originalImage   = $news->image_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray = [
            'title'           => ['required', 'max:255', 'unique:news,title,' . $this->news_id],
            'description'     => ['nullable'],
            'status'          => ['required'],
        ];

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }
        $validatedData = $this->validate($validatedArray);
        $validatedData['status'] = $this->status;

        $news = News::find($this->news_id);

        # Check if the image has been changed
        $uploadId = null;
        if ($this->image) {

            if ($news->newsImage) {
                $uploadId = $news->newsImage->id;
                uploadImage($news, $this->image, 'news/image/', "news-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($news, $this->image, 'news/image/', "news-image", 'original', 'save', null);
            }
        }

        $news->update($validatedData);

        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
        $this->resetInputFields();
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
        $model = News::find($deleteId);

        if ($model->newsImage != null) {
            $uploadImageId = $model->newsImage->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->news_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function toggle($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['newsId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $newsId = $data['inputAttributes']['newsId'];
        $model = News::find($newsId);
        $statusVal = $model->status ? 0 : 1;
        $model->status = $statusVal;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        return redirect()->to(url()->previous());
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
