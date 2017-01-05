<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedOutNav.php"; ?>

<form action="/login" method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="test.test@gmail.com">
    <label for="password">Password:</label>
    <input type="text" name="password" id="password" value="Topsecre1@">
    <input type="submit" value="Submit">
</form>

<form action="/register" method="post">

    <label for="password">Email:</label>
    <input type="text" name="email" id="email" value="test.test@gmail.com">

    <label for="password">Password:</label>
    <input type="text" name="password" id="password" value="Topsecre1@">

    <label for="password">Repeat Password:</label>
    <input type="text" name="repeatpassword" id="repeatpassword" value="Topsecre1@">

    <input type="submit" value="Submit">
</form>

<?php include "Partials/footer.php"; ?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Se connecter</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Mot de passe oublié?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="mot de passe">
                    </div>

                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1">Se rappeler de moi
                            </label>
                        </div>
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <a id="btn-login" href="#" class="btn btn-success">Se connecter</a>
                            <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Créer un compte
                                        </a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Créer un compte</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Se connecter</a></div>
            </div>
            <div class="panel-body">
                <form id="signupform" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="adresse email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Nom d'utilisateur</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="nom d'utilisateur">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Mot de passe</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="mot de passe">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Créer un compte</button>
                            <span style="margin-left:8px;">ou</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid #999; padding-top:20px" class="form-group">

                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>Se connecter avec Facebook</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

