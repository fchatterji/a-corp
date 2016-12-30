<?php

class ReservationService {

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getReservations() {
    	$stmt = $this->connection->prepare("SELECT * FROM reservation");
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }

    public function getReservationsBySalle($salleId) {
    	$stmt = $this->connection->prepare("SELECT * FROM reservation WHERE id=:id");
    	$stmt->bindParam(':id', $salleId);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }

    public function getReservationsByDay($mysqldate) {
        $stmt = $this->connection->prepare("SELECT * FROM reservation WHERE debut >= :mysqldate AND debut < :mysqldate + INTERVAL 1 DAY");
        $stmt->bindParam(':mysqldate', $mysqldate);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        return $stmt;
    }

    public function getReservationById($id) {
    	$stmt = $this->connection->prepare("SELECT * FROM reservation WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt; 	
    }

    public function createReservation($salleId, $debut, $fin) {
    	$stmt = $this->connection->prepare("INSERT INTO reservation (id, salleId, debut, fin) VALUES (NULL, :salleId, :debut, :fin)");
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':debut', $debut);
    	$stmt->bindParam(':fin', $fin);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }

    public function updateReservation($id, $salleId, $debut, $fin) {
    	$stmt = $this->connection->prepare("UPDATE reservation SET salleId=:salleId, debut=:debut, fin=:fin WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':debut', $debut);
    	$stmt->bindParam(':fin', $fin);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;   	
    }

    public function deleteReservation($id) {
    	$stmt = $this->connection->prepare("DELETE FROM reservation WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 

    	return $stmt;
    }
}

