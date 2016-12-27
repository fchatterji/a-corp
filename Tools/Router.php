<?php

class Router {

    static $submenu;
    static $action;
    static $defaultRoute = "http://localhost:8080/a-corp/index.php?submenu=home&action=get";
    static $loginRoute = "http://localhost:8080/a-corp/index.php?submenu=user&action=login";


    public static function parseUrl() {
        if (isset($_GET['submenu'])) {
            self::$submenu = $_GET['submenu'];
        } else {
            header("Location: ".self::$defaultRoute);
            exit();
        } 

        if (isset($_GET['action'])) {
            self::$action = $_GET['action'];
        } else {
            header("Location: ".self::$defaultRoute);
            exit();
        }       
    }




    public static function route() {

        $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpauth", "root", "");
        $config = new PHPAuth\Config($dbh);
        $auth   = new PHPAuth\Auth($dbh, $config);

        if (!$auth->isLogged()) {
            //header("Location: ".self::$loginRoute);
            //exit();
        }

        self::parseUrl();

        $controlerName = ucfirst(self::$submenu)."Controler";
        $action = self::$action;

        if(class_exists($controlerName)) {
            $controler = new $controlerName;
        } else {
            header("Location: ".self::$defaultRoute);
            die();
        }

        if(is_callable(array($controler, $action))) {
            $controler->$action();
        } else {
            header("Location: ".self::$defaultRoute);
            die();
        }
    }
}

