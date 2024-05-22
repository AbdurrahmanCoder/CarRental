 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .containerReg {
            margin-top: 60px;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff4d30; /* Updated button color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #d93c20; /* Darker shade when hovered */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Added shadow on hover */
        }
        @media screen and (max-width: 600px) {
            .containerReg {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="containerReg">
        <h2>Registration Successful!</h2>
        <p>You have successfully registered. Click the button below to proceed to the login page:</p>
        <a href="/login" class="btn">Go to Login Page</a>
    </div>
</body>
</html>
 