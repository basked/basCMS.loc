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
    public function getTasks()
    {
        $tasks = $this->db->rows('SELECT u.name, u.email, t.task_txt, t.is_completed FROM tasks t, users u WHERE t.id=u.id');
        return $tasks;
    }
}