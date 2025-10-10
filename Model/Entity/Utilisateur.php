<?php

namespace Model\Entity;

class Utilisateur extends BaseEntity{

    private $pseudo;

    private $email;

    private $motDePasse;

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

  
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }
}