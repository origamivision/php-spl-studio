# A PHP library for StationPlaylist Studio

[![Latest Version on Packagist](https://img.shields.io/packagist/v/origamivision/stationplaylist.svg?style=flat-square)](https://packagist.org/packages/origamivision/stationplaylist)
[![Build Status](https://img.shields.io/travis/origamivision/stationplaylist/master.svg?style=flat-square)](https://travis-ci.org/origamivision/stationplaylist)
[![Quality Score](https://img.shields.io/scrutinizer/g/origamivision/stationplaylist.svg?style=flat-square)](https://scrutinizer-ci.com/g/origamivision/stationplaylist)
[![Total Downloads](https://img.shields.io/packagist/dt/origamivision/stationplaylist.svg?style=flat-square)](https://packagist.org/packages/origamivision/stationplaylist)

This is a PHP library to connect with StationPlaylist Studio remotely. It can be used for loading all available songs in the song library and send song requests to Studio.

Note: development in progress. Not for production.

## Installation

You can install the package via composer:

```bash
composer require origamivision/stationplaylist
```

## Usage

``` php
use Origamivision\Stationplaylist\Client;

$spl = new Client('0.0.0.0', 0);

// List all available songs
$results = $spl->search('*');

// Send a song request to Studio
$spl->request('C:/absolute/path/to/music - file.mp3', 'Name of requester', 'Location of request');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email opensource@origami.vision instead of using the issue tracker.

## Credits

- [Origami.vision](https://github.com/origamivision)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.