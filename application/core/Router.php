<?php

namespace application\core;
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
        //преобразуем роут на входе в роут как реулярку
        $r = "#^" . $route . "$#";
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
                $this->params = $params;
                return true;
            }

        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {

            echo '<p>controller:<b>'.$this->params['controller'].'/'.$this->params['action'].'</b></p>';
        } else {
            echo 'Route not found';
        }
    }
}
