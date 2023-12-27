<?php

namespace WeatherHelper\Wordpress\Assets;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;

class Assets implements ServiceInterface
{
    protected array $style_config = [];

    protected array $js_config = [];

    public function __construct()
    {
        $this->style_config = Config::get("style" );
        $this->js_config = Config::get("js");
    }

    public function register()
    {
        add_action( 'admin_enqueue_scripts',function (){
            $this->enqueueAdminStyle();
            $this->enqueueAdminScripts();
        });
        add_action( 'wp_enqueue_scripts',function (){
            $this->enqueuePublicStyle();
            $this->enqueuePublicScripts();
        });
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
        $js_files = $this->js_config["admin"];
        foreach ($js_files as $js_file)
        {
            wp_enqueue_script( $js_file, $js_file);
        }
    }

    public function enqueuePublicScripts()
    {
        $js_files = $this->js_config["public"];
        foreach ($js_files as $js_file)
        {
            wp_enqueue_script( $js_file, $js_file);
        }
    }
}