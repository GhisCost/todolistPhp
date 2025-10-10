<?php 

namespace Controller;

use Form\ConnexionHandleRequest;
use Form\InscripHandleRequest;
use Model\Repository\UtilisateurRepository;
use Model\Entity\Utilisateur;


class ConnexionController extends BaseController{

     private UtilisateurRepository $utilisateurRepository;

    private Utilisateur $utilisateur;

    private InscripHandleRequest $inscripHandleRequest;

    private ConnexionHandleRequest $connexionHandleRequest;

public function __construct(){

    $this->utilisateur =  new Utilisateur();
    $this->inscripHandleRequest = new InscripHandleRequest();
    $this->utilisateurRepository = new UtilisateurRepository();
    $this->connexionHandleRequest= new ConnexionHandleRequest();

}


public function index(){
    return $this->render("utilisateur/connexion.html.php",[
        "validation"=>"Vous êtes bien inscrit, vous pouvez vous connectez !"
    ]);
}

public function connect(){
    return $this->render("utilisateur/connexion.html.php");
}

public function connexionUtil(){
 
    $this->connexionHandleRequest->checkConnexion($this->utilisateur);
    
    if($this->connexionHandleRequest->isValid() && $this->connexionHandleRequest->isSubmitted()){
          return $this->render("utilisateur/connexion.html.php", [
        "oui"=>"Vous êtes bien connecté !"
    ]);
    } else{
        
            return $this->render("utilisateur/connexion.html.php", [
        "non"=>$this->connexionHandleRequest->getErrors()
    ]);
    }

  
}

public function deconnect(){

    $_SESSION=[];
    $this->render("home/home.html.php");

}


}
