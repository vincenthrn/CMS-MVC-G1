<?php
namespace Model;

/**
 * Class PageRepository
 * @package model
 */
class PageRepository
{
    /**
     * @var \PDO
     */
    private $PDO;

    /**
     * PageRepository constructor.
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    /**
     * Modifie une page
     * @param array $data
     * @param $id
     * @return bool
     */
    public function modifier(array $data, $id)
    {
        $sql = "UPDATE
                    `page`
                SET
                    `slug` = :slug,
                    `h1` = :h1,
                    `title` = :title,
                    `img` = :img,
                    `span_text` = :span_text,
                    `span_class` = :span_class
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->bindParam(':slug', $data['slug'], \PDO::PARAM_STR);
        $stmt->bindParam(':h1', $data['h1'], \PDO::PARAM_STR);
        $stmt->bindParam(':title', $data['title'], \PDO::PARAM_STR);
        $stmt->bindParam(':img', $data['img'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_text', $data['span_text'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_class', $data['span_class'], \PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    /**
     * Supprime une page
     * @param $id
     * @return int
     */
    public function supprimer($id)
    {
        $sql = "DELETE
                FROM
                    `page`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Insère une nouvelle page
     * @param array $data
     * @return string
     */
    public function inserer(array $data)
    {
        $sql = "INSERT INTO
                `page`
                    (`slug`, `h1`, `title`, `img`, `span_text`,`span_class`)
                VALUES
                    (:slug, :h1, :title, :img, :span_text, :span_class)
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug', $data['slug'], \PDO::PARAM_STR);
        $stmt->bindParam(':h1', $data['h1'], \PDO::PARAM_STR);
        $stmt->bindParam(':title', $data['title'], \PDO::PARAM_STR);
        $stmt->bindParam(':img', $data['img'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_text', $data['span_text'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_class', $data['span_class'], \PDO::PARAM_STR);
        $stmt->execute();
        return $this->PDO->lastInsertId();
    }

    /**
     * Récupère les données pour afficher la liste des pages
     * en backoffice
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT
                    `id`,
                    `title`,
                    `slug`
                FROM
                    `page`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Récupère les données d'une page en fonction de son id
     * @param null $id
     * @return mixed
     */
    public function getDetails($id = null)
    {
        $sql = "SELECT
                    `body`,
                    `title`,
                    `slug`,
                    `h1`,
                    `img`,
                    `span_text`,
                    `span_class`
                FROM
                    `page`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    /**
     * Récupère les données d'une page en fonction de son slug
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        $sql = "SELECT
                    `title`,
                    `h1`,
                    `img`,
                    `span_text`,
                    `span_class`
                FROM
                    `page`
                WHERE
                    `slug` = :slug
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    /**
     * Récupère données de la nav en front
     * @return array
     */
    public function getNav()
    {
        $sql = "SELECT
                    `slug`,
                    `title`
                FROM
                    `page`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}