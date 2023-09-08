<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Package as Packages;

class Package extends Component
{
    public $packages;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('package', $this->localeid);
    }
    public function render()
    {
        $this->packages = Packages::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.package');
    }
}
