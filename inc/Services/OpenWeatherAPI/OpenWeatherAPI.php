<?php

namespace WeatherHelper\Services\OpenWeatherAPI;
use Cmfcmf\OpenWeatherMap;
use Http\Factory\Guzzle\RequestFactory;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
class OpenWeatherAPI
{
    protected static $weatherAPI = null;
    private function __construct(){}

    public static function init(): OpenWeatherMap
    {
        if(self::$weatherAPI == null)
        {
            $httpRequestFactory = new RequestFactory();
            $httpClient = GuzzleAdapter::createWithConfig([]);

            self::$weatherAPI = new OpenWeatherMap($api_key, $httpClient, $httpRequestFactory);;
        }
        return self::$weatherAPI;
    }
}