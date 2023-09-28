<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OurPhilanthropy extends Component
{
    public $localeid;
    public $sectionDetail;
    public $imageData;
    // public  $originalPhilanthropyImage1;
    // public  $originalPhilanthropyImage2;
    // public  $originalPhilanthropyImage3;
    // public  $originalPhilanthropyImage4;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('our_philanthropy', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        $this->imageData = $this->sectionDetail->uploads()->wherein('type', ['philanthropy-image-one', 'philanthropy-image-two', 'philanthropy-image-three', 'philanthropy-image-four'])->get();
        return view('livewire.frontend.sections.our-philanthropy');
    }
}
