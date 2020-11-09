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
