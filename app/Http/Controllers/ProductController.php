<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function product() {
        return view("CustomerPages.product");
    }

    public function products() {
        return view("CustomerPages.products");
    }

    public function productDetail() {
        return view("CustomerPages.productDetail");
    }
}
