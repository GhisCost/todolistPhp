<h1>Inscription</h1>

<div class="formInscript">

<form action="<?= addLink("inscription", "ajoutUtil") ?>" method="POST">

    <label for="pseudo">Pseudonyme</label>
    <input type="text" name="pseudo" id="pseudo">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">
    <input id="bouton" type="submit" value="S'inscrire" name="ajouterUtil">
</form>

</div>