<?php

class ReservationListControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
    	$this->service = new ReservationService();
    }

    public function get() {
    	$reservationList = $this->service->getReservations();
    	include("views/ReservationListView.php");
    }

    public function getByDay($date) {
        $date = (isset($date) ? $date : date('Y-m-d'));
        $phpdate = strtotime($date);
    	$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
    	$reservationList = $this->service->getReservationsByDay($mysqldate);
    	include("views/ReservationListByDayView.php");
    }
}
?>

