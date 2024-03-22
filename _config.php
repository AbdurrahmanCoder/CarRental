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

       
        print_r($_SERVER['DOCUMENT_ROOT']);
        // print_r($_SERVER['HTTP_HOST']);

        define('HOST', 'http://' .$host.'/project/');
        define('ROOT', $root.'/project/');

        define('CONTROLLERS', ROOT.'controllers/');
        define('VIEWS', ROOT.'views/');
        define('MODELS', ROOT.'models/');
        define('CONFIG', ROOT.'config/');
        define('CLASSES', ROOT.'classes/');
    }

    public static function autoload($class)
    {
        if(file_exists(MODELS.$class.'.php'))
        {
            include_once (MODELS.$class.'php');
        }
          else if (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
        }
           else if (file_exists(CONTROLLERS.$class.'.php'))
        {
            include_once (CONTROLLERS.$class.'.php');
        };

    }
}
