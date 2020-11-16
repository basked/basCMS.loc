<?php
/*Вывод ошибок на экран*/
ini_set('display_errors', 1);
/*Выводим все ошибки errors, warnings, notice*/
error_reporting(E_ALL);

//
/**
 * Debug fun
 * @param $str
 */
function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}

function migrateTasks()
{
    // dump table tasks
    $tasks = [
        ['id' => 1, 'name' => 'admin', 'email' => 'admin@tadmin.com', 'description' => 'admin task txt', 'completed' => 1, 'edited' => 1],
        ['id' => 2, 'name' => 'Eric', 'email' => 'eric@sp.com', 'description' => 'admin task2 txt', 'completed' => 0, 'edited' => 0],
        ['id' => 3, 'name' => 'Kenny', 'email' => 'kenny@sp.com', 'description' => 'Eric task txt', 'completed' => 1, 'edited' => 1],
        ['id' => 4, 'name' => 'Kyle', 'email' => 'kyle@sp.com', 'description' => 'Kenny task txt', 'completed' => 0, 'edited' => 0],
        ['id' => 5, 'name' => 'Stan', 'email' => 'stan@sp.com', 'description' => 'Kyle task txt', 'completed' => 1, 'edited' => 1],
    ];
    $db = new \application\lib\Database();
    $db->query('DROP TABLE tasks ;');
    $db->query('CREATE TABLE tasks(id int  NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(20), email varchar(20), description text, completed boolean default 0, edited boolean default 0);');
    foreach ($tasks as $task) {
        $db->query('INSERT INTO tasks(id, name, email, description, completed, edited) VALUES(:id, :name, :email, :description, :completed, :edited)', $task);
    };
}

function migrate()
{
    migrateTasks();
}

function clear()
{
    $db = new \application\lib\Database();
    $db->query('DROP TABLE tasks ;');
    $db->query('CREATE TABLE tasks(id int  NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(20), email varchar(20), description text, completed boolean default 0, edited boolean default 0);');
}


