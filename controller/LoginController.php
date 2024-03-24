<?php
class LoginController
{
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "hello";
        } else {

            require_once 'views/navbar.php';
            require_once 'views/login.php';
        }

    }




}


 