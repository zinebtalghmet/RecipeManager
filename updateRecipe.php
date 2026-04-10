<?php

require_once __DIR__ .'/APP/Controllers/recipeController.php';
require_once __DIR__ .'/APP/Controllers/CategoryController.php';

$recipe = new RecipeController();
$recipes = $recipe ->updateRecipe();

$catController = new CategoryController();
$cats = $catController->getAllCategories();

?>