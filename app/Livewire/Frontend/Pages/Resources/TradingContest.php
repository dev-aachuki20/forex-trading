<?php

namespace App\Livewire\Frontend\Pages\Resources;

use App\Models\TradingContest as ModelsTradingContest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;

class TradingContest extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $localeid;
    public $pageDetail;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    // public $contestStatus;

    public function mount()
    {
        $this->pageDetail = getPageContent('trading-contest', $this->localeid);
    }
    public function render()
    {
        $allContestList = [];
        $allContestList = ModelsTradingContest::where('language_id', $this->localeid)->where('status', 1)->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->paginationLength);

        return view('livewire.frontend.pages.resources.trading-contest', compact('allContestList'));
    }
}
