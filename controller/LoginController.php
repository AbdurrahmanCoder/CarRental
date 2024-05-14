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
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->email = $_POST['email'];
            $this->password = $_POST['password']; 
            $database = new Database();
            $pdo = $database->getConnection(); 
            $login = new Login($pdo);
            $authenticated =  $login->authenticate($this->email,$this->password);
            // print_r($login);            
            // ECHO "VOUS ETES BIEN CONNECTE";
           

            if(isset($_SESSION['pseudoData'])){
                echo "welcome";
              header("Location:".HOST);  
            }
            else {


                $error = "Invalid email or password.";

                // echo "NOT welcome";
                require_once 'views/login.php';
            }

         } else {

            require_once 'views/navbar.php';
            require_once 'views/login.php';
        }

    }




}


 