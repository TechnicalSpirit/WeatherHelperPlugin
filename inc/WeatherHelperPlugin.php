<?php

namespace WeatherHelper;

use WeatherHelper\Contracts\AbstractClasses\ServicesManagerAbstract;
use WeatherHelper\Services\Wordpress\Assets\Assets;
use WeatherHelper\Services\Wordpress\Dashboard;
use WeatherHelper\Services\Wordpress\Settings\Settings;

class WeatherHelperPlugin extends ServicesManagerAbstract
{
    protected Dashboard $dashboard;
    public function __construct()
    {
        $this->services =[
            new Dashboard(),
            new Settings(),
            new Assets()
        ];
    }

    public function activation()
    {
        flush_rewrite_rules();
    }

    public function deactivation()
    {
        flush_rewrite_rules();
    }
}