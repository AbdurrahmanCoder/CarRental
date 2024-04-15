<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class Autoloader
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

       
        // print_r($_SERVER);
        
        // print_r($_SERVER['HTTP_HOST']);
        
        define('HOST', 'http://' .$host.'/');
        define('ROOT', $root.'/');


        // var_dump($root."cffddfd");
        var_dump(HOST."cffddfd");
        define('CONTROLLER', ROOT.'controller/');
        define('VIEWS', ROOT.'views/');
        define('MODELS', ROOT.'models/');
        define('CONFIG', ROOT.'config/');
        define('CLASSES', ROOT.'classes/');
        define('IMAGE', ROOT.'');
    }
    
    public static function autoload($class)
    {

        $parts = explode('\\', $class);
    
        // Extract the last part of the namespace
        $className = end( $parts);
     
        
          var_dump($className);


        if(file_exists(MODELS.$className.'.php'))
        {
            include_once (MODELS.$className.'.php'); 
            // var_dump($class . " loaded from model");
        }
          else if (file_exists(CLASSES.$className.'.php'))
        {
            include_once (CLASSES.$className.'.php');
            // var_dump($class . " loaded from class");

        }
           else if (file_exists(CONTROLLER.$className.'.php'))
        {
            include_once (CONTROLLER.$className.'.php');
            // var_dump($class . " loaded from CONTROLLER");
            
        };
        
        // var_dump($class . " loaded from outside");
         
    }}
 

