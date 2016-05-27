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
            // affiche la form
        } else{
            // traite la form
        }
    }

    /**
     *
     */
    public function supprimerAction()
    {
    }

    /**
     *
     */
    public function modifierAction()
    {
    }

    /**
     *
     */
    public function detailsAction()
    {
    }

    /**
     *
     */
    public function listeAction()
    {
    }

    public function adminAction()
    {
        include "View/admin/admin-page-display.php";
    }


    /**
     *
     */
    public function displayAction()
    {
        // Definition d'un slug par defaut (en cas d'appel sans parametre dans l'url)
        $slug = 'teletubbies';

        // Recuperation du slug du parametre d'url si present
        if(isset($_GET['p'])){
            $slug = $_GET['p'];
            $pageCourante = $_GET['p'];
        }

        // en PHP 7
        // $slug = $_GET['p'] ?? $_POST['p'] ?? 'teletubbies';

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