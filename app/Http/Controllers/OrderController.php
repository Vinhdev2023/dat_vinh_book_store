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
        $orders = DB::table('orders')
            ->select('orders.*')
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%i:%s") AS created_at_format')
            ->where('customer_id',Auth::user()->id)
            ->orderBy('created_at', 'DESC')->get();
        return view('CustomerPages.orders', compact('categories', 'publishers', 'orders'));
    }

    public function orders_filter(){

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

    public function order_status($status, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'customer') {
            Auth::logout();
            return redirect('/login');
        }
        DB::table('orders')
            ->where('id', $id)
            ->update(['status' => $status]);
        return redirect('/order/detail/'.$id);
    }

    public function order_update_form($id){
        if (!Auth::check() || Auth::user()->user_type!= 'customer') {
            Auth::logout();
            return redirect('/login');
        }
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $order = DB::table('orders')
            ->select('*')
            ->where('id', $id)
            ->first();
        return view('CustomerPages.checkout', compact('categories', 'publishers', 'order'));
    }

    public function order_update(Request $request, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'customer') {
            Auth::logout();
            return redirect('/login');
        }
        $name = $request->full_name;
        $phone = $request->phone_number;
        $address = $request->address;
        DB::table('orders')
            ->where('id', $id)
            ->update(['cus_name' => $name, 'cus_phone' => $phone, 'ship_to_address' => $address]);
        return redirect('/order/detail/'.$id);
    }
}
