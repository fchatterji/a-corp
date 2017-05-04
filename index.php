<?php 

// start a session
session_start();

// load classes and dependencies
require_once "Tools/Autoloader.php";
Autoloader::register();

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes


// LOGIN PROCESS 
$router->get('/', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $day =  $date = date('Y-m-d');
    header("Location: /reservations/".$day);
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


// SALLES
$router->get('/salles', function() { 

    $adminGuardControler = new AdminGuardControler();
    $adminGuardControler->preventAccessIfNotAdmin();

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->getSalleList();
});

$router->post('/salle/create', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->post();
});

$router->post('/salle/update/(\d+)', function($id) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->put($id);
});

$router->post('/salle/delete/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->delete($id);
});


// RESERVATIONS
$router->get('/reservations/([a-z0-9_-]+)', function($day) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    include 'Tools/isValidDay.php';
    if (!isValidDay($day)) {       
        header('HTTP/1.1 404 Not Found');
        include "Views/404ErrorView.php";
    } else {
        $controler = new ReservationControler();
        $controler->getReservationList($day);        
    }

});


$router->post('/reservation/create', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->post();
});

$router->post('/reservation/update/(\d+)', function($id) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->put($id);
});

$router->post('/reservation/delete/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->delete($id);
});


// SETTINGS
$router->get('/settings', function() { 

    $controler = new SettingsControler();
    $controler->get();
});


//ORGANISMS
$router->get('/organisms', function() {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn(); 

    $controler = new OrganismControler();
    $controler->get();
});

$router->post('/organism/create', function() { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->post();
});

$router->post('/organism/update/(\d+)', function($id) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->put($id);
});

$router->post('/organism/delete/(\d+)', function($id) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->delete($id);
});



// 404
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    include "Views/404ErrorView.php";
});

// Run it!
$router->run();

?>

