<?php

class AuthService {
	/* Classe "wrapper" autour de la classe PHPAuth.

	La classe PHPAuth contient un ensemble de fonctions utilise pour 
	l'authentication des utilisateurs. Elle est utilisée pour ce projet.
	Cependant, afin de faciliter un changement éventuel de système et de
	conserver l'architecture en service utilisée dans le projet, on
	utilise une classe AuthService qui se sert de la classe PHPAuth.
	*/

    var $auth;

    public function __construct() {
        
        $dbh = new PDO("mysql:host=localhost;dbname=id463720_phpauth", "id463720_fchatterjiauth", "topsecre1");
        $config = new PHPAuth\Config($dbh);
        $this->auth   = new PHPAuth\Auth($dbh, $config);
    }

    public function isLogged() {
    	return $this->auth->isLogged();
    }

    public function login($email, $password, $remember) {
    	return $this->auth->login($email, $password, $remember);
    }

    public function logout($hash) {
    	return $this->auth->logout($hash);
    }

    public function register($email, $password, $repeatpassword) {
    	return $this->auth->register($email, $password, $repeatpassword);
    }
}

