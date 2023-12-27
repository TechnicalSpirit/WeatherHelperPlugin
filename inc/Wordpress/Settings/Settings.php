<?php

namespace WeatherHelper\Wordpress\Settings;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;
use WeatherHelper\Services\FieldsRender\FieldsRender;

class Settings implements ServiceInterface
{
    protected array $plugin_settings;

    protected array $admin_pages_config;

    protected FieldsRender $fieldsRender;

    public function __construct()
    {
        $this->plugin_settings = Config::get("plugin-settings");
        $this->admin_pages_config = Config::get("admin-view");
        $this->fieldsRender = new FieldsRender();
    }

    public function register()
    {
        add_action('admin_init', [$this,'setPluginSettings']);
    }

    public function setPluginSettings()
    {
        $settings_page = $this->admin_pages_config["settings-page"];
        $main_page = $this->admin_pages_config["main-page"];

        register_setting(
            'weather_helper_settings',
            'weather_helper_settings',
            [$this->fieldsRender,'settingsRender']
        );
        add_settings_section(
            'api_settings',
            'Open Weather API Settings',
            [$this->fieldsRender,'apiSectionRender'],
            $settings_page["menu_slug"]);

        add_settings_field(
            'weather_helper_settings_last_call',
            'API Call',
            [$this->fieldsRender, 'apiCallFieldRender'],
            $main_page["menu_slug"]
        );

        add_settings_field(
            'weather_helper_settings_api_key',
            'API Key',
            [$this->fieldsRender, 'apiKeyFieldRender'],
            $settings_page["menu_slug"],
            'api_settings',
            [
                'label_for' => 'weather_helper_settings_api_key',
                'option_name' => 'api_settings',
                'settings_manager' => $this
            ]);
    }

    public function getWeatherAPILastCalls():array
    {
        $weather_helper_settings = $this->getWeatherHelperSettings();

        if( ! key_exists('weather_helper_settings_last_call',$weather_helper_settings))
            return [];

        return $weather_helper_settings['weather_helper_settings_last_call'];
    }

    public function addWeatherAPILastCall(array $call_info): void
    {
        $weather_helper_settings = $this->getWeatherHelperSettings();
        $weather_helper_settings["weather_helper_settings_last_call"][] =
            [
                "time" => $call_info["time"],
                "location" => $call_info["location"],
                "temperature" => $call_info["temperature"]
            ];
        update_option("weather_helper_settings",$weather_helper_settings );
    }

    public function getOpenWeatherAPIKey():string
    {
        $weather_helper_settings = $this->getWeatherHelperSettings();

        if( !key_exists('api_settings',$weather_helper_settings))
            return "default_api_key";

        if( !key_exists('weather_helper_settings_api_key',$weather_helper_settings['api_settings']))
            return "default_api_key";

        return $weather_helper_settings['api_settings']['weather_helper_settings_api_key'];
    }

    public function getWeatherHelperSettings():array
    {
        return get_option('weather_helper_settings') ?
                get_option('weather_helper_settings') :
                [];
    }
}