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
## How to get the LAAS_APP_TOKEN
To get the app token you will need to
1. visit <a href="https://lags.vercel.app/">Lags</a>
2. Create an account on the platform
3. Log in to the account you just created
4. Create an app from your dashboard and put in the name for the app e.g Hotel system
5. click on generate token
6. copy the token generated and use it in your application.

**Note:** Make sure to set the `LAAS_APP_TOKEN` environment key before using the `sendLog` method.

## Contributing

Contributions are welcome! If you find a bug or want to add a new feature, please open an issue or submit a pull request.

## License

Laas is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
