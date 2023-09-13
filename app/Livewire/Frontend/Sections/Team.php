<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Team as ModelsTeam;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;

class Team extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $localeid;
    public $memebr_type = 1;
    public $sortColumnName = 'id', $sortDirection = 'desc', $paginationLength = 6;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('meet_the_team', $this->localeid);
    }
    public function render()
    {
        $teamMembers = [];
        $teamMembers = ModelsTeam::where('language_id', $this->localeid)->where('type', $this->memebr_type)->where('status', 1)->paginate($this->paginationLength);
        return view('livewire.frontend.sections.team', compact('teamMembers'));
    }
}
