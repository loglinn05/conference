<?php

$dotenv = Dotenv\Dotenv::createUnsafeMutable(__DIR__);

$dotenv->load();

$dotenv->required(["DB_DRIVER", "DB_HOST", "DB_NAME", "DB_USERNAME", "DB_PASSWORD"]);