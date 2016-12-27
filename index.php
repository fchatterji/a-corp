<?php 

session_start();


require_once "Outils\Autoloader.php";

Autoloader::register();

if(isset($_GET['page']))
{
    $page = $_GET['page'];
    
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = "index";
    }
    Router::Route($page, $action);
}

?>

