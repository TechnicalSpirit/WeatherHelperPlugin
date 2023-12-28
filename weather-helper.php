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

defined( 'ABSPATH' ) or die( 'This code must be called by WordPress' );

use WeatherHelper\WeatherHelperPlugin;

require 'vendor/autoload.php';

$weatherHelperPlugin = new WeatherHelperPlugin();
$weatherHelperPlugin->resisterServices();

register_activation_hook( __FILE__, [$weatherHelperPlugin,'activation'] );
register_deactivation_hook( __FILE__, [$weatherHelperPlugin,'deactivation']);