<?php

namespace Form;

use Model\Entity\Utilisateur;

class InscripHandleRequest extends BaseHandleRequest
{

    public function checkInscrip(Utilisateur $utilisateur)
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ajouterUtil'])) {

            extract($_POST);

            $errors = [];

            if (empty($pseudo) && empty($email) && empty($password)) {
                $errors[] = "Merci de remplir tous les champs !";
                $this->setErrors($errors);
                return $this;
            }

            if (empty($pseudo)) {

                if (empty($email)) {

                    $errors[] = "Merci de remplir l'email et le pseudonyme !";
                    $this->setErrors($errors);
                    return $this;

                } elseif (empty($password)) {

                    $errors[] = "Merci de remplir le pseudonyme et le mot de passe !";
                    $this->setErrors($errors);
                    return $this;

                } else {
                    $errors[] = "Merci de remplir le pseudonyme!";
                    $this->setErrors($errors);
                    return $this;

                }
            } elseif (empty($email)) {
                if (empty($password)) {
                    $errors[] = "Merci de remplir l'email et le mot de passe !";
                    $this->setErrors($errors);
                    return $this;
                } else {
                    $errors[] = "Merci de remplir l'email!";
                    $this->setErrors($errors);
                    return $this;
                }
            } elseif (empty($password)) {
                $errors[] = "Merci de remplir le mot de passe !";
                $this->setErrors($errors);
                return $this;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                  $errors[] = "Votre email n'est pas valide !";
                $this->setErrors($errors);
                return $this;
            }
            }

            $motDePassHash= password_hash($password,PASSWORD_BCRYPT);

            $utilisateur->setEmail(trim($email))->setMotDePasse($motDePassHash)->setPseudo(trim($pseudo));
            return $utilisateur;
        }
    }
