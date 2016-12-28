<?php

class Router {

    static $submenu;
    static $defaultRoute = "http://localhost:8080/a-corp/home";
    static $loginRoute = "http://localhost:8080/a-corp/login";
    static $service;

    public static function route() {

        self::$service = self::getAuthService();
        self::$submenu = self::getSubmenuFromUrl();

        echo 'submenu'.self::$submenu;

        // vérifier si l'utilisateur est loggé. Si non, rediriger vers la page de login
        self::isLoggedInOrRedirect();

        // vérifier si le sous-menu existe, sinon rediriger à la page d'accueil
        $controlerName = ucfirst(self::$submenu)."Controler";
        if(class_exists($controlerName)) {
            $controler = new $controlerName;
        } else {
            header("Location: ".self::$defaultRoute);
            die();
        }
    }

    public static function getAuthService() {
        return new AuthService();
    }

    public static function getSubmenuFromUrl() {
        if (isset($_GET['submenu'])) {
            return $_GET['submenu'];
        } else {
            return 'home';
        } 
    }

    public static function isLoggedInOrRedirect() {

        if (self::$service->isLogged()) {

        } elseif (self::$submenu === "login") {

        } else {
            header("Location: ".self::$loginRoute);
            exit();
        }
    }
}

