<?php

 namespace StripePayment;
 
class StripePayment {

    public function payment($amount) {

        require   "vendor\autoload.php";  
        $stripe_secret_key = "sk_test_51Ofmq4ACw8XUbAX1DEGx5DbVvqdPAmErcRRZxb3M56Bcb4ZAs9M1V5FNxVLGzsKp67j1pLJQiO5oSLNjTz4Ldk4W00JsCFp3Y0";

        \Stripe\Stripe::setApiKey($stripe_secret_key);
       
       
        $amount_cents = $amount * 100;

        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => HOST."Paymentsuccess?user_id=" . $_SESSION['user_id'],
            "cancel_url" => HOST,
            "locale" => "auto",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "eur",
                        "unit_amount" => $amount_cents,
                        "product_data" => [
                            "name" => "Voiture"
                        ]
                    ]
                ]
            ]
        ]); 



        
        http_response_code(303);
        header("Location: " . $checkout_session->url);
    }
}