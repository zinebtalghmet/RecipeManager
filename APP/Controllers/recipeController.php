<?php
require_once __DIR__ .'/../Models/recipe.php';
require_once __DIR__ .'/CategoryController.php';
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
        $catController = new CategoryController();
        $cats = $catController->getAllCategories();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $title = $_POST['title'];
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $prep_time = (int)$_POST['prep_time'];
            $cook_time = (int)$_POST['cook_time'];
            $portions = $_POST['portions'];
            $user_id = $_SESSION['user_id'];
            $category = $_POST['category_id'];

            $image = null;
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid('recipe_') . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../uploads/' . $filename);
                $image = $filename;
            }

            $this->recipeModel->creatRecipe($title, $ingredients, $instructions, $prep_time, $cook_time, $portions, $user_id, $category, $image);
            header('Location: dashboard.php');
            exit();
        }
        require_once __DIR__ .'/../Views/user/addRecipe.php';
    }

    public function updateRecipe(){

        $catController = new CategoryController();
        $cats = $catController->getAllCategories();
        
        $id = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id = $_POST['id'];
            $title = $_POST['title'];
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $prep_time = (int)$_POST['prep_time'];
            $cook_time = (int)$_POST['cook_time'];
            $portions = $_POST['portions'];
            $category = $_POST['category_id'];

            $image = null;
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid('recipe_') . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../uploads/' . $filename);
                $image = $filename;
            }

            $this->recipeModel->update($id, $title, $ingredients, $instructions, $prep_time, $cook_time, $portions, $category, $image);

            header('Location: dashboard.php');
            exit();
        }
        $recipe = $this->recipeModel->getRecipeById($id);
        require_once __DIR__ .'/../Views/user/editRecipe.php';

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