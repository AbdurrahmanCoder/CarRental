<?php  

session_start();

 
session_unset();

 
session_destroy(); 
header("Location: https://carrentalapplication.000webhostapp.com");
// header("https://carrentalapplication.000webhostapp.com");
exit();



?>