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
		"link" => "https://github.com/loglinn05/conference",
		"text" => "Participate in the conference and share the project."
	]
];