 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 600px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-logo {
            max-width: 150px;
            height: auto;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .invoice-details {
            margin-top: 20px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 20px;
        }
        thead{
            background-color: lightblue;
        }

        .invoice-logo{
            display: flex;
            align-self: left;
        }

        .invoice-To
        {
            display: flex;
             flex-direction: column;
            align-items: flex-end;
             justify-content: flex-end;
        }
   
        .invoice-To
        {
            display: flex;
             flex-direction: column;
            align-items: flex-end;
             justify-content: flex-end;
            margin: 0;
        }
        .invoice-To > * {
            margin: 5px;
        }
            .invoice-total
            {
                 margin-top: 50px;
               /* display: flex;
                        flex-direction: column;
                        align-items: flex-end;
                        justify-content: flex-end; */
                float: right;
            }
            /* .invoice-total > * {
            margin: 5px;
            display: flex;
        } */
        
        .invoice-total > * p  {
             margin: 9px;
        }


        .FinalTotal {
            background-color: aqua;
        }





        </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
        <img class="invoice-logo" src="front/Template/logo.png" alt="Company Logo">
        <h1 class="invoice-title">Invoice</h1>
        </div>
        


        <div class="invoice-To">
        <p>Bill To </p>
        <H4>nom de Personne</H4>
        <H4> <?php echo $nom ?></H4>
    
        <p>email@gmail.com</p>
        <p>0774480962</p>
  
         </div> 

        <div class="invoice-details">
 
 
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>ID</th>
                    <th>Car Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Fare</th>
                    <th>Number of Days</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                    <tr>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                    </tr>                
                </tbody>
            </table>
            
            
            
            
            <div class="invoice-total">
                
                <div class="Subtotal">
                    
                    <p> <b>Subtotal: 80000 </b> </p>
                    
                </div>
        
                
                <div class="Subtotal">
                    <p>shipping cost : 0000</p>
                </div>
                
                <div class="Subtotal">
                    <p>tax : 0000</p>
                </div>
                
                <div class="Subtotal FinalTotal">
                    <p> <b>   Total:  00000 </b></p>
                    
                </div>
                
                
                
                
                <div class="invoice-footer">
                    <!-- Add footer content here -->
                </div>
                
            </div>
            </div>
            
        </div>


</body>
</html>
