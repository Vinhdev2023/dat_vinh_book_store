<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCartController extends Controller
{
    public function index($id){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/product-to-cart/';
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
        return view('AdminPages.AdminProductDetail', compact('path', 'book'));
    }

    public function add_to_cart(Request $request, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $quantity = $request->quantity;
        $book = DB::table('books')
            ->where('id', $id)
            ->first();
        $quantity = number_format($quantity);
//        dd($book, $quantity);
        if ($quantity > 0 && $quantity <= $book->quantity) {
            $cart = session()->get('admin_cart');
            $flag = 0;
            if (isset($cart)){
                foreach ($cart as $obj) {
                    if ($obj->id == $id) {
                        $quantity += $obj->quantity;
                        $obj->quantity = $quantity;
                        $flag = 1;
                    }
                }
            }
            if ($flag == 0) {
                $book->quantity = $quantity;
                $cart = $book;
                session()->push('admin_cart', $cart);
            }else{
                session()->put('admin_cart', $cart);
            }
            $total = 0;
            $cart = session()->get('admin_cart');
            foreach ($cart as $obj) {
                $total += $obj->price * $obj->quantity;
            }
            session()->put('admin_cart_total', $total);
            return redirect('/admin/products');
        }
        return redirect()->back();
    }

    public function product_in_cart($id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/product-in-cart/';
        $cart = session()->get('admin_cart');
        $cart_quantity = 0;
        foreach ($cart as $obj){
            if ($obj->id == $id){
                $cart_quantity = $obj->quantity;
            }
        }
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
        return view('AdminPages.AdminProductDetail', compact('cart_quantity', 'path', 'book'));
    }

    public function update_cart(Request $request, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $quantity = $request->quantity;
        $cart = session()->get('admin_cart');
        foreach ($cart as $obj) {
            if ($obj->id == $id) {
                $obj->quantity = $quantity;
            }
        }
        session()->put('admin_cart', $cart);
        $total = 0;
        $cart = session()->get('admin_cart');
        foreach ($cart as $obj) {
            $total += $obj->price * $obj->quantity;
        }
        session()->put('admin_cart_total', $total);
        return redirect('/admin/products');
    }

    public function clear_cart(){
        session()->forget('admin_cart');
        session()->forget('admin_cart_total');
        if (session()->get('admin_cart_in_checkout')){
            session()->forget('admin_cart_in_checkout');
            session()->save();
            return redirect('/admin/products');
        }
        session()->save();
        return redirect('/admin/products');
    }

    public function add_order_form(){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/add-order';
        session()->put('admin_cart_in_checkout', true);
        return view('AdminPages.AdminOrderForm', compact('path'));
    }

    public function add_order_post(Request $request){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $name = $request->Name;
        if ($name == '' || $name == null){
            return redirect()->back();
        }
        $phone = $request->Phone;
        if ($phone == '' || $phone == null){
            return redirect()->back();
        }
        $address = $request->address;
        if ($address == '' || $address == null){
            return redirect()->back();
        }
        $type = 'offline';
        $cart = session()->get('admin_cart');
        if(isset($cart)){
            $id_order = DB::table('orders')->insertGetId([
                'user_id' => Auth::user()->id,
                'cus_name' => $name,
                'cus_phone' => $phone,
                'ship_to_address' => $address,
                'total' => session()->get('admin_cart_total'),
                'payment_method' => 'cash payments',
                'type' => $type,
                'status' => 'PENDING',
                'created_at' => Carbon::now(),
            ]);
            foreach ($cart as $obj){
                DB::table('order_detail')
                    ->insert([
                        'order_id' => $id_order,
                        'book_id' => $obj->id,
                        'quantity' => $obj->quantity,
                        'price' => $obj->price,
                    ]);
            }
            session()->forget('admin_cart');
            session()->forget('admin_cart_total');
            session()->save();
            return redirect('/admin/order/detail/'.$id_order);
        }
        return redirect('/admin/products');
    }

    public function order_repair_form($id) {
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/order/repair';
        $order = DB::table('orders')
            ->select('orders.*')
            ->where('id', $id)
            ->first();
        return view('AdminPages.AdminOrderForm', compact('path', 'order'));
    }

    public function order_repair_post(Request $request, $id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        DB::table('orders')->where('id', $id)
            ->update([
                'cus_name' => $request->Name,
                'cus_phone' => $request->Phone,
               'ship_to_address' => $request->address,
            ]);
        return redirect('/admin/order/detail/'.$id);
    }
}
