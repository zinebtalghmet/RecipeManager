<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
    exit();
}
require_once __DIR__ .'/APP/Controllers/recipeController.php';
$recipe = new RecipeController();
$recipes = $recipe ->createRecipe();

?>