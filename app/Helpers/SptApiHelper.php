<?php

namespace App\Helpers;

use App\Helpers\SptApi\Fika;
use App\Helpers\SptApi\Client;
use App\Helpers\SptApi\Launcher;
use Illuminate\Support\Facades\Log;

class SptApiHelper {
    // Utility
    private static function getData($path, $method = 'GET', array $body = [], $session_id = null) {
        $host = config('spt.host');
        $port = config('spt.port');
        $headers = [
            'Content-Type: application/json',
            'requestcompressed: 0'
        ];

        // URL:
        $url = 'http://' . $host . ':' . $port . '/' . $path;

        // Build Request:
        if ($session_id) {
            $headers[] = 'Cookie: PHPSESSID=' . $session_id;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($body) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception('HTTP Code: ' . $httpCode);
        }

        // Uncompress data:
        $decompressed_data = gzuncompress($response);
        if ($decompressed_data === false) {
            throw new Exception('Failed to decompress data');
        } else {
            Log::debug('SPT API Response for path: ' . $path . ' - ' . $decompressed_data);
            return json_decode($decompressed_data, true);
        }
    }

    public static function dynamic($path) {
        return self::getData($path);
    }

    public static function dynamicSptApiModelRequest($model, $path, $body = [], $session = null) {
        if ($model->session) {
            return self::getData($model->url, $model->method, [], $session);
        }
        return self::getData($model->url, $model->method);
    }

    // Launcher
    public static function launcher($path, $body = [], $session = null) {
        $model = Launcher::getModel($path);
        return self::dynamicSptApiModelRequest($model, $path, $body, $session);
    }

    // Client
    public static function client($path, $body = [], $session = null) {
        $model = Client::getModel($path);
        return self::dynamicSptApiModelRequest($model, $path, $body, $session);
    }

    // Fika
    public static function fika($path, $body = [], $session = null) {
        $model = Fika::getModel($path);
        return self::dynamicSptApiModelRequest($model, $path, $body, $session);
    }

    // Give-UI
    public static function giveUi($path, $body = [], $session = null) {
        $model = GiveUi::getModel($path);
        return self::dynamicSptApiModelRequest($model, $path, $body, $session);
    }
}
