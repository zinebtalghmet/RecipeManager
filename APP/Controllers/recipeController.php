<?php
require_once __DIR__ .'/../Models/recipe.php';

class RecipeController {
    private $recipeModel;

    public function __construct()
    {
        $this->recipeModel = new Recipe();
    }

    public function index(){
        $recipes = $this->recipeModel->getAllRecipe();
        require_once __DIR__ .'/../Views/user/dashboard.php';
    }

    public function createRecipe(){
        require_once __DIR__ .'/../Views/user/addRecipe.php';
    }
}
?>