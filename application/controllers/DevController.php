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
        echo 'indexAction';
        echo $this->route['name'];
    }
    function sortAction()
    {
        echo 'indexAction';
        echo '<br>';
        echo $this->route['sort'];
        echo '<br>';
        echo $this->route['limit'];
    }

}