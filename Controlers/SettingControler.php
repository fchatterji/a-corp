<?php

class SettingControler {
    /* Handle requests that concern setting entities */
    var $settingService;
    var $authService;
    
    public function __construct() {
        $this->settingService = new SettingService();
        $this->authService = new AuthService();
    }

    public function get($organismId) {
        /* display a list of settings */
        $userId = $this->authService->getUserId();
        $userName = $this->authService->getUserName();
        $settingList = $this->settingService->getSettings($organismId);
        include("Views/SettingListView.php");
    }

    public function post($organismId) {
        /* create a setting and redirect */
        $this->settingService->createSetting($organismId);
        header("Location: /{$organismId}/settings");
        exit(); 
    }

    public function put($organismId, $settingId) {
        /* update a setting and redirect */
        $this->settingService->updateSetting($settingId);
        header("Location: /{$organismId}/settings");
        exit(); 
    }

    public function delete($organismId, $settingId) {
        /* delete a setting and redirect */
        $this->settingService->deleteSetting($settingId);
        header("Location: /{$organismId}/settings");
        exit(); 
    }
}
?>