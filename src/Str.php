<?php

namespace Zutatensuppe\Radical;

class Str
{
    public static function startsWith(string $string, string $prefix): bool
    {
        return \strpos($string, $prefix) === 0;
    }
}
