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

function migrateUsers()
{
    // dump table users
    $users = [
        ['id' => 1, 'name' => 'admin', 'password' => '123', 'email' => 'admin@tadmin.com', 'is_admin' => 1],
        ['id' => 2, 'name' => 'Eric', 'password' => 'ericpsw', 'email' => 'eric@sp.com', 'is_admin' => 0],
        ['id' => 3, 'name' => 'Kenny', 'password' => 'kennypsw', 'email' => 'kenny@sp.com', 'is_admin' => 0],
        ['id' => 4, 'name' => 'Kyle', 'password' => 'kylepsw', 'email' => 'kyle@sp.com', 'is_admin' => 0],
        ['id' => 5, 'name' => 'Stan', 'password' => 'stanpsw', 'email' => 'stan@sp.com', 'is_admin' => 0],
    ];
    $db = new \application\lib\Database();
    $db->query('DROP TABLE users ;');
    $db->query('CREATE TABLE users (id int  NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(20), password varchar(20), email varchar(20), is_admin boolean);');
    foreach ($users as $user) {
        $db->query('INSERT INTO users(id , name , password, email , is_admin ) VALUES(:id , :name , :password, :email , :is_admin)', $user);
    };
}

function migrateTasks()
{
    // dump table tasks
    $tasks = [
        ['id' => 1, 'name' => 'admin', 'email' => 'admin@tadmin.com', 'description' => 'admin task txt', 'is_completed' => 1, 'is_edited' => 1],
        ['id' => 2, 'name' => 'Eric', 'email' => 'eric@sp.com', 'description' => 'admin task2 txt', 'is_completed' => 0, 'is_edited' => 0],
        ['id' => 3, 'name' => 'Kenny', 'email' => 'kenny@sp.com', 'description' => 'Eric task txt', 'is_completed' => 1, 'is_edited' => 1],
        ['id' => 4, 'name' => 'Kyle', 'email' => 'kyle@sp.com', 'description' => 'Kenny task txt', 'is_completed' => 0, 'is_edited' => 0],
        ['id' => 5, 'name' => 'Stan', 'email' => 'stan@sp.com', 'description' => 'Kyle task txt', 'is_completed' => 1, 'is_edited' => 1],
    ];

    $db = new \application\lib\Database();
    $db->query('DROP TABLE tasks ;');
    $db->query('CREATE TABLE tasks(id int  NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(20), email varchar(20), description text, is_completed boolean, is_edited boolean );');
    foreach ($tasks as $task) {
        $db->query('INSERT INTO tasks(id, name, email, description, is_completed, is_edited) VALUES(:id, :name, :email, :description, :is_completed, :is_edited)', $task);
    };
}

function migrate()
{

    migrateTasks();
}