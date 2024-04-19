<?php

// POUR VÉRIFIER LES ERREURS SUR PHP
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

session_start();

// ON RÉCUPÈRE LA BASE DE DONNÉES ET LES FICHIERS
// Config
// require('config/database.php');
// require('config/Core.php');
include_once('_config.php');
include_once("router.php");
// Controllers
require('controller/HomeController.php');
require('controller/VehicleController.php');
require('controller/LoginController.php');
require('controller/CheckoutController.php');
require('controller/AdminController.php');
require('controller/RegisterController.php');
require('controller/UserController.php');
require('controller/AboutController.php');
require('controller/PaymentsuccessController.php');
 
// CHARGEMENT DE LA CONFIGURATION ET L'AUTOLOAD
Autoloader::start();

 $request = isset($_GET['url']) ? $_GET['url'] : 'home';


//$request = $_GET['url']; //fait référence à index.php?url=...
//   var_dump($request);

$router = new Router($request);
$router->renderControllers();
 



