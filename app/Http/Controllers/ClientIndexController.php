<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ClientIndexController extends Controller {
    public function clientIndex() {
        $categories = DB::table('categories')->get();
        $purchased_books = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->limit(7)
            ->get();
        $new_release_books = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->limit(3)
            ->orderBy('books.created_at', 'DESC')
            ->get();
        return view("CustomerPages.index", compact('categories', 'purchased_books', 'new_release_books'));
    }

}
