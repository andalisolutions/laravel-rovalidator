# Laravel RO Validator
Romanian CIF, CNP validations - upcoming another (IBAN, BIC)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-build]][link-build]
[![StyleCI][ico-styleci]][link-styleci]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]
## Installation

Via Composer

``` bash
$ composer require andalisolutions/laravel-rovalidator
```

## Usage
```php
public function store(Request $request)
{
    $this->validate($request, [
        'company_cif' => 'cif',
        'client_cnp' => 'cnp',
    ]);
}
```

## Changelog

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
./vendor/bin/phpunit test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email <andrei.ciungulete@andali.ro> instead of using the issue tracker.

## Credits

- [Andrei Ciungulete][link-author]
- [All Contributors][link-contributors]

## License

Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/andalisolutions/laravel-rovalidator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/andalisolutions/laravel-rovalidator.svg?style=flat-square
[ico-build]: https://github.com/andalisolutions/laravel-rovalidator/workflows/tests/badge.svg
[ico-styleci]: https://styleci.io/repos/253312070/shield
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/andalisolutions/laravel-rovalidator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/andalisolutions/laravel-rovalidator
[link-downloads]: https://packagist.org/packages/andalisolutions/laravel-rovalidator
[link-build]: https://github.com/andalisolutions/laravel-rovalidator/actions
[link-styleci]: https://styleci.io/repos/253312070
[link-scrutinizer]: https://scrutinizer-ci.com/g/andalisolutions/laravel-rovalidator
[link-author]: https://github.com/andalisolutions
[link-contributors]: ../../contributors
