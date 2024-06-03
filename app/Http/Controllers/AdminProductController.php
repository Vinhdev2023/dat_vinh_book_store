<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index(){
        $path = '/admin/products';
        $books = DB::table('books')->get();
        return view('AdminPages.AdminBooksData', compact('path', 'books'));
    }

    public function product_detail($id){
        $path = '/admin/product/detail';
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
//        dd($book);
        return view('AdminPages.AdminProductDetail', compact('path', 'book'));
    }

    public function add_form(){
        $path = '/admin/product/add-form';
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        return view('AdminPages.AdminFormBooks', compact('path', 'categories', 'publishers'));
    }

    public function add_product(Request $request){
        if($request->Image == null){
            return redirect('/admin/product/add-form');
        }
        if ($request->BookTitle == null && $request->Price == null && $request->Quantity == null
        && $request->PublisherID == null && $request->CategoriesId == null ){

            return redirect('/admin/product/add-form');
        } else {
            $BookTitle = $request->BookTitle;
            $Description = $request->Description;
            $Price = $request->Price;
            $Quantity = $request->Quantity;
            $PublisherID = $request->PublisherId;
            $CategoryID = $request->CategoriesId;
            $Image = $request->Image->getClientOriginalName();
            $request->Image->move(public_path('images'), $Image);
            $id = DB::table('books')->insertGetId([
                'title' => $BookTitle,
                'image' => $Image,
                'description' => $Description,
                'price' => $Price,
                'quantity' => $Quantity,
                'publisher_id' => $PublisherID,
                'category_id' => $CategoryID,
                'status' => 'are selling',
                'created_at' => Carbon::now(),
            ]);
            return redirect('/admin/product/detail/'.$id);
        }
    }

    public function edit_form($id){
        $path = '/admin/product/edit-form';
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $book = DB::table('books')
            ->select('books.*', 'categories.name AS category_name', 'publishers.name AS publisher_name')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.id', $id)
            ->first();
        return view('AdminPages.AdminFormBooks', compact('path', 'book', 'categories', 'publishers'));
    }

    public function edit_product(Request $request, $id){
        if ($request->BookTitle == null && $request->Price == null && $request->Quantity == null
            && $request->PublisherID == null && $request->CategoriesId == null ){

            return redirect('/admin/product/add-form');
        } else {
            $BookTitle = $request->BookTitle;
            $Description = $request->Description;
            $Price = $request->Price;
            $Quantity = $request->Quantity;
            $PublisherID = $request->PublisherId;
            $CategoryID = $request->CategoriesId;
            if($request->Image == null){
                $Image = DB::table('books')
                    ->select('image')
                    ->where('id', $id)
                    ->first();
                $Image = $Image->image;
            } else {
                $Image = $request->Image->getClientOriginalName();
                $request->Image->move(public_path('images'), $Image);
            }
            $id = DB::table('books')->where('id', $id)
                ->update([
                'title' => $BookTitle,
                'image' => $Image,
                'description' => $Description,
                'price' => $Price,
                'quantity' => $Quantity,
                'publisher_id' => $PublisherID,
                'category_id' => $CategoryID,
                'status' => 'are selling',
                'created_at' => Carbon::now(),
            ]);
            return redirect('/admin/product/detail/'.$id);
        }
    }
}
