<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders(){
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $orders = DB::table('orders')->where('customer_id',Auth::user()->id)->get();
        return view('CustomerPages.orders', compact('categories', 'publishers', 'orders'));
    }

    public function order_detail($id){
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $order = DB::table('orders')
            ->select('*')
            ->where('id', $id)
            ->first();
        $order_detail = DB::table('order_detail')
            ->select('order_detail.*', 'books.title AS book_title', 'books.image AS book_image', 'books.price AS book_price')
            ->Join('books', 'order_detail.book_id', '=', 'books.id')
            ->where('order_detail.order_id', $id)
            ->get();
        return view('CustomerPages.orderdetail', compact('categories', 'publishers', 'order', 'order_detail'));
    }
}
