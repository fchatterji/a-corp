<?php

class Autoloader{

    public static function register() {
        /* Register the autoloader */

        // include all external packages
        require_once 'vendor/autoload.php';

        // include all classses
        spl_autoload_register(array(__CLASS__, 'loadModels'));
        spl_autoload_register(array(__CLASS__, 'loadControlers'));        
        spl_autoload_register(array(__CLASS__, 'loadTools'));
        spl_autoload_register(array(__CLASS__, 'loadPartials'));
    }


    static function loadModels($class) {
        /* Include all models */
        $file = "Models/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    static function loadControlers($class) {
        /* Include all controlers */
        $file = "Controlers/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
    
    static function loadTools($class) {
        /* Include all tools */
        $file = "Tools/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }

    static function loadPartials($class) {
        /* Include all partials */
        $file = "Partials/".$class.'.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }

}

