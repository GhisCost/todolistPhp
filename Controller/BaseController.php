<?php

namespace Controller;

abstract class BaseController
{

    public function render($fichier, array $array = [])
    {
        extract($array);

        include "public/header.html.php";
        include "views/$fichier";
        include "public/footer.html.php";
    }

    public function redirectToRoute(array $linkInfo){
        $controller = $linkInfo[0];
        $method = $linkInfo[1]?? null;
        $id = $linkInfo[2]?? null;
        redirection(addLink($controller, $method, $id));
    }
}
