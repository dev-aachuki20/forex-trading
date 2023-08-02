<?php

namespace App\Livewire\Admin\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use DB;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class PasswordReset extends Component
{
    use LivewireAlert;
    public $token;
    public $email;
    public $password ,$password_confirmation;

    protected function rules()
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ];
    }

    protected function messages()
    {
        // return getCommonValidationRuleMsgs();
        return [
            'password.required' => 'Password is required!',
            'password.min' => 'The Password should be at least 8 letter.',
            'password.confirmed' => 'The Password should be confirm.',
            'password_confirmation.required' => 'Confirm password is required!',
            'password_confirmation.min' => 'The confirm password should be at least 8 letter.',
        ];
    }

    public function mount(){
        $this->email = decrypt($this->email);
    } 
    public function render()
    {
        return view('livewire.admin.auth.password-reset');
    }

    public function submit(){
        $email_id = $this->email;
        
        $validated = $this->validate($this->rules(), $this->messages());

        $updatePassword = DB::table('password_resets')->where(['email' => $email_id,'token' => $this->token])->first();

        if(!$updatePassword){

            $this->alert('error', getLocalization('token'));
           
        }else{
                $user = User::where('email', $email_id)
                ->update(['password' => Hash::make($this->password)]);
    
                DB::table('password_resets')->where(['email'=> $email_id])->delete();
    
                // Set Flash Message
                $this->flash('success',getLocalization('reset'));
           
        }

        $this->resetInputFields();

        return redirect()->route('auth.admin.login');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    private function resetInputFields(){
        $this->password = '';
        $this->password_confirmation = '';
    }
}
