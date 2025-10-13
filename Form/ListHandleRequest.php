<?php

namespace Form;


use Model\Entity\Taches;
use Model\Repository\UtilisateurRepository;

class ListHandleRequest extends BaseHandleRequest
{
  public function checkAjout(Taches $taches)
  {

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ajouter_tache'])) {


      extract($_POST);

      $errors = [];

      if (!empty($_POST['tacheAjout'])) {
        if (isset($_SESSION['utilisateur'])) {
          $taches->setContenu($tacheAjout)->setIdUtilisateur($_SESSION['utilisateur']['id'])->setDateDeCreation(date("Y-m-d H-i-s", time()));

          return $taches;

        } else {
          $errors[] = "Il faut être inscrit et connecté pour ajouter des taches";
          $this->setErrors($errors);
          return $this;
        }

      } else {
        $errors[] = "Faut ecrire un tache pour pouvoir l'ajouter !";
      }

      if (!empty($errors)) {
        $this->setErrors($errors);
        return $this;
      }


    }

  }

  public function checkModif(Taches $taches)
  {
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['modifForm'])) {

      extract($_POST);

      $errors = [];

       if (!empty($_POST['tacheModif'])) {
        if (isset($_SESSION['utilisateur'])) {
          $taches->setContenu($tacheModif)->setIdUtilisateur($_SESSION['utilisateur']['id'])->setDateDeCreation(date("Y-m-d H-i-s", time()));

          return $taches;

        }

      } else {
        $errors[] = "Faut ecrire un tache pour pouvoir l'ajouter !";
      }

      if (!empty($errors)) {
        $this->setErrors($errors);
        return $this;
      }

    }
  }

}