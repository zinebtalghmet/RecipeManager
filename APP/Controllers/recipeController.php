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
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $title = $_POST['title'];
            $category = $_POST['category_id'];
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $time = $_POST['time'];
            $portions = $_POST['portions'];

            $this->recipeModel->creatRecipe($title, $category, $ingredients, $instructions, $time, $portions);

            header('Location: dashboard.php');
            exit();
        }
        require_once __DIR__ .'/../Views/user/addRecipe.php';
    }
}
?>