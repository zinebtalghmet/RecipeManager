<?php
require_once __DIR__ . '/../Models/favorite.php';

class FavoriteController {
    private $favoriteModel;

    public function __construct(){
        $this->favoriteModel = new Favorite();
    }

    public function toggle($user_id, $recipe_id){
        return $this->favoriteModel->toggle($user_id, $recipe_id);
    }

    public function getUserFavorites($user_id){
        return $this->favoriteModel->getUserFavorites($user_id);
    }
}
?>
