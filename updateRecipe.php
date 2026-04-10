<?php

require_once __DIR__ .'/APP/Controllers/recipeController.php';
require_once __DIR__ .'/APP/Controllers/CategoryController.php';

$catController = new CategoryController();
$cats = $catController->getAllCategories();

$recipe = new RecipeController();
$recipes = $recipe ->updateRecipe();

?>