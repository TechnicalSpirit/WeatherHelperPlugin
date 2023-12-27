<?php

namespace WeatherHelper\Wordpress\CustomBlocks;

use WeatherHelper\Contracts\Interfaces\ServiceInterface;
use WeatherHelper\Services\Config\Config;

class WeatherHelperBlock implements ServiceInterface
{
    protected array $weather_helper_block;

    function __construct()
    {
        $this->weather_helper_block = Config::get("weather-helper-block");
    }

    public function register()
    {
        add_action( 'init', function () {
            $this->registerScript();
            $this->registerBlockType();
        });
    }

    public function registerScript(): void
    {
        $path_to_js = $this->weather_helper_block["js"];
        wp_register_script(
            $path_to_js,
            $path_to_js,
            [
                'wp-blocks',
                'wp-element',
            ]
        );

    }

    public function registerBlockType(): void
    {
        $path_to_js = $this->weather_helper_block["js"];
        $block_type = $this->weather_helper_block["block_type"];
        register_block_type(
            $block_type ,
            array(
                'editor_script' => $path_to_js
            )
        );
    }
}