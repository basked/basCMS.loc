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
     * Показываем вью для создания задачи
     */
    public function createAction()
    {
        $this->view->render('Новая задача');
    }


    /**
     * Добавление новой задачи
     */
    public function addAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->taskValidate($_POST, 'add')) {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->taskAdd($_POST);
            if (!$id) {
                $this->view->message('success', 'Ошибка обработки запроса');
            }
//            $this->view->message('success', 'Задача добавлена');
        }
//        $this->view->render('Новая задача');
        $this->view->location('/');
    }

    /**
     *  Показываем вью для редактирования задачи
     *
     */
    public function showAction()
    {
        if (is_null($this->model->isTaskExists($this->route['id']))) {
            $this->view->errorCode(404);
        }
        $task = $this->model->getTask($this->route['id']);
        $this->view->render('Редактировние задачи #' . $this->route['id'], ['task' => $task, 'id' => $this->route['id']]);
    }

    /**
     * Редактирование задачи
     *
     */
    public function editAction()
    {
        if (is_null($this->model->isTaskExists($this->route['id']))) {
            $this->view->errorCode(404);
        }

        if (!$this->model->taskValidate($_POST, 'edit')) {
            $this->view->message('error', $this->model->error);
        }
        $this->model->taskEdit($_POST, $this->route['id']);
        $this->view->message('success', 'Сохранено');

        $vars = [
            'data' => $this->model->taskData($this->route['id'])[0],
        ];
        $this->view->render('Редактировать пост', $vars);
    }

   public function completedAction()
    {
        debug($this->route['id']);
        if (is_null($this->model->isTaskExists($this->route['id']))) {

            $this->view->errorCode(404);
        }
        $this->model->taskCompleted($this->route['id']);
    }

}