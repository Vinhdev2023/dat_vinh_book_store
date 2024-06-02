<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index(){
        $path = '/admin/products';
        return view('AdminPages.AdminBooksData', compact('path'));
    }

    public function add_form(){
        $path = '/admin/product/add-form';
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        return view('AdminPages.AdminFormBooks', compact('path', 'categories', 'publishers'));
    }

    public function add_product(Request $request){

    }
}
