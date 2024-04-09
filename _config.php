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
        // print_r(__CLASS__."cffddfd");

        // print_r($_SERVER['HTTP_HOST']);

        define('HOST', 'http://' .$host.'/');
        define('ROOT', $root.'/');


        
        define('CONTROLLER', ROOT.'controller/');
        define('VIEWS', ROOT.'views/');
        define('MODELS', ROOT.'models/');
        define('CONFIG', ROOT.'config/');
        define('CLASSES', ROOT.'classes/');
        define('IMAGE', ROOT.'');
 
    }

    public static function autoload($class)
    {

        include_once (MODELS.'payment'.'.php');

        if(file_exists(MODELS.$class.'.php'))
        {
            include_once (MODELS.$class.'.php'); 
            // var_dump($class . " loaded from model");
        }
          else if (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
            // var_dump($class . " loaded from class");

        }
           else if (file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
            // var_dump($class . " loaded from CONTROLLER");
            
        };
        
        // var_dump($class . " loaded from outside");
         
    }}
// // 
//   public static function autoload($class)
// {
//     // Convert class name to file path
//     $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

//     // Check if file exists and include it
//     if (file_exists(MODELS . $file)) {
//         include_once MODELS . $file;
//     } else if (file_exists(CLASSES . $file)) {
//         include_once CLASSES . $file;
//     } else if (file_exists(CONTROLLER . $file)) {
//         include_once CONTROLLER . $file;
//     }
// }
// }

