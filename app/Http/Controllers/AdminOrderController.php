<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index(){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $orders = DB::table('orders')->orderBy('created_at', 'DESC')->get();
        $path = '/admin/orders';
        return view('AdminPages.AdminOrderData', compact('path', 'orders'));
    }

    public function orders_filter($status){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/orders';
        $orders = DB::table('orders')
            ->where('status', $status)->orderBy('created_at', 'DESC')
            ->get();
        return view('AdminPages.AdminOrderData', compact('path', 'orders'));
    }

    public function order_detail($id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/order/detail';
        $order = DB::table('orders')
            ->select('orders.*')->selectRaw('DATE(orders.created_at) AS created_at')
            ->where('id', $id)
            ->first();
        $order_detail = DB::table('order_detail')
            ->select('order_detail.*', 'books.title AS book_title', 'order_detail.price AS book_price', 'order_detail.quantity AS book_quantity')
            ->leftJoin('books', 'order_detail.book_id', '=', 'books.id')
            ->where('order_detail.order_id', $id)
            ->get();
//        dd($order);
        return view('AdminPages.AdminOrderDetail', compact('path', 'order', 'order_detail'));
    }

    public function update_order($status, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        DB::table('orders')->where('id', $id)
            ->update([
                'user_id' => Auth::user()->id,
                'updated_at' => Carbon::now(),
                'status' => $status
            ]);
        if ($status == 'COMPLETED') {
            $order_detail = DB::table('order_detail')
                ->where('order_id', $id)
                ->get();
            foreach ($order_detail as $item) {
                DB::table('books')
                    ->where('id', $item->book_id)
                    ->decrement('quantity', $item->quantity);
            }
        }
        return redirect('/admin/order/detail/'.$id);

    }
}
