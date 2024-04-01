<?php

use App\Services\App;

define("BASE_DIR", __DIR__);

require_once BASE_DIR . "/vendor/autoload.php";
App::start();
require_once BASE_DIR . "/router/routes.php";
