<?php

namespace WeatherHelper;

use WeatherHelper\Contracts\AbstractClasses\ServicesManagerAbstract;
use WeatherHelper\Services\Config\Config;
use WeatherHelper\Wordpress\Assets\Assets;
use WeatherHelper\Wordpress\CustomBlocks\WeatherHelperBlock;
use WeatherHelper\Wordpress\Dashboard\Dashboard;
use WeatherHelper\Wordpress\Settings\Settings;
use WeatherHelper\Wordpress\WeatherHelperAPI\WeatherHelperAPI;

class WeatherHelperPlugin extends ServicesManagerAbstract
{
    public function __construct()
    {
        $this->services =[
            new WeatherHelperAPI(),
            new Settings(),
            new Assets(),
            new WeatherHelperBlock(),
            new Dashboard(),
        ];
    }

    public function activation()
    {
        flush_rewrite_rules();

        $plugin_settings = Config::get("plugin-settings");

        foreach ($plugin_settings as $setting_name => $_)
        {
            if ( ! get_option( $setting_name ) ) {
                update_option( $setting_name, []);
            }
        }
    }

    public function deactivation()
    {
        flush_rewrite_rules();
    }
}