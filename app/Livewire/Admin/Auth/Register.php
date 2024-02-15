<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
// use App\Mail\SendRegisteredUserMail;

class Register extends Component
{
    use LivewireAlert;
    public $firstname, $lastname, $useremail, $phone, $dob, $gender, $password, $password_confirmation;
    // public $role = 'user';
    protected function rules()
    {
        return [
            'firstname' => ['required', 'string', 'regex:/^[^\d\s]+(\s{0,1}[^\d\s]+)*$/', 'max:255'],
            'lastname'  => ['required', 'string', 'regex:/^[^\d\s]+(\s{0,1}[^\d\s]+)*$/', 'max:255'],
            'useremail' => ['required', 'string', 'email', 'max:255', Rule::unique((new User)->getTable(), 'email')],
            'phone'     => ['required', 'digits:10'],
            'dob'       => ['required'],
            'password'  => ['required', 'string', 'min:8'],
            // 'gender'     => ['required'],
            // 'password_confirmation' => 'min:8|same:password',
        ];
    }

    protected function messages()
    {
        // return getCommonValidationRuleMsgs();
        return [
            'firstname.regex' => trans('validation.alpha'),
            'lastname.regex' => trans('validation.alpha'),
        ];
    }

    public function register()
    {
        $validated = $this->validate($this->rules(), $this->messages());

        // $this->paymentMode = true;

        // if ($this->paymentSuccess) {
        // DB::beginTransaction();
        try {

            $user = User::where('email', $this->useremail)->first();
            $password = rand(8, 8);

            if (!$user) {
                $data = [
                    'first_name' => $this->firstname,
                    'last_name'  => $this->lastname,
                    'name'       => $this->firstname . ' ' . $this->lastname,
                    'email'      => $this->useremail,
                    'phone'      => $this->phone,
                    'dob'        => $this->dob,
                    // 'dob'        => Carbon::parse($this->dob)->format('Y-m-d'),
                    'password'         => Hash::make($password),
                    'password_set_at'   => Carbon::now(),
                    'email_verified_at' => Carbon::now(),
                ];
                $user = User::create($data);
                $user->assignRole('user'); // or hardcode role name

                return redirect()->route('auth.admin.login', app()->getLocale());
            } else {
                dd('error');
                // $this->resetInputFields();

                // Set Flash Message
                // $this->alert('error', trans('panel.message.error'));
            }
        } catch (\Exception $e) {
            // DB::rollBack();
            dd($e->getMessage() . '->' . $e->getLine());
            // $this->alert('error', trans('messages.error_message'));
        }
        // }
    }
    public function resetInputFields()
    {
        $this->firstname   = '';
        $this->lastname    = '';
        $this->useremail        = '';
        $this->phone        = '';
        $this->dob          = '';
        $this->password = '';
        // $this->gender       = '';
    }

    public function render()
    {
        return view('livewire.admin.auth.register');
    }
}
