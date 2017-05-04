<?php

class MembershipService {
    /* Membership service
    */

    var $connection;

    public function __construct() {
        
        $this->connection = Connexion::init();
    }

    public function createMembership($userId, $organismId, $role) {
        /* create an membership */
        
        $stmt = $this->connection->prepare("
            INSERT INTO membership (id, user, organism, role) 
            VALUES (NULL, :user, :organism, :role)
        ");

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':organism', $organism);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

    }

    public function getMembershipListByOrganism($organismId) {
        /* get memberships of an organism */
        $stmt = $this->connection->prepare("
            SELECT *
            FROM membership 
            WHERE organismId = :organismId 
            ");

        $stmt->bindParam(':organismId', $organismId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchall();

        return $result; 

    }
}

?>
