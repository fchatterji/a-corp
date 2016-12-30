<?php 
require_once "Tools\Autoloader.php";
Autoloader::register();
?>
<html>

<head>
    <title>A-corp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <header>
        <br>
        <a href="home">home</a>
        <a href="login">login</a>
        <a href="logout">logout</a>
        <a href="register">register</a>
        <a href="salles">liste des salles</a>
        <br>
    </header>

</body>

<?php

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/home', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new HomeControler();
    $controler->get();
});

$router->get('/login', function() { 
    $controler = new LoginControler();
    $controler->get();
});

$router->post('/login', function() { 
    $controler = new LoginControler();
    $controler->post();
});

$router->get('/logout', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new LogoutControler();
    $controler->get();
});

$router->post('/logout', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new LogoutControler();
    $controler->post();
});

$router->get('/register', function() { 
    $controler = new RegisterControler();
    $controler->get();
});

$router->post('/register', function() { 
    $controler = new RegisterControler();
    $controler->post();
});

$router->get('/salles', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new SalleListControler();
    $controler->get();
});

$router->get('/salle/(\d+)', function($id) { 
    preventAccessIfNotLoggedIn();
    $controler = new SalleDetailControler();
    $controler->get($id);
});

$router->post('/salle/create', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new SalleDetailControler();
    $controler->post();
});

$router->post('/salle/update/(\d+)', function($id) {
    preventAccessIfNotLoggedIn();
    $controler = new SalleDetailControler();
    $controler->put($id);
});

$router->post('/salle/delete/(\d+)', function($id) { 
    preventAccessIfNotLoggedIn();
    $controler = new SalleDetailControler();
    $controler->delete($id);
});

// Run it!
$router->run();


function preventAccessIfNotLoggedIn() {
    $service = new AuthService();
    if (!$service->isLogged()) {
        header("Location: localhost:8080/a-corp/login");
        exit();
    } 
}
?>

</html>

