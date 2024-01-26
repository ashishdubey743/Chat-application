<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;


class ApiController extends Controller
{
    public function register(){
        return view('pages/register');
    }

    public function process_register(RegistrationRequest $request){
        // $user = User::create($request->validated());
        // Session::put('user', $user);
        // Session::flash('message', 'Registration successful');
        // return redirect('/dashboard');
    }
}
