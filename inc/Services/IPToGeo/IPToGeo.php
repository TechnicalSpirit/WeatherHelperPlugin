<?php

namespace WeatherHelper\Services\IPToGeo;

use GeoIp2\Database\Reader;

class IPToGeo
{
    protected static $maper = null;
    public static function init()
    {
        if(self::$maper == null)
        {
            self::$maper = new Reader(__DIR__.'/GeoIP2-City.mmdb');
        }
        return self::$maper;
    }
}