<?php

include "Vues/header.php";
?>
<form action="<?= Router::Url('utilisateur','sauver')?>" method="POST">
    <input type="hidden" value="<?= $token ?>" />
    <input type="hidden" name="id" value="<?= $utilisateur->id ?>">
    Login : <input name="login" value="<?= $utilisateur->login ?>"> <?= isset($erreurs["login"]) ? $erreurs["login"]:""?>
    Mail : <input name="mail"  value="<?= $utilisateur->mail ?>">
    <input type="submit" value="sauver">
</form>

<?php
include "Vues/footer.php";
?>
