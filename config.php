<?php

$url_to_css = plugin_dir_url(__FILE__)."assets/css/";
$path_to_templates = plugin_dir_path(__FILE__)."templates/";
$path_to_admin_templates = $path_to_templates."admin/";

return [

    "style" => [
        "admin" => [
            $url_to_css."admin/admin-weather-helper-style.css",
        ],
        "public" => [
            $url_to_css."public/public-weather-helper-style.css",
        ]
    ],

    "template_dir" => plugin_dir_path(__FILE__)."templates/",

    "admin-view" => [
        "main-page" => [
            "page_title" => 'Weather-Helper',
            "manu_title" => 'Weather-Helper',
            "capability" => 'manage_options',
            "menu_slug" => 'templates/index.php',
            "icon_url" => 'dashicons-info',
            "template" => $path_to_admin_templates."index.php"
        ],
        "settings-page" => [
            "parent_slug" => 'templates/index.php',
            "page_title" => 'WH Settings',
            "manu_title" => 'WH Settings',
            "capability" => 'manage_options',
            "menu_slug" => 'templates/settings.php',
            "template" => $path_to_admin_templates."settings.php"
        ]
    ],

    "plugin-settings" =>[
        "open-weather-api-key" => "",
        "last-call-to-open-weather-api" => [] //only contain the last 5 queries
    ]
];