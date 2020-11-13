<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\models\User;

class UserController extends Controller
{
    public function indexAction()
    {
        $users = $this->model->getUsers('ASC');
        $vars=['users'=>$users];
        $this->view->render('Пользователи', $vars);
    }

    public function sortAction()
    {
        $users = $this->model->getUsers('DESC');
        $vars=['users'=>$users];
        $this->view->render('Пользователи', $vars);
    }
}