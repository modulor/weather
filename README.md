# OpenWeatherMap PHP Library

Basic API usage from [openweathermap.org](http://openweathermap.org)

Installation
------------


**via [Composer](http://getcomposer.org/):**

Create or add the following to composer.json in your project root:
```javascript
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/modulor/weather"
        }
    ],
    "require": {
        "modulor/weather": "dev-master"
    }
}
```

run **composer install

Example
-------

Get weather by city name

```php
require_once("path/to/vendor/autoload.php");

WeatherAPI\Configs::setApiKey('your_api_key');

$searchWeather = new WeatherAPI\Current\Search();

$searchWeather->setQueryParams(array(
  'q' => 'london'
));

print_r($searchWeather->execute());
```

Get weather by geographic coordinates

```php
require_once("path/to/vendor/autoload.php");

WeatherAPI\Configs::setApiKey('your_api_key');

$searchWeather = new WeatherAPI\Current\Search();

$searchWeather->setQueryParams(array(
  'lat' => '-22.0622478',
  'lon' => '-44.0444834'
));

print_r($searchWeather->execute());
```