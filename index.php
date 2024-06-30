<?php
session_start();
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
require('controller/TestimonialController.php');
Autoloader::start();
$request = isset($_GET['url']) ? $_GET['url'] : 'home';
//$request = $_GET['url']; //fait référence à index.php?url=...
//   var_dump($request);
$router = new Router($request);
$router->renderControllers();