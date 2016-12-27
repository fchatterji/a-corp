<?php

include "Vues/header.php";

echo isset($_SESSION['idUtilisateur']) ? $_SESSION['idUtilisateur'] : "pas connecté";


foreach($utilisateurs as $utilisateur):?>
    
<div><img src="Public/Images/utilisateur.png"/><a href="<?= Router::Url('utilisateur','detail', array('id' => $utilisateur->id)) ?>" ><?= $utilisateur->login ?></a></div>
        
<?php endforeach; 

include "Vues/footer.php";
?>

