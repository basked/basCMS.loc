<?php

namespace application\models;
use application\core\Model;
/**
 * Class User
 * @package application\models
 */
class User extends Model
{
    /**
     * @param $res
     */
    public function getUsers($sort='ASC')
    {
        $res = $this->db->rows('SELECT * FROM users WHERE id>=:id ORDER BY name '.$sort ,['id'=>1]);
        return $res;
    }

    public function getUsersDesc()
    {
        $res = $this->db->rows('SELECT * FROM users WHERE id>=:id ORDER BY name DESC',['id'=>1]);
        return $res;
    }

    public function getUserById($id)
    {
        $res = $this->db->rows('SELECT * FROM users WHERE id=:id ');
        return $res;
    }


}