<?php
require_once "Models\CategoryService.php";

class CategoriesControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new CategoryService();
    }

    public function get() {
        $categories = $this->service->getCategories();
        include("views/getCategoryList.php");
    }

    public function post() {
        $category = $this->service->postCategory();
        include("views/postCategory.php");
    }
}

