<?php

session_start();

require __DIR__ . '/../app/core/Router.php';


use App\core\Router;

$router = new Router();
require __DIR__ . '/../routes/web.php';

$router->dispatch();