<?php


namespace application\controllers;


use application\core\Controller;

/**
 * Class AccountController
 * @package application\controllers
 */
class AccountController extends Controller
{

    /**
     *
     */
    function loginAction()
    {
        //можем в экшне переопределить путь к вьюхе
        //$this->view->path='account/register';

        //можем в экшне переопределить путь к layout
        //$this->view->layout='custom';

        $this->view->render('Вход');
    }


    /**
     *
     */
    function registerAction()
    {
        $this->view->render('Регистрация');

    }

}