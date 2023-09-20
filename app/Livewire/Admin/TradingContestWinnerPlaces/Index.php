<?php

namespace App\Livewire\Admin\TradingContestWinnerPlaces;

use App\Models\Language as ModelsLanguage;
use App\Models\TradingContestWinnerPlace;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use JetBrains\PhpStorm\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;


    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $contest_id;
    public $winnerPlace_id = null;
    public $title, $position;

    protected $listeners = [
        'updatedContent', 'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
    ];
    public function render()
    {
        $searchValue = $this->search;
        $allContestwinnerplaces = [];
        if ($this->activeTab) {
            $allContestwinnerplaces = TradingContestWinnerPlace::query()->where('language_id', $this->activeTab)->where('trading_contest_id', $this->contest_id)->whereNull('deleted_at')->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')->orWhere('position', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.trading-contest-winner-places.index', compact('allContestwinnerplaces'));
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

    public function create()
    {
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = ModelsLanguage::where('id', $this->activeTab)->value('id');

        $this->reset([
            'title', 'position', 'search'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetValidation();
    }

    public function store()
    {
        $validatedData = $this->validate(
            [
                "title" =>  ['required', 'max:' . config('constants.winnerplacetitlelength')],
                "position" => ['required', 'numeric', 'min:1', function ($attribute, $value, $fail) {
                    $exists = TradingContestWinnerPlace::where('position', $value)
                        ->where('trading_contest_id', $this->contest_id)
                        ->exists();
                    if ($exists) {
                        $fail('The position is already taken for this contest.');
                    }
                }],
            ],
            [
                'position.min' => 'The position must be a positive number'
            ]
        );
        $validatedData['language_id'] = $this->languageId;
        $validatedData['trading_contest_id'] = $this->contest_id;
        TradingContestWinnerPlace::create($validatedData);
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $winnerPlace = TradingContestWinnerPlace::findOrFail($id);
        $this->winnerPlace_id  = $id;
        $this->title           = $winnerPlace->title;
        $this->position        = $winnerPlace->position;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedData = $this->validate(
            [
                'title'           => 'required|max:' . config('constants.winnerplacetitlelength'),
                'position'        => 'required|numeric|min:1|unique:trading_contest_winner_places,position,' . $this->winnerPlace_id,
            ],
            [
                'position.min' => 'The position must be a positive number'
            ]
        );

        $winnerPlaces = TradingContestWinnerPlace::find($this->winnerPlace_id);
        $winnerPlaces->update($validatedData);
        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->winnerPlace_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
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
        $model = TradingContestWinnerPlace::find($deleteId);
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    // public function toggle($id, $toggleIndex)
    // {
    //     $this->confirm('Are you sure?', [
    //         'text' => 'You want to change the status.',
    //         'toast' => false,
    //         'position' => 'center',
    //         'confirmButtonText' => 'Yes, change it!',
    //         'cancelButtonText' => 'No, cancel!',
    //         'onConfirmed' => 'confirmedToggleAction',
    //         'onDismissed' => 'cancelledToggleAction',
    //         'inputAttributes' => ['contestID' => $id, 'toggleIndex' => $toggleIndex],
    //     ]);
    // }

    // public function confirmedToggleAction($data)
    // {
    //     $toggleIndex = $data['inputAttributes']['toggleIndex'];
    //     $contestID = $data['inputAttributes']['contestID'];
    //     $model = TradingContest::find($contestID);
    //     $status = !$model->status;
    //     $model->status = $status;
    //     $model->save();
    //     $this->alert('success',  getLocalization('change_status'));
    //     $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex, 'activeTab' => $this->activeTab]);
    // }

    // public function changeStatus($statusVal)
    // {
    //     $this->status = (!$statusVal) ? 1 : 0;
    // }

    public function getPositionSuffix($position)
    {
        if ($position % 10 == 1 && $position % 100 != 11) {
            return 'st';
        } elseif ($position % 10 == 2 && $position % 100 != 12) {
            return 'nd';
        } elseif ($position % 10 == 3 && $position % 100 != 13) {
            return 'rd';
        } else {
            return 'th';
        }
    }
}
