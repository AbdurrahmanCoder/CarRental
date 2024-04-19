<?php

// La class router va créer les routes et trouver les controllers

class Router
{
    private $request;
    private $routes = [
        'home' => ['controllers' => 'HomeController', 'method' => 'index'],
        'vehicleModel' => ['controllers' => 'VehicleController', 'method' => 'index'],
        'checkout' => ['controllers' => 'CheckoutController', 'method' => 'index'],
        'about' => ['controllers' => 'AboutController', 'method' => 'index'],
        'testimonial' => ['controllers' => 'TestimonialController', 'method' => 'index'],
        'Paymentsuccess' => ['controllers' => 'PaymentsuccessController', 'method' => 'index'],
         
      
            
        'admin' => ['controllers' => 'AdminController', 'method' => 'index'],
        // 'adminaddcar' => ['controllers' => 'AdminController', 'method' => 'checking'],
        'user' => ['controllers' => 'UserController', 'method' => 'index'], 

        'login' => ['controllers' => 'LoginController', 'method' => 'index'],
        'register' => ['controllers' => 'RegisterController', 'method' => 'index'],
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function renderControllers()
    {
        $request = $this->request;

        if (key_exists($request, $this->routes)) {
            $controllers = $this->routes[$request]['controllers'];
            $method = $this->routes[$request]['method'];
            $currentController = new $controllers();
            $currentController->$method();

        } else {
            echo 'Erreur 404 - Page introuvable';
        }
    }
}