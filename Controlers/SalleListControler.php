<?php

class SalleListControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
    	$this->service = new SalleService();
        $this->get();
    }

    public function get() {
    	$salleList = $this->service->getSalles();
    	include("views/SalleListView.php");
    }
}
?>

