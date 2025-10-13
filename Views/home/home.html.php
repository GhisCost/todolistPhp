<div class="sousCorps">

    <h1>Ma Todo list</h1>


    <?php if (!empty($bienvenue)) {
        ?>
        <h2><?= $bienvenue ?></h2>
    <?php } ?>

    <div class="divAjout">
        <form action="<?= addLink("home", "ajoutTache") ?>" method="POST">
            <label for="tache">Nouvelle tâche à effectuer</label>
            <input type="text" id="tache" name="tacheAjout">
            <input id="bouton" type="submit" name="ajouter_tache">
        </form>
    </div>



    <?php if (!empty($confirm)) {
        ?>
        <h2><?= $confirm ?></h2>
    <?php } ?>

    <?php
    if (isset($errors)) {
        foreach ($errors as $e) { ?>
            <p class="erreurs"><?= $e ?></p>
        <?php }
    } ?>


    <div class="affichList">
        <ul>
            <?php
            if (isset($list) && !empty($list)) {
                foreach ($list as $l) { ?>
                    <li>
                        <?= $l->getContenu(); ?>
                        <div class="suppModif">
                            <button class="btnModif" data-id="<?= $l->getId() ?>"
                                data-description="<?= htmlspecialchars($l->getContenu(), ENT_QUOTES) ?>">
                                Modifier
                            </button>
                            <a href="<?= addLink("home", "supprimerTache", $l->getId()) ?>" class="btnSup">
                                &times;
                            </a>
                        </div>
                    </li>
                <?php }
            }
            ?>
        </ul>
    </div>

</div>

<div class="modif">
    <form action="<?= addLink("home", "modifierTache") ?>" method="POST">
        <label for="tacheModif">Modifier la tache</label>
        <input type="text" id="tacheModif" name="tacheModif">
        <input type="hidden" name="idTache" id="idTache">
        <input id="btnSubModif" type="submit" name="modifForm">
    </form>
</div>