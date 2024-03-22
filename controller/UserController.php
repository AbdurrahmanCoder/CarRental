<?php 

        require_once 'models/UserDash.php';
 
class UserController {
    public function index() {  
        require_once 'views/navbar.php';
        require_once 'views/user.php';
 
    }
}