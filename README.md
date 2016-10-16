# Input Sanitizer

[![Source Code](https://img.shields.io/badge/source-ACID--Solutions%2Finput--sanitizer-blue.svg)](https://github.com/ACID-Solutions/input-sanitizer)
[![Latest Version](https://img.shields.io/github/release/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://github.com/ACID-Solutions/input-sanitizer/releases)
[![Build Status](https://img.shields.io/travis/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://travis-ci.org/ACID-Solutions/input-sanitizer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/ACID-Solutions/input-sanitizer/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/ACID-Solutions/input-sanitizer)
[![Total Downloads](https://img.shields.io/packagist/dt/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://packagist.org/packages/ACID-Solutions/input-sanitizer)

Often when receiving data from a client in an API or from a form request, you'll find yourself running the same data
cleaning operations such as transforming 'false' to the boolean false, converting '' to null etc. This can be a pain.

This package simplifies the process drastically.

## Installation

Begin by installing this package through Composer.

```json
{
    "require": {
        "ACID-Solutions/input-sanitizer": "1.*"
    }
}
```

## Laravel Users

If you are a Laravel user, there is a service provider you can make use of to automatically prepare the bindings and
such.

```php

// config/app.php

'providers' => [
    '...',
    'ACID\InputSanitizer\Laravel\Facades\InputSanitizer'
];
```

When this provider is booted, you'll gain access to a `InputSanitizer` facade, which you may use in your controllers.
