<?php

namespace WeatherHelper\Services\Wordpress\Assets;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;

class Assets implements ServiceInterface
{
    protected array $style_config = [];
    public function __construct()
    {
        $this->style_config = Config::get("style" );
    }

    public function register()
    {
        add_action( 'admin_enqueue_scripts', [$this,'enqueueAdminStyle']);
        add_action( 'wp_enqueue_scripts', [$this,'enqueuePublicStyle'] );

    }
    public function enqueueAdminStyle(): void
    {
        $style_files = $this->style_config["admin"];
        foreach ($style_files as $style_file)
        {
            wp_enqueue_style( $style_file, $style_file);
        }
    }
    public function enqueuePublicStyle(): void
    {
        $style_files = $this->style_config["public"];
        foreach ($style_files as $style_file)
        {
            wp_enqueue_style( $style_file, $style_file);
        }
    }

    public function enqueueAdminScripts()
    {

    }


    public function enqueuePublicScripts()
    {

    }
}