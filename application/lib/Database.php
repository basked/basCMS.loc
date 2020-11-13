<?php
namespace application\lib;
use PDO;
class Database
{
    protected $database;
    public function __construct()
    {
         // подключаем настройки БД
        $config = require 'application/config/db.php';
        $this->database=new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['username'],$config['password']);
    }

}