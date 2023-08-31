<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;



class Login extends Component
{
    use LivewireAlert;

    public $email, $password, $remember_me;
    public $verifyMailComponent = false;

    protected $listeners = ['verifiedAlert', 'alreadyVerifiedAlert'];

    public function render()
    {
        $verified = session('verified') ?? 'false';
        $alreadyVerified = session('alreadyVerified') ?? 'false';
        return view('livewire.admin.auth.login', compact('verified', 'alreadyVerified'));
    }

    private function resetInputFields()
    {
        $this->email = '';
        $this->password = '';
    }


    public function login()
    {
        $validated = $this->validate([
            'email'    => ['required', 'email'],
            'password' => 'required',
        ]);

        $credentialsOnly = [
            'email'    => $this->email,
            'password' => $this->password,
        ];

        try {
            $checkVerified = User::where('email', $this->email)->first();
            if ($checkVerified) {
                if (Auth::attempt($credentialsOnly)) {

                    $this->resetInputFields();
                    $this->resetErrorBag();
                    $this->resetValidation();


                    if (Auth::user()->hasRole('admin')) {
                        $this->alert('success', getLocalization('login_success'));
                        return redirect()->route('auth.admin.dashboard');
                    } else {
                        $this->alert('error',  getLocalization('only_admin_access'));
                        return redirect()->route('auth.admin.login');
                    }
                } else {
                    $this->alert('error', getLocalization('cred_error'));
                    return redirect()->route('auth.admin.login');
                }
            } else {
                $this->addError('email', 'These credentials do not match our records.');
            }

            $this->resetInputFields();
        } catch (ValidationException $e) {

            $this->addError('email', $e->getMessage());
        }
    }

    public function backToLogin()
    {
        $this->verifyMailComponent = false;
    }

    public function verifiedAlert()
    {
        $this->alert('success', 'Verified successfully! your password has been sent to your mail id.');
    }

    public function alreadyVerifiedAlert()
    {
        $this->alert('success', 'Your mail has been already verified!');
    }
}
