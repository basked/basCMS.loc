<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Task;

/**
 * Class TaskController
 */
class TaskController extends Controller
{
    public $error;


    /**
     * All tasks
     */
    public function tasksAction()
    {
        $taskModel = new Task();
        $pagination = new Pagination($this->route, $taskModel->tasksCount());
        if (isset($this->route['sort'])) {
            $sortInfo = explode('_', $this->route['sort']);
            if (sizeof($sortInfo) == 2) {
                $_SESSION['sortField'] = $sortInfo[0];
                $_SESSION['sortType'] = $sortInfo[1];
                if ($_SESSION['sortType'] == 'desc') {
                    $_SESSION['sortTypeTo'] = 'asc';
                } else {
                    $_SESSION['sortTypeTo'] = 'desc';
                };
            }
        };
        $vars = [
            'is_admin' => isset($_SESSION['is_admin']),
            'sortField' => $_SESSION['sortField'],
            'sortType' => $_SESSION['sortType'],
            'sortTypeTo' => $_SESSION['sortTypeTo'],
            'pagination' => $pagination->get(),
            'tasks' => $taskModel->tasksList($this->route),
        ];
        $this->view->render('Менеджер задач', $vars);
    }

    /**
     * Sort order by asc
     */
    public function sortAscAction()
    {
        $_SESSION['sortField'] = $this->route['field'];
        $_SESSION['sortType'] = 'desc';
        $this->view->path = 'task/tasks';
        $this->tasksAction();
    }

    /**
     * Sort order by desc
     */
    public function sortDecsAction()
    {
        $_SESSION['sortField'] = $this->route['field'];
        $_SESSION['sortType'] = 'acs';
        $this->view->path = 'task/tasks';
        $this->tasksAction();
    }

    /**
     * Add tasks
     */
    public function addAction()
    {

        echo 'addAction';
        if (!empty($_POST)) {

            if (!$this->model->taskValidate($_POST, 'add')) {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->taskAdd($_POST);
            if (!$id) {
                $this->view->message('success', 'Ошибка обработки запроса');
            }
            $this->view->message('success', 'Пост добавлен');
        }
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

    /**
     * Create tasks
     */
    public function createAction()
    {
        $this->view->render('Новая задача');
    }

}