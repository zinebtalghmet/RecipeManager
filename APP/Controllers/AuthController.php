<?php
require_once __DIR__ .'/../Models/user.php';

class AuthController{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    
    public function logIn(){
        session_start();

        $error = "";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $email = $_POST['email'];
            $user = $this->userModel->Login($email);

            if(!$user){

                $error = "Email introuvable !";
            } else if(!password_verify($_POST['password'], $user['password'])){

                $error = "Mot de passe incorrect !";
            } else {

                $_SESSION['user_id'] = $user['id'];

                header("Location: dashboard.php");
                exit();
            }
        } 
        require_once __DIR__ .'/../Views/Authentification/login.php';

        
    }
    public function register(){
        session_start();

        $error = ""; 


        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($name) || empty($email) || empty($password)) {

                $error = "Veuillez remplir tous les champs !";
                require_once __DIR__ . '../Views/Authentification/register.php';

            } else {
                $check = $this->userModel->Check($email);

                if($check){
                    $error = "L'adresse email existe déjà !";
                    require_once __DIR__ . '/../Views/Authentification/register.php';
                } else {
                    $this->userModel->Register($name, $email, $password);
                    header('Location: index.php');
                    exit();
                }
            }
        }
        require_once __DIR__ .'/../Views/Authentification/register.php';

    }


    public function logout(){
        session_start();
        session_destroy();
        header('Location: index.php');
        exit();
    }


    
}
?>