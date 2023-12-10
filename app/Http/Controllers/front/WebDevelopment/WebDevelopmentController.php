<?php

namespace App\Http\Controllers\front\WebDevelopment;

use App\Http\Controllers\Controller;


class WebDevelopmentController extends Controller
{
    public function __invoke()
    {

        return view('frontpage.web-development.index');

    }
}
