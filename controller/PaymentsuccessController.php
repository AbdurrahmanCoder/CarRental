<?php
// require_once 'models/register.php';


use Database\Database;
use Payment\Payment;


class PaymentsuccessController
{
     public function index()
     {
          $user_id = $_GET['user_id'];

          if (isset($_GET['user_id'])) {
          
               $user_id = $_GET['user_id'];
          $database = new Database();
          $pdo = $database->getConnection();
          $payment = new Payment($pdo); 
          $payment->PaymentSucess($user_id);

          }
      
          
          
          require_once 'views/navbar.php';
          require_once 'views/payment.php';
          require_once 'models/payment.php';
     }

}

