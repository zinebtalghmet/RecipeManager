<?php
require_once __DIR__ .'/db.php';

class Recipe {
    private $conn;
    private $id;
    private $title;
    private $ingredients;
    private $instructions;
    private $time;
    private $portions;
    private $user_id;
    private $cat_id;
    private $created_at;

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getIngredients(){
        return $this->ingredients;
    }

    public function getInstructions(){
        return $this->instructions;
    }
    public function getTime(){
        return $this->time;
    }

    public function getPortions(){
        return $this->portions;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getCatId(){
        return $this->cat_id;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllRecipe(){

        $sql = 'SELECT recipes.*, categories.name AS categorie 
                FROM recipes
                LEFT JOIN categories ON recipes.cat_id = categories.id
                ORDER BY recipes.created_at DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
    // Créer recipe jdida — daba kay-sauvegarder 7ta user_id + l'ordre dyal params s7i7
    public function creatRecipe($title, $ingredients, $instructions, $time, $portions, $cat_id, $user_id){
        $sql = 'INSERT INTO recipes(title, ingredients, instructions, time, portions, cat_id, user_id)
                VALUE ( ?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $ingredients, $instructions, $time, $portions, $cat_id, $user_id]);
=======
    public function creatRecipe($title, $ingredients, $instructions, $time, $portions, $user_id, $cat_id){
        $sql = 'INSERT INTO recipes(title, ingredients, instructions, time, portions, user_id, cat_id)
                VALUE ( ?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $ingredients, $instructions, $time, $portions, $user_id, $cat_id]);
>>>>>>> e8f9d2f6467d92eaa3d985ca9f62a8bc12e351de
    }
}
?>