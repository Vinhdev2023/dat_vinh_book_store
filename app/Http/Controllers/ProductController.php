<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function products() {
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $books = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->limit(20)
            ->get();
        return view("CustomerPages.products", compact('categories', 'publishers', 'books'));
    }

    public function productDetail() {
        return view("CustomerPages.productDetail");
    }
}
