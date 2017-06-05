<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<div class="row">
    <?php foreach ($membershipList as $membership): ?>
    	<p><?php print_r($membership) ?></p>

    <?php endforeach; ?>

<?php include "Partials/footer.php"; ?>