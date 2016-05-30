<?php
// __DIR__ est le repertoire du fichier courant càd admin
// dirname() est le repertoire qui contient __DIR__ càd CMS_MVC_G1
// chdir force l'execution du script dans le repertoire CMS_MVC_G1
chdir($appRoot = dirname(__DIR__));

// parametres de connexion
require_once 'init.php';

// demarre notre application
$page = new \Controller\PageController($pdo);

// $action = $_GET['a'] ?? ''; // < en PHP 7
$action = '';
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

