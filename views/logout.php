<?php  

session_start();

 
session_unset();

 
session_destroy(); 
header("Location: /");
// header("https://carrentalapplication.000webhostapp.com");
exit();



 