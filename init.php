<?php
require_once 'vendor/autoload.php';
try{
    $pdo = new \PDO('mysql:host=localhost;dbname=kandt;charset=utf8','root','root');
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}

function isActive($val1, $val2)
{
    if($val1 == $val2){
        return " active ";
    } else {
        return '';
    }
}