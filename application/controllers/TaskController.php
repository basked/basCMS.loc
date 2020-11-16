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

    /**
     * TaskController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->initSession();
    }

    /**
     * Инициализация переменных сессии
     */
    private function initSession()
    {
        if (!isset($_SESSION['sortField'])) {
            $_SESSION['sortField'] = 'name';
        };
        if (!isset($_SESSION['sortType'])) {
            $_SESSION['sortType'] = 'asc';
        };
        if (!isset($_SESSION['sortTypeTo'])) {
            $_SESSION['sortTypeTo'] = 'desc';
        };
    }


    /**
     * Для одинковой сортировки на разных страницах
     */
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
     *  Вывод всех задач с пагинацией
     */
    public function tasksAction()
    {
        $taskModel = new Task();
        $pagination = new Pagination($this->route, $taskModel->tasksCount());
        $vars = [
            'is_admin' => isset($_SESSION['is_admin']),
            'sortField' => $_SESSION['sortField'],
            'sortType' => $_SESSION['sortType'],
            'sortTypeTo' => $_SESSION['sortTypeTo'],
            'pagination' => $pagination->get(),
            'current_page' => $this->route['page'],
            'tasks' => $taskModel->tasksList($this->route, $_SESSION['sortField'], $_SESSION['sortType']),
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
            $this->view->location('/', 'Задача добавлена');
        }
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
        if (!isset($_SESSION['is_admin'])) {
            $this->view->location('/account/login', 'Необходимо авторизоваться на сайте');
        };

        if (is_null($this->model->isTaskExists($this->route['id']))) {
            $this->view->errorCode(404);
        }
        if (!$this->model->taskValidate($_POST, 'edit')) {
            $this->view->message('error', $this->model->error);
        }
        $this->model->taskEdit($_POST, $this->route['id']);
        $this->view->location('/', 'Задача сохранена');

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
        if (is_null($this->model->isTaskExists($this->route['id']))) {

            $this->view->errorCode(404);
        }
        $this->model->taskCompleted($this->route['id']);
    }

    /**
     * Переход на главную страницу
     */
    public function goTasksAction()
    {
        $this->view->redirect('/task/tasks/1');
    }

}