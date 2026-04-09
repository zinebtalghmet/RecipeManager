<?php
// Point d'entrée dyal page addRecipe
// Kay-utiliser 2 controllers séparés: CategoryController + RecipeController
//session_start();

// Vérifier ila l'utilisateur connecté — sinon rje3 l login
//if(!isset($_SESSION['user_id'])){
    //header('Location: index.php');
   // exit();
//}

require_once __DIR__ .'/APP/Controllers/CategoryController.php';
require_once __DIR__ .'/APP/Controllers/recipeController.php';

// === Category operations ===
$catController = new CategoryController();
$catController->addCategory();    // Handle ajout categorie (POST)
$catController->deleteCategory(); // Handle suppression categorie (GET)
$cats = $catController->getAllCategories(); // Charger categories l dropdown

// === Recipe operations ===
$recipe = new RecipeController();
$recipe->createRecipe();

require_once __DIR__ .'/APP/Views/user/addRecipe.php';
?>
