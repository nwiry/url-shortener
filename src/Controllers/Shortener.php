<?php

namespace Nwiry\UrlShortener\Controllers;

class Shortener
{
    private $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function index()
    {
        echo file_get_contents(__DIR__ . "/../Views/index.html");
    }

    public function run($link)
    {
        $short = explode("/", ($_SERVER["REQUEST_URI"]));

        if (!isset($short[1])) return $this->index();
        if (empty($short[1]) || isset($_SERVER["QUERY_STRING"]) && $short[1] == ("?" . $_SERVER["QUERY_STRING"])) return $this->index();

        // Search short in model

        return header("location: " . $full_link);
    }
}
