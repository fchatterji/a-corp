<?php

class PossibleHoursService {

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getPossibleHours() {
        $stmt = $this->connection->prepare("SELECT * FROM possiblehours");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;
    }

}

?>

