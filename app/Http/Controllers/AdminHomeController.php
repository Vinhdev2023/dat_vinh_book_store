<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index() {
        $newOrder = DB::table('orders')->where('status', 'PENDING')->count();
        $path = '/admin';
        return view('AdminPages.AdminHome', compact('path', 'newOrder'));
    }

    public function login_form(){
        return view('AdminPages.AdminLogin');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'user_type' => 'admin'])) {
            return redirect('/admin');
        }
        return redirect('/admin/login');
    }

    public function logout() {
        Auth::logout();
        session()->flush();
        session()->save();
        return redirect('/admin/login');
    }
}
