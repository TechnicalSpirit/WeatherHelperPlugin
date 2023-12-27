<?php

use WeatherHelper\Services\Config\Config;
use WeatherHelper\Wordpress\Settings\Settings;

require_once Config::get("template_dir")."admin/parts/header.php"

?>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Time</th>
            <th scope="col">Location</th>
            <th scope="col">Temperature</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $settings = new Settings();

            $last_calls = $settings->getWeatherAPILastCalls();
            $last_calls = array_reverse($last_calls);

            for($i = 0; $i < Config::get("plugin-settings")["request_history_length"]; $i++)
            {
                $last_call = $last_calls[$i];

                echo '<tr>
                            <td>'.$last_call["time"].'</td>
                            <td>'.$last_call["location"].'</td>
                            <td>'.$last_call["temperature"].'</td>
                       </tr>';
            }
        ?>

        </tbody>
    </table>
</div>

