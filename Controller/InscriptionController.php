<?php 

namespace Controller;

use Form\InscripHandleRequest;
use Model\Repository\UtilisateurRepository;
use Model\Entity\Utilisateur;

class InscriptionController extends BaseController{

     private UtilisateurRepository $utilisateurRepository;

    private Utilisateur $utilisateur;

    private InscripHandleRequest $inscripHandleRequest;

public function __construct(){

    $this->utilisateur =  new Utilisateur();
    $this->inscripHandleRequest = new InscripHandleRequest();
    $this->utilisateurRepository = new UtilisateurRepository();

}
    public function index(){

       return $this->render("utilisateur/inscription.html.php");
    }
    
    public function ajoutUtil(){

        $this->inscripHandleRequest->checkInscrip($this->utilisateur);

        if($this->inscripHandleRequest->isValid() && $this->inscripHandleRequest->isSubmitted()){
            $this->utilisateurRepository->insertUtilisateur($this->utilisateur);
            return redirection(addLink("connexion","index"));
        }
    }

}