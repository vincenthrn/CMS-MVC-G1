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
     * Gère l'affichage des pages en front
     */
    public function displayAction()
    {
        // Definition d'un slug par defaut (en cas d'appel sans parametre dans l'url)
        $slug = 'teletubbies';
        // Recuperation du slug du parametre d'url si present
        // en PHP 7
        // $slug = $_GET['p'] ?? $_POST['p'] ?? 'teletubbies';
        if (isset($_GET['p'])) {
            $slug = $_GET['p'];
        }
        // Recuperation les donnees de la page qui correspond au slug
        $page = $this->repository->getBySlug($slug);
        // Si il n'y a pas de donnees, erreur 404
        if ($page === false) {
            include "View/404.php";
            return;
        }
        // Initialisation de la nav pour que la vue la montre
        $nav = $this->generateNav($slug);
        include "View/page-display.php";
    }

    /**
     * Génère la navigation
     * @param $slug
     * @return array|string
     */
    public function generateNav($slug)
    {
        ob_start();
        $nav = $this->repository->getNav();
        include "View/nav.php";
        $nav = ob_get_clean();
        return $nav;
    }

    /**
     * Gère l'affichage des détails d'un entrée de la base
     * dans le backoffice
     */
    public function detailsAction()
    {
        if (!isset($_GET['id'])) {
            throw new \Exception('pas d\'id', 666);
        }
        $id = $_GET['id'];
        $details = $this->repository->getDetails($id);
        if ($details === false) {
            include "View/404.php";
        } else {
            include "View/admin/pageDetails.php";
        }
    }

    /**
     * Gère affichage de la liste des entrées de la base
     * dans le backoffice
     */
    public function listeAction()
    {
        $liste = $this->repository->getList();
        include "View/admin/pageList.php";
    }

    /**
     * Gère l'ajout d'une page
     */
    public function ajoutAction()
    {
        if (count($_POST) === 0) {
            include "View/admin/addPage.php";
        } else {
            $data = $_POST;
            foreach ($data as $key => $value) {
                $data[$key] = htmlspecialchars($data[$key]);
            }
            $lastInsertId = $this->repository->inserer($data);
            $details = $this->repository->getDetails($lastInsertId);
            include "View/admin/pageDetails.php";
        }
    }

    /**
     * Gère la modification d'une page
     */
    public function modifierAction()
    {
        if (!isset($_GET['id'])) {
            throw new \Exception('pas d\'id', 666);
        }
        $id = $_GET['id'];
        if (count($_POST) === 0) {
            $details = $this->repository->getDetails($id);
            if ($details === false) {
                include "View/404.php";
            } else {
                include "View/admin/updatePage.php";
            }
        } else {
            $data = $_POST;
            foreach ($data as $key => $value) {
                $data[$key] = htmlspecialchars($data[$key]);
            }
            $this->repository->modifier($data, $id);
            $details = $this->repository->getDetails($id);
            include "View/admin/pageDetails.php";
        }
    }

    /**
     * Gère la suppression d'une page
     */
    public function supprimerAction()
    {
        if (!isset($_GET['id'])) {
            throw new \Exception('pas d\'id', 666);
        }
        $id = $_GET['id'];
        $deleted = $this->repository->supprimer($id);
        if ($deleted === 0) {
            include 'View/404.php';
        } else {
            include "View/admin/pageDeleted.php";
        }
    }

}