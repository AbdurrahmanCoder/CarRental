<?php

use User\UserDashboard;
 
// require_once 'models/UserDash.php';


class UserController
{
    public function index()
    {
        
        $User = new UserDashboard();

       
        $id = isset($_GET["id"]) ? $_GET["id"] : "newOrder";
       
       if($id === "newOrder")

       { 
           $UserOrder = $User->CommandeAffficher(); 
           require_once 'views/navbar.php';
           require_once 'views/user.php'; 
        }
       else if($id === "oldOrder")

        {  
             $UserOrder = $User->OldOrders(); 
            require_once 'views/navbar.php';
            require_once 'views/user.php'; 
         }
else {
    echo "No car booked ";
}


    }
}