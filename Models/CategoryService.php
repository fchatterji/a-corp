<?php

require_once "Category.php";

class CategoryService {

    var $categories = [];
    var $bdd;

    public function __construct() {
        $this->bdd = Connexion::init();
    }

    public function getCategories() {
        $resultats = $this->bdd->query("SELECT * FROM category");
        
        $data = $resultats->fetchAll(PDO::FETCH_OBJ);
        
        $categories = [];
        foreach($data as $c)
        {
            $category = new Category();
            $category->id = (int)$c->id;
            $category->created = $c->created;
            $category->name = $c->name;
            
            $categories[] = $category;
            
        }
        return json_encode ( $categories );
    }

    public function postCategory() {
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $this->bdd->prepare("INSERT INTO category (id, created, name) VALUES (NULL, CURRENT_TIMESTAMP, :name)");
        $stmt->bindParam(':name', $data["name"]);
        $stmt->execute(); 

        $lastInsertId = $this->bdd->lastInsertId(); 

        $stmt = $this->bdd->prepare("SELECT * FROM category WHERE id=:id");
        $stmt->bindParam(':id', $lastInsertId);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $category = new Category();
        $category->id = (int)$data->id;
        $category->created = $data->created;
        $category->name = $data->name;

        return json_encode( $category );
    }

    public function deleteCategory($id) {
        $stmt = $this->bdd->prepare("DELETE FROM Category WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo 'test';   
        return;
    }

    public function getCategory($id) {
        $stmt = $this->bdd->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        
        $category = new Category();
        $category->id = (int)$data->id;
        $category->created = $data->created;
        $category->name = $data->name;
            
        return json_encode ( $category );
    }

}

