    <?php
    require_once 'models/payment.php';
 
    $payment = new Payment();
    $payment->InsertOrderData(); 
    $success = $payment->isSuccess();
    var_dump($payment->InsertOrderData()); 

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="front\css\checkout.css">
    <link rel="stylesheet" href="front\css\home.css">
    </head>

    <body>
<?php 
 if($success === true){ ?> 
<div class="container"> 
    <h1 class="succes containerTotal">🎉 Payment Successful 🎉</h1> 
</div>

<?php }
  ?>

    </body>

    </html>