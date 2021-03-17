<?php

namespace App\Core;

class Router
{
	public $routes = [
		"GET" => [],
		"POST" => []
	];

	public static function load($file)
	{
		$router = new static;
		require $file;
		return $router;
	}

	public function get($uri, $controller)
	{
		$this->routes["GET"][$uri] = $controller;
	}

	public function post($uri, $controller)
	{
		$this->routes["POST"][$uri] = $controller;
	}

	public function direct($uri, $method)
	{
		if (isset($this->routes[$method][$uri])) {
			if (preg_match("#^([A-Z][a-z]*)+@([a-z]+([A-Z][a-z]*)*)+$#", $this->routes[$method][$uri])) {
				if (array_key_exists($uri, $this->routes[$method])) {
					return $this->callAction(
						...explode('@', $this->routes[$method][$uri])
					);
				}
				die("No route defined for this URI.");
			} else {
				header("HTTP/1.1 400 Bad Request");
			}
		} else {
			header("HTTP/1.1 404 Not Found");
		}
	}

	private function callAction($controller, $action)
	{
		$controller = "App\\Controllers\\{$controller}";
		$controller = new $controller;
		if (!method_exists($controller, $action)) {
			die("The controller doesn't respond to the {$action} action.");
		}
		return $controller->$action();
	}
}