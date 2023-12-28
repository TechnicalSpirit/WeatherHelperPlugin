<?php

defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'This code must be called by WordPress' );

global $wpdb;
$wpdb->query( "DELETE FROM wp_options WHERE option_name = 'weather_helper_settings'" );
