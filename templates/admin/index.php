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

                $calls_shown = 0;
                foreach ($last_calls as $last_call)
                {
                    if($calls_shown == Config::get("plugin-settings")["request_history_length"])
                        break;

                    echo '<tr>
                                <td>'.$last_call["time"].'</td>
                                <td>'.$last_call["location"].'</td>
                                <td>'.$last_call["temperature"].'</td>
                           </tr>';

                    $calls_shown++;
                }
            ?>
        </tbody>
    </table>
</div>

