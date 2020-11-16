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

    /**
     * @var
     */
    public $error;

    public function __construct($route)
    {
        parent::__construct($route);
        if (!isset($_SESSION['sortField'])) {
            $_SESSION['sortField'] = 'name';
        };
        if (!isset($_SESSION['sortType'])) {
            $_SESSION['sortType'] = 'acs';
        };
        if (!isset($_SESSION['sortTypeTo'])) {
            $_SESSION['sortTypeTo'] = 'desc';
        };

    }

    public function tasksSortAction()
    {
        $_SESSION['sortField'] = $this->route['field'];
        $_SESSION['sortType'] = $this->route['type'];
        if ($this->route['type'] == 'asc') {
            $_SESSION['sortTypeTo'] = 'desc';
        } else {
            $_SESSION['sortTypeTo'] = 'asc';
        }
        $this->view->redirect('/task/tasks/' . $this->route['page']);
    }


    /**
     * All tasks
     */
    public function tasksAction()
    {
        var_dump($_SESSION['sortField'], $_SESSION['sortType'], $_SESSION['sortTypeTo']);
        $taskModel = new Task();
        $pagination = new Pagination($this->route, $taskModel->tasksCount());
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
            $this->view->message('success', 'Задача добавлена');
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

    /**
     * Отметка о выполнении задачи
     */
    public function completedAction()
    {
        debug($this->route['id']);
        if (is_null($this->model->isTaskExists($this->route['id']))) {

            $this->view->errorCode(404);
        }
        $this->model->taskCompleted($this->route['id']);
    }

}