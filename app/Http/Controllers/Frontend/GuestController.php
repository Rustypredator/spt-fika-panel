<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }
}
