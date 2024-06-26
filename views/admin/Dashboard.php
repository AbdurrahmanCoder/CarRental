
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
  <!-- <div class="container">
    <div class="links">
      <a href="/admin?id=Dashboard" id="dashboardLink" class="nav-link">Dashboard</a>
      <a href="/admin?id=addCar" id="AddCarLink" class="nav-link">addCar</a>
      <a href="/admin?id=deleteCar" class="nav-link">deleteCar</a>
      <a href="/admin?id=orderlist" class="nav-link">Order List</a>
      <a href="/admin?id=neworder" class="nav-link">New Order</a>
    </div> -->

  <!-- <div class="container"> -->
  <div class="DashboardSideBar">
      <?php

      include_once ("header.php")
        ?>
    </div>
  <main>
  <?php

  require_once 'views/navbar.php';
  ?>
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
          <h3>Total amount</h3>

          <h1>
            <?php echo $TotalAmount . "€" ?>
          </h1>
        </div>


    </div>


  </main>

</body>




</html>


<style>


 


 
#dashboardLink
{
  /* width: 100%; */
  background-color: #006aff;
}  
</style>


<style>
main{ 
  display: flex;
  /* gap: 10%; */
 
 
  justify-content: flex-end;
}


 
 
   /* main :nth-child(2)  {
   
}    */


.Dashboard {
    width:80%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
    height: 240px;
  }

  .Dashboard>div {
    flex: 0 0 calc(33.33% - 20px);
    background-color: #f8f9fa;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  @media (max-width: 768px) {
    .Dashboard>div {
      flex: 0 0 calc(50% - 20px);
    }
  }

  @media (max-width: 576px) {
    .Dashboard>div {
      flex: 0 0 calc(100% - 20px);
    }
  }


  .Nav_desktop img{
    display: none;
  }
</style>