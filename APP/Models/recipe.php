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

    public function creatRecipe($title, $ingredients, $instructions, $time, $portions, $user_id, $cat_id){
        $sql = 'INSERT INTO recipes(title, ingredients, instructions, time, portions, user_id, cat_id)
                VALUES ( ?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $ingredients, $instructions, $time, $portions, $user_id, $cat_id]);
    }

    public function getRecipeById($id){
        $sql='SELECT * FROM recipes WHERE id = ?';
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function update($id, $title, $ingredients, $instructions, $time, $portions, $cat_id){
        $sql = 'UPDATE recipes
        SET title = ?, ingredients = ?, instructions = ?, time = ?, portions = ?, cat_id = ?
        WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $ingredients, $instructions, $time, $portions, $cat_id,$id]);
    }
    public function delete($id){
        $sql = 'DELETE FROM recipes
                WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>