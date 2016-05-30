<?php
namespace Controller;

use Model\PageRepository;

/**
 * Class PageController
 * @package Controller
 */
class PageController
{
    /**
     * @var PageRepository
     */
    private $repository;

    /**
     * PageController constructor.
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
    }

    /**
     *
     */
    public function ajoutAction()
    {
        if(count($_POST) === 0){
            include "View/admin/ajout.php";
        } else{
            // traite la form
        }
    }

    /**
     *
     */
    public function supprimerAction()
    {
        echo "supprimer";
    }

    /**
     *
     */
    public function modifierAction()
    {
        echo "modifier";

    }

    /**
     *
     */
    public function detailsAction()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $details = $this->repository->getDetails($id);
        include "View/admin/pageDetails.php";
    }

    /**
     *
     */
    public function listeAction()
    {
        $liste = $this->repository->getList();
        include "View/admin/pageList.php";
    }


    /**
     *
     */
    public function displayAction()
    {
        // Definition d'un slug par defaut (en cas d'appel sans parametre dans l'url)
        $slug = 'teletubbies';

        // Recuperation du slug du parametre d'url si present
        // en PHP 7
        // $slug = $_GET['p'] ?? $_POST['p'] ?? 'teletubbies';
        if(isset($_GET['p'])){
            $slug = $_GET['p'];
        }


        // Recuperation les donnees de la page qui correspond au slug
        $page = $this->repository->getBySlug($slug);

        // Si il n'y a pas de donnees, erreur 404
        if($page === false){
            include "View/404.php";
            return;
        }

        // Initialisation de la nav pour que la vue la montre
        $nav = $this->generateNav($slug);


        include "View/page-display.php";
    }

    /**
     *
     */
    public function generateNav($slug)
    {
        ob_start();

        $nav = $this->repository->getNav();
        include "View/nav.php";

        $nav = ob_get_clean();
        return $nav;
    }
}