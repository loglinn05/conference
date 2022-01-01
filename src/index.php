<?php

require "vendor/autoload.php";
require "env.php";
require "core/bootstrap.php";
require "helpers.php";

use App\Core\{Router, Request};

$router = new Router;

Router::load("app/routes.php")->direct(Request::uri(), Request::method());