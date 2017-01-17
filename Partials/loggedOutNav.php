<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="navbar-brand">A-corp</p>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="nav-reservation"><a href="/reservations/<?php echo date("Y-m-d") ?>">Réservations</a></li>
                <li class="nav-salle"><a href="/salles"><span class="glyphicon glyphicon-lock"></span> Salles</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-login"><a href="/login">Se connecter / S'inscrire</a></li>
            </ul>
        </div>
    </div>
</nav>

