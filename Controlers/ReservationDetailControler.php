<?php

class ReservationDetailControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new ReservationService();
    }

    public function get($id) {
        $reservation = $this->service->getReservationById($id);
        include("Views/ReservationDetailView.php");
    }

    public function post() {
        $this->service->createReservation($_POST['salleId'], $_POST['day'], $_POST['hourId']);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }

    public function put($id) {
        $this->service->updateReservation($id, $_POST['salleId'], $_POST['day'], $_POST['hourId']);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }

    public function delete($id) {
        $this->service->deleteReservation($id);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }
}
?>

