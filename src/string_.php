<?php

namespace zutatensuppe\radical\string_;

function starts_with(string $string, string $prefix): bool
{
    return \strpos($string, $prefix) === 0;
}
