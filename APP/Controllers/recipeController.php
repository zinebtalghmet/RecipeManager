<?php
require_once __DIR__ .'/../Models/recipe.php';
require_once __DIR__ .'/../Models/category.php';

class RecipeController {
    private $recipeModel;
    private $categoryModel;

    public function __construct()
    {
        $this->recipeModel = new Recipe();
        $this->categoryModel = new Category();
    }

    public function index(){

        $recipes = $this->recipeModel->getAllRecipe();
        require_once __DIR__ .'/../Views/user/dashboard.php';
    }

    public function createRecipe(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Handle add category
            if(isset($_POST['add_category'])){
                $cat_name = trim($_POST['cat_name']);
                if(!empty($cat_name)){
                    $this->categoryModel->addCategory($cat_name);
                }
                header('Location: addRecipe.php');
                exit();
            }

            // Handle delete category
            if(isset($_GET['delete_cat'])){
                $this->categoryModel->deleteCategory($_GET['delete_cat']);
                header('Location: addRecipe.php');
                exit();
            }

            // Handle add recipe
            $title = $_POST['title'];
            $category = $_POST['category_id'];
            $ingredients = $_POST['ingredients'];
            $instructions = $_POST['instructions'];
            $time = $_POST['time'];
            $portions = $_POST['portions'];

            $this->recipeModel->creatRecipe($title, $ingredients, $instructions, $time, $portions, $category);

            header('Location: dashboard.php');
            exit();
        }

        // Handle delete category via GET
        if(isset($_GET['delete_cat'])){
            $this->categoryModel->deleteCategory($_GET['delete_cat']);
            header('Location: addRecipe.php');
            exit();
        }

        $cats = $this->categoryModel->getAllCategories();
        require_once __DIR__ .'/../Views/user/addRecipe.php';
    }
}
?>