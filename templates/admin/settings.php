<?php

use WeatherHelper\Services\Config\Config;

require_once Config::get("template_dir")."admin/parts/header.php"

?>
<div class="container">
    <form method="post" action="options.php">
        <?php
            $settings_page  = Config::get("admin-view")["settings-page"];

            settings_fields( 'weather_helper_settings');
            do_settings_sections( $settings_page["menu_slug"]);
            submit_button();
        ?>
    </form>
</div>

