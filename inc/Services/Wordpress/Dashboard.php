<?php

namespace WeatherHelper\Services\Wordpress;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;
use WeatherHelper\Services\Render\Render;
use WeatherHelper\Services\Wordpress\Settings\Settings;

class Dashboard implements ServiceInterface
{
    protected Render $page_render;
    protected array $admin_pages_config;

    protected Settings $plugin_settings;

    public function __construct()
    {
        $this->page_render = new Render();
        $this->admin_pages_config = Config::get("admin-view");
        $this->plugin_settings = new Settings();


    }
    public function register()
    {
        add_action( 'admin_menu', [$this, 'setAdminPage'] );
        add_action( 'admin_menu', [$this, 'setSubPage'] );
        $this->plugin_settings->registerPluginSettings();
    }

    public function setAdminPage()
    {
        $main_page = $this->admin_pages_config["main-page"];
        add_menu_page(
            $main_page["page_title"],
            $main_page["manu_title"],
            $main_page["capability"],
            $main_page["menu_slug"],
            [$this->page_render,"renderMainPage"],
            $main_page["icon_url"],
        );
    }

    public function setSubPage()
    {
        $settings_page = $this->admin_pages_config["settings-page"];
        add_submenu_page(
            $settings_page["parent_slug"],
            $settings_page["page_title"],
            $settings_page["manu_title"],
            $settings_page["capability"],
            $settings_page["menu_slug"],
            [$this->page_render,"renderSettingsPage"],
        );
    }
}