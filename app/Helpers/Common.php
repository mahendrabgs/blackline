<?php

namespace App\Helpers;

/**
 * class Common
 */
class Common
{

    /**
     * @param array $headers
     * @return array
     */
    public static function getFlatHeadersValues(array $headers): array
    {
        if (!count($headers)) {
            return $headers;
        }
        $flatHeaders = [];
        foreach ($headers as $key => $header) {
            $flatHeaders[$key] = $header[0] ?? '';
        }
        return $flatHeaders;
    }
}
