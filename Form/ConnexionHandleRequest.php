<?php

namespace Form;

use Model\Entity\Utilisateur;
use Model\Repository\UtilisateurRepository;

class ConnexionHandleRequest extends BaseHandleRequest
{
    public function checkConnexion(Utilisateur $utilisateur)
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['connexion'])) {

            foreach($_POST as $key=>$value){
                $_POST[$key]=trim($value);
            }
            
            extract($_POST);

            $errors = [];

            if (empty($email) && empty($password)) {

                $errors[] = "Merci de remplir tous les champs !";
                $this->setErrors($errors);
                return $this;

            }

            if (empty($email)) {
                $errors[] = "Merci de remplir votre email !";
                $this->setErrors($errors);
                return $this;
            }

            if (empty($password)) {
                $errors[] = "Merci de remplir votre mot de passe !";
                $this->setErrors($errors);
                return $this;

            }

            // Verif si l'email existe dans la bdd

            $repo = new UtilisateurRepository();
            $utilisateur = $repo->findByEmail($email);

            if (!$utilisateur) {
                $errors[] = "Il y a un problème avec votre email ou votre mot de passe";
                $this->setErrors($errors);
                return $this;
            }

            // Verif le mot de passe
            
            if (!password_verify($password, $utilisateur->getMotDePasse())) {
                $errors[] = "Il y a un problème avec votre email ou votre mot de passe";
                $this->setErrors($errors);
                return $this;
            }

            $_SESSION['utilisateur'] = [
                "id" => $utilisateur->getId(),
                "email" => $utilisateur->getEmail(),
                "pseudo" => $utilisateur->getPseudo()
            ];

            
            return $this;

        }
    }
}