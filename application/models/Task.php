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
    public function allTasks()
    {
        $tasks = $this->db->rows('SELECT u.name, u.email, t.id, t.task_txt, t.is_completed FROM tasks t, users u WHERE t.id=u.id');
        return $tasks;
    }

    /**
     * Return all tasks
     * @return array
     */
    public function oneTask($id)
    {
        $params=['id'=>$id];
        $tasks = $this->db->rows('SELECT u.name, u.email, t.id, t.task_txt, t.is_completed FROM tasks t, users u WHERE t.id=u.id and t.id=:id',$params);
        return $tasks[0];
    }

}