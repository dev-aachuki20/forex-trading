<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $first_name, $last_name, $mobile, $email;
    public $authUser;

    public function mount()
    {
        $this->authUser =  Auth::user();
        $this->first_name = $this->authUser->first_name;
        $this->last_name = $this->authUser->last_name;
        $this->mobile = $this->authUser->phone;
        $this->email = $this->authUser->email;
    }

    public function render()
    {
        return view('livewire.admin.auth.profile.edit');
    }

    public function updateProfile()
    {
        $validatedData = $this->validate([
            'first_name'   => 'required',
            'last_name'    => 'required',
            'mobile'       => 'required|digits:10',
        ]);

        $userDetails = [];
        $userDetails['first_name'] = $this->first_name;
        $userDetails['last_name']  = $this->last_name;
        $userDetails['name']       = $this->first_name . ' ' . $this->last_name;
        $userDetails['phone']      = $this->mobile;

        $this->authUser->update($userDetails);
        $this->alert('success',  getLocalization('update_success'));

        return redirect()->route('auth.admin.profile_show');
    }
}
