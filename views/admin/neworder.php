<?php 
       
         if (isset($_GET['selectedId'])) {
   
   echo "cool";

} 




else
{
    ?>    

    <!DOCTYPE html>
  <html lang="en">
  
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front\css\admin.css">
    <link rel="stylesheet" href="front\css\home.css"> 
    </head>

    <body >

    <div class="container"  >
     
        <?php include_once("header.php") ?>
  
    <div class="Content">

    
    <div class="container mt-5">
    
                    <table class="table">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>City</th>
                          <th>PickUpDate</th>
                          <th>PickUpTime</th>
                          <th>DropDate</th>
                          <th>DropTime</th>
                          <th>nom</th>
                          <th>prenom</th>
                          <th>email</th> 
                          <th>details</th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($CommandeListe as $ComData) { ?>
                          <tr>
                            <td>
                          <?php echo $ComData['id']; ?>

                            </td>

                            <td>
                          <?php echo $ComData['City']; ?>
                            </td>
                            <td>
                          <?php echo $ComData['PickUpDate']; ?>
                            </td>

                            <td>
                          <?php echo $ComData['PickUpTime']; ?>

                            </td>
                            <td>
                          <?php echo $ComData['DropDate']; ?>
                            </td>

                            <td>
                          <?php echo $ComData['DropTime']; ?>
                            </td>

                            <td>
                          <?php echo $ComData['nom']; ?>
                            </td>


                            <td>
                          <?php echo $ComData['prenom']; ?>
                            </td>


                            <td>
                          <?php echo $ComData['email']; ?>
                            </td>
                            <td>
                                <a href="/admin?id=neworder&selectedId=<?php echo $ComData['id']; ?>"> 
                                    <p>More details</p>
                                </a>
                            </td>


                    </div>

    </div>
    </div>






  </body> 

  </html>
  <?php
}}
 

?>



 