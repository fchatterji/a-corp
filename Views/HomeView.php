<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<p>
<?php
if (isset($_SESSION['loginSuccessMessage'])) {

    echo $_SESSION['loginSuccessMessage'];
    unset($_SESSION['loginSuccessMessage']);
}
?>
</p>

<p><?php echo 'home page'; ?></p>


<?php include "Partials/footer.php"; ?>

