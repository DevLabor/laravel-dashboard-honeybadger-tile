# A tile to display unresolved Honeybadger exceptions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devlabor/laravel-dashboard-honeybadger-tile.svg?style=flat-square)](https://packagist.org/packages/devlabor/laravel-dashboard-honeybadger-tile)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/devlabor/laravel-dashboard-honeybadger-tile/run-tests?label=tests)](https://github.com/devlabor/laravel-dashboard-honeybadger-tile/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/devlabor/laravel-dashboard-honeybadger-tile.svg?style=flat-square)](https://packagist.org/packages/devlabor/laravel-dashboard-honeybadger-tile)

This tile can used on the [Laravel Dashboard](https://docs.spatie.be/laravel-dashboard) to display unresolved Honeybadger faults.

## Installation

You can install the tile via composer:

```bash
composer require devlabor/laravel-dashboard-honeybadger-tile
```

In the `dashboard` config file, you must add this configuration in the `tiles` key.

Sign up at https://honeybadger.io/ and create a new project. To obtain `HONEY_BADGER_AUTH_TOKEN` you have to create a new api token under your user authentication settings.

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'honeybadger' => [
            'auth_token' => env('HONEYBADGER_AUTH_TOKEN'),
            'refresh_interval_in_seconds' => 300
        ],
    ],
];
```

In `app\Console\Kernel.php` you should schedule the `DevLabor\HoneybadgerTile\FetchHoneybadgerProjectsCommand` to run every five minutes. 

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(\DevLabor\HoneybadgerTile\Commands\FetchHoneybadgerProjectsCommand::class)->everyFiveMinutes();
}
```

## Usage

In your dashboard view you use the `livewire:honeybadger-tile` component.

```html
<x-dashboard>
    <livewire:honeybadger-tile position="a1" />
</x-dashboard>
```

### Customizing the view

If you want to customize the view used to render this tile, run this command:

```bash
php artisan vendor:publish --provider="DevLabor\HoneybadgerTile\HoneybadgerTileServiceProvider" --tag="dashboard-honeybadger-tile-views"
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@devlabor.com instead of using the issue tracker.

## Credits

- [Jeffrey Reichardt](https://github.com/kiv4h)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
