<?php
 

use Database\Database;
use Payment\Payment;
use Dompdf\Dompdf;


class PaymentsuccessController
{
     public function index()
     {
               
          
          $user_id = $_GET['user_id'];
          $database = new Database();
          $pdo = $database->getConnection();
          $payment = new Payment($pdo);




          if (isset($_GET['user_id']) ) {
              $lastOrder =  $payment->UserDataById($user_id);
              $id =  $lastOrder['carorder_ids']; 
           }

 
          $nom = "abdurrahman";
          require_once __DIR__ . '/../vendor/autoload.php';
          $dompdf = new Dompdf(["chroot" => ROOT]);
          ob_start();
          require_once 'front\Template\invoice.template.php';
          $html = ob_get_contents();
          ob_end_clean();
          $dompdf->loadHtml($html);
          $dompdf->setPaper('A4', 'portrait');
          $dompdf->render();
          $pdfFileName = $user_id . '_' . date('Ymd_His') . '_' . time() . '.pdf';
          $pdfFilePath = "front/pdf/" . $pdfFileName ;
          file_put_contents($pdfFilePath, $dompdf->output());
          
 
          if ( isset($id) && isset($pdfFilePath)) 
                {
                     $payment->PaymentSuccess($id,$pdfFilePath);
                   
                    }      
                    require_once 'views/navbar.php';
                    require_once 'views/payment.php';
                    require_once 'models/payment.php';
          
 

     }

}

