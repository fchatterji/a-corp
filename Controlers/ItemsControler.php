<?php
require_once "Models\ItemService.php";

class ItemsControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new ItemService();
    }

    public function get() {
        $items = $this->service->getItems();
        include("views/getItemList.php");
    }

    public function post() {
        $items = $this->service->postItem();
        include("views/getItemList.php");
    }
}

