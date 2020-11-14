<?php

namespace application\lib;

use mysql_xdevapi\Exception;
use PDO;

/**
 * Class Database
 * @package application\lib
 */
class Database
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        // подключаем настройки БД
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
    }


    /**
     * @param $sql
     * @return false|\PDOStatement
     */
    public function query($sql, $params=[])
    {
        try {
            $stmt = $this->db->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    $stmt->bindValue(':' . $key, $val);
                }
            }
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            echo 'Error DB ' . $e->getMessage() . '';
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function rows($sql, $params = [])
    {
        $res = $this->query($sql, $params);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * Return col from query
     * @param $sql
     * @return array
     */
    public function column($sql, $params=[])
    {
        $res = $this->query($sql, $params);
        return $res->fetchColumn();
    }

}