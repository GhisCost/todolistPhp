<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= ROOT; ?>">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>Ma liste de chose à faire</title>

</head>

<body>
    <div class="corps">
        <header>
            <nav>
                <ul>
                   <a href="<?= addLink("home", "index") ?>">Votre liste</a>

                    <?php if (empty($_SESSION)) { ?>
                        <a href="<?= addLink("inscription", "index") ?>">
                        <li>Inscription</li>
                       
                        <a href="<?= addLink("connexion", "connect") ?>">
                            <li>Connexion</li>
                        </a>   
                        
                    </a>
                        <?php
                    } else { ?>
                 
                        <a href="<?= addLink("connexion", "deconnect") ?>">
                            <li>Déconnexion</li>
                        </a>
                    <?php } ?>


                    
                </ul>
            </nav>
        </header>
        <main>