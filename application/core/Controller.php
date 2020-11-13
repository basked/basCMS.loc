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
    public $view;
    public $model;
    public function __construct($route)
    {
       $this->route=$route;
       $this->view = new View($route);
       $this->model=$this->loadModel($route['controller']);
    }

    public function loadModel($name){
        $path='application\models\\'.ucfirst($name);
        if (class_exists($path)){
            return new $path;
        } else {
            return 'Model'.$name.' not found';
        }
    }

}