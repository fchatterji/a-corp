<?php

class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'loadModeles'));
        spl_autoload_register(array(__CLASS__, 'loadControleurs'));        
        spl_autoload_register(array(__CLASS__, 'loadOutils'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadModeles($class)
    {
        $file = "Modeles/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadControleurs($class)
    {
        $file = "Controleurs/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function loadOutils($class)
    {
        $file = "Outils/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }

}