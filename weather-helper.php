php composer.phar require geoip2/geoip2:~2.0<?php
/*
    Plugin Name: Weather-Helper
    Version: 1.0
    Description: Allows you to check the weather in your area
    Plugin URI: https://github.com/TechnicalSpirit/WeatherHelperPlugin
    Author: TechnicalSpirit
    Author URI: https://github.com/TechnicalSpirit
    License: GPLv2 or later
*/

use WeatherHelper\Services\OpenWeatherAPI\OpenWeatherAPI;


require 'vendor/autoload.php';
use GeoIp2\Database\Reader;

$ipMaper = \WeatherHelper\Services\IPToGeo\IPToGeo::init();
$record = $ipMaper->city("192.192.192.192");

print($record->country->isoCode . "\n"); // 'US'
print($record->country->name . "\n"); // 'United States'
print($record->country->names['zh-CN'] . "\n"); // '美国'

$weather = OpenWeatherAPI::init()->getWeather($record->country->name, 'metric', 'de');
echo $weather->temperature;;
