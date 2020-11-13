<?php

namespace application\models;

use application\core\Model;

/**
 * Class Main
 * @package application\models
 */
class Main extends Model
{

    /**
     * @return array
     */
    public function getNews()
    {
        $res = $this->db->rows('SELECT name FROM users');
        return $res;
    }

}