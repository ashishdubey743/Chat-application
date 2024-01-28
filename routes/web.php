<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth.session')->get('/', function () {
    return view('pages/index');
});

Route::get('/register', [ApiController::class, 'register']);
Route::get('/otp_page', [ApiController::class, 'OTP_page']);
Route::post('/process_register', [ApiController::class, 'process_register']);
Route::post('/process_signin', [ApiController::class, 'process_signin']);
Route::post('/verify_otp', [ApiController::class, 'verify_otp']);
Route::get('/logout', function(){
    Session::forget('user');
    return redirect("/");
});

Route::get('login', function(){
    return view('pages/login');
});
