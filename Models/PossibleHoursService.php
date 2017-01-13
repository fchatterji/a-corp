<?php

class PossibleHoursService {
    /* Possible hours service

    Possible hours is a set of all possible start dates
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getPossibleHours() {
        /* get all possible hours, without the seconds */
        $stmt = $this->connection->prepare("
            SELECT possiblehours.id, 
            DATE_FORMAT(possiblehours.hour, '%H:%i') AS hour 
            FROM possiblehours
        ");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;
    }

}

?>

