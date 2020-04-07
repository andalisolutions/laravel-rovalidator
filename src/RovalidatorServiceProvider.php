<?php

namespace Andali\Rovalidator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class RovalidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerCnpValidator();
        $this->registerCifValidator();
    }

    private function registerCnpValidator()
    {
        Validator::extend('cnp', function($attribute, $value, $parameters) {
            return Cnp::validate($value);
        });

        Validator::replacer('cnp', function($message, $attribute, $rule, $parameters) {
            $message = 'Cnp-ul introdus nu este corect!';

            return $message;
        });
    }

    private function registerCifValidator()
    {
        Validator::extend('cif', function($attribute, $value, $parameters) {
            return Cif::validate($value);
        });

        Validator::replacer('cif', function($message, $attribute, $rule, $parameters) {
            $message = 'CIF-ul introdus nu este corect!';

            return $message;
        });
    }
}
