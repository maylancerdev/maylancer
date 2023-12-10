<?php

namespace App\Http\Controllers\front\OpenSource;

use App\Http\Controllers\Controller;

class OpenSourceController extends Controller
{
   public function __invoke()
   {
       return view('frontpage.open-source.index');
   }
}
