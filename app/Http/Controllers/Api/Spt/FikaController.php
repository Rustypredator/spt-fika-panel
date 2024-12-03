<?php

namespace App\Http\Controllers\Api\Spt;

use App\Helpers\SptApiHelper;
use App\Http\Controllers\Controller;

class FikaController extends Controller
{
    public function raids()
    {
        $raids = SptApiHelper::getRaids();
        return response()->json($raids);
    }
}
