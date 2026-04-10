<?php

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
