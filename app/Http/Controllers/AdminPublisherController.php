<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPublisherController extends Controller
{
    public function index(){
        $path = '/admin/publishers';
        $publishers = DB::table('publishers')
            ->get();
        return view('AdminPages.AdminPublishersData', compact('path', 'publishers'));
    }

    public function add_form(){
        $path = '/admin/publisher/add-form';
        return view('AdminPages.AdminFormPublishers', compact('path'));
    }

    public function add_publisher(Request $request){
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
}
