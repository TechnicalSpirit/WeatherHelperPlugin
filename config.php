<?php

$url_to_css = plugin_dir_url(__FILE__)."assets/css/";
$url_to_js = plugin_dir_url(__FILE__)."assets/js/";
$path_to_templates = plugin_dir_path(__FILE__)."templates/";
$path_to_admin_templates = $path_to_templates."admin/";

return [

    "style" => [
        "admin" => [
            $url_to_css."admin/bootstrap.min.css",
        ],
        "public" => [
            $url_to_css."public/block-weather-helper.css",
        ]
    ],

    "js" => [
        "admin" => [

        ],
        "public" => [
            $url_to_js."public/block-weather-helper.js"
        ]
    ],

    "template_dir" => $path_to_templates,

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

    "plugin-settings" => [
        "weather_helper_settings" => [

            "api_settings" => [
                "weather_helper_settings_api_key" => "",
            ],

            "weather_helper_settings_last_call" => []
        ],

        "request_history_length" => 5
    ],

    "weather-helper-block" => [
        "js" => $url_to_js."public/block-weather-helper-edit.js",
        "block_type" => "block/block-weather-helper"
    ],

    "api-settings" => [
        "route" => [
            "route_namespace" => "weather-helper/v1",
            "get_temperature_by_ip" => [
                "route" => "/temperature",
                "method" => "GET"
            ]
        ]
    ],
];