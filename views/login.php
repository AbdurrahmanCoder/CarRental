<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
    <style>
    /* .card-header {
      background-color: #007bff;
    }

    .card-header>h3 {

      color: white;
    } 
   .card-header { 
    background-color: red !important;
   } 

  
.error {
    color: red;
    margin-bottom: 10px;
  display: flex;
  justify-content: center;
}

.card{
  margin-top: 15rem;
}    */


body {
    margin: 0;
    font-family: Arial, sans-serif;
     justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  
  
  
  .card {
   /* background: linear-gradient(to right, #ff7e5f, #feb47b);   */
    width: 100%;
    max-width: 400px; 
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: none;
}

.card-header {
    background-color: #ff7e5f;  
    color: #ffffff;
    padding: 20px;
    font-size: 24px;
    text-align: center;
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

 .error {
    color: #ff0000;
    margin: 10px 0;
    font-size: 20px;
    text-align: center;
}

 .form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

 .btn-primary {
    color: #fff;
    background-color: #ff7e5f;
    border: none;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #cc6434;
}

 @media (max-width: 768px) {
    .card {
        width: 90%;  
    }
}



  </style>
</head>

<body> 
  </nav>
 
  <div class="container mt-5  " >
    <div class="row justify-content-center  ">
      <div class="col-md-4 ">
        <div class="card">
          <div class="card-header  ">
            <h3 class="text-center loginColor" >Login</h3>
          
          </div> 
          
          <?php if (isset($error)) : ?>
          <div class="error"><?php echo $error; ?></div>
      <?php endif; ?> 
          
          <div class="card-body">
            <form id="myForm"  method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label> 
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login  
              </button>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>

  <!-- Bootstrap JS (Optional) -->
</body>


</html>