<?php

namespace Andali\Rovalidator;

use Illuminate\Support\Str;

class Cif
{
    public static function validate(string $cui): bool
    {
        if (Str::length($cui) > 10) {
            return false;
        }

        if (Str::length($cui) < 6) {
            return false;
        }

        $v = 753217532;

        $c1 = (int) $cui % 10;
        $cui = (int) $cui / 10;

        $t = 0;
        while ($cui > 0) {
            $t += ($cui % 10) * ($v % 10);
            $cui = $cui / 10;
            $v = $v / 10;
        }

        $c2 = $t * 10 % 11;

        if ($c2 == 10) {
            $c2 = 0;
        }

        return $c1 === $c2;
    }
}
