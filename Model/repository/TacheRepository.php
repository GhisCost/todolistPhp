<?php

namespace Model\Repository;

use Model\Entity\taches;
use PDOException;

class TacheRepository extends BaseRepository
{

    public function insertTaches(Taches $taches)
    {

        $sql = "INSERT INTO taches (idUtilisateur,contenu,dateDeCreation) VALUES (:idUtil,:contenu,:dateDeCreation)";

        $request = $this->connection->prepare($sql);

        try {

            $request->execute([':idUtil' => $taches->getIdUtilisateur(), ':contenu' => $taches->getContenu(), ':dateDeCreation' => $taches->getDateDeCreation()]);

            if ($request->rowCount() > 0) {
                return true;
            }

            return false;

        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);
        }

    }

    public function affichContenuTaches()
    {
        $sql = "SELECT contenu FROM taches";
        $request = $this->connection->prepare($sql);

        try {
            $request->execute();
            $class = "Model\Entity\Taches";
            return $request->fetchAll(\PDO::FETCH_CLASS, $class);

        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);
        }

    }


    public function suppTache($id)
    {
        $sql = "DELETE FROM taches WHERE id=:id";
        $request = $this->connection->prepare($sql);

        try {
            return $request->execute([":id" => $id]);

        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);
        }
    }

    public function modifTache($id, $param)
    {
        $sql = "UPDATE taches SET contenu = :contenu WHERE taches.id=:id";
        $request = $this->connection->prepare($sql);

        try {
            return $request->execute([
                ":id" => $id,
                ":contenu" => $param
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage(), 0);
        }


    }


}