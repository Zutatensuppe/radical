<?php

namespace Zutatensuppe\Radical;

class Json
{
    public static function decode(string $string)
    {
        // TODO: https://wiki.php.net/rfc/json_throw_on_error
        $decoded = \json_decode($string, false);
        self::checkError('de');
        return $decoded;
    }

    public static function encode($mixed): string
    {
        // TODO: https://wiki.php.net/rfc/json_throw_on_error
        $encoded = \json_encode($mixed);
        self::checkError('en');
        return $encoded;
    }

    private static function checkError(string $prefix): void
    {
        $code = json_last_error();
        if ($code === \JSON_ERROR_NONE) {
            return;
        }

        $msg = json_last_error_msg();
        throw new \RuntimeException(
            "Error while {$prefix}coding JSON: {$code} {$msg}"
        );
    }
}
