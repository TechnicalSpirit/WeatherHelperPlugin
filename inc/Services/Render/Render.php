<?php

namespace WeatherHelper\Services\Render;

use WeatherHelper\Services\Config\Config;

class Render
{
    public function renderMainPage()
    {
        return $this->renderPage(Config::get("admin-view")["main-page"]["template"]);
    }

    public function renderSettingsPage()
    {
        return $this->renderPage(Config::get("admin-view")["settings-page"]["template"]);
    }

    public function renderPage(string $page_name)
    {
        return require_once $page_name;
    }
}