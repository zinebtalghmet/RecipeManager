<?php
require_once __DIR__ . '/db.php';

class Rating {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function rate($user_id, $recipe_id, $rating){
        $sql = 'INSERT INTO ratings (user_id, recipe_id, rating) VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE rating = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $recipe_id, $rating, $rating]);
    }

    public function getUserRating($user_id, $recipe_id){
        $sql = 'SELECT rating FROM ratings WHERE user_id = ? AND recipe_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $recipe_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['rating'] : 0;
    }

    public function getAverageRating($recipe_id){
        $sql = 'SELECT AVG(rating) as avg_rating FROM ratings WHERE recipe_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$recipe_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['avg_rating'] ? round((float)$row['avg_rating'], 1) : 0;
    }

    public function getAllAverages(){
        $sql = 'SELECT recipe_id, AVG(rating) as avg_rating FROM ratings GROUP BY recipe_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = [];
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $result[$row['recipe_id']] = round((float)$row['avg_rating'], 1);
        }
        return $result;
    }

    public function getAllUserRatings($user_id){
        $sql = 'SELECT recipe_id, rating FROM ratings WHERE user_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        $result = [];
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $result[$row['recipe_id']] = (int)$row['rating'];
        }
        return $result;
    }
}
?>
