<?php

namespace WeatherHelper\Services\Config;

class Config
{
    /**
     * @var array
     */
    protected static $config = [];

    private function __construct(){}

    public static function get(string $name)
    {
        if(self::$config == null)
        {
            self::$config = self::read_config_file();
        }
        return self::$config[$name];
    }

    public static function read_config_file():array
    {
        $file_path = plugin_dir_path(dirname( __FILE__, 3 ))."config.php";
        return require_once $file_path;
    }
}