<?php

require_once __DIR__ .'/APP/Controllers/recipeController.php';
$recipe = new RecipeController();
$recipes = $recipe ->deleteRecipe();

?>