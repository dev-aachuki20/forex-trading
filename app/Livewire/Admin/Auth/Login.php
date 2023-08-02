<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Auth;
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
        return view('livewire.admin.auth.login',compact('verified','alreadyVerified'));
    }

    private function resetInputFields()
    {
        $this->email = '';
        $this->password = '';
    }


    // login and send mail
    public function login()
    {
        $validated = $this->validate([
            'email'    => ['required', 'email'],
            'password' => 'required',
        ]);

        // $remember_me = !is_null($this->remember_me) ? true : false;
        $credentialsOnly = [
            'email'    => $this->email,
            'password' => $this->password,
        ];

        try {
            $checkVerified = User::where('email',$this->email)->first();
            // $checkVerified = User::where('email', $this->email)->whereNull('email_verified_at')->first();

            if ($checkVerified) {

                if (Auth::attempt($credentialsOnly)) {

                    $this->resetInputFields();
                    $this->resetErrorBag();
                    $this->resetValidation();

                    if (Auth::user()->hasRole('admin')) {
                        $this->flash('success', trans('panel.message.login_success'));
                        return redirect()->route('auth.admin.dashboard');
                    } else {
                        $this->flash('error', trans('panel.message.only_admin_access'));
                        return redirect()->route('auth.admin.login');
                    }
                } else {
                    $this->flash('error', trans('panel.message.cred_error'));
                    return redirect()->route('auth.admin.login');
                }
            } else {
                $this->addError('email', trans('panel.message.email_verify_first'));
            }

            $this->resetInputFields();
        } catch (ValidationException $e) {

            $this->addError('email', $e->getMessage());
        }
    }


    // public function checkEmail()
    // {
    //     $validated = $this->validate([
    //         'email'    => ['required','email',new IsActive],
    //     ], getCommonValidationRuleMsgs());

    //     // $user = User::where('email', $this->email)->whereNull('email_verified_at')->first();
    //     // if ($user) {
    //     //     // $this->showResetBtn = true;
    //     //     $this->addError('email', trans('panel.message.email_verify_first'));
    //     // }
    // }

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


    // basic login
    // public function login()
    // {
    //     $validated = $this->validate([
    //         'email'    => ['required','email'],
    //         'password' => 'required',
    //     ]);

    //     // $remember_me = !is_null($this->remember_me) ? true : false;
    //     $credentialsOnly = [
    //         'email'    => $this->email,
    //         'password' => $this->password,
    //     ]; 

    //     try {
    //         $checkVerified = User::where('email',$this->email)->first();
    //         // $checkVerified = User::where('email',$this->email)->whereNull('email_verified_at')->first();

    //         if($checkVerified){
    //             if (Auth::attempt($credentialsOnly)) {
    //                 if(Auth::user()->hasRole('admin')){
    //                     $this->flash('success', trans('panel.message.login_success'));
    //                     return redirect()->route('auth.admin.dashboard');
    //                 }else{
    //                     $this->flash('error', trans('panel.message.only_admin_access'));
    //                     return redirect()->route('auth.admin.login');
    //                 }

    //             }else{
    //                 $this->flash('error', trans('panel.message.cred_error'));
    //                 return redirect()->route('auth.admin.login');
    //             }

    //         }

    //         $this->resetInputFields();

    //     } catch (ValidationException $e) {

    //         $this->addError('email', $e->getMessage());
    //     }

    // }
}
