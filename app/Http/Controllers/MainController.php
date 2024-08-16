<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function home() {
        return view('dashboard');
    }
    public function index() {
        return view('login');
    }
    public function register() {
        return view('registration');
    }
    public function update() {
        Auth::logout();
        return redirect()->route('home');
        
    }
    
}
