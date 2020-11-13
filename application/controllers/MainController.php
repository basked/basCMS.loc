<?php


namespace application\controllers;


use application\core\Controller;
use application\core\View;
use application\lib\Database;


class MainController extends Controller
{
 public function indexAction(){
     $db= new Database();
     $this->view->render('Главная страница! ' );
 }
}