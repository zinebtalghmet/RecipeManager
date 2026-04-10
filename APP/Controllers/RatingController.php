<?php
require_once __DIR__ . '/../Models/rating.php';

class RatingController {
    private $ratingModel;

    public function __construct(){
        $this->ratingModel = new Rating();
    }

    public function rate($user_id, $recipe_id, $rating){
        $this->ratingModel->rate($user_id, $recipe_id, $rating);
    }

    public function getAllAverages(){
        return $this->ratingModel->getAllAverages();
    }

    public function getAllUserRatings($user_id){
        return $this->ratingModel->getAllUserRatings($user_id);
    }
}
?>
