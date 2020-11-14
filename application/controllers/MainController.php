<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Task;


class MainController extends Controller
{
 public function indexAction(){
     $task = new Task();
     $this->model=$task;
     $tasks=$this->model->getTasks();
     $this->view->render('Task manager' ,['tasks'=> $tasks]);
 }
}