<?php

use User\UserDashboard;

// require_once 'models/UserDash.php';


class UserController
{
    public function user()
    {

        $User = new UserDashboard(); 
        $id = isset($_GET["id"]) ? $_GET["id"] : "newOrder";

        if ($id === "newOrder") {
            $UserOrder = $User->CommandeAffficher();
            require_once 'views/navbar.php';
            require_once 'views/user.php';
        } else if ($id === "oldOrder") {

            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
                $userId = $_SESSION['user_id'];
                $orderId = $_POST['order_id'];
                $comment = $_POST['comment']; 
                if (!empty($comment) && !empty($orderId)) {
                    $User->InsertTestimonial($userId, $orderId, $comment); 
                    header('Location: /user?id=oldOrder');
                    exit;
                }
            }  
            $visibile = "show";
            $UserOrder = $User->OldOrders();
            require_once 'views/navbar.php';
            require_once 'views/user.php'; 
        } else {
            echo "No car booked ";
        }


    }
}