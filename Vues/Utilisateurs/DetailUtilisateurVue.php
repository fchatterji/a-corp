<?php
include "Vues/header.php";

echo $utilisateur->id." - ".$utilisateur->login;
?>
<a href="<?= Router::Url('utilisateur','edition', array('id' => $utilisateur->id)) ?>">modifier</a>

<div>
<a href="<?= Router::Url('utilisateur','edition', array('id' => $utilisateur->id)) ?>">Retour à la liste</a>
</div>

<?php include "Vues/footer.php";
