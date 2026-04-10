<?php
require_once __DIR__ .'/APP/Controllers/recipeController.php';

// === Recipe operations ===
$recipe = new RecipeController();
$recipe->createRecipe();

?>
