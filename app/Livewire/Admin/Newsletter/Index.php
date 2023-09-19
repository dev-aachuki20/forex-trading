<?php

namespace App\Livewire\Admin\Newsletter;

use App\Models\Newsletter;
use Livewire\Component;

class Index extends Component
{
    public $newsletters = null; 
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;

    public function render()
    {
        
        $this->newsletters =  Newsletter::all();
        return view('livewire.admin.newsletter.index');
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
}
