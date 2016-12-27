<?php


class Filtres
{
    
    public static function VerifierLogin($login)
    {
        $regex = "`^[0-9A-Za-z]+$`";
        return preg_match($regex, $login) ? $login : false;
    }
    
}