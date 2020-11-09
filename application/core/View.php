<?php


namespace application\core;


class View
{
    // путь по которому лежит View
    public $path;
    // шаблон
    public $layout = 'default';
    // для доступа к route из шаблона(передаем в базовом контроллере)
    public $route;

    public function __construct($route)
    {
        // определяем маршрут переданный из контролллера
        $this->route = $route;
        // нахоим путь к маршруту
        $this->path = $route['controller'] . '/' . $route['action'];

    }

    function render($title, $vars = [])
    {
        if (file_exists('application/views/' . $this->path . '.php')) {
            // перед загрузкой контента запускаем ob_start
            ob_start();
            // подключаем вид
            require 'application/views/' . $this->path . '.php';
            // подгружаем саму вьюху в переменную
            $content = ob_get_clean();
        } else{
            echo 'Вид '.$this->path.' не найден';
        }
            // подключаем шаблон
        if (file_exists('application/views/layouts/' . $this->layout . '.php')) {
            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Шаблон '.$this->layout.' не найден';
        }

    }
}