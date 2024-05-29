<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        $path = '/admin';
        return view('AdminPages.AdminHome', compact('path'));
    }
}
