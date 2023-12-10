<?php

namespace App\Http\Controllers\front\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontpage.product.index', compact('products'));
    }
}
