<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders(){
        $orders = DB::table('orders')
            ->select('orders.*')
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%i:%s") AS created_at_format')
            ->where('customer_id',Auth::guard('customers')->user()->id)
            ->orderBy('created_at', 'DESC')->get();
        return view('CustomerPages.orders', compact('orders'));
    }

    public function orders_filter($status){
        if (!Auth::check() || Auth::user()->user_type!= 'customer') {
            Auth::logout();
            return redirect('/login');
        }
        $orders = DB::table('orders')
            ->select('*')
            ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%i:%s") AS created_at_format')
            ->where('customer_id', Auth::user()->id)
            ->where('status', $status)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('CustomerPages.orders', compact( 'orders'));
    }

    public function order_detail($id){
        session()->put('cart_in_checkout', false);
        $order = DB::table('orders')
            ->select('*')
            ->where('id', $id)
            ->first();
        $order_detail = DB::table('order_detail')
            ->select('order_detail.*', 'books.title AS book_title', 'books.image AS book_image',
                'books.price AS book_price', 'categories.name AS book_category_name',
                'publishers.name AS book_publisher_name')
            ->join('books', 'order_detail.book_id', '=', 'books.id')
            ->leftJoin('categories', 'categories.id', '=', 'books.category_id')
            ->leftJoin('publishers', 'publishers.id', '=', 'books.publisher_id')
            ->where('order_detail.order_id', $id)
            ->get();
        return view('CustomerPages.orderdetail', compact( 'order', 'order_detail'));
    }

    public function order_status($status, $id){
        if (!Auth::guard('customers')->check()) {
            Auth::logout();
            return redirect('/sign-in');
        }
        $check_status = DB::table('orders')->where('id', $id)->first()->status;
        if ($check_status == 'COMPLETED') {
            return redirect('/order/detail/'.$id);
        }
        DB::table('orders')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);
        return redirect('/order/detail/'.$id);
    }

//    public function order_update_form($id){
//        if (!Auth::guard('customers')->check()) {
//            Auth::logout();
//            return redirect('/login');
//        }
//        $categories = DB::table('categories')->get();
//        $publishers = DB::table('publishers')->get();
//        $order = DB::table('orders')
//            ->select('*')
//            ->where('id', $id)
//            ->first();
//        return view('CustomerPages.checkout', compact('categories', 'publishers', 'order'));
//    }

//    public function order_update(Request $request, $id){
//        if (!Auth::check() || Auth::user()->user_type!= 'customer') {
//            Auth::logout();
//            return redirect('/login');
//        }
//        $name = $request->full_name;
//        if($name == null || $name == ''){
//            return redirect()->back();
//        }
//        $phone = $request->phone_number;
//        if($phone == null || $phone == ''){
//            return redirect()->back();
//        }
//        $address = $request->address;
//        if($address == null || $address == ''){
//            return redirect()->back();
//        }
//        DB::table('orders')
//            ->where('id', $id)
//            ->update(['cus_name' => $name, 'cus_phone' => $phone, 'ship_to_address' => $address]);
//        return redirect('/order/detail/'.$id);
//    }
}
