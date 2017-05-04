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
        ");

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $organisms = $stmt->fetchall();

        return $organisms;
    }

    public function createOrganism() {
        /* create an organism */

        $name = $_POST['name'];
        
        $stmt = $this->connection->prepare("INSERT INTO organism (id, name) VALUES (NULL, :name)");

        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    public function updateOrganism($id) {
        /* update an organism */

        $name = $_POST['name'];

        $stmt = $this->connection->prepare("UPDATE organism SET name=:name WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->execute();   
    }

    public function deleteOrganism($id) {
        /* delete an organism */
        $stmt = $this->connection->prepare("DELETE FROM organism WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

?>
