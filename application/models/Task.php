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
     * Return count tasks
     * @return array
     */
    public function tasksCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM tasks');
    }

    /**
     * Return all tasks
     * @param $route
     * @return mixed
     */
    public function tasksList($route)
    {

        $max = 3;
        $sortField = $_SESSION['sortField'];
        $sortType = $_SESSION['sortType'];
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->db->row('SELECT id, name, email,  description, completed, edited FROM tasks   ORDER BY ' . $sortField . ' ' . $sortType . '  LIMIT :start, :max', $params);
    }

    /**
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


    public function taskEdit($task, $id)
    {
        $params = [
            'id' => $id,
            'name' => $task['name'],
            'email' => $task['email'],
            'description' => $task['description'],
        ];
        $this->db->query('UPDATE tasks SET name = :name, email = :email, description = :description, edited=1 WHERE id = :id', $params);
    }


    /**
     * @param $post
     * @param $type
     * @return bool
     */
    public function taskValidate($post, $type)
    {
        $nameLen = iconv_strlen($post['name']);
        $emailLen = iconv_strlen($post['email']);
        $textLen = iconv_strlen($post['description']);

        if ($nameLen == 0) {
            $this->error = 'Имя пользователя должно быть заполнено';
            return false;
        } elseif ($emailLen == 0 or (!filter_var($post['email'], FILTER_VALIDATE_EMAIL))) {
            $this->error = 'Заполните корректно поле email';
            return false;
        } elseif ($textLen == 0) {
            $this->error = 'Текст задачи не должен быть пустым';
            return false;
        }
        return true;
    }

    /**
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

    public function taskCompleted($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('UPDATE tasks SET  completed=1 WHERE id = :id', $params);
    }


}