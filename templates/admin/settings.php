<?php

use WeatherHelper\Services\Config\Config;

require_once Config::get("template_dir")."admin/parts/header.php"

?>
<div class="container">
    <form class="form-group">
        <div>
            <label>
                Open Weather API Key
            </label>
            <input type="email"
                   class="form-control"
                   placeholder="API Key">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

