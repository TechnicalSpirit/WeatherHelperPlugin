<?php

namespace WeatherHelper\Services\Wordpress\Settings;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;

class Settings implements ServiceInterface
{
    protected array $plugin_settings;
    public function __construct()
    {
        $this->plugin_settings = Config::get("plugin-settings");
    }

    public function register()
    {
        // TODO: Implement register() method.
    }

    public function registerPluginSettings()
    {

    }
}