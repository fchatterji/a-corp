<?php

class SalleListControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
    	$this->service = new SalleService();
    }

    public function get() {
    	$salleList = $this->service->getSalles();
    	include("Views/SalleListView.php");
    }
}
?>

