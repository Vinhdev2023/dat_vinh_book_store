<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthCusController extends Controller
{
    public function sign_up(Request $request) {
        $name = $request->Username;
        $email = $request->Email;
        $password = $request->Password;
        $ConfirmPassword = $request->ConfirmPassword;
        if ($password === $ConfirmPassword){
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($password, PASSWORD_BCRYPT, $options);
            $CheckEmail = DB::table('users')->selectRaw('COUNT(*) AS count')
                ->where('email', '=', $email)
                ->first();
            if ($CheckEmail->count == 0){
                DB::table('users')->insert([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'user_type' => 'customer',
                    'created_at' => Carbon::now(),
                ]);
                return redirect('/sign-in');
            }
        }
        return redirect()->back();
    }

    public function sign_in(Request $request) {
        $email = $request->UsernameOrEmail;
        $password = $request->password;
        $check = Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => 'customer']) || Auth::attempt(['name' => $email, 'password' => $password, 'user_type' => 'customer']);
//        dd($check);
        if ($check){
            return redirect('/');
        }
        return redirect()->back();
    }

    public function sign_out() {
        Auth::logout();
        return redirect('/sign-in');
    }
}
