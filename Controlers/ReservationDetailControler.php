<?php

class ReservationDetailControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new ReservationService();
    }

    public function get($id) {
        $reservation = $this->service->getReservationById($id);
        include("views/ReservationDetailView.php");
    }

    public function post() {
        $stmt = $this->service->createReservation($_POST['salleId'], $_POST['debut'], $_POST['fin']);
        header("Location: http://localhost:8080/a-corp/reservations");
        exit();	
    }

    public function put($id) {
        $stmt = $this->service->updateReservation($id, $_POST['salleId'], $_POST['debut'], $_POST['fin']);
        header("Location: http://localhost:8080/a-corp/reservations");
        exit();	
    }

    public function delete($id) {
        $stmt = $this->service->deleteReservation($id);
        header("Location: http://localhost:8080/a-corp/reservations");
        exit();	
    }
}
?>

