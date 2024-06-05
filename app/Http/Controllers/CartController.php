<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
//        dd($quantity);
        if ($quantity > 0 && $quantity < $book->quantity) {
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
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function clear_cart(){
        session()->forget('cart');
        session()->flush();
        session()->save();
        return redirect()->back();
    }
}
