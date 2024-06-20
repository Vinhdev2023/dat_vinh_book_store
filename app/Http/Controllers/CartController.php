<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_cart(Request $request, $id){
        $quantity = $request->quantity;
        $book = DB::table('books')
            ->where('id', $id)
            ->first();
        $quantity = number_format($quantity);
        if ($quantity > 0 && $quantity <= $book->quantity) {
            $cart = session()->get('cart');
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
                session()->push('cart', $cart);
            }else{
                session()->put('cart', $cart);
            }
            $total = 0;
            $cart = session()->get('cart');
            foreach ($cart as $obj) {
                $total += $obj->price * $obj->quantity;
            }
            session()->put('cart_total', $total);
            return redirect('/products');
        }
        return redirect()->back();
    }
    public function clear_cart(){
        session()->forget('cart');
        session()->forget('cart_total');
        if (session()->get('cart_in_checkout')){
            session()->forget('cart_in_checkout');
            session()->save();
            return redirect('/products');
        }
        session()->save();
        return redirect()->back();
    }
    public function checkout(){
        if (!Auth::check()){
            return redirect('/sign-in');
        }elseif (Auth::user()->user_type == 'admin'){
            session()->put('admin_cart', session()->get('cart'));
            session()->forget('cart');
            session()->put('admin_cart_total', session()->get('cart_total'));
            session()->forget('cart');
            session()->save();
            return redirect('/admin/add-order/');
        }
        return redirect('/checkout-form');
    }

    public function checkout_form(){
        if (!Auth::check()){
            return redirect('/sign-in');
        }elseif (Auth::user()->user_type == 'admin'){
            session()->put('admin_cart', session()->get('cart'));
            session()->forget('cart');
            session()->put('admin_cart_total', session()->get('cart_total'));
            session()->forget('cart');
            session()->save();
            return redirect('/admin/add-order/');
        }
        session()->put('cart_in_checkout', true);
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        return view('CustomerPages.checkout', compact('categories', 'publishers'));
    }

    public function checkout_post(Request $request){
        if (!Auth::check()){
            return redirect('/sign-in');
        }elseif (Auth::user()->user_type == 'admin'){
            session()->put('admin_cart', session()->get('cart'));
            session()->forget('cart');
            session()->put('admin_cart_total', session()->get('cart_total'));
            session()->forget('cart');
            session()->save();
            return redirect('/admin/add-order/');
        }
        $name = $request->full_name;
        if($name == null || $name == ''){
            return redirect()->back();
        }
        $phone = $request->phone_number;
        if($phone == null || $phone == ''){
            return redirect()->back();
        }
        $address = $request->address;
        if($address == null || $address == ''){
            return redirect()->back();
        }
        $type = 'online';
        $cart = session()->get('cart');
        if(isset($cart)){
            $id_order = DB::table('orders')->insertGetId([
                'customer_id' => Auth::user()->id,
                'cus_name' => $name,
                'cus_phone' => $phone,
                'ship_to_address' => $address,
                'total' => session()->get('cart_total'),
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
            session()->forget('cart');
            session()->forget('cart_total');
            session()->save();
            return redirect('/orders');
        }
        return redirect('/products');
    }

    public function repair_cart($id){
        $cart = session()->get('cart');
        $cart_quantity = 0;
        foreach ($cart as $obj){
            if ($obj->id == $id){
                $cart_quantity = $obj->quantity;
            }
        }
        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            $category->num_books = DB::table('books')
                ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
                ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
                ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->where('books.status', '=', 0)
                ->where('books.category_id', $category->id)
                ->count();
        }
        $publishers = DB::table('publishers')->get();
        foreach ($publishers as $publisher) {
            $publisher->num_books = DB::table('books')
                ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
                ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
                ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->where('books.status', '=', 0)
                ->where('books.publisher_id', $publisher->id)
                ->count();
        }
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
        return view('CustomerPages.productdetail', compact('cart_quantity', 'categories', 'publishers', 'book'));
    }
    public function update_cart(Request $request, $id){
        $quantity = $request->quantity;
        $cart = session()->get('cart');
        foreach ($cart as $obj) {
            if ($obj->id == $id) {
                $obj->quantity = $quantity;
            }
        }
        session()->put('cart', $cart);
        $total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $obj) {
            $total += $obj->price * $obj->quantity;
        }
        session()->put('cart_total', $total);
        return redirect('/products');
    }

    public function delete_product_in_cart($id){
        $cart = session()->get('cart');
        foreach ($cart as $key => $obj) {
            if ($obj->id == $id) {
                unset($cart[$key]);
            }
        }
        if ($cart == null || $cart == []){
            session()->forget('cart');
            session()->forget('cart_total');
            session()->save();
            return redirect('/products');
        }
        session()->put('cart', $cart);
        $total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $obj) {
            $total += $obj->price * $obj->quantity;
        }
        session()->put('cart_total', $total);
        return redirect('/products');
    }
}
