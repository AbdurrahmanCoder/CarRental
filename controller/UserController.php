<?php

use User\UserDashboard;
 
// require_once 'models/UserDash.php';


class UserController
{
    public function index()
    {
 

        $User = new UserDashboard();
        $UserOrder = $User->CommandeAffficher(); 
        require_once 'views/navbar.php';
        require_once 'views/user.php'; 


    }
}