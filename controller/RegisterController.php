<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once "models/registration.php";
// require_once "models/config.php";

use Database\Database;
use REG\Registration;

class RegisterController
{

    private $database;
    private $register;


    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            
            $database = new Database();
            var_dump($database);
            print_r($database); 
            $pdo = $database->getConnection(); 
            $registration = new Registration();
            $registration->insertData($pdo);
            echo "heelo";
        } else {
            require_once 'views/navbar.php';
            require_once 'views/register.php';
        }

    }


}

// $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
// $register = new Register($pdo);
// $register->insertData();


