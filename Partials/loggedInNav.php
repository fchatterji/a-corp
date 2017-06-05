<nav class="navbar navbar-default">
    <div class="container-fluid">
    
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
                <li class="nav-reservation">
                    <a href="/<?php echo $organismId ?>/reservations/<?php echo date("Y-m-d") ?>">Réservations</a>
                </li>
                <li class="nav-organism">
                    <a href="/<?php echo $organismId ?>/organisms">Groupes</a>
                </li>
                <li class="nav-salle">
                    <a href="/<?php echo $organismId ?>/salles"><span class="glyphicon glyphicon-lock"></span> Salles</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span><?php echo $userName['username']; ?></span>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="nav-logout"><a href="">Accueil</a></li>
                    <li class="nav-logout"><a href="/logout">Mon profil</a></li>
                    <li class="nav-logout"><a href="/<?php echo $organismId ?>/settings">Paramètres</a></li>
                    <li class="nav-logout"><a href="/logout">Se déconnecter</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

