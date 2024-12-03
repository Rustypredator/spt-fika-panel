<?php

namespace App\Helpers\SptApi;

use App\Helpers\SptApi\Model;

class Launcher extends Model
{
    protected static $paths = [
        'ping' => [
            'url' => 'launcher/ping',
            'method' => 'GET',
            'session' => false,
        ],
        'version' => [
            'url' => 'launcher/version',
            'method' => 'GET',
            'session' => false,
        ],
        'server/loadedServerMods' => [
            'url' => 'launcher/server/loadedServerMods',
            'method' => 'GET',
            'session' => false,
        ],
        'server/connect' => [
            'url' => 'launcher/server/connect',
            'method' => 'GET',
            'session' => false,
        ],
        'profile/login' => [
            'url' => 'launcher/profile/login',
            'method' => 'POST',
            'session' => false,
            'bodyFields' => [
                'required' => ['username', 'password'],
            ],
        ],
        'profile/get' => [
            'url' => 'launcher/profile/get',
            'method' => 'POST',
            'session' => true,
            'bodyFields' => [
                'required' => ['username', 'password'],
            ],
        ],
        'profile/info' => [
            'url' => 'launcher/profile/info',
            'method' => 'POST',
            'session' => true,
            'bodyFields' => [
                'required' => ['username', 'password'],
            ],
        ],
    ];
}
