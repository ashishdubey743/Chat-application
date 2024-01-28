<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\otpRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Mail\otpEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Log;

class ApiController extends Controller
{
    public function register(){
        return view('pages/register');
    }

    public function OTP_page(){
        return view('pages.OTP');
    }

    public function process_register(RegistrationRequest $request){
        $otp = rand(1000, 9999);
        $inputs = $request->validated();
    
        $mailData = [
            'OTP' => $otp,
        ];

        Mail::to($inputs['email'])->send(new otpEmail($mailData));
        session(['otp' => $otp]);
        session(["user" => $request->validated()]);
        return redirect("/otp_page");
    }

    public function verify_otp(otpRequest $request){
        if ($request['otp'] == Session::get('otp')) {
            $validatedInputs = Session::get('user');
            $user = User::create([
                'username' => $validatedInputs['username'],
                'password' => bcrypt($validatedInputs['password']), 
                'email' => $validatedInputs['email'],
                'bio' => $validatedInputs['bio'],
            ]);
            Session::forget('otp');
            Session::forget('user');
            session(["user" => $user]);
            return redirect("/")->with('success', 'Registration successful');
        } 
    }

    public function process_signin(SigninRequest $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            session(['user' => $user]);
            return redirect('/')->with('success', 'Signin successful');
        } else {
            return back()->with('username.error', 'Invalid username or password. Please try again.');
        }
    }

    public function process_profile_image(ProfileImageRequest $request){
        $userid = $request->input("userid");
        $profileImage = $request->file('profile');
        $directory = 'profile_images';
        $fileName = $profileImage->getClientOriginalName(); // Get the original filename
        $profileImagePath = $profileImage->storeAs($directory, $fileName, 'public');
        $user = User::find($userid);
        $user->image = $profileImagePath;
        session([
            "user.image" => $profileImagePath,
            "user.id" => $userid
        ]);
        $user->save();
        return redirect('/');
    }

    public function delete_image($id){
        $user = User::find($id);
        $profileImagePath = $user->image;
        $user->image = "";
        session([
            "user.image" => "",
        ]);
        if (Storage::disk('public')->exists($profileImagePath)) {
            Storage::disk('public')->delete($profileImagePath);
        }
        return redirect('/');
    }
}


