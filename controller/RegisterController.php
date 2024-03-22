<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once "models/register.php";
require_once "models/config.php";

//  use Models\Database;
//  use Register\Register;
 

class RegisterController { 

    private  $database;
    private  $register;

    public function __construct() {
        $this->database = new Database();
        $this->register = new Register();
    }
 
    public function index() {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
            //  $database = new Database();
            $pdo = $this->database->getConnection();
            // $register = new Register; 
            $this->register->insertData();
              
                echo "heelo";
        } 

    else{
        require_once 'views/navbar.php';
        require_once 'views/register.php'; 
    }
 
}


}
  
        // $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        // $register = new Register($pdo);
        // $register->insertData();


