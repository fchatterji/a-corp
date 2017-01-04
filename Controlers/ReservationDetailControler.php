<?php

class ReservationDetailControler {
    // un contrôleur par url
    var $reservationService;
    var $salleService;
    var $possibleHoursService;
    var $authService;
    
    public function __construct() {
        $this->reservationService = new ReservationService();
        $this->salleService = new SalleService();
        $this->possibleHoursService = new PossibleHoursService();
        $this->authService = new AuthService();
    }

    public function get($id) {
        // get possible hours from possible hours service
        $possibleHoursList = $this->possibleHoursService->getPossibleHours();

        // get list of salles from salle service
        $salleList = $this->salleService->getSalles();

        $reservation = $this->reservationService->getReservationById($id);
        include("Views/ReservationDetailView.php");
    }

    public function post() {
        $this->reservationService->createReservation($_POST['salleId'], $_POST['day'], $_POST['hourId'], $_POST['numGuests'], $_POST['userId']);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }

    public function put($id) {
        $this->reservationService->updateReservation($id, $_POST['salleId'], $_POST['day'], $_POST['hourId'], $_POST['numGuests'], $_POST['userId']);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }

    public function delete($id) {
        $this->reservationService->deleteReservation($id);
        header("Location: https://a-corp1.000webhostapp.com/reservations/".date("Y-m-d"));
        exit();	
    }
}
?>

