<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        $path = '/admin/products';
        return view('AdminPages.AdminBooksData', compact('path'));
    }
}
