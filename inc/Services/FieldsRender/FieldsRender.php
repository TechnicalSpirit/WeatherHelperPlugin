<?php

namespace WeatherHelper\Services\FieldsRender;

class FieldsRender
{
    public function settingsRender($input)
    {

        $output = $input;
        if(isset($_POST['api_settings']['weather_helper_settings_api_key']))
        {
            $output['api_settings']['weather_helper_settings_api_key'] = $_POST['api_settings']['weather_helper_settings_api_key'];
        }
        return $output;
    }

    public function apiSectionRender($input)
    {
        return $input;
    }

    public function apiKeyFieldRender(array $args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $value_option = $args['settings_manager']->getOpenWeatherAPIKey();

        echo '<div class="">
                    <input type="text" 
                            id="' . $name . '" 
                            name="' . $option_name . '[' . $name . ']" 
                            value = "' . $value_option . '"
                            >
              </div>';
    }

    public function apiCallFieldRender(array $args)
    {

    }
}