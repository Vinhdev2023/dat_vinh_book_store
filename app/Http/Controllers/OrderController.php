<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders(){
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        return view('CustomerPages.orders', compact('categories', 'publishers'));
    }
}
