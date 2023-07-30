# CRUD Operation Laravel Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mamunmalik/crud-operation.svg?style=flat-square)](https://packagist.org/packages/mamunmalik/crud-operation)
[![Total Downloads](https://img.shields.io/packagist/dt/mamunmalik/crud-operation.svg?style=flat-square)](https://packagist.org/packages/mamunmalik/crud-operation)

A Laravel package to generate a complete CRUD operation. This packages contains:

- Generate Controller
- Generate Model
- Generate View files
- Generate Request files
- Generate Migration Files
- Generate Routes

## Installation

Copy this block in `composer.json` file:

```bash
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mamunmalik/crud-operation"
        }
    ]
```

You can install the package via composer:

```bash
composer require mamunmalik/crud-operation
```

After that, publish its assets using the `vendor:publish` Artisan command:
```bash
php artisan vendor:publish --provider="Mamunmalik\CrudOperation\CrudOperationServiceProvider"
```

## Usage

```php
php artisan make:crud ModelName
```
Now all of your Model, Views, Controller, Migration, Routes and Request will be created automatically with this code

### Testing

```bash
composer test
```

### Security

If you discover any security related issues, please email mamun5566@gmail.com instead of using the issue tracker.

## Credits

-   [Mamun Malik](https://github.com/mamunmalik)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
