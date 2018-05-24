<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\requests\RegistrationForm;

class RegisterationController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest');
    }

    public function create()
    {
    	return view('sessions.registeration');
    }

/*
    Create user and Save in DB Way 1:- 
         *$pass=request(['password']);
         *$user= new User;
         *$user->name=request('name');
         *$user->email=request('email');
         *$user->password=bcrypt($pass['password']);
         *$user->save();
        
    Way 2:-    
        *$user=User::create(request(['name','email','password']));

    login user
        *auth()->login($user);

    Sending new mail and passing user name to mail
        * \Mail::to($user)->send(new Welcome($user));


*/
    public function store(RegistrationForm $form)
    {
    	$form->persist();

        session()->flash('message', 'Congratulates! you have Login Successfully...');

    	return redirect('/');
    }
}
