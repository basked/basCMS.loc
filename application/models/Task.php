<?php


namespace application\models;

use application\core\Model;

/**
 * Class Task
 * @package application\models
 */
class Task extends Model
{


    /**
     * Данные по задаче
     * Return all tasks
     * @return array
     */
    public function getTask($id)
    {
        $params = ['id' => $id];
        $tasks = $this->db->row('SELECT  name, email, description FROM tasks  WHERE  id=:id', $params);
        return $tasks[0];
    }

    /**
     * Количество задач (для пагинации)
     * Return count tasks
     * @return array
     */
    public function tasksCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM tasks');
    }

    /**
     * Все задачи
     * @param $route
     * @return mixed
     */
    public function tasksList($route, $sortField = '', $sortType = '')
    {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->db->row('SELECT id, name, email,  description, completed, edited FROM tasks   ORDER BY ' . $sortField . ' ' . $sortType . '  LIMIT :start, :max', $params);
    }

    /**
     * Добавление задачи
     * @param $post
     * @return string
     */
    public function taskAdd($post)
    {
        $params = [
            'name' => $post['name'],
            'email' => $post['email'],
            'description' => $post['description'],
        ];
        $this->db->query('INSERT INTO tasks( name, email, description) VALUES(:name, :email, :description)', $params);
        return $this->db->lastInsertId();
    }


    /**
     * Редактирование задачи
     * @param $task
     * @param $id
     */
    public function taskEdit($task, $id)
    {
        $params = [
            'id' => $id,
            'name' => $task['name'],
            'email' => $task['email'],
            'description' => $task['description'],
            'edited' => !($task['description'] == $this->oldValueDecription($id)),
        ];
        $this->db->query('UPDATE tasks SET name = :name, email = :email, description = :description, edited = :edited WHERE id = :id', $params);
    }


    /**
     * Валидация введённых данных в форме
     * @param $post
     * @param $type
     * @return bool
     */
    public function taskValidate($post, $type)
    {
        $err = '';
        $nameLen = iconv_strlen($post['name']);
        $emailLen = iconv_strlen($post['email']);
        $textLen = iconv_strlen($post['description']);

        if ($nameLen == 0) {
            $err = "* Заполните поле имя пользователя <br>";
        };
        if ($emailLen == 0 or (!filter_var($post['email'], FILTER_VALIDATE_EMAIL))) {
            $err = $err . "* Заполните корректно поле email <br>";
        }
        if ($textLen == 0) {
            $err = $err . '* Заполните поле описание задачи';
        }
        if ($err == '') {
            return true;
        } else {
            $this->error = $err;
            return false;
        }
    }

    /**
     * Существует ли задача
     * @param $id
     * @return array
     */
    public function isTaskExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM tasks WHERE id = :id', $params);
    }

    /**
     * Находим текущее значение описания задачи
     * @param $id
     * @return array
     */
    public function oldValueDecription($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT description FROM tasks WHERE id = :id', $params);
    }

    /**
     * Данные задачи
     * @param $id
     * @return array
     */
    public function taskData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT id, name, email,  description, completed, edited FROM tasks WHERE id=:id', $params);
    }

    /**
     * Установить задачу в статус выполнено
     * @param $id
     *
     */
    public function taskCompleted($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('UPDATE tasks SET  completed=1 WHERE id = :id', $params);
    }


}