<?php

namespace App\Livewire\Admin\PackageManager;

use App\Models\Language;
use App\Models\Package;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $packageId, $package_name, $price, $audition_fee, $description, $status = 1;
    public $languageId = null;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();

        $packages = [];

        $packages = Package::query()->where(function ($query) use ($searchValue) {
            $query->where('package_name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%')
                ->orWhere('audition_fee', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        });

        if ($this->activeTab) {
            $packages =   $packages->where('language_id', $this->activeTab);
        } else {
            $packages;
        }

        $packages = $packages->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationLength);
        return view('livewire.admin.package-manager.index', compact('packages', 'languagedata'));
    }

    public function create()
    {
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
        $this->reset(['package_name', 'price', 'audition_fee', 'description', 'search', 'status'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
    }
    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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

    public function store()
    {
        $validateData = $this->validate([
            'package_name'      => 'required',
            'price'             => 'required',
            'audition_fee'      => 'required',
            'description'       => 'required',
            'status'            => 'required',
        ]);

        $validateData['created_by'] = Auth::user()->id;
        $validateData['language_id'] = $this->languageId;
        $packageData = Package::where('deleted_at', null)->where('package_name', $this->package_name)->first();
        if (!$packageData) {
            Package::create($validateData);
            $this->formMode = false;
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Package name already exist');
        }
    }

    public function edit($id)
    {
        $record = Package::where('id', $id)->where('deleted_at', null)->first();
        $this->packageId        = $id;
        $this->package_name     = $record->package_name;
        $this->price            = $record->price;
        $this->audition_fee     = $record->audition_fee;
        $this->description      = $record->description;
        $this->status           = $record->status;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'package_name' => 'required',
            'price'        => 'required',
            'audition_fee' => 'required',
            'description'  => 'required',
            'status'       => 'required',
        ]);

        Package::where('id', $this->packageId)->update($validatedData);
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
            'inputAttributes' => ['delid' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $delid = $data['inputAttributes']['delid'];
        $model = Package::find($delid);
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
            'inputAttributes' => ['partnerLogoId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $packageId = $data['inputAttributes']['partnerLogoId'];
        $model = Package::find($packageId);
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
        $this->packageId = $id;
        $this->formMode  = false;
        $this->viewMode  = true;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
