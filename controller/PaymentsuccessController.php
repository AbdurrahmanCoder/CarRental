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

          if (isset($_GET['user_id'])) {

               $user_id = $_GET['user_id'];
               $database = new Database();
               $pdo = $database->getConnection();
               $payment = new Payment($pdo);
               $payment->PaymentSucess($user_id);
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
          $pdfFilePath = "front/pdf/" . "hello_world" . time() . ".pdf";
          file_put_contents($pdfFilePath, $dompdf->output());
          echo "PDF saved successfully at: $pdfFilePath";




          require_once 'views/navbar.php';
          require_once 'views/payment.php';
          require_once 'models/payment.php';
     }

}

