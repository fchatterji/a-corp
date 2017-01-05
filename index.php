<?php 
// load classes and dependencies
require_once "Tools/Autoloader.php";
Autoloader::register();

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes

$router->get('/', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    header("Location: https://a-corp1.000webhostapp.com/home");
});


$router->get('/home', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

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

$router->post('/register', function() { 
    $controler = new RegisterControler();
    $controler->post();
});

$router->get('/logout', function() {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new LogoutControler();
    $controler->get();
});

$router->get('/salles', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleListControler();
    $controler->get();
});

$router->get('/salle/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleDetailControler();
    $controler->get($id);
});

$router->post('/salle/create', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleDetailControler();
    $controler->post();
});

$router->post('/salle/update/(\d+)', function($id) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleDetailControler();
    $controler->put($id);
});

$router->post('/salle/delete/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleDetailControler();
    $controler->delete($id);
});

$router->get('/reservations(/[a-z0-9_-]+)?', function($day= null) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationListControler();
    $controler->getByDay($day);
});

$router->get('/reservations', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationListControler();
    $controler->getByDay($day);
});

$router->get('/reservation/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationDetailControler();
    $controler->get($id);
});

$router->post('/reservation/create', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationDetailControler();
    $controler->post();
});

$router->post('/reservation/update/(\d+)', function($id) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationDetailControler();
    $controler->put($id);
});

$router->post('/reservation/delete/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationDetailControler();
    $controler->delete($id);
});

// Run it!
$router->run();

?>

