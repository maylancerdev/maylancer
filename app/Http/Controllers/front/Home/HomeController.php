<?php

namespace App\Http\Controllers\front\Home;

use App\Http\Controllers\Controller;
use App\Models\CustomerTestimony;
use App\Models\Product;

class HomeController extends Controller
{
   public function index(){

       $testimonies = CustomerTestimony::all();
       $groupedTestimonies = $testimonies->chunk(2);
       $products = Product::take(6)->get();

       return view('frontpage.index', compact('groupedTestimonies', 'products'));
   }
}
