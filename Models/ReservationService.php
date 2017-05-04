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

    public function getReservationById($reservationId) {
        /* get a single reservation with a given id */
    	$stmt = $this->connection->prepare("
            SELECT *
            FROM reservation 
            JOIN salle ON reservation.salleId = salle.id 
            JOIN possiblehours ON reservation.hourId = possiblehours.id 
            WHERE reservation.id = :reservationId 
            ");

    	$stmt->bindParam(':reservationId', $reservationId);
    	$stmt->execute();

    	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;	
    }

    public function isAlreadyBooked($salleId, $day, $startHourId, $endHourId, $id=0) {

        $stmt = $this->connection->prepare("
            SELECT *
            FROM reservation
            JOIN possiblehours ON reservation.startHourId = possiblehours.id
            WHERE (
            (:startHourId >= startHourId AND :startHourId < endHourId)
            OR (:endHourId > startHourId AND :endHourId <= endHourId)
            )
            AND reservation.day = :day 
            AND reservation.salleId = :salleId
            AND reservation.id != :id
            ");

        $stmt->bindParam(':salleId', $salleId);
        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':startHourId', $startHourId);
        $stmt->bindParam(':endHourId', $endHourId);
        $stmt->bindParam(':id', $id);
        $stmt->execute();    

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        if (count($result) > 0) {
            $isBooked = true;
        } else {
            $isBooked = false;
        }
        
        return $isBooked;
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

        if ($this->isAlreadyBooked($salleId, $day,$startHourId, $endHourId)) {
            return array("error" => true, "message" => "Ce créneau est déjà réservé.");
        }

        if ($startHourId >= $endHourId) {
            return array("error" => true, "message" => "La date de début intervient après la date de fin.");
        }

        include 'Tools/isValidDay.php';
        if (!isValidDay($day)) {
            return array("error" => true, "message" => "Le format de jour choisi n'est pas valide.");
        }

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

        return array("error" => false, "message" => "La réservation a bien été créée.");
    }

    public function updateReservation($reservationId) {
        /* update a reservation */

        $salleId = $_POST['salleId'];
        $day = $_POST['day'];
        $startHourId = $_POST['startHourId']; 
        $endHourId = $_POST['endHourId'];
        $numGuests = $_POST['numGuests']; 
        $userId = $_POST['userId']; 
        $title = $_POST['title'];

        if ($this->isAlreadyBooked($salleId, $day,$startHourId, $endHourId, $reservationId)) {
            return array("error" => true, "message" => "Ce créneau est déjà réservé.");
        }

        if ($startHourId >= $endHourId) {
            return array("error" => true, "message" => "La date de début intervient après la date de fin.");
        }

        include 'Tools/isValidDay.php';
        if (!isValidDay($day)) {
            return array("error" => true, "message" => "Le format de jour choisi n'est pas valide.");
        }


    	$stmt = $this->connection->prepare("
            UPDATE reservation 
            SET salleId=:salleId, 
                day=:day, 
                startHourId=:startHourId, 
                endHourId=:endHourId, 
                numGuests=:numGuests, 
                userId=:userId, 
                title=:title
            WHERE id=:reservationId
            ");

    	$stmt->bindParam(':reservationId', $reservationId);
    	$stmt->bindParam(':salleId', $salleId);
    	$stmt->bindParam(':day', $day);
        $stmt->bindParam(':startHourId', $startHourId);
        $stmt->bindParam(':endHourId', $endHourId);
        $stmt->bindParam(':numGuests', $numGuests);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':title', $title);
    	$stmt->execute(); 	

        return array("error" => false, "message" => "La réservation a bien été mise à jour.");
    }

    public function deleteReservation($reservationId) {
        /* delete a reservation */
    	$stmt = $this->connection->prepare("
            DELETE FROM reservation 
            WHERE id=:reservationId
        ");

    	$stmt->bindParam(':reservationId', $reservationId);
    	$stmt->execute();
    }
}

