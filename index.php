<?php

require_once(__DIR__ . "/vendor/autoload.php");

use CoffeeCode\Router\Router;

// if (!isset($_SERVER["REQUEST_METHOD"])) $_SERVER["REQUEST_METHOD"] = "GET";
($actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]");
$router = new Router($actual_link);

$router->namespace("Nwiry\\UrlShortener\\Controllers");

$router->get("/", "Shortener:run");
$router->get("/{link}", "Shortener:run");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    var_dump($router->error());
}
