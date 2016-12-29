<?php

class Router {

    static $menu;
    static $defaultRoute = "http://localhost:8080/a-corp/home";
    static $loginRoute = "http://localhost:8080/a-corp/login";
    static $service;

    public static function route() {

        self::$service = self::getAuthService();
        self::$menu = self::getMenuFromUrl();
        $controlerName = ucfirst(self::$menu)."Controler";

        // vérifier si l'utilisateur est loggé. Si non, rediriger vers la page de login
        self::isLoggedInOrRedirect();

        // vérifier si le sous-menu existe, sinon rediriger à la page d'accueil
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

    public static function getMenuFromUrl() {
        if (isset($_GET['menu'])) {
            return $_GET['menu'];
        } else {
            return 'home';
        } 
    }

    public static function isLoggedInOrRedirect() {

        if (self::$service->isLogged()) {

        } elseif (self::$menu === "login") {

        } else {
            header("Location: ".self::$loginRoute);
            exit();
        }
    }
}

