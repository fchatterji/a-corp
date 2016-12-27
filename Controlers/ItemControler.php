<?php
require_once "Models\ItemService.php";

class ItemControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new ItemService();
    }
    
    public function get($id) {
        $item = $this->service->getItem($id);
        include("Views/getItemDetail.php");   
    }
    
    public function put($id) {
        $item = $this->service->putItem($id);
        include("Views/getItemDetail.php");  
    }

    public function delete($id) {
        $item = $this->service->deleteItem($id);
        include("Views/getItemDetail.php");  
    }
}

