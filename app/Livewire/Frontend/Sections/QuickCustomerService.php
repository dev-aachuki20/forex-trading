<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class QuickCustomerService extends Component
{
    public $tradeWithUs;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('quick_customer_service', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.quick-customer-service');
    }
}
