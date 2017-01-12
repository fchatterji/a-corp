<?php include "Partials/header.php"; ?>

<?php 
if ($isLogged) {
    include "Partials/loggedInNav.php"; 
} else {
    include "Partials/loggedOutNav.php"; 
}


?>

<p>
<?php
if (isset($_SESSION['loginErrorMessage'])) {

    echo $_SESSION['loginErrorMessage'];
    unset($_SESSION['loginErrorMessage']);
}
?>
</p>

<p>
<?php
if (isset($_SESSION['registerErrorMessage'])) {

    echo $_SESSION['registerErrorMessage'];
    unset($_SESSION['registerErrorMessage']);
}
?>
</p>

<p>
<?php
if (isset($_SESSION['registerSuccessMessage'])) {

    echo $_SESSION['registerSuccessMessage'];
    unset($_SESSION['registerSuccessMessage']);
}
?>
</p>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#" class="active" id="login-form-link">Se connecter</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="#" id="register-form-link">S'inscrire</a>
                    </div>
                </div>
                <hr>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                        <form id="login-form" action="/login" method="post" role="form" style="display: block;">

                            <div class="form-group">
                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Adresse e-mail" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe" required>
                            </div>

                            <div class="form-group text-center">
                                <label for="remember"> Se rappeler de moi</label>
                                <input type="checkbox" tabindex="3" value="true" name="remember" id="remember">
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form id="register-form" action="/register" method="post" role="form" style="display: none;">
                            <div class="form-group">
                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Addresse Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="repeatPassword" id="repeatPassword" tabindex="2" class="form-control" placeholder="Confirmer le mot de passe" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="S'inscrire">
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });  

</script>


<?php include "Partials/footer.php"; ?>