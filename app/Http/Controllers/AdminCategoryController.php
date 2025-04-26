<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index(){
        $path = '/admin/categories';
        $categories = DB::table('categories')->get();
        return view('AdminPages.AdminCategoriesData', compact('path', 'categories'));
    }

    public function add_form(){
        $path = '/admin/category/add-form';
        return view('AdminPages.AdminFormCategories', compact('path'));
    }

    public function add_category(Request $request){
        $CategoryName = $request->CategoryName;
        if ($CategoryName == null){
            return redirect('admin/category/add-form');
        }
        $CheckNumRows = DB::table('categories')
            ->selectRaw('COUNT(*) AS num_rows')
            ->where('name', $CategoryName)
            ->get()[0]->num_rows;
        if ($CheckNumRows == 0){
            DB::table('categories')->insert([
                'name' => $CategoryName,
                'created_at' => Carbon::now()
            ]);
            return redirect('admin/categories');
        }else{
            return redirect('admin/category/add-form');
        }

    }

    public function edit_form($id){
        $path = '/admin/category/edit-form';
        $category = DB::table('categories')
            ->where('id', $id)
            ->get();
        return view('AdminPages.AdminFormCategories', compact('path', 'category'));
    }

    public function edit_category(Request $request, $id){
        if ($request->CategoryName == null){
            return redirect('admin/category/edit-form/'.$id);
        } else {
            DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $request->CategoryName,
                    'updated_at' => Carbon::now()
                ]);
            return redirect('admin/categories');
        }
    }
    public function delete_category($id){
        $check_category = DB::table('books')->where('category_id', $id)->count();
        if ($check_category > 0){
            DB::table('books')->where('category_id', $id)->update([
                'category_id' => null,
                'updated_at' => Carbon::now()
            ]);
        }
        DB::table('categories')
            ->where('id', $id)
            ->delete();
        return redirect('admin/categories');
    }
}
