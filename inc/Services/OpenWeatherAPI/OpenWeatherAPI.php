<?php

namespace WeatherHelper\Services\OpenWeatherAPI;

use Cmfcmf\OpenWeatherMap;
use Exception;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Factory\Guzzle\RequestFactory;
use WeatherHelper\Wordpress\Settings\Settings;

class OpenWeatherAPI
{
    protected OpenWeatherMap $weatherAPI;

    protected Settings $settings;

    public function __construct(){

        $httpRequestFactory = new RequestFactory();
        $httpClient = GuzzleAdapter::createWithConfig([]);

        $this->settings = new Settings();
        $api_key = $this->settings->getOpenWeatherAPIKey();

        $this->weatherAPI = new OpenWeatherMap($api_key,
            $httpClient,
            $httpRequestFactory);
    }

    public function getTemperatureByCityName(string $city): array
    {
        try {
            $weather = $this->weatherAPI->getWeather(
                $city,
                'metric',
                'de');
        }
        catch (Exception $e)
        {
            error_log("[code:  {$e->getCode()} ] {$e->getMessage()}");
            return [
                "time" => "[server time: ".date('Y/m/d - H:i')."] error happened check log",
                "location" => "$city",
                "temperature" => ""
            ];
        }
        return [
            "time" => $weather->lastUpdate->format('Y/m/d - H:i'),
            "location" => $city,
            "temperature" => $weather->temperature->getValue()." ".$weather->temperature->getUnit()
        ];
    }
}