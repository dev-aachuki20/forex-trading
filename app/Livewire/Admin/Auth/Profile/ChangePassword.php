<?php

namespace App\Livewire\Admin\Auth\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'old_password'  => ['required', 'string', 'min:6', 'max:10', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'new_password'   => ['required', 'string', 'min:6', 'max:10', 'different:old_password', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'confirm_password' => ['required', 'min:6', 'max:10', 'same:new_password', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
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
        $user = Auth::user();
        $validated = $this->validate($this->rules(), $this->messages());
        if (Hash::check($this->old_password, $user->password)) {
            $user = User::find($this->userId)->update(['password' => Hash::make($this->new_password)]);
            $this->resetInputFields();
            $this->alert('success', getLocalization('password_change'));
            return redirect()->route('auth.admin.dashboard');
        } else {
            $this->alert('error', 'Old password is incorrect.');
            return redirect()->route('auth.admin.profile_show');
        }
    }

    private function resetInputFields()
    {
        $this->old_password = '';
        $this->new_password = '';
        $this->confirm_password = '';
    }
}
