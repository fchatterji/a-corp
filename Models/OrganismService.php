<?php

class OrganismService {
    /* Organism service
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getOrganisms($userId) {
        /* get all organisms for a given user */
        print_r($userId);
        $stmt = $this->connection->prepare("
            SELECT *
            FROM membership 
            JOIN users on membership.userId = users.id
            JOIN organism on membership.organismId = organism.id
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $organisms = $stmt->fetchall();

        return $organisms;
    }

}

?>
