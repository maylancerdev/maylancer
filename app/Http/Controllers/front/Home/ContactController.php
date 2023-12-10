<?php

namespace App\Http\Controllers\front\Home;

use App\Http\Controllers\Controller;
use App\Settings\ContactSettings;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('frontpage.contact.index');
    }
}
