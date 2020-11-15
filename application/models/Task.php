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
    public function oneTask($id)
    {
        $params=['id'=>$id];
        $tasks = $this->db->row('SELECT name, email, description FROM tasks  WHERE  id=:id',$params);
        return $tasks[0];
    }

    /**
     * Return count tasks
     * @return array
     */
    public function tasksCount() {
        return $this->db->column('SELECT COUNT(id) FROM tasks');
    }

    /**
     * Return all tasks
     * @param $route
     * @return mixed
     */
    public function tasksList($route) {

        $max = 3;
        $sortField = $_SESSION['sortField'];
        $sortType = $_SESSION['sortType'];
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->db->row('SELECT id, name, email,  description, is_completed, is_edited FROM tasks   ORDER BY '.$sortField.' '. $sortType.'  LIMIT :start, :max', $params);
    }

    /**
     * @param $post
     * @return string
     */
    public function taskAdd($post) {
        $params = [
            'name' => $post['name'],
            'email' =>  $post['email'],
            'description' => $post['description'],
        ];
        $this->db->query('INSERT INTO tasks( name, email, description) VALUES(:name, :email, :description)', $params);
        return $this->db->lastInsertId();
    }

    /**
     * @param $post
     * @param $type
     * @return bool
     */
    public function taskValidate($post, $type) {

        $nameLen = iconv_strlen($post['name']);
        $emailLen = iconv_strlen($post['email']);
        $textLen = iconv_strlen($post['description']);

        if ($nameLen < 3 or $nameLen > 100) {
            $this->error = 'Название должно содержать от 3 до 100 символов';
            return false;
        } elseif ($emailLen < 3 or $emailLen > 100) {
            $this->error = 'Описание должно содержать от 3 до 100 символов';
            return false;
        } elseif ($textLen < 5 or $textLen > 5000) {
            $this->error = 'Текст должнен содержать от 5 до 5000 символов';
            return false;
        }
        return true;
    }


}