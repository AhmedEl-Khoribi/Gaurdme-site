<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;

class SessionController extends Controller
{
	public function __construct()
	{
       $this->middleware('guest')->except(['destroy']);
	}

    public function create()
    {
    
    	return view('sessions.login');
    }

    public function store()
    {
    	if(! auth()->attempt(request(['email','password']))){
    		return back()->withErrors(['message'=>'Not correct informations']);
    	}

        session()->flash('message', 'Hello ' . \Auth::user()->name . ' ! you have Login Successfully...');

    		return redirect('/');
    }

    public function destroy(){
    	auth()->logout();
    	return redirect('/');
    }
}
