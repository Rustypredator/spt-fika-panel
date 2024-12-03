<?php

namespace App\Helpers\SptApi;

class Model
{
    protected static $paths = [];

    public static function getModel($path)
    {
        if (array_key_exists($path, static::$paths)) {
            return (object)static::$paths[$path];
        } else {
            return false;
        }
    }
}
