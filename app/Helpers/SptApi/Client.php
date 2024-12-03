<?php

namespace App\Helpers\SptApi;

use App\Helpers\SptApi\Model;

class Client extends Model
{
    protected static $paths = [
        'locale' => [
            'url' => 'locale/{locale}',
            'method' => 'GET',
            'session' => false,
            'params' => [
                'required' => ['locale'],
            ],
        ],
    ];
}
