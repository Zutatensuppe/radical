<?php

namespace Zutatensuppe\Radical;

class Variable
{
    public static function equal($a, $b): bool
    {
        $typeA = \gettype($a);
        if ($typeA !== \gettype($b)) {
            return false;
        }
        if (!\in_array($typeA, ['array', 'object'], true)) {
            return $a === $b;
        }

        if ('object' === $typeA) {
            $a = (array) $a;
            $b = (array) $b;
        }
        if (\count($a) !== \count($b)) {
            return false;
        }
        foreach ($a as $key => $valA) {
            $isEqual = \array_key_exists($key, $b)
                && self::equal($valA, $b[$key]);
            if (!$isEqual) {
                return false;
            }
        }
        return true;
    }
}
