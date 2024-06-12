<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function statistic_view(){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/statistics';
        return view('AdminPages.AdminStatistics', compact('path'));
    }
}
