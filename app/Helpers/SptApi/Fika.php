<?php

namespace App\Helpers\SptApi;

use App\Helpers\SptApi\Model;

class Fika extends Model
{
    protected static $paths = [
        'ping' => [
            'url' => 'location/raids',
            'method' => 'GET',
            'session' => false,
        ],
    ];
}
