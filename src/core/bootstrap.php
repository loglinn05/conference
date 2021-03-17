<?php

use App\Core\App;
use App\Core\Database\{Connection, QueryBuilder};
use App\Models\Members;

App::set("config", require "config.php");

App::set(
	"connection",
	new QueryBuilder(
		Connection::make(
			App::get("config")["database"]
		)
	)
);

App::set(
	"share",
	App::get("config")["share"]
);