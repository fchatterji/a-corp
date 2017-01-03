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
        $result = $stmt->fetchall();

    	return $result;
    }

    public function getReservationsByDayAndHour($day, $hourId) {
        $stmt = $this->connection->prepare("
            SELECT filteredReservation.id
            FROM salle 
            LEFT JOIN (SELECT * FROM reservation WHERE reservation.day = :day AND reservation.hourId = :hourId) as filteredReservation 
            ON salle.id = filteredReservation.salleId 
            ORDER BY salle.name
            ");
        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':hourId', $hourId);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;
    }

    public function getReservationById($id) {
    	$stmt = $this->connection->prepare("SELECT possiblehours.hour, salle.name, reservation.id FROM reservation NATURAL JOIN salle NATURAL JOIN possiblehours WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	// set the resulting array to associative
    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;	
    }

    public function createReservation($salleId, $day, $hourId) {
    	$stmt = $this->connection->prepare("INSERT INTO reservation (id, salleId, day, hourId) VALUES (NULL, :salleId, :day, :hourId)");
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
    	$stmt->bindParam(':hourId', $hourId);
    	$stmt->execute();
    }

    public function updateReservation($id, $salleId, $day, $hourId) {
    	$stmt = $this->connection->prepare("UPDATE reservation SET salleId=:salleId, day=:day, hourId=:hourId WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
    	$stmt->bindParam(':hourId', $hourId);
    	$stmt->execute(); 	
    }

    public function deleteReservation($id) {
    	$stmt = $this->connection->prepare("DELETE FROM reservation WHERE id=:id");
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();
    }
}

