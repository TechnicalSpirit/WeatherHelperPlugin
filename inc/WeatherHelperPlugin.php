<?php

namespace WeatherHelper;

use WeatherHelper\Services\Wordpress\Dashboard;

class WeatherHelperPlugin
{
    protected Dashboard $dashboard;
    public function __construct()
    {
        $this->dashboard = new Dashboard();
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