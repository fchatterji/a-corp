<?php

require_once "User.php";

class UserService {

    var $connection;

    public function __construct() {
        $this->connection = Connexion::init();
    }

    public function createUser() {
        $stmt = $this->connection->prepare("INSERT INTO user (id, login, password, email) VALUES (NULL, :login, :password, :email)");
        $stmt->bindParam(':login', $_POST["login"]);
        $stmt->bindParam(':password', $_POST["password"]);
        $stmt->bindParam(':email', $_POST["email"]);
        $stmt->execute(); 
    }
}

