<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front\css\register.css">
    <link rel="stylesheet" href="front\css\home.css">
        <!-- <script src="front\js\register.js" defer>
        </script>  -->
</head> 
<body> 
    </nav>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"  >
                        <h3 id="FormTOFill" >Registration Form</h3>
                    </div>
                    <div class="card-body">
                    <h1 id="registerSuccess">Successfully Registered </h1>
                        <form id="myForm"   method="post">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label">pseudo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="mdp" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="firstName" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstName" name="nom" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lastName" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastName" name="prenom" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="phone" name="telephone" required>
                                </div>
                            </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" id="buttonToRegister" class="btn btn-primary">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>  
 <div id="buttonToLogin"> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>