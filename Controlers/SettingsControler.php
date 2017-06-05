<?php

class SettingsControler {
    /* Handle requests that concern salle entities */
    var $settingsService;
    var $authService;
    
    public function __construct() {
        $this->settingsService = new SettingsService();
        $this->authService = new AuthService();
    }

    public function get($organismId) {
        /* display a list of settings */
        $userId = $this->authService->getUserId();
        $userName = $this->authService->getUserName();
        $settings = $this->settingsService->getSettings($userId, $organismId);
        include("Views/SettingsView.php");
    }
}
?>