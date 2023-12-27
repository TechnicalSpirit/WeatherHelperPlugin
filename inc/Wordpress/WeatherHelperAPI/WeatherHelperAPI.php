<?php

namespace WeatherHelper\Wordpress\WeatherHelperAPI;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;
use WeatherHelper\Services\OpenWeatherAPI\OpenWeatherAPI;
use WeatherHelper\Wordpress\Settings\Settings;

class WeatherHelperAPI implements ServiceInterface
{
    protected Settings $settings;

    protected array $api_config;

    protected OpenWeatherAPI $openWeatherAPI;

    public function __construct()
    {
        $this->settings = new Settings();
        $this->api_config = Config::get("api-settings");
        $this->openWeatherAPI = new OpenWeatherAPI();
    }

    public function register()
    {
        $route = $this->api_config["route"];

        add_action('rest_api_init', function() use ($route) {
            register_rest_route(
                $route["route_namespace"],
                $route["get_temperature_by_ip"]["route"],
                [
                    'methods' => $route["get_temperature_by_ip"]["method"],
                    'callback' => [$this,"getTemperatureByCity"],
                    'permission_callback' => '__return_true',
                ]
            );
        });

    }

    public function getTemperatureByCity($request)
    {
        if(!isset($request["city"]))
            return rest_ensure_response([
               "code" => 404,
                "error_message" => "You haven't set field 'city' in request"
            ]);

        $records = $this->openWeatherAPI->getTemperatureByCityName($request["city"]);
        $this->settings->addWeatherAPILastCall($records);

        $records["code"] = 200;
        return rest_ensure_response($records);
    }
}