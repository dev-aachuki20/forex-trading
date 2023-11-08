<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class WhoIsSurgetrader extends Component
{
    public $localeid;
    public $sectionDetail;

    public $sectionDetail_one;
    public $sectionDetail_two;
    public $sectionDetail_three;
    public $sectionDetail_four;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('who_is_surgetrader', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }

        $this->sectionDetail_one = getSectionContent('simple_straight_forward_trading_rules', $this->localeid);
        $this->sectionDetail_two = getSectionContent('one_step_evaluation', $this->localeid);
        $this->sectionDetail_three = getSectionContent('no_time_limits', $this->localeid);
        $this->sectionDetail_four = getSectionContent('world_class_customer_support', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.who-is-surgetrader');
    }
}
