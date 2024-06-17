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
        }
        return redirect('/checkout-form');
    }

    public function checkout_form(){
        if (!Auth::check()){
            return redirect('/sign-in');
        }
        session()->put('cart_in_checkout', true);
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        return view('CustomerPages.checkout', compact('categories', 'publishers'));
    }

    public function checkout_post(Request $request){
        if (!Auth::check()){
            return redirect('/sign-in');
        }
        $name = $request->full_name;
        $phone = $request->phone_number;
        $address = $request->address;
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
        $publishers = DB::table('publishers')->get();
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
}
