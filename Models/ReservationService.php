<?php

class ReservationService {
    /* Service for reservation entities */

	var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getReservationsByDay($day) {

        $stmt = $this->connection->prepare("
            SELECT reservation.id, reservation.salleId, reservation.day, reservation.startHourId, reservation.endHourId, reservation.numGuests, reservation.userId, reservation.title, salle.name, salle.places, possiblehours.hour
            FROM reservation 
            JOIN salle ON salle.id = reservation.salleId
            JOIN possiblehours on possiblehours.id = reservation.startHourId
            WHERE reservation.day = :day
            ");

        $stmt->bindParam(':day', $day);
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
        $startHourId = $_POST['startHourId']; 
        $endHourId = $_POST['endHourId'];
        $numGuests = $_POST['numGuests']; 
        $userId = $_POST['userId']; 
        $title = $_POST['title'];

    	$stmt = $this->connection->prepare("
            INSERT INTO reservation (id, salleId, day, startHourId, endHourId, numGuests, userId, title) 
            VALUES (NULL, :salleId, :day, :startHourId, :endHourId, :numGuests, :userId, :title)
            ");

    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
    	$stmt->bindParam(':startHourId', $startHourId);
        $stmt->bindParam(':endHourId', $endHourId);
        $stmt->bindParam(':numGuests', $numGuests);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':title', $title);
    	$stmt->execute();
    }

    public function updateReservation($id) {
        /* update a reservation */

        $salleId = $_POST['salleId'];
        $day = $_POST['day'];
        $startHourId = $_POST['startHourId']; 
        $endHourId = $_POST['endHourId'];
        $numGuests = $_POST['numGuests']; 
        $userId = $_POST['userId']; 
        $title = $_POST['title'];

    	$stmt = $this->connection->prepare("
            UPDATE reservation 
            SET salleId=:salleId, day=:day, startHourId=:startHourId, endHourId=:endHourId, numGuests=:numGuests, userId=:userId, title=:title
            WHERE id=:id
            ");

    	$stmt->bindParam(':id', $id);
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
        $stmt->bindParam(':startHourId', $startHourId);
        $stmt->bindParam(':endHourId', $endHourId);
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

