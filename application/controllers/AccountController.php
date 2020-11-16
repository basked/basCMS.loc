<?php


namespace application\controllers;


use application\core\Controller;
use application\models\Task;

/**
 * Class AccountController
 * @package application\controllers
 */
class AccountController extends Controller
{
    public $error;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'default';
        $this->model = 'task';

    }

    /**
     * Validate login
     * @param $post
     * @return bool
     */
    public function loginValidate($post)
    {
        if ($post['login'] != 'admin' or $post['password'] != 123) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

    public function loginAction()
    {
        //можем в экшне переопределить путь к вьюхе
        //$this->view->path='account/register';
        //можем в экшне переопределить путь к layout
        //$this->view->layout='custom';
        //$this->view->layout='custom';
        if (!empty($_POST)) {
            if (!$this->loginValidate($_POST)) {
                $this->view->message('error', $this->error);
            }
            $_SESSION['is_admin'] = true;
            $this->view->location('/');
        }
        $this->view->render('Вход');
    }

    /**
     * Logout
     */
    function logoutAction()
    {
        unset($_SESSION['is_admin']);
        $this->view->redirect('/');
    }

    /**
     *
     */
    function registerAction()
    {
        $this->view->render('Регистрация');
    }

}