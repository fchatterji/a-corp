<?php

class SalleService {

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getSalles() {
    	$stmt = $this->connection->prepare("SELECT * FROM salle");
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }

    public function getSalleById($id) {
    	$stmt = $this->connection->prepare("SELECT * FROM salle WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt; 	
    }

    public function createSalle($name, $places) {
    	$stmt = $this->connection->prepare("INSERT INTO salle (id, name, places) VALUES (NULL, :name, :places)");
    	$stmt->bindParam(':name', $name);
    	$stmt->bindParam(':places', $places);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }

    public function updateSalle($id, $name, $places) {
    	$stmt = $this->connection->prepare("UPDATE salle SET name=:name, places=:places WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->bindParam(':name', $name);
    	$stmt->bindParam(':places', $places);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;   	
    }

    public function deleteSalle($id) {
    	$stmt = $this->connection->prepare("DELETE FROM salle WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }
}

