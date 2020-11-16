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
    /**
     * @var
     */
    public $error;

    /**
     * AccountController constructor.
     * @param $route
     */
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

        $err = '';
        $nameLen = iconv_strlen($post['login']);
        $passLen = iconv_strlen($post['password']);


        if ($nameLen == 0) {
            $err = "* Заполните имя пользователя <br>";
        };
        if ($passLen == 0) {
            $err = $err . "* Заполните пароль <br>";
        }
        if ($err == '') {
            if ($post['login'] != 'admin' or $post['password'] != 123) {
                $this->error = 'Логин или пароль указан неверно';
                return false;
            }
            return true;
        } else {
            $this->error = $err;
            return false;
        }
    }

    /**
     * Login
     */
    public function loginAction()
    {
        if (!empty($_POST)) {
            if (!$this->loginValidate($_POST)) {
                $this->view->message('error', $this->error);
            }
            $_SESSION['is_admin'] = true;
            $this->view->location('/', 'Авторизация прошла успешно');
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


}