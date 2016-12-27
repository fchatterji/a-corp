<?php

class Router {
    
    
    public static function Route($page, $action)
    {
        $controleurNom =  ucfirst($page)."Controleur";
        
        if(class_exists($controleurNom)) 
        {
            $controleur = new $controleurNom;

            $actionNom = ucfirst($action);

            if(is_callable(array($controleur, $actionNom))){
                $controleur->$actionNom();
            }else{
                $controleur->Defaut();
            }
        }
    }
    
    public static function Url($page, $action = null, $parametres = [])
    {
        
        $url = "index.php?page=".$page;
        
        if($action != null)
        {
            $url .= "&action=".$action;
        }
        
        foreach($parametres as $key => $value)
        {
            $url .= "&".$key."=".$value;
        }
         
        /*
        $url = "/Projet/".$page."/";
        
        if($action != null)
        {
            $url .= $action."/";
        }
        
        foreach($parametres as $key => $value)
        {
            $url .= $key."=".$value;
        }
        */
        return $url;
    }
}
