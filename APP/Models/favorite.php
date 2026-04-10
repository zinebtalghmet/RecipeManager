<?php
require_once __DIR__ . '/db.php';

class Favorite {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function toggle($user_id, $recipe_id){
        if($this->isFavorite($user_id, $recipe_id)){
            $sql = 'DELETE FROM favorites WHERE user_id = ? AND recipe_id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id, $recipe_id]);
            return false;
        } else {
            $sql = 'INSERT INTO favorites (user_id, recipe_id) VALUES (?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id, $recipe_id]);
            return true;
        }
    }

    public function isFavorite($user_id, $recipe_id){
        $sql = 'SELECT id FROM favorites WHERE user_id = ? AND recipe_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $recipe_id]);
        return $stmt->fetch() ? true : false;
    }

    public function getUserFavorites($user_id){
        $sql = 'SELECT recipe_id FROM favorites WHERE user_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'recipe_id');
    }
}
?>
