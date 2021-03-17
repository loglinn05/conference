<?php

return [
	"database" => [
		"driver" => getenv("DB_DRIVER"),
		"host" => getenv("DB_HOST"),
		"database" => getenv("DB_NAME"),
		"username" => getenv("DB_USERNAME"),
		"password" => getenv("DB_PASSWORD"),
		"options" => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	],
	"share" => [
		"link" => "https://angelina.tst.albedo.dev/",
		"text" => "Check out this Meetup with SoCal AngularJS!"
	]
];