
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

<div class="containerSuccess"> 
    <h1 class="succes containerTotal">🎉 Payment Successful 🎉</h1> 

    
    <a href="/user">
    
    <button>User Dashboard</button>  
</a> 

  
    <?php 
    
    if($pdfFilePath){    
    ?>
    <a href="../front/pdf/<?php echo $pdfFileName  ?>" download class="invoice-btn">Download Invoice</a>
    
 <?php }   ?>
 </div>

</body>
<style>
 .containerSuccess {
    text-align: center;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    max-width: 800px;
    width: 90%;
    margin: 0 auto;
    margin-top: 100px;
}

.success-message {
    font-size: 24px;
    color: #2ecc71;
    margin-bottom: 20px;
}

p {
    color: #555;
    margin-bottom: 30px;
    line-height: 1.6;
}

button, .invoice-btn {
    padding: 12px 24px;
    background-color: #2ecc71;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 20px;
}

button:hover, .invoice-btn:hover {
    background-color: #27ae60;
}

.invoice-btn {
    display: inline-block;
    transition: background-color 0.3s;
}

.invoice-btn:hover {
    background-color: #2980b9;
}

/* Media Queries for responsiveness */
@media only screen and (max-width: 768px) {
    .containerSuccess {
        padding: 30px;
    }
}

@media only screen and (max-width: 480px) {
    .containerSuccess {
        padding: 20px;
    }
}




    </style>
    </html>

