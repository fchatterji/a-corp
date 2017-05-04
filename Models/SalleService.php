<?php

class SalleService {
    /* Service for salle entities */

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getSalleList() {
        /* get all salles */
    	$stmt = $this->connection->prepare("
            SELECT * FROM salle
            ORDER BY salle.name
            ");

    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        
        $result = $stmt->fetchall();

        return $result;
    }

    public function getSalleById($salleId) {
        /* get a single salle with the given id */
    	$stmt = $this->connection->prepare("
            SELECT * 
            FROM salle 
            WHERE id=:salleId
        ");

    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;
    }

    public function createSalle() {
        /* create a salle */

        $name = $_POST['name'];
        $places = $_POST['places'];
        
    	$stmt = $this->connection->prepare("
            INSERT INTO salle (id, name, places) 
            VALUES (NULL, :name, :places)
        ");

    	$stmt->bindParam(':name', $name);
    	$stmt->bindParam(':places', $places);
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

