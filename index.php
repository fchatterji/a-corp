<?php 
// load classes and dependencies
require_once "Tools\Autoloader.php";
Autoloader::register();

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

$router->get('/reservations/([a-z0-9_-]+)?', function($day) { 
    preventAccessIfNotLoggedIn();
    $controler = new ReservationListControler();
    $controler->getByDay($day);
});

$router->get('/reservation/(\d+)', function($id) { 
    preventAccessIfNotLoggedIn();
    $controler = new ReservationDetailControler();
    $controler->get($id);
});

$router->post('/reservation/create', function() { 
    preventAccessIfNotLoggedIn();
    $controler = new ReservationDetailControler();
    $controler->post();
});

$router->post('/reservation/update/(\d+)', function($id) {
    preventAccessIfNotLoggedIn();
    $controler = new ReservationDetailControler();
    $controler->put($id);
});

$router->post('/reservation/delete/(\d+)', function($id) { 
    preventAccessIfNotLoggedIn();
    $controler = new ReservationDetailControler();
    $controler->delete($id);
});

// Run it!
$router->run();


function preventAccessIfNotLoggedIn() {
    $authService = new AuthService();
    
    if (!$authService->isLogged()) {
        header("Location: localhost:8080/a-corp/login");
        exit();
    } 
}
?>

