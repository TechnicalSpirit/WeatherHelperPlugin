<?php

namespace WeatherHelper\Services\OpenWeatherAPI;
class OpenWeatherAPI
{
    protected static $weatherAPI = null;
    private function __construct(){}

    public static function init()
    {
        if(self::$weatherAPI != null)
        {
            self::$weatherAPI = !null;
        }
        return self::$weatherAPI;
    }
}