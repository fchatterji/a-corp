<?php

// TODO simplify reservation list by hour, controler does too much

class ReservationControler {
    /* handle requests that concern reservations */
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

    public function getReservationList($day) {
        /* displays a table of reservations, filtered by day */

        // get possible hours from possible hours service
        $possibleHoursList = $this->possibleHoursService->getPossibleHours();

        // get list of salles from salle service
        $salleList = $this->salleService->getSalleList();

        // get user id from authservice
        $userId = $this->authService->getUserId();

        // get all reservations for each possible start hour. Store it in the reservationListByHour array
        $reservations = $this->reservationService->getReservationsByDay($day);


        // make $day variables available in the view
        $day = $day;
        $previousDay = date('Y-m-d', strtotime("-1 day", strtotime($day)));
        $nextDay = date('Y-m-d', strtotime("+1 day", strtotime($day)));

        include("Views/ReservationListView.php");
    }

    public function post() {
        /* create a reservation and redirect */
        $array = $this->reservationService->createReservation();

        if ($array["error"]) {
            $_SESSION["reservationErrorMessage"] = $array["message"];
            $day = date("Y-m-d");
        } else {
            $day = $_POST['day'];            
        }

        header("Location: /reservations/".$day);
        exit(); 
    }

    public function put($id) {
        /* update a reservation and redirect */
        $array = $this->reservationService->updateReservation($id);

        if ($array["error"]) {
            $_SESSION["reservationErrorMessage"] = $array["message"];
            $day = date("Y-m-d");
        } else {
            $day = $_POST['day'];            
        }

        header("Location: /reservations/".$day);
        exit();	
    }

    public function delete($id) {
        /* delete a reservation and redirect */
        $this->reservationService->deleteReservation($id);

        $day = $_POST['day'];
        header("Location: /reservations/".$day);
        exit();	
    }
}
?>

