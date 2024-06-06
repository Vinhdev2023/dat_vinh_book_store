<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPublisherController extends Controller
{
    public function index(){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/publishers';
        $publishers = DB::table('publishers')
            ->get();
        return view('AdminPages.AdminPublishersData', compact('path', 'publishers'));
    }

    public function add_form(){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/publisher/add-form';
        return view('AdminPages.AdminFormPublishers', compact('path'));
    }

    public function add_publisher(Request $request){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $PublisherName = $request->PublisherName;
        if($PublisherName == null){
            return redirect('admin/publisher/add-form');
        }
        $CheckNumRows = DB::table('publishers')
            ->selectRaw('COUNT(*) AS count')
            ->where('name', $PublisherName)
            ->get()[0]->count;
        if($CheckNumRows == 0){
            DB::table('publishers')->insert([
                'name' => $PublisherName,
                'created_at' => Carbon::now()
            ]);
            return redirect('admin/publishers');
        }else{
            return redirect('admin/publisher/add-form');
        }
    }

    public function edit_form($id){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/publisher/edit-form';
        $publisher = DB::table('publishers')
            ->where('id', $id)
            ->get();
        return view('AdminPages.AdminFormPublishers', compact('path', 'publisher'));
    }

    public function edit_publisher(Request $request, $id){
        if (!Auth::check() || Auth::user()->user_type != 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        if ($request->PublisherName == null){
            return redirect('/admin/publisher/edit-form/'.$id);
        } else {
            DB::table('publishers')
                ->where('id', $id)
                ->update([
                    'name' => $request->PublisherName,
                    'updated_at' => Carbon::now()
                ]);
            return redirect('admin/publishers');
        }
    }
    public function delete_publisher($id){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        DB::table('publishers')
            ->where('id', $id)
            ->delete();
        return redirect('admin/publishers');
    }
}
