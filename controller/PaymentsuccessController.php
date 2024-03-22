<?php
require_once 'models/register.php';
class PaymentsuccessController {
    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['payed']) && $_POST['payed'] === 'true') {
                require_once 'views/navbar.php';
                require_once 'views/payment.php';
                require_once 'models/payment.php';
            }
        }
    }
}
?>