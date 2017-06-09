<?php

class OrganismService {
    /* Organism service
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function getOrganismList($userId) {
        /* get all organisms for a given user */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM organism 
            LEFT JOIN 
                (SELECT userId, organismId, role FROM membership WHERE userId=:userId) AS m 
            ON organism.id=m.organismId
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $organisms = $stmt->fetchall();

        return $organisms;
    }

    public function getOrganismListByUser($userId) {
        /* get all organisms for a given user */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM organism
            JOIN membership ON organism.id=membership.organismId
            WHERE membership.userId=:userId
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $organisms = $stmt->fetchall();

        return $organisms;
    }
    
    public function getLastCreatedOrganismId() {
        /* get the id of the last created organism */
        $stmt = $this->connection->prepare("
            SELECT MAX(id)
            FROM organism 
        ");

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result['MAX(id)'];    
    }

    public function createOrganism() {
        /* create an organism */

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $name = 'default';
        }

        
        $stmt = $this->connection->prepare("
            INSERT INTO organism (id, name, logo) 
            VALUES (NULL, :name, :logo)
        ");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':logo', $logo);
        $stmt->execute();
    }

    public function updateOrganism($organismId) {
        /* update an organism */

        $name = $_POST['name'];
        $logo = $_POST['logo'];

        $stmt = $this->connection->prepare("
            UPDATE organism 
            SET name=:name, logo=:logo 
            WHERE id=:organismId
        ");

        $stmt->bindParam(':organismId', $organismId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':logo', $logo);
        $stmt->execute();   
    }

    public function deleteOrganism($organismId) {
        /* delete an organism */
        $stmt = $this->connection->prepare("
            DELETE FROM organism 
            WHERE id=:organismId
        ");

        $stmt->bindParam(':organismId', $organismId);
        $stmt->execute();
    }

    public function findCurrentUserOrganism($userId) {
        /* find the organism of the current user */
        $stmt = $this->connection->prepare("
            SELECT organism.id
            FROM organism
            JOIN membership ON organism.id=membership.organismId
            WHERE membership.userId=:userId
            AND membership.role = 'owner'
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;
    }
}

?>
