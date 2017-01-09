<?php

class ReservationService {
    /* Service for reservation entities */

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getReservationList() {
        /* get all reservations */
    	$stmt = $this->connection->prepare("SELECT * FROM reservation");
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

    	return $result;
    }

    public function getReservationsByDayAndHour($day, $hourId) {
        /* get all reservations for a given day and hour */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM salle 
            LEFT JOIN (
                SELECT * 
                FROM reservation 
                WHERE reservation.day = :day 
                AND reservation.hourId = :hourId
                ) AS filteredReservation 
            ON salle.id = filteredReservation.salleId 
            ORDER BY salle.name
            ");

        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':hourId', $hourId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result;
    }

    public function getReservationById($id) {
        /* get a single reservation with a given id */
    	$stmt = $this->connection->prepare("
            SELECT *
            FROM reservation 
            JOIN salle ON reservation.salleId = salle.id 
            JOIN possiblehours ON reservation.hourId = possiblehours.id 
            WHERE reservation.id = :id 
            ");

    	$stmt->bindParam(':id', $id);
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;	
    }

    public function createReservation() {
        /* insert a new reservation in the database */

        $salleId = $_POST['salleId'];
        $day = $_POST['day'];
        $hourId = $_POST['hourId']; 
        $numGuests = $_POST['numGuests']; 
        $userId = $_POST['userId']; 
        $title = $_POST['title'];

    	$stmt = $this->connection->prepare("
            INSERT INTO reservation (id, salleId, day, hourId, numGuests, userId, title) 
            VALUES (NULL, :salleId, :day, :hourId, :numGuests, :userId, :title)
            ");

    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
    	$stmt->bindParam(':hourId', $hourId);
        $stmt->bindParam(':numGuests', $numGuests);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':title', $title);
    	$stmt->execute();
    }

    public function updateReservation($id) {
        /* update a reservation */

        $salleId = $_POST['salleId'];
        $day = $_POST['day'];
        $hourId = $_POST['hourId']; 
        $numGuests = $_POST['numGuests']; 
        $userId = $_POST['userId']; 
        $title = $_POST['title'];

    	$stmt = $this->connection->prepare("
            UPDATE reservation 
            SET salleId=:salleId, day=:day, hourId=:hourId, numGuests=:numGuests, userId=:userId, title=:title
            WHERE id=:id
            ");

    	$stmt->bindParam(':id', $id);
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
    	$stmt->bindParam(':hourId', $hourId);
        $stmt->bindParam(':numGuests', $numGuests);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':title', $title);
    	$stmt->execute(); 	
    }

    public function deleteReservation($id) {
        /* delete a reservation */
    	$stmt = $this->connection->prepare("DELETE FROM reservation WHERE id=:id");

    	$stmt->bindParam(':id', $id);
    	$stmt->execute();
    }
}

