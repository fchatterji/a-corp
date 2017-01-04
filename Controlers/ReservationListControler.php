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

    public function get() {
    	$reservationList = $this->reservationService->getReservations();
    	include("Views/ReservationListView.php");
    }

    public function getByDay($day) {

        // get possible hours from possible hours service
        $possibleHoursList = $this->possibleHoursService->getPossibleHours();

        // get list of salles from salle service
        $salleList = $this->salleService->getSalles();

        $day = $day;

        $reservationListByHour = array();

        foreach($possibleHoursList as $hour) {
            // get list of reservations from reservation service
            $reservationListByHour[$hour['hour']] = $this->reservationService->getReservationsByDayAndHour($day, $hour['id']);
        }

        $count = count($reservationListByHour);
        $result = array();
        for ($i = 0; $i < $count; $i++) {
            $result = array_merge($result, array_column($reservationListByHour, $i));
        }
    	include("Views/ReservationListByDayView.php");
    }
}
?>

