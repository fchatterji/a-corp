<?php
class HomeControler {
	/* handles requests for the home page */

    public function get() {
    	// display the home page
        include("Views/HomeView.php");
    }
}

