<?php

namespace application\controllers;

use  application\core\Controller;
use application\models\Task;

/**
 * Class TaskController
 */
class TaskController extends Controller
{
    /**
     * All tasks
     */
    public function indexAction()
    {
        $tasks = $this->model->allTasks();
        $is_admin=isset($_SESSION['is_admin']);
        $this->view->render('Менеджер задач', ['tasks' => $tasks, 'is_admin' => $is_admin]);
    }

    /**
     * Add tasks
     */
    public function addAction()
    {
        $this->view->render('Новая задача');
    }

    /**
     * Edit tasks
     */
    public function editAction()
    {
        $task = $this->model->oneTask($this->route['id']);
        $this->view->render('Редактировние задачи #' . $this->route['id'], ['task' => $task]);
    }
}