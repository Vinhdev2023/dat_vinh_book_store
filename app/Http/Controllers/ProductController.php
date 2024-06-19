<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function products() {
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
        return view("CustomerPages.productdetail", compact('book', 'categories', 'publishers'));
    }

    public function category_filter($id){
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
        $books = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.status', '=', 0)->where('books.category_id', $id)
            ->get();
        return view("CustomerPages.products", compact('categories', 'publishers', 'books'));
    }

    public function publisher_filter($id){
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
        $books = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.status', '=', 0)->where('books.publisher_id', $id)
            ->get();
        return view("CustomerPages.products", compact('categories', 'publishers', 'books'));
    }
}
