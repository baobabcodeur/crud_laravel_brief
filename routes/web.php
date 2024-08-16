<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [MainController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

Route::get('/login', [MainController::class, 'index'])->name('login');
Route::get('/logout', [MainController::class, 'update'])->name('logout');


Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/register', [MainController::class, 'register'])->name('register');
// Route::group(['middleware' => ['auth', 'isAdmin']], function() {
   Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::resource('/users', UserController::class);
});



Route::get('/forgotten-password', function () {

    if (Auth::check()) 
        return redirect()->route('home');

    return view('forgottenPassword');

})->name('forgottenPassword');

Route::get('/otp-code', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('otp');

})->name('otpCode');


Route::get('/new-password', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('newPassword');

})->name('newPassword');


Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');
Route::post('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otp-code', [AuthController::class, 'checkOtpCode'])->name('otpCode.process');
Route::post('/new-password', [AuthController::class, 'newPassword'])->name('newPassword.process');