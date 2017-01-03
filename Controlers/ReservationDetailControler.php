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
        $this->service->createReservation($_POST['salleId'], $_POST['day'], $_POST['hourId']);
        header("Location: http://localhost:8080/a-corp/reservations/".date("Y-m-d"));
        exit();	
    }

    public function put($id) {
        $this->service->updateReservation($id, $_POST['salleId'], $_POST['day'], $_POST['hourId']);
        header("Location: http://localhost:8080/a-corp/reservations/".date("Y-m-d"));
        exit();	
    }

    public function delete($id) {
        $this->service->deleteReservation($id);
        header("Location: http://localhost:8080/a-corp/reservations/".date("Y-m-d"));
        exit();	
    }
}
?>

