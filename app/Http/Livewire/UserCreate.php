<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\CreateNewUser;
use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Request;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $is_admin;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required','confirmed'],
        'password_confirmation' => ['nullable'],
        'is_admin' => ['nullable']
    ];


    public function render()
    {
        return view('livewire.user-create');
    }

    public function save()
    {
        $input = $this->validate();
//        User::create($this->validate());

//        return User::create([
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'password' => Hash::make($input['password']),
//            'is_admin' => $input['is_admin']
//        ]);
       (new CreateNewUser)->create($this->validate());

        Mail::to($this->email)->send(new SendPassword($this->email, $this->password));

        $this->password = '';
        $this->email = '';
        $this->is_admin = 0;
        $this->password_confirmation = '';

    }
}
