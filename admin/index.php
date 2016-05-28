<?php
chdir($appRoot = dirname(__DIR__));
require_once 'init.php';
$page = new \Controller\PageController($pdo);

$action = 'home';

if(isset($_GET['a'])){
    $action = $_GET['a'];
}

switch($action){
    case 'ajouter':
        $page->ajoutAction();
        break;
    case 'modifier':
        $page->modifierAction();
        break;
    case 'supprimer':
        $page->supprimerAction();
        break;
    case 'details':
        $page->detailsAction();
        break;
    case 'lister':
    default:
        $page->listeAction();
        break;
}

//$page->displayAction();