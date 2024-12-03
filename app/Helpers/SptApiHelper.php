<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class SptApiHelper {
    private static function getData($path, array $body = [], $session_id = null) {
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

    public static function getRaids() {
        return self::getData('fika/location/raids');
    }

    public static function dynamic($path) {
        return self::getData($path);
    }
}
