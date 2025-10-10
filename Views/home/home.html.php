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
                    <a href="<?= addLink("home", "supprimerTache", $l->getId()) ?>">Supprimer</a>
                </li>
            <?php }
        }
        ?>
    </ul>
</div>

