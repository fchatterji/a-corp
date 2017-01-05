<?php

class ReservationListControler {
    // un contrôleur par url
    var $reservationService;
    var $salleService;
    var $possibleHoursService;
    
    public function __construct() {
    	$this->reservationService = new ReservationService();
        $this->salleService = new SalleService();
        $this->possibleHoursService = new PossibleHoursService();
    }

    public function getByDay($day) {

        if ($day === null) {
            $day = date("Y-m-d");
        } else {
            $day = $day;
        }

        // get possible hours from possible hours service
        $possibleHoursList = $this->possibleHoursService->getPossibleHours();

        // get list of salles from salle service
        $salleList = $this->salleService->getSalles();

        $reservationListByHour = array();

        foreach($possibleHoursList as $hour) {
            // get list of reservations from reservation service
            $reservationListByHour[$hour['hour']] = $this->reservationService->getReservationsByDayAndHour($day, $hour['id']);
        }

    	include("Views/ReservationListByDayView.php");
    }
}
?>

