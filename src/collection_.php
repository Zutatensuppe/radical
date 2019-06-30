<?php

namespace zutatensuppe\radical\collection_;

function get_deep($mixed, array $path, $default = null)
{
    foreach ($path as $key) {
        if (is_array($mixed) && array_key_exists($key, $mixed)) {
            $mixed = $mixed[$key];
        } elseif (\is_object($mixed) && \property_exists($mixed, $key)) {
            $mixed = $mixed->{$key};
        } else {
            return $default;
        }
    }
    return $mixed;
}
