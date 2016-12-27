<?php

require_once "Item.php";

class ItemService {

    var $items = [];
    var $bdd;

    public function __construct() {
        $this->bdd = Connexion::init();
    }

    public function getItems() {
        $resultats = $this->bdd->query("SELECT * FROM item");
        
        $data = $resultats->fetchAll(PDO::FETCH_OBJ);
        
        $items = [];
        foreach($data as $d)
        {
            $item = new Item();
            $item->id = (int)$d->id;
            $item->created = $d->created;
            $item->name = $d->name;
            $item->description = $d->description;
            $item->category = $d->category;
            
            $items[] = $item;
            
        }
        return json_encode ( $items );
    }

    public function postItem() {
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $this->bdd->prepare("INSERT INTO item (id, created, name, category, description) VALUES (NULL, CURRENT_TIMESTAMP, :name, :category, :description)");
        $stmt->bindParam(':name', $data["name"]);
        $stmt->bindParam(':category', $data["category"]);
        $stmt->bindParam(':description', $data["description"]);
        $stmt->execute(); 

        $lastInsertId = $this->bdd->lastInsertId(); 

        $stmt = $this->bdd->prepare("SELECT * FROM item WHERE id=:id");
        $stmt->bindParam(':id', $lastInsertId);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $item = new Item();
        $item->id = (int)$data->id;
        $item->created = $data->created;
        $item->name = $data->name;
        $item->description = $d->description;
        $item->category = $d->category;

        return json_encode( $item );
    }

    public function deleteItem($id) {
        $stmt = $this->bdd->prepare("DELETE FROM item WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return;
    }

    public function getItem($id) {
        $stmt = $this->bdd->prepare("SELECT * FROM item WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        
        $item = new Item();
        $item->id = (int)$data->id;
        $item->created = $data->created;
        $item->name = $data->name;
        $item->description = $data->description;
        $item->category = $data->category;
            
        return json_encode ( $item );
    }

}

