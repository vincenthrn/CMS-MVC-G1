<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';
try{
    $pdo = new \PDO('mysql:host=localhost;dbname=teletubbies;charset=utf8','root','root');
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}
$page = new \Controller\PageController($pdo);
$page->displayAction();