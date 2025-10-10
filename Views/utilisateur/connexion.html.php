<?php 
 if(!empty($oui)){ ?>
    <h3><?= $oui ?></h3>
<?php }
 if(!empty($non)){ ?>
    <h3 class="erreurCo" ><?= implode($non) ?></h3>
<?php }

?>

<div class="formConnex">
    <form action="<?= addLink("connexion", "connexionUtil") ?>" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Mot de Passe</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Se connecter" name="connexion" id="bouton" >
    </form>
</div>