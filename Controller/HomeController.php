<?php

namespace Controller;

use Form\ListHandleRequest;
use Model\Repository\TacheRepository;
use Model\Entity\Taches;
use Model\Entity\Utilisateur;

class HomeController extends BaseController
{

    private TacheRepository $tacheRepository;

    private Taches $taches;

    private ListHandleRequest $listHandleRequest;

    public function __construct()
    {

        $this->taches = new Taches();
        $this->listHandleRequest = new ListHandleRequest();
        $this->tacheRepository = new TacheRepository();

    }


    public function index()
    {
        if (isset($_SESSION['utilisateur'])) {
            $list = $this->tacheRepository->findAll("taches", $_SESSION['utilisateur']['id']);

            $pseudo=$_SESSION['utilisateur']['pseudo'];
            return $this->render("home/home.html.php", [
                "bienvenue" => "Bienvenue $pseudo sur votre todolist !",
                "list" => $list
            ]);
        }
        return $this->render("home/home.html.php", []);

    }

    public function confirm()
    {
        $list = $this->tacheRepository->findAll("taches", $_SESSION['utilisateur']['id']);
        return $this->render("home/home.html.php", [
            "confirm" => "Cette nouvelle tâche a bien été ajoutée.",
            "list" => $list
        ]);

    }

    public function supprimerTache()
    {
        $this->tacheRepository->suppTache($_GET['id']);
        $list = $this->tacheRepository->findAll("taches", $_SESSION['utilisateur']['id']);
        return $this->render("home/home.html.php", [
            "confirm" => "La tache à été effacé.",
            "list" => $list
        ]);

    }




    public function modifierTache()
    {
        $this->listHandleRequest->checkModif($this->taches);

        if ($this->listHandleRequest->isValid() && $this->listHandleRequest->isSubmitted()) {
            if (isset($_SESSION['utilisateur'])) {
                $this->tacheRepository->modifTache($_POST['idTache'], $_POST['tacheModif']);
                return redirection(addLink("home", "index"));
            }
        }

        $list = isset($_SESSION['utilisateur']['id']) ? $this->tacheRepository->findAll("taches", $_SESSION['utilisateur']['id']) : '';
        return $this->render("home/home.html.php", [
            "errors" => $this->listHandleRequest->getErrors(),
            "list" => $list
        ]);

    }

    public function ajoutTache()
    {
        $this->listHandleRequest->checkAjout($this->taches);

        if ($this->listHandleRequest->isValid() && $this->listHandleRequest->isSubmitted()) {

            if (isset($_SESSION['utilisateur'])) {
                $this->tacheRepository->insertTaches($this->taches);
                return redirection(addLink("home", "index"));
            }
        }

        $list = isset($_SESSION['utilisateur']['id']) ? $this->tacheRepository->findAll("taches", $_SESSION['utilisateur']['id']) : '';
        return $this->render("home/home.html.php", [
            "errors" => $this->listHandleRequest->getErrors(),
            "list" => $list
        ]);

    }
}