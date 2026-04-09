<?php
require_once __DIR__ .'/db.php';

class Category {
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllCategories(){
        $sql = 'SELECT * FROM categories ORDER BY name ASC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name){
        $sql = 'INSERT INTO categories(name) VALUES(?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name]);
    }

    public function deleteCategory($id){
        $sql = 'DELETE FROM categories WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>
