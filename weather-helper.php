<?php
/*
    Plugin Name: Weather-Helper
    Version: 1.0
    Description: Allows you to check the weather in your area
    Plugin URI: https://github.com/TechnicalSpirit/WeatherHelperPlugin
    Author: TechnicalSpirit
    Author URI: https://github.com/TechnicalSpirit
    License: GPLv2 or later
*/

//defined( 'ABSPATH' ) or die( 'This code must be called by WordPress' );

use WeatherHelper\Services\Config\Config;
use WeatherHelper\WeatherHelperPlugin;
require 'vendor/autoload.php';

//Config::init();
//print_r(Config::get("admin-view"));

$weatherHelperPlugin = new WeatherHelperPlugin();

register_activation_hook( __FILE__, [$weatherHelperPlugin,'activation'] );
register_deactivation_hook( __FILE__, [$weatherHelperPlugin,'deactivation']);

//
//$ipMaper = \WeatherHelper\Services\IPToGeo\IPToGeo::init();
//$record = $ipMaper->city("192.192.192.192");
//
//print($record->country->isoCode . "\n"); // 'US'
//print($record->country->name . "\n"); // 'United States'
//print($record->country->names['zh-CN'] . "\n"); // '美国'
//
//$weather = OpenWeatherAPI::init()->getWeather($record->country->name, 'metric', 'de');
//echo $weather->temperature;;
