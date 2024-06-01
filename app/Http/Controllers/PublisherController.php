<?php

namespace App\Http\Controllers;

class PublisherController extends Controller
{
    public function publishers() {
        return view("CustomerPages.publisher");
    }
}
