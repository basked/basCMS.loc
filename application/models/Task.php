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
        $tasks = $this->db->row('SELECT u.name, u.email, t.id, t.task_txt, t.is_completed FROM tasks t, users u WHERE t.id=u.id and t.id=:id',$params);
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
//            'sortField' => $_SESSION['sortField'],
//            'sortType' => $_SESSION['sortType'],
        ];
        echo  $sortField.'=>'.   $sortType ;
        return $this->db->row('SELECT u.name, u.email, t.id, t.task_txt, t.is_completed FROM tasks t, users u WHERE t.user_id=u.id  ORDER BY '.$sortField.' '. $sortType.'  LIMIT :start, :max', $params);
    }

    public function taskAdd($post) {
        echo 'taskAdd';
        $params = [
            'user_id' => 1,
            'task_txt' => $post['task_txt'],
            'is_completed' => 0,
        ];
        $this->db->query('INSERT INTO tasks VALUES (:user_id, :task_txt, :is_completed)', $params);
        return $this->db->lastInsertId();
    }


    public function taskValidate($post, $type) {

/*
        user_id: sdf
email: sdf
task_txt: sdf
        */
        echo '<br>'.'lasas';
        $nameLen = iconv_strlen($post['name']);
        $descriptionLen = iconv_strlen($post['email']);
        $textLen = iconv_strlen($post['task_txt']);
        if ($nameLen < 3 or $nameLen > 100) {
            $this->error = 'Название должно содержать от 3 до 100 символов';
            return false;
        } elseif ($descriptionLen < 3 or $descriptionLen > 100) {
            $this->error = 'Описание должно содержать от 3 до 100 символов';
            return false;
        } elseif ($textLen < 10 or $textLen > 5000) {
            $this->error = 'Текст должнен содержать от 10 до 5000 символов';
            return false;
        }
        if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
            $this->error = 'Изображение не выбрано';
            return false;
        }
        return true;
    }

}