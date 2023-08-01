<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChangePassword extends Component
{
    use LivewireAlert;
    
    protected $layout = null;

    public $userId;

    public $oldPassword, $checkOldPassword;

    public $old_password, $new_password, $confirm_password;

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->oldPassword = auth()->user()->password;
    }

    protected function rules()
    {
        return [
            'old_password'  => ['required', 'string', 'min:8'],
            'new_password'   => ['required', 'string', 'min:8','different:old_password'],
            'confirm_password' => ['required', 'min:8', 'same:new_password'],
        ];
    }

    protected function messages()
    {
        return [
            'confirm_password.same' => 'The confirm password and new password must match.'
        ];
    }

    public function render()
    {
        return view('livewire.admin.auth.profile.change-password');
    }

    public function updatePassword()
    {
        $validated = $this->validate($this->rules(), $this->messages());

        User::find($this->userId)->update(['password' => Hash::make($this->new_password)]);

        $this->resetInputFields();

        // Set Flash Message
        $this->flash('success', trans('panel.message.password_change'));
        return redirect()->route('auth.admin.dashboard');
    }

    private function resetInputFields(){
        $this->old_password = '';
        $this->new_password = '';
        $this->confirm_password = '';
    }
}
