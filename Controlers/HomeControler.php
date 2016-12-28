<?php
class HomeControler {

    public function __construct() {
        $this->get();
    }

    public function get() {
        include("Views/HomeView.php");
    }
}

