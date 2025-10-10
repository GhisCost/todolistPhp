<?php

namespace Model\Repository;

use Model\Entity\Utilisateur;
use PDOException;

class UtilisateurRepository extends BaseRepository
{

    public function insertUtilisateur(Utilisateur $utilisateur)
    {
        $sql = "INSERT INTO utilisateurs (pseudo , email , motDePasse) VALUES (:pseudo,:email,:motDePasse)";
        $request = $this->connection->prepare($sql);

        try {
            $request->execute([
                ":pseudo" => $utilisateur->getPseudo(),
                ":email" => $utilisateur->getEmail(),
                ":motDePasse" => $utilisateur->getMotDePasse()
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);

        }

    }
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email=:email";
        $request = $this->connection->prepare($sql);

        try {
            $request->execute([
                ":email" => $email
            ]);
            $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Utilisateur");
            $result = $request->fetch();
            return $result;

        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);

        }
    }
}