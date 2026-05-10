<?php

session_start();

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/core/Router.php';
require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/controllers/HomeController.php';

$router = new Router();

require_once BASE_PATH . '/app/routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI']);