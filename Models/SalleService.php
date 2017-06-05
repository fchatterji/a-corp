<?php

class SalleService {
    /* Service for salle entities */

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getSalleList($organismId) {
        /* get all salles */
    	$stmt = $this->connection->prepare("
            SELECT * FROM salle
            WHERE organismId = :organismId
            ORDER BY salle.name
            ");

        $stmt->bindParam(':organismId', $organismId);
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        
        $result = $stmt->fetchall();

        return $result;
    }

    public function getSalleByIdAndOrganism($organismId, $salleId) {
        /* get a single salle with the given id */
    	$stmt = $this->connection->prepare("
            SELECT * 
            FROM salle 
            WHERE id=:salleId
            AND organismId = :organismId
        ");

    	$stmt->bindParam(':salleId', $salleId);
        $stmt->bindParam(':organismId', $organismId);
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;
    }

    public function createSalle($organismId) {
        /* create a salle */

        $name = $_POST['name'];
        $places = $_POST['places'];
        
    	$stmt = $this->connection->prepare("
            INSERT INTO salle (id, name, places, organismId) 
            VALUES (NULL, :name, :places, :organismId)
        ");

    	$stmt->bindParam(':name', $name);
    	$stmt->bindParam(':places', $places);
        $stmt->bindParam(':organismId', $organismId);
    	$stmt->execute();
    }

    public function updateSalle($salleId) {
        /* update a salle */

        $name = $_POST['name'];
        $places = $_POST['places'];

    	$stmt = $this->connection->prepare("
            UPDATE salle 
            SET name=:name, places=:places 
            WHERE id=:salleId
        ");

    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':name', $name);
    	$stmt->bindParam(':places', $places);
    	$stmt->execute();	
    }

    public function deleteSalle($salleId) {
        /* delete a salle */
    	$stmt = $this->connection->prepare("
            DELETE FROM salle 
            WHERE id=:salleId
        ");

    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->execute();
    }
}

