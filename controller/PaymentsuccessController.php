<?php
// require_once 'models/register.php';


use Database\Database;
use Payment\Payment;
use Dompdf\Dompdf;


class PaymentsuccessController
{
     public function index()
     {
          
          $user_id = $_GET['user_id'];
          
          
          if (isset($_GET['user_id']) ) {
               $user_id = $_GET['user_id'];
               $database = new Database();
               $pdo = $database->getConnection();
               $payment = new Payment($pdo);
              $result =  $payment->UserDataById($user_id);
                     
              var_dump($result);

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
          
          echo "PDF saved successfully at: $pdfFilePath"; 

          // if (isset($_GET['user_id']) && isset($pdfFilePath)) {
          //      $user_id = $_GET['user_id'];
          //      $database = new Database();
          //      $pdo = $database->getConnection();
          //      $payment = new Payment($pdo);
          //      $payment->PaymentSucess($user_id);
                     
          // }

var_dump($user_id);



  


          require_once 'views/navbar.php';
          require_once 'views/payment.php';
          require_once 'models/payment.php';
     }

}

