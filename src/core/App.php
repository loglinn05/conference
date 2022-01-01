<?php

namespace App\Core;

class App
{
	private static $container = [];

	public function set($key, $value)
	{
		static::$container[$key] = $value;
	}

	public function get($key)
	{
		if (!array_key_exists($key, static::$container)) {
			die("No {$key} is bound in the container.");
		}
		return static::$container[$key];
	}
}