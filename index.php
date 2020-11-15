<?php

require_once __DIR__ . '/application/lib/Dev.php';

use application\core\Router;


// либо можем прописать код в обратной функции
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

session_start();
$_SESSION['sortField']='name';
$_SESSION['sortType']='asc';
$router = new Router();
$router->run();

