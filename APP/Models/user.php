<?php
require_once __DIR__ .'/db.php';

class User{
    private $conn;
    private $id;
    private $name;
    private $email;
    private $password;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }public function getEmail(){
        return $this->email;
    }public function getPass(){
        return $this->password;
    }

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function Register($name, $email, $password){

        $sql = 'INSERT INTO users(name, email, password)
                VALUE (?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }


    public function Check($email){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function Login($email){
        $sql = "SELECT * FROM users
                WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>