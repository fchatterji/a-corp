<?php

class Connexion
{
    public static function init()
    {
        try {
            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $base = "a-corp";

            $bdd = new PDO("mysql:host=".$host.";dbname=".$base, $user, $pass, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
            
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

