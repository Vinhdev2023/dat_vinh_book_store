<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index() {
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin';
        return view('AdminPages.AdminHome', compact('path'));
    }

    public function login_form(){
        return view('AdminPages.AdminLogin');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => 'admin'])) {
            return redirect('/admin');
        }
        return redirect('/admin/login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/admin/login');
    }
}
