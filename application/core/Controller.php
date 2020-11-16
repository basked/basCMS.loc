<?php


namespace application\core;


/**
 * Class Controller
 * @package application\core
 */
abstract class Controller
{

    /**
     * @var
     */
    public $route;
    /**
     * @var View
     */
    public $view;
    /**
     * @var mixed|string
     */
    public $model;

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    /**
     * Название Модели= названию контроллера
     * @param $name
     * @return mixed|string
     */
    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        } else {
            return 'Model' . $name . ' not found';
        }
    }

}