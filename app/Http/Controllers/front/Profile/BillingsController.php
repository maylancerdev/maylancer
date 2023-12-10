<?php

namespace App\Http\Controllers\front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('profile.billing');
    }
}
