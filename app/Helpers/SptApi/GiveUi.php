<?php

namespace App\Helpers\SptApi;

use App\Helpers\SptApi\Model;

class GiveUi extends Model
{
    protected static $paths = [
        'server' => [
            'url' => 'give-ui/server',
            'method' => 'GET',
            'session' => false,
        ],
        'profiles' => [
            'url' => 'give-ui/profiles',
            'method' => 'GET',
            'session' => false,
        ],
        'give' => [
            'url' => 'give-ui/give',
            'method' => 'POST',
            'session' => false,
            'body' => [
                'profile_id' => null,
                'amount' => null,
                'message' => null,
            ],
        ],
    ];
}
