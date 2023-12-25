<?php

use WeatherHelper\Services\Config\Config;

return [

    "template_dir" => plugin_dir_path(__FILE__)."templates/",

    "admin-view" => [
        "main-page" => [
            "page_title" => 'Weather-Helper',
            "manu_title" => 'Weather-Helper',
            "capability" => 'manage_options',
            "menu_slug" => 'templates/index.php',
            "icon_url" => 'dashicons-info',
            "template" => plugin_dir_path(__FILE__)."templates/admin/index.php"
        ],
        "settings-page" => [
            "parent_slug" => 'templates/index.php',
            "page_title" => 'WH Settings',
            "manu_title" => 'WH Settings',
            "capability" => 'manage_options',
            "menu_slug" => 'templates/settings.php',
            "template" => plugin_dir_path(__FILE__)."templates/admin/settings.php"
        ]
    ]
];