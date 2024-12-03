<?php

namespace App\Http\Controllers\Api\Spt;

use App\Helpers\SptApiHelper;
use App\Http\Controllers\Controller;

class SptController extends Controller
{
    public function dynamic()
    {
        $path = request()->input('path');
        $response = SptApiHelper::dynamic($path);
        return response()->json($response);
    }
}
