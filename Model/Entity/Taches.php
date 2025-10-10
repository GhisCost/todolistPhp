<?php 

namespace Model\Entity;

class Taches extends BaseEntity {
    private $idUtilisateur;

    private $contenu;

    private $dateDeCreation;
    

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }


    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

 
    public function getContenu()
    {
        return $this->contenu;
    }

    
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation($dateDeCreation)
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }
}