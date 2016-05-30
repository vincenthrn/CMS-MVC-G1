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
     * @param array $data
     * @return bool
     */
    public function modifier(array $data)
    {
        return true;
    }

    /**
     * @param $id
     * @return int
     */
    public function supprimer($id)
    {
        $sql ="DELETE
                FROM
                    `page`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * @param array $data
     * @return int
     */
    public function inserer(array $data)
    {

    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $sql ="SELECT
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
     * @param null $id
     * @return mixed
     */
    public function getDetails($id = null)
    {
        $sql ="SELECT
                    `body`,
                    `title`,
                    `slug`,
                    `h1`
                FROM
                    `page`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    /**
     * @param $slug
     * @return \stdClass\bool
     */
    public function getBySlug($slug)
    {
        $sql ="SELECT
                    `body`,
                    `title`
                FROM
                    `page`
                WHERE
                    `slug` = :slug
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug',$slug,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    /**
     * @return array
     */
    public function getNav()
    {
        $sql ="SELECT
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