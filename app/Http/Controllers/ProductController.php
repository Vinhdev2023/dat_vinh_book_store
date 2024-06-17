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
            ->where('books.status', '=', 0)
            ->get();
        return view("CustomerPages.products", compact('categories', 'publishers', 'books'));
    }

    public function product_detail($id) {
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
        return view("CustomerPages.productdetail", compact('categories', 'book', 'publishers'));
    }
}
