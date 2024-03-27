<?php


class CheckoutController {
    
    public function index() { 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $Id=  $_POST['SelectedCarID'] ;
            echo $Id;
        require_once 'views/navbar.php';
        require_once 'views/checkout.php';
        }  

    }
}

