<?php

namespace App\Livewire\Admin\Page;

use App\Models\Language;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Page;
use Illuminate\Support\Str;


class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;

    public $page_id = null, $title, $sub_title,  $image = null, $originalImage;

    public $states,$languagedata;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
    ];

    public function mount(){
        $this->languagedata =  Language::where('status', 1)->get();
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

        $typeSearch = null;
        foreach (config('constants.page_types') as $key => $typeName) {
            if (Str::contains($typeName, strtolower($searchValue))) {
                $typeSearch =  $key;
            }
        }

        $allPage = [];
        if ($this->activeTab == $this->activeTab) {
            $allPage = Page::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch, $typeSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    // ->orWhere('type', $typeSearch)
                    ->orWhere('page_key', $statusSearch)
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.page.index', compact('allPage'));
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


    // public function create()
    // {
    //     $this->resetPage('page');
    //     $this->languageId = Language::where('id', $this->activeTab)->value('id');
    //     $this->initializePlugins();
    //     $this->reset([
    //         'image', 'originalImage', 'title', 'sub_title', 'search', 'status'
    //     ]);
    // }

    public function cancel()
    {
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    // public function store()
    // {
    //     $validatedData = $this->validate(
    //         [
    //             'title'           => 'required|max:' . config('constants.textlength'),
    //             'sub_title'       => 'required',
    //             'image'           => 'required|file|mimes:,jpg,jpeg,png,svg',
    //             'status'          => 'required',
    //         ]
    //     );

    //     $validatedData['language_id'] = $this->languageId;

    //     $record =  Page::where('title', $this->title)->where('deleted_at', null)->first();
    //     if (!$record) {
    //         $page = Page::create($validatedData);

    //         // upload the image
    //         if ($this->image) {
    //             uploadImage($page, $this->image, 'page/image/', "page-image", 'original', 'save', null);
    //         }
    //         $this->formMode = false;
    //         $this->alert('success',  getLocalization('added_success'));
    //     } else {
    //         $this->alert('error',  'Title already exist');
    //     }
    // }

    public function edit($pageKey)
    {
        $this->resetPage('page');
        $pages = Page::where('page_key',$pageKey)->get();
        
        $this->states = $pages->toArray();

        // dd($this->states);

        // $this->page_id         = $id;
        // $this->title           = $page->title;
        // $this->sub_title       = $page->sub_title;
        // $this->status          = $page->status;
        // $this->originalImage   = $page->image_url;
        $this->updateMode = true;

        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate(
            [
                'title'           => 'required|max:' . config('constants.textlength'),
                'sub_title'       => 'required',
                'image'           => 'nullable|file|mimes:,jpg,jpeg,png|max:' . config('constants.img_max_size'),
                'status'          => 'required',
            ]
        );

        // if ($this->image) {
        //     $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        // }

        // $validatedData = $this->validate($validatedArray);
        // $validatedData['status'] = $this->status;

        $page = Page::find($this->page_id);

        # Check if the image has been changed
        $uploadId = null;
        if ($this->image) {
            if ($page->image) {
                $uploadId = $page->image->id;
                uploadImage($page, $this->image, 'page/image/', "page-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($page, $this->image, 'page/image/', "page-image", 'original', 'save', null);
            }
        }
        $page->update($validatedData);
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->page_id = $id;
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
            'inputAttributes' => ['pageId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $pageId = $data['inputAttributes']['pageId'];
        $model = Page::find($pageId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }

    public function cancelledToggleAction()
    {
        // $this->emit('refreshComponent');
        // $this->dispatchBrowserEvent('updateStatusCancel');
        // return redirect()->route('admin.page-manage');
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
