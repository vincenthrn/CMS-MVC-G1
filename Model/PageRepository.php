<?php
namespace Model;

/**
 * Class PageRepository
 * @package Model
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
     * @param null $id
     * @return array
     */
    public function lister($id = null)
    {
        return [];
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
     * @param int $id
     * @return bool
     */
    public function supprimer(int $id)
    {
        return true;
    }

    /**
     * @param array $data
     * @return int
     */
    public function inserer(array $data)
    {
        return 1;
    }
}