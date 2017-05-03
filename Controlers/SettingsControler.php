<?php

class SettingsControler {
    /* Handle requests that concern salle entities */
    var $settingsService;
    var $authService;
    
    public function __construct() {
        $this->settingsService = new SettingsService();
        $this->authService = new AuthService();
    }

    public function get() {
        /* display a list of settings */
        $userId = $this->authService->getUserId();
        $settings = $this->settingsService->getSettings($userId);
        include("Views/SettingsView.php");
    }
}
?>