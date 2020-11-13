<?php


namespace application\controllers;


use application\core\Controller;
use application\core\View;

class MainController extends Controller
{
 public function indexAction(){
     $vars=['name'=>'basked',
            'age'=>34,
            'array'=>[1,2,3]
         ];
     $this->view->render('Главная страница! ',$vars);
 }
}