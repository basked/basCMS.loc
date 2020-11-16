<?php

namespace application\core;

use application\core\View;

/**
 * Class Router
 */
class Router
{
    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     * Add route
     * @param $route
     * @param $params
     */
    public function add($route, $params)
    {
        $r = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        //преобразуем роут на входе в роут как регулярку, для дальнейшего использования в match()
        $r = "#^" . $r . "$#";
        $this->routes[$r] = $params;
    }

    /**
     * Route difine
     * @return bool
     */
    public function match()
    {
        // определякм текущий URI b удаляем первый /
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // перебираем масив роутов и пытаемся находим текущий маршрут
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int)$match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            // существует ли найденный класс
            if (class_exists($path)) {
                //Существует ли найденый метод в класс
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404, 'Action not found ' . $action);
                }
            } else {
                View::errorCode(404, 'Class not found ' . $path);
            }
        } else {
            View::errorCode(404, 'Route not found');
        }
    }
}
