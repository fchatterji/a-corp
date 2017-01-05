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
        /* get all possible hours */
        $stmt = $this->connection->prepare("SELECT * FROM possiblehours");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;
    }

}

?>

