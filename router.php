<?php

// La class router va créer les routes et trouver les controllers

class Router
{
    private $request;
    private $routes = [
        'home' => ['controllers' => 'HomeController', 'method' => 'home'],
        'vehicleModel' => ['controllers' => 'VehicleController', 'method' => 'vehicule'],
        'checkout' => ['controllers' => 'CheckoutController', 'method' => 'checkout'],
        'about' => ['controllers' => 'AboutController', 'method' => 'About'],
        'testimonial' => ['controllers' => 'TestimonialController', 'method' => 'testimonial'],
        'Paymentsuccess' => ['controllers' => 'PaymentsuccessController', 'method' => 'Payment'],
        
        'admin' => ['controllers' => 'AdminController', 'method' => 'admin'],
         'user' => ['controllers' => 'UserController', 'method' => 'user'], 
         'login' => ['controllers' => 'LoginController', 'method' => 'login'],
        'register' => ['controllers' => 'RegisterController', 'method' => 'register'],
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