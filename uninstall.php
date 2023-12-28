<?php

defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'This code must be called by WordPress' );

use WeatherHelper\Services\Config\Config;

require 'vendor/autoload.php';

global $wpdb;
foreach (Config::get("plugin-settings") as $setting)
{
	$wpdb->query( "DELETE FROM wp_posts WHERE post_type = '$setting'" );
}
