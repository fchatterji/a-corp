<?php
require_once "Models\UserService.php";

class UserControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new UserService();
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include("views/Login.php");
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        }  
    }

    public function logout() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include("views/Logout.php");
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public function signIn() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include("views/SignIn.php");
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->createUser();
            header("Location: http://localhost:8080/a-corp/home/get");
            die();

        }
    }

    public function signOut() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include("views/SignOut.php");
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }
}

