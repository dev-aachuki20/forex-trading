<?php

namespace App\Livewire\Admin\Affiliate;

use App\Models\Affiliate;
use App\Models\Language;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $sectionDetail;
    public $localeid;
    public $viewMode = false;
    public $affiliate_id = null;
    public $first_name, $last_name, $email, $mobile_no, $address, $city, $state, $zipcode, $country, $website, $instagram_handle, $youtube_handle, $twitter_handle, $purpose;

    public $status = 1, $search = '';
    public $activeTab = 1;
    public $statusText = 'Active';
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;

    public function render()
    {
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();

        $affiliates = [];
        if ($this->activeTab) {
            $affiliates = Affiliate::query()->where('language_id', null)->where(function ($query) use ($searchValue) {
                $query->where('first_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('last_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.affiliate.index', compact('affiliates', 'languagedata'));
    }


    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->affiliate_id = $id;
        $this->viewMode = true;
    }

    public function cancel()
    {
        $this->viewMode = false;
    }
}
