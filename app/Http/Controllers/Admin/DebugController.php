<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DebugController extends Controller
{
    public function sptapi()
    {
        return view('admin.debug.sptapi');
    }
}
