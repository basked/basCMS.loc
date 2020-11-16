<?php

require_once __DIR__ . '/application/lib/Dev.php';

use application\core\Router;


// автозагрузка
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});
// стартуем сесию
session_start();
$router = new Router();
$router->run();

