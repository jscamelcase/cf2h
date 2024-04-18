<?php

/* import the psr-4 autoloader installed from composer
with composer installed, we can autolaod from the Framwork and User namespaces without having to constaly require them throughout the application */

require __DIR__ . '/../vendor/autoload.php';

//use statements employed throught the app to avoid full name spacing
use Framework\Router;
use Framework\Session;

//Session stared for user using the Session class static start method
Session::start();

//require helper functions to load views, inspect etc throughout the application

require "../helpers.php";

// Instantiate the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current URI and HTTP method
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


//Route the request
$router->route($uri);
