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
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $time = $_POST['time'];
            $portions = $_POST['portions'];
            $user_id = $_SESSION['user_id'];
            $category = $_POST['category_id'];


            $this->recipeModel->creatRecipe($title, $ingredients, $instructions, $time, $portions, $user_id, $category);

            header('Location: dashboard.php');
            exit();
        }
    }
}

?>
