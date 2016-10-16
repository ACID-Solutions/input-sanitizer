# Input Sanitizer

[![Source Code](https://img.shields.io/badge/source-ACID--Solutions%2Finput--sanitizer-blue.svg)](https://github.com/ACID-Solutions/input-sanitizer)
[![Latest Version](https://img.shields.io/github/release/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://github.com/ACID-Solutions/input-sanitizer/releases)
[![Build Status](https://img.shields.io/travis/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://travis-ci.org/ACID-Solutions/input-sanitizer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/ACID-Solutions/input-sanitizer/code-structure)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3c577754-9101-4473-abb2-50155ed67282/small.png)](https://insight.sensiolabs.com/projects/3c577754-9101-4473-abb2-50155ed67282)
[![Total Downloads](https://img.shields.io/packagist/dt/ACID-Solutions/input-sanitizer.svg?style=flat-square)](https://packagist.org/packages/ACID-Solutions/input-sanitizer)

Often when receiving data from a client in an API or from a form request, you'll find yourself running the same data
cleaning operations such as transforming `'false'` to the boolean `false`, converting `''` to `null` etc. This can be a pain.

This package simplifies the process drastically.

## Installation

Begin by installing this package through Composer.

```bash
composer require acid-solutions/input-sanitizer
```

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

In the `$providers` array add the following service provider for this package.

```php
// config/app.php

'providers' => [
    '...',
    AcidSolutions\InputSanitizer\Laravel\InputSanitizerServiceProvider::class
];
```

In the `$aliases` array add the following facade for this package.

```php
// config/app.php

'aliases' => [
    '...',
    'InputSanitizer' => AcidSolutions\InputSanitizer\Laravel\Facades\InputSanitizer::class
]
```

When this provider is booted, you'll gain access to a `InputSanitizer` facade, which you may use in your controllers.

```php
public function index()
{
    $inputs = $request->all();
    $sanitizedInputs = InputSanitizer::sanitize($inputs);
}
```

> In Laravel, of course add `use InputSanitizer;` to the top of your controller.

## Without Laravel

InputSanitizer ships with native implementations of the bootloader and facade. In order to use it import class.

```php
// Import the facade
use Acid\InputSanitizer\Native\Facades\InputSanitizer;

$input = ['false', '3', ''];
$sanitizedInput = InputSanitizer::sanitize($input);

// produces [false, 3, null]
```

## Usage

The only public method in the package is `sanitize($input, $default = null, $jsonDecodeAssoc = false)`

Call the sanitizer as following:

```php
$data = ['null', 'true'];
$sanitized = InputSanitizer::sanitize($data);
```

`$input` can be a string, boolean, number, array, object or JSON string

Examples of the cleaned data:

```php
''      => null
'null'  => null
'false' => false
'true'  => true
'on'    => true
'3'     => 3
'5.07'  => 5.07
```

When using arrays and objects, the method will sanitize each element in the given input and return an array (or object)
with the cleaned values.

`$default` can be used to return a default value if the resulting cleaned input is `null` or `false`

Example:

```php
InputSanitizer::sanitize('', 'hello');
// will return 'hello'
```

`$jsonDecodeAssoc` is used for decoding JSON. Internally it is used as so:
See php [json_decode documentation](http://php.net/manual/en/function.json-decode.php)

```
$jsonDecodeAssoc = true // default is false
$input = json_decode($input, null, $jsonDecodeAssoc);
// will decode your json as associative array (and as object if false)
```

## Credits

- [Arthur Lorent](https://github.com/Okipa)
- [Daniel Lucas](https://github.com/daniel-chris-lucas)
