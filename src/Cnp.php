<?php

namespace Andali\Rovalidator;

class Cnp
{
    private $_isValid = false;

    private $cnp = '';

    private $_cnp = [];

    private $_year = '';

    private $_month = '';

    private $_day = '';

    private $_cc = '';

    private static $controlKey = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];


    public function __construct($cnp)
    {
        $this->cnp = trim($cnp);
        $this->_cnp = str_split($this->cnp);
        $this->_isValid = $this->validateCnp();
    }

    public static function validate($cnp)
    {
        return (new static($cnp))->isValid();
    }

    private function validateCnp()
    {
        if (count($this->_cnp) != 13) {
            return false;
        }

        if (! ctype_digit($this->cnp)) {
            return false;
        }

        $this->setYear();
        $this->setMonth();
        $this->setDay();
        $this->setCounty();

        if ($this->checkYear() && $this->checkMonth() && $this->checkDay()) {
            return ($this->_cnp[12] == $this->calculateHash());
        }

        return false;
    }

    private function setYear()
    {
        $year = ($this->_cnp[1] * 10) + $this->_cnp[2];

        switch ($this->_cnp[0]) {
            case 1:
            case 2:
                $this->_year = $year + 1900;

                break;
            case 3:
            case 4:
                $this->_year = $year + 1800;

                break;
            case 5:
            case 6:
                $this->_year = $year + 2000;

                break;
            case 7:
            case 8:
            case 9:
                $this->_year = $year + 2000;
                if ($this->_year > (int)date('Y') - 14) {
                    $this->_year -= 100;
                }

                break;
            default:
                $this->_year = 0;
        }
    }

    private function setMonth()
    {
        $this->_month = $this->_cnp[3] . $this->_cnp[4];
    }

    private function setDay()
    {
        $this->_day = $this->_cnp[5] . $this->_cnp[6];
    }

    private function setCounty()
    {
        $this->_cc = $this->_cnp[7] . $this->_cnp[8];
    }

    private function checkYear()
    {
        return ($this->_year >= 1800) && ($this->_year <= 2099);
    }

    private function checkMonth()
    {
        $month = (int)$this->_month;

        return ($month >= 1) && ($month <= 12);
    }

    private function checkDay()
    {
        $day = (int)$this->_day;
        if (($day < 1) || ($day > 31)) {
            return false;
        }

        if ($day > 28) {
            if (checkdate((int)$this->_month, $day, (int)$this->_year) === false) {
                return false;
            }
        }

        return true;
    }

    private function calculateHash()
    {
        $hashSum = 0;

        for ($i = 0; $i < 12; $i++) {
            $hashSum += $this->_cnp[$i] * self::$controlKey[$i];
        }

        $hashSum = $hashSum % 11;
        if ($hashSum == 10) {
            $hashSum = 1;
        }

        return $hashSum;
    }

    public function isValid()
    {
        return $this->_isValid;
    }
}
