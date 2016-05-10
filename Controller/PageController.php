<?php
namespace Controller;

use Model\PageRepository;

class PageController
{
    private $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new PageRepository($pdo);
    }

    public function ajoutAction()
    {

    }

    public function supprimerAction()
    {

    }

    public function modifierAction()
    {

    }

    public function detailsAction()
    {

    }

    public function listeAction()
    {

    }

    public function displayAction()
    {
        // action d'affichage de la page en front office
    }
}