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

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;

    public $page_id = null, $parent_page, $title, $sub_title, $type, $typeselect = [], $description, $image = null, $originalImage, $link;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
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

        $typeSearch = null;
        foreach (config('constants.page_types') as $key => $typeName) {
            if (Str::contains($typeName, strtolower($searchValue))) {
                $typeSearch =  $key;
            }
        }
        $languagedata =  Language::where('status', 1)->get();
        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $allPage = [];
        if ($this->activeTab == $getlangId) {
            $allPage = Page::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch, $typeSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('type', $typeSearch)
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.page.index', compact('allPage', 'languagedata'));
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
        $this->parent_page = '';
        $this->title = '';
        $this->sub_title = '';
        $this->type = '';
        $this->description = '';
        $this->status = 1;
        $this->image = null;
        $this->link = '';
    }

    public function store()
    {
        $validatedData = $this->validate(
            [
                'title'           => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
                'sub_title'       => '',
                'description'     => '',
                'link'            => '',
                'type'            => '',
                'type'            => 'required',
                'status'          => 'required',
            ],
            [
                'title.regex'     => 'Only letters allowed',
                'type.min'        => 'Please select at least one type.',
            ]
        );

        $validatedData['language_id'] = $this->languageId;

        $record =  Page::where('title', $this->title)->where('deleted_at', null)->first();
        if (!$record) {
            $page = Page::create($validatedData);

            // upload the image
            if ($this->image) {
                uploadImage($page, $this->image, 'page/image/', "page-image", 'original', 'save', null);
            }
            $this->formMode = false;
            $this->resetInputFields();
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Title already exist');
        }
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $page = Page::findOrFail($id);

        $this->page_id         = $id;
        $this->title           = $page->title;
        $this->sub_title       = $page->sub_title;
        $this->type            = $page->type;
        $this->description     = $page->description;
        $this->status          = $page->status;
        $this->originalImage   = $page->image_url;
        $this->link            = $page->link;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {

        $validatedArray = [
            'title'           => ['required', /*'regex:/^[A-Za-z]+( [A-Za-z]+)?$/u',*/ 'max:255', 'unique:pages,title,' . $this->page_id],
            'sub_title'       => '',
            'type'            => '',
            'description'     => '',
            'link'            => '',
            'status'          => 'required',
        ];

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }

        $validatedData = $this->validate($validatedArray);
        $validatedData['status'] = $this->status;

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
        $model = Page::find($deleteId);

        $uploadImageId = null;
        if ($model->image) {
            $uploadImageId = $model->image->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->page_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function toggle($id,$toggleIndex)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['pageId' => $id,'toggleIndex'=>$toggleIndex],
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
        $this->dispatch('changeToggleStatus',['status'=>$status,'index'=>$toggleIndex]);
    }

    public function cancelledToggleAction()
    {
        $this->emit('refreshComponent');
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
