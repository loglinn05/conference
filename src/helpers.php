<?php

function view($view, $data = [])
{
	extract($data);
	require "app/views/{$view}.view.php";
}

function redirect($uri)
{
	$uri = trim($uri, '/');
	header("Location: /{$uri}");
}

function css($file)
{
	return "public/css/{$file}.css";
}

function js($file)
{
	return "public/js/{$file}.js";
}