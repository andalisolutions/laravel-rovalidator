<?php

namespace Andali\Rovalidator;

class Cnp
{
    public static function validate(string $cnp): bool
    {
        if (strlen($cnp) != 13) {
            return false;
        }
        $cnp = str_split($cnp);
        unset($p_cnp);
        $hashTable = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];
        $hashResult = 0;

        for ($i = 0; $i < 13; $i++) {
            if (! is_numeric($cnp[$i])) {
                return false;
            }
            $cnp[$i] = (int) $cnp[$i];
            if ($i < 12) {
                $hashResult += (int) $cnp[$i] * (int) $hashTable[$i];
            }
        }
        unset($hashTable, $i);
        $hashResult = $hashResult % 11;
        if ($hashResult == 10) {
            $hashResult = 1;
        }
        $year = ($cnp[1] * 10) + $cnp[2];
        switch ($cnp[0]) {
            case 1:
            case 2:
                $year += 1900;

                break;
            case 3:
            case 4:
                $year += 1800;

                break;
            case 5:
            case 6:
                $year += 2000;

                break;
            case 7:
            case 8:
            case 9:
                $year += 2000;
                if ($year > (int) date('Y') - 14) {
                    $year -= 100;
                }
                break;
            default:
                return false;

        }

        return $year > 1800 && $year < 2099 && $cnp[12] == $hashResult;
    }
}
