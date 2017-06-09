<?php

class SettingService {
    /* Settings service

    Possible hours is a set of all possible start dates
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getSettings($organismId) {
        /* get all settings */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM setting
            WHERE organismId = :organismId
        ");

        $stmt->bindParam(':organismId', $organismId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $settings = $stmt->fetchall();

        return $settings;
    }

    public function createSetting($organismId, $setting=null, $value=null) {
        /* create a setting */

        isset($setting) || $setting = $_POST['setting'];
        isset($value) || $value = $_POST['value'];
        
        $stmt = $this->connection->prepare("
            INSERT INTO setting (id, setting, value, organismId) 
            VALUES (NULL, :setting, :value, :organismId)
        ");

        $stmt->bindParam(':setting', $setting);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':organismId', $organismId);
        $stmt->execute();
    }

    public function updateSetting($settingId) {
        /* update a setting */

        $setting = $_POST['setting'];
        $value = $_POST['value'];

        $stmt = $this->connection->prepare("
            UPDATE setting 
            SET setting=:setting, value=:value 
            WHERE id=:settingId
        ");

        $stmt->bindParam(':settingId', $settingId);
        $stmt->bindParam(':setting', $setting);
        $stmt->bindParam(':value', $value);
        $stmt->execute();   
    }

    public function deleteSetting($settingId) {
        /* delete a setting */
        $stmt = $this->connection->prepare("
            DELETE FROM setting 
            WHERE id=:settingId
        ");

        $stmt->bindParam(':settingId', $settingId);
        $stmt->execute();
    }
}

?>

