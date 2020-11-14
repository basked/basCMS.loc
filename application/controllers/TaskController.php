<?php
namespace application\controllers;

use  application\core\Controller;
use application\models\Task;

/**
 * Class TaskController
 */
class TaskController extends  Controller
{
    /**
     * All tasks
     */
    public function indexAction(){
        $task = new Task();
        $tasks=$this->model->getTasks();
        $this->view->render('Менеджер задач' ,['tasks'=> $tasks,'is_admin'=>1]);
    }

    /**
     * Add tasks
     */
    public function addAction(){
        $this->view->render('Добвление задачи'  );
    }

    /**
     * Edit tasks
     */
    public function editAction(){

        $this->view->render('Редактировние задачи' );
    }
}