# Laas

Laas is a PHP package for sending logs to the [LAAS API](https://laas-api-nest.onrender.com/).

## Installation

You can install Laas using [Composer](https://getcomposer.org/):

```bash
composer require peteradeojo/laas
```

## Usage

First, you need to create an instance of the `Laas` class:

```php
$laas = Laas::getInstance();
```

Then, you can use the `sendLog` method to send a log to the LAAS API:

```php
$log = new LaasLogDTO();
$log->level = 'info';
$log->message = 'This is a test message';

$response = $laas->sendLog($log);
```

The `sendLog` method returns a [Guzzle HTTP response](https://docs.guzzlephp.org/en/stable/psr7.html#responses), which you can use to check the status code and response body (or you can completely ignore it).

**Note:** Make sure to set the `LAAS_APP_TOKEN` environment key before using the `sendLog` method.

## Contributing

Contributions are welcome! If you find a bug or want to add a new feature, please open an issue or submit a pull request.

## License

Laas is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
