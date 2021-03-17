<?php

namespace App\Core\Database;

class Connection
{
	public static function make($config) {
		try {
			return new \PDO(
				$config["driver"] . ":host=" . $config["host"] . ";dbname=" . $config["database"],
				$config["username"],
				$config["password"],
				$config["options"]
			);
		} catch (\PDOException $e) {
			die("Something's wrong with the connection.");
		}
	}
}