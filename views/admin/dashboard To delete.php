<?php


// $result = new admin();
// $total = $result->TotalOrder();
// $totalOrders = $total[0]['total_orders'];


// $vehicluesTotal = $result->TotalVehicules();
// $TotalVehi = $vehicluesTotal[0]['total_voiture']; 
// $totalUser = $result->TotalUser();
// $User = $totalUser[0]['total_membre'];


// if (!isAdmin()) {
//   header("Location: login.php");
//   exit();
// } else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="front\css\admin.css">
  <link rel="stylesheet" href="front\css\home.css">
  <link rel="stylesheet" href="front\css\dashboard.css">

  <script src="front\js\admin.js" async>
  </script>

</head>

<body>
<?php
 
 include_once ("header.php")
  ?>
  <!-- <div class="container">
    <div class="links">
      <a href="/admin?id=Dashboard" id="dashboardLink" class="nav-link">Dashboard</a>
      <a href="/admin?id=addCar" id="AddCarLink" class="nav-link">addCar</a>
      <a href="/admin?id=deleteCar" class="nav-link">deleteCar</a>
      <a href="/admin?id=orderlist" class="nav-link">Order List</a>
      <a href="/admin?id=neworder" class="nav-link">New Order</a>
    </div> -->

    <div class="container">
      <div class="Dashboard">

        <div>
          <h3>New Order </h3>
          <h1>
            <?php echo $NewOrder ?>
          </h1>

        </div>

        <div>
          <h3>Total Bookings </h3>
          <h1>
            <?php echo $TotalOrder ?>
          </h1>

        </div>

        <div>

          <h3>Total Vehicules </h3>
          <h1>
            <?php echo $TotalVehicules ?>
          </h1>

        </div>



        <div>
          <h3>Registered User</h3>

          <h1>
            <?php echo $TotalUser ?>
          </h1>
        </div>




        <div>
          <h3> cars available </h3>

          <h1>
            <?php echo $CarAvailable ?>
          </h1>
        </div> 




        
        <div>
          <h3>Registered User</h3>

          <h1>
            <?php echo $TotalAmount."€"?>
          </h1>
        </div>



      </div> 
    </div> 
  </div>


</body>

 


</html>


<style>

#dashboardLink
{
  background-color: red;
}
</style>