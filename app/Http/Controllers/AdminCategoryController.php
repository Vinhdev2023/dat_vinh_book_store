<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $path = '/admin/categories';
        return view('AdminPages.AdminCategoriesData', compact('path'));
    }
}
