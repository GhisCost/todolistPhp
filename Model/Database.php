<?php

namespace Model;

use PDO;

class Database
{
    private $host = "localhost";
    private $db_name = "todolist_poo";
    private $username = "root";
    private $password = '';
    private $connexion = null;

    public function dbConnect()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

            $this->connexion = $pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        return $this->connexion;
    }
}