# Laravel BotScout

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nicolasbeauvais/laravel-botscout.svg?style=flat-square)](https://packagist.org/packages/nicolasbeauvais/laravel-botscout)
[![Build Status](https://img.shields.io/travis/nicolasbeauvais/laravel-botscout/master.svg?style=flat-square)](https://travis-ci.org/nicolasbeauvais/laravel-botscout)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/005620f8-d154-41f1-bc9b-4c27a1cf36ab/mini.png)](https://insight.sensiolabs.com/projects/005620f8-d154-41f1-bc9b-4c27a1cf36ab)
[![Quality Score](https://img.shields.io/scrutinizer/g/nicolasbeauvais/laravel-botscout.svg?style=flat-square)](https://scrutinizer-ci.com/g/nicolasbeauvais/laravel-botscout)
[![Total Downloads](https://img.shields.io/packagist/dt/nicolasbeauvais/laravel-botscout.svg?style=flat-square)](https://packagist.org/packages/nicolasbeauvais/laravel-botscout)

![bs_logo_full](https://cloud.githubusercontent.com/assets/2951704/22866541/8c6ddd80-f178-11e6-8a94-ded54a0b109a.gif)

Protect your website against automated scripts using the [botscout.com](http://botscout.com/) API. 

## Installation

You can install the package via composer:

``` bash
composer require nicolasbeauvais/laravel-botscout
```

Next, you must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    NicolasBeauvais\LaravelBotScout\BotScoutServiceProvider::class,
];
```

Add your [botscout.com](http://botscout.com/getkey.htm) api key to the `.env` file:
```bash
BOTSCOUT_SECRET=your-api-key  
```

If needed you can also publish the config file:
```bash
php artisan vendor:publish --provider="NicolasBeauvais\LaravelBotScout\BotScoutServiceProvider" --tag="config"
```

If you want to make use of the facade you must install it as well:

```php
// config/app.php
'aliases' => [
    ...
    'BotScout' => NicolasBeauvais\LaravelBotScout\BotScoutFacade::class,
];
```

## Usage

You are highly advised to read the [BotScout.com API guide](http://botscout.com/api.htm) to understand the meaning of 
each method.

### Validator

You can easily use botscout in your existing validators:

``` php
// Validate name
$validator = Validator::make(['name' => 'John Doe'], [
  'name' => 'required|botscout_name'
]);

// Validate email
$validator = Validator::make(['email' => 'toto@gmail.com'], [
  'email' => 'required|botscout_mail'
]);

// Validate ip
$validator = Validator::make(['ip' => '127.0.0.1'], [
  'ip' => 'required|botscout_ip'
]);
```

### Facade

You can use the BotScout facade anywhere in your app:

```php
BotScout::multi('John Doe', 'email@test.com', '127.0.0.1')->isValid();

BotScout::all('John Doe')->isValid();

BotScout::name('John Doe')->isValid();

BotScout::mail('email@test.com')->isValid();

BotScout::ip('127.0.0.1')->isValid();

// We also include a quick way of testing a user with integrated exception catch
BotScout::check('John Doe', 'email@test.com', '127.0.0.1'); // true or false
```
### Real life example

The `multi` method is the recommended way to validate a register form:

```php
$validator = Validator::make($request->all(), [
    'email' => 'required|email|unique:users',
    'name' => 'required|max:20',
]);

$validator->after(function ($validator) {
    if (!BotScout::check($request->get('name'), $request->get('email'), $request->ip())) {
        $validator->errors()->add('email', 'Sorry, it looks like your a bot!');
    }
});
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nicolasbeauvais1@gmail.com instead of using the issue tracker.

## Credits

- [Nicolas Beauvais](https://github.com/nicolasbeauvais)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
