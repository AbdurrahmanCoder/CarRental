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
  <style>
    .card-header {
      background-color: #007bff;
    }

    .card-header>h3 {

      color: white;
    } 
   .card-header { 
    background-color: red !important;
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
          <div class="card-body">
            <form id="myForm">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>


 
<script>
 
const myForm = document.getElementById("myForm"); // Corrected the variable name to be consistent with usage

myForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    console.log(formData);

    fetch("models/login.php", {
        method: "post",
        body: formData
    }) 

    .then(function (response) {
        return response.json(); // Parse the JSON response
    })
    .then(function (data) {
        console.log(data);

        if (data.status === "success") {
            // Reset the form
            myForm.reset();
            console.log("Form cleared");
            // Access other data in 'data' object if needed
            console.log("Message:", data.message);
            window.location.href = `/`;     
        } else {
            // Handle error cases
            console.error("Error:", data.message);
        }
    });
});


</script>
</html>