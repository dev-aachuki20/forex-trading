<?php

namespace App\Livewire\Layouts\Includes;

use Livewire\Component;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Header extends Component
{
    public function render()
    {
        return view('livewire.layouts.includes.header');
    }
}
