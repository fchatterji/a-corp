<?php

class LogoutControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->get();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        	$this->post();
        }
    }

    public function get() {
    	include("views/LogoutView.php");
    }

    public function post() {

        $boolean = $this->service->logout($_COOKIE["authID"]);
        var_dump($boolean);
        header("Location: http://localhost:8080/a-corp/index.php?submenu=login");
        exit();
    }
}
?>

