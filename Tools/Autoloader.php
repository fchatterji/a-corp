<?php

class Autoloader{



    /**
     * Enregistre notre autoloader
     */
    public static function register() {
        // enregistre  les dépendances avec composer 
        require_once 'vendor/autoload.php';

        spl_autoload_register(array(__CLASS__, 'loadModels'));
        spl_autoload_register(array(__CLASS__, 'loadControlers'));        
        spl_autoload_register(array(__CLASS__, 'loadTools'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadModels($class)
    {
        $file = "Models/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadControlers($class)
    {
        $file = "Controlers/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadTools($class)
    {
        $file = "Tools/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }

}

