<?php

require_once "models/login.php";


use Database\Database;
use LoginForm\Login;


class LoginController
{

    private $database;
    private $login;
    private $email;
    private $password; 
    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->email = $_POST['email'];
            $this->password = $_POST['password']; 
            $database = new Database();
            $pdo = $database->getConnection(); 
            $login = new Login($pdo);
            $authenticated =  $login->authenticate($this->email,$this->password); 
            if(isset($_SESSION['pseudoData'])){
                echo "welcome";
              header("Location:".HOST);  
            }
            else {
                require_once 'views/navbar.php';
                $error = "Invalid email or password.";
                require_once 'views/login.php';
            }

         } else {

            require_once 'views/navbar.php';
            require_once 'views/login.php';
        }

    }




}


 