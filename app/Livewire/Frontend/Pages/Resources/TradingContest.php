<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\TradingContest as ModelsTradingContest;
use App\Models\TradingContestRegistration;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use App\Models\TradingContest as Contest;

class TradingContest extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $localeid;
    public $pageDetail;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;

    public $search = '';
    public $modal = true;
    public $trading_contest_id  = null, $first_name, $last_name, $email, $contact_number, $nick_name, $country_name, $trading_account_no, $accept_term_condition;
    public $totalContestant = 0;
    public $allRules = null;
    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
    ];

    public function mount()
    {
        $this->pageDetail = getPageContent('trading-contest', $this->localeid);
    }
    public function getAllRules($contest_id)
    {
        $contest = Contest::find($contest_id);
        if ($contest) {
            $this->allRules = $contest->rules()->where('language_id', $this->localeid)->get();
        }
    }

    public function render()
    {
        $allContestList = [];
        $allContestList = ModelsTradingContest::where('language_id', $this->localeid)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);
        return view('livewire.frontend.pages.resources.trading-contest', compact('allContestList'));
    }

    public function cancel()
    {
        $this->resetErrorBag();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'first_name'             => ['required', 'string', 'alpha', 'max:' . config('constants.contest_registration_length.first_name')],
            'last_name'              => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:' . config('constants.contest_registration_length.last_name')],
            'email'                  => ['required', 'email:dns'],
            'contact_number'         => ['nullable', 'numeric', 'digits:10'],
            'nick_name'              => ['nullable', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:' . config('constants.contest_registration_length.nickname')],
            'country_name'           => ['required'],
            'trading_account_no'     => ['required', 'numeric', 'digits:10'],
            'accept_term_condition'  => ['accepted'],
        ], [
            'first_name.regex' => 'Only accept alphabets',
            'last_name.regex' => 'Only accept alphabets',
            'nick_name.regex' => 'Only accept alphabets',
            'accept_term_condition.accepted' => 'You must accept the terms and conditions.',
        ]);

        $validatedData['language_id']        = $this->localeid;
        $validatedData['trading_contest_id'] = $this->trading_contest_id;
        TradingContestRegistration::create($validatedData);
        $this->modal = false;
        $this->alert('success',  getLocalization('added_success'));
        return redirect()->to(url()->previous());
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
