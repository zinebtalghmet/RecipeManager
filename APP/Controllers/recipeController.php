<?php
require_once __DIR__ .'/../Models/recipe.php';
        session_start();
if(!isset($_SESSION['user_id'])){
    
            header('Location: index.php');
            exit();
        }

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

            exit();
        }
        require_once __DIR__ .'/../Views/user/addRecipe.php';
    }







    

    public function updateRecipe(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $recipes = $this->recipeModel->getAllRecipe();


            $id = $_POST['id'];
            $title = $_POST['title'];
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $time = $_POST['time'];
            $portions = $_POST['portions'];
            $category = $_POST['category_id'];

            $this->recipeModel->update($id, $title, $ingredients, $instructions, $time, $portions, $category);

            header('Location: dashboard.php');
            exit();
        }
    }



















    public function deleteRecipe(){
        session_start();

        if(!isset($_SESSION['user_id'])){
            header('Location: index.php');
            exit();
        }

        $id = $_GET['id'];

        $this->recipeModel->delete($id);

        header('Location: dashboard.php');
        exit();
    }
}
?>