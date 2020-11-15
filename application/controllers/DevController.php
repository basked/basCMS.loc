<?php


namespace application\controllers;


use application\core\Controller;

class DevController extends Controller
{
    function indexAction()
    {
        migrate();
        echo 'indexAction';

    }

    function addAction()
    {
        if (isset($this->route['id'])) {
            echo $this->route['id'];
        };
        echo 'indexAction';
    }
}