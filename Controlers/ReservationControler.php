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
        $this->settingService = new SettingService();
    }

    public function getReservationList($organismId, $day) {
        /* displays a table of reservations, filtered by day */

        // get possible hours from possible hours service
        $possibleHoursList = $this->possibleHoursService->getPossibleHours();

        // get list of salles from salle service
        $salleList = $this->salleService->getSalleList($organismId);

        // get user id and user name from authservice
        $userId = $this->authService->getUserId();
        $userName = $this->authService->getUserName();

        // get all reservations for each possible start hour. Store it in the reservationListByHour array
        $reservations = $this->reservationService->getReservationsByDayAndOrganism($organismId, $day);

        // make organism variable available in the view
        $organismId = $organismId;

        // get settings for the view
        $settings = $this->settingService->getSettings($organismId);

        // make $day variables available in the view
        $day = $day;
        $previousDay = date('Y-m-d', strtotime("-1 day", strtotime($day)));
        $nextDay = date('Y-m-d', strtotime("+1 day", strtotime($day)));

        include("Views/ReservationListView.php");
    }

    public function post($organismId) {
        /* create a reservation and redirect */
        $array = $this->reservationService->createReservation($organismId);

        if ($array["error"]) {
            $_SESSION["reservationErrorMessage"] = $array["message"];
            $day = date("Y-m-d");
        } else {
            $day = $_POST['day'];            
        }

        header("Location: /{$organismId}/reservations/".$day);
        exit(); 
    }

    public function put($organismId, $reservationId) {
        /* update a reservation and redirect */
        $array = $this->reservationService->updateReservation($organismId, $reservationId);

        if ($array["error"]) {
            $_SESSION["reservationErrorMessage"] = $array["message"];
            $day = date("Y-m-d");
        } else {
            $day = $_POST['day'];            
        }

        header("Location: /{$organismId}/reservations/{$day}");
        exit();	
    }

    public function delete($organismId, $reservationId) {
        /* delete a reservation and redirect */
        $this->reservationService->deleteReservation($organismId, $reservationId);

        $day = $_POST['day'];
        header("Location: /{$organismId}/reservations/{$day}");
        exit();	
    }
}
?>

