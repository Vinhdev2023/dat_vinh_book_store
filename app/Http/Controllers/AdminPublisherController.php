<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPublisherController extends Controller
{
    public function index(){
        $path = '/admin/publishers';
        return view('AdminPages.AdminPublishersData', compact('path'));
    }
}
