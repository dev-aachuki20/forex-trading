<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;


class ForgetPassword extends Component
{
    use LivewireAlert;
    public $email;

    public function render()
    {
        return view('livewire.admin.auth.forget-password');
    }

    private function resetInputFields()
    {
        $this->email = '';
    }

    public function submit()
    {
        $this->validate(
            [
                'email' => ['required', 'email', 'exists:users']
            ]
        );
        // , getCommonValidationRuleMsgs()
        try {
            $user = User::where('email', $this->email)->first();
            if ($user) {
                $token = Str::random(64);
                $email_id = $this->email;

                $userDetails = array();
                $userDetails['name'] = ucwords($user->first_name . ' ' . $user->last_name);

                $userDetails['reset_password_url'] = route('auth.admin.reset-password', [$token, encrypt($email_id)]);

                DB::table('password_resets')->insert([
                    'email' => $email_id,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);

                $subject = 'Reset Password Notification';
                Mail::to($email_id)->queue(new ResetPasswordMail($userDetails['name'], $userDetails['reset_password_url'], $subject));

                $this->alert('success', getLocalization('sent'));
            } else {
                $this->alert('error', 'Invalid Email!');
            }

            $this->resetInputFields();
        } catch (\Exception $e) {
            // dd($e->getMessage() . '->' . $e->getLine());
            $this->alert('error', getLocalization('error_message'));
        }
    }
}
