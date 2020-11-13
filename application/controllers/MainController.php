<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Database;
use application\models\Main;


class MainController extends Controller
{
 public function indexAction(){
  $res=$this->model->getNews();
     $this->view->render('Главная страница! ' );
 }
}