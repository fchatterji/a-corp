<?php
require_once "Models\CategoryService.php";

class CategoryControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new CategoryService();
    }

    public function get($id) {
        $category = $this->service->getCategory($id);
        include("Views/getCategoryDetail.php");   
    }
    
    public function put($id) {
        $category = $this->service->putCategory($id);
        include("Views/getCategoryDetail.php");   
    }

    public function delete($id) {
        $this->service->deleteCategory($id); 
    }
}

