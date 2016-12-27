<?php include "Vues/header.php";?>

<form method="POST" action="<?= Router::Url('utilisateur', 'connexion')?>">
    <div>Login : <input name="login" /></div>
    <div>Mdp : <input name="mdp" /></div>
    <input type ="submit">Envoyer</input>
</form>

<?php include "Vues/footer.php";?>