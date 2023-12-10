<?php

namespace App\Http\Controllers\front\About;


use App\Http\Controllers\Controller;


class AboutController extends Controller
{
  public function __invoke()
  {
      return view('frontpage.about.index');
  }
}
