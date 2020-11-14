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
    $users= [
        ['id' => 1, 'name' => 'admin', 'password' => '123', 'email' => 'admin@test.com', 'is_admin' => 1],
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
    $tasks= [
        ['id' => 1, 'user_id' => 1, 'task_txt' => 'admin task txt', 'is_completed' => 1],
        ['id' => 2, 'user_id' => 1, 'task_txt' => 'admin task2 txt', 'is_completed' => 0],
        ['id' => 3, 'user_id' => 2, 'task_txt' => 'Eric task txt', 'is_completed' => 1],
        ['id' => 4, 'user_id' => 3, 'task_txt' => 'Kenny task txt', 'is_completed' => 0],
        ['id' => 5, 'user_id' => 4, 'task_txt' => 'Kyle task txt', 'is_completed' => 1],
        ['id' => 6, 'user_id' => 5, 'task_txt' => 'Stan task txt', 'is_completed' => 0],


    ];
    $db = new \application\lib\Database();
    $db->query('DROP TABLE tasks ;');
    $db->query('CREATE TABLE tasks(id int  NOT NULL AUTO_INCREMENT PRIMARY KEY, user_id int, task_txt text, is_completed boolean,   FOREIGN KEY (user_id)  REFERENCES users(id));');
    foreach ($tasks as $task) {
        $db->query('INSERT INTO tasks(id , user_id, task_txt, is_completed) VALUES(:id , :user_id, :task_txt, :is_completed)', $task);
    };
}

function migrate(){
    migrateUsers();
    migrateTasks();
}