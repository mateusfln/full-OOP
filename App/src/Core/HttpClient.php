<?php

namespace App\Core;

use App\Traits\Singleton;
use InvalidArgumentException;

class HttpClient
{
    use Singleton;

    public const JSON = 'application/json';
    public const FORM_DATA = 'multipart/form-data';

    public static function get(string $url, array $data = null): array
    {
        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        $result = curl_exec($curlHandler);
        $httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
        $error = curl_error($curlHandler);
        curl_close($curlHandler);
        $data = json_decode($result, true);

        return ['data' => $data, 'rawData' => $result, 'httpCode' => $httpCode, 'error' => $error];
    }

    public static function post(string $url, array $data, string $format): array
    {
        if (!self::requestFormatIsValid($format)){
            throw new InvalidArgumentException("Tipo de formato inválido");
        }

        $data = json_encode($data);
        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_POST, true);
        curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, ["Content-Type: $format"]);
        $result = curl_exec($curlHandler);
        $httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
        $error = curl_error($curlHandler);
        curl_close($curlHandler);
        $data = json_decode($result, true);

        return ['data' => $data, 'rawData' => $result, 'httpCode' => $httpCode, 'error' => $error];
    }

    private static function requestFormatIsValid(string $format): bool
    {
        return !in_array($format, [self::JSON, self::FORM_DATA]);
    }
}