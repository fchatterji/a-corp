<?php

class SettingsService {
    /* Settings service

    Possible hours is a set of all possible start dates
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getSettings($userId) {
        /* get all settings */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM settings
            WHERE userId=:userId
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $settings = $stmt->fetchall();

        return $settings;
    }

}

?>

