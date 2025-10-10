<?php

namespace Model\Repository;

use Model\Database;

abstract class BaseRepository
{
    protected $db;
    protected $connection;

    public function __construct()
    {
        $this->db = new Database;
        $this->connection = $this->db->dbConnect();
    }

    public function findAll($tableName,$idUtilisateur)
    {
        $sql = "SELECT * FROM $tableName WHERE idUtilisateur=$idUtilisateur";
        $query = $this->connection->query($sql);
        $class="Model\Entity\Taches";
        $query->setFetchMode( \PDO::FETCH_CLASS ,$class);
        $result = $query->fetchAll(\PDO::FETCH_CLASS,$class);
        return $result;
    }
}
