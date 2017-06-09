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
$router->get('/(\d+)/salles', function($organismId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->getSalleList($organismId);
});

$router->post('/(\d+)/salle/create', function($organismId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->post($organismId);
});

$router->post('/(\d+)/salle/update/(\d+)', function($organismId, $salleId) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->put($organismId, $salleId);
});

$router->post('/(\d+)/salle/delete/(\d+)', function($organismId, $salleId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new SalleControler();
    $controler->delete($organismId, $salleId);
});


// RESERVATIONS
$router->get('/(\d+)/reservations/([a-z0-9_-]+)', function($organismId, $day) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    include 'Tools/isValidDay.php';
    if (!isValidDay($day)) {       
        header('HTTP/1.1 404 Not Found');
        include "Views/404ErrorView.php";
    } else {
        $controler = new ReservationControler();
        $controler->getReservationList($organismId, $day);        
    }

});


$router->post('/(\d+)/reservation/create', function($organismId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->post($organismId);
});

$router->post('/(\d+)/reservation/update/(\d+)', function($organismId, $reservationId) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->put($organismId, $reservationId);
});

$router->post('/(\d+)/reservation/delete/(\d+)', function($organismId, $reservationId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new ReservationControler();
    $controler->delete($organismId, $reservationId);
});


// SETTINGS
$router->get('/(\d+)/settings', function($organismId) { 

    $controler = new SettingControler();
    $controler->get($organismId);
});

$router->post('/(\d+)/setting/create', function($organismId) { 

    $controler = new SettingControler();
    $controler->post($organismId);
});

$router->post('/(\d+)/setting/update/(\d+)', function($organismId, $settingId) {

    $controler = new SettingControler();
    $controler->put($organismId, $settingId);
});

$router->post('/(\d+)/setting/delete/(\d+)', function($organismId, $settingId) { 

    $controler = new SettingControler();
    $controler->delete($organismId, $settingId);
});


//ORGANISMS
$router->get('/(\d+)/organisms', function($organismId) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn(); 

    $controler = new OrganismControler();
    $controler->get($organismId);
});

$router->post('/(\d+)/organism/create', function($organismId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->post($organismId);
});

$router->post('/(\d+)/organism/update/', function($organismId) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->put($organismId);
});

$router->post('/(\d+)/organism/delete', function($organismId) { 

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn();

    $controler = new OrganismControler();
    $controler->delete($organismId);
});


// MEMBERSHIPS
$router->get('/(\d+)/organisms/droits', function($organismId) {

    $loginGuardControler = new LoginGuardControler();
    $loginGuardControler->preventAccessIfNotLoggedIn(); 

    $controler = new MembershipControler();
    $controler->getMembershipList($organismId);
});


// 404
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    include "Views/404ErrorView.php";
});


// Run it!
$router->run();

?>

