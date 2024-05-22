 
 
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .sidebar {
      width: 250px;
      height: 100%;
      background-color: #252525;
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      overflow-x: hidden;
      overflow-y: hidden;
      padding-top: 20px;
    }

    .sidebar-header {
      padding: 20px;
      text-align: center;
    }

    .sidebar-header h3 {
      margin: 0;
    }

    .links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .links li {
      margin-bottom: 10px;
    }

    .nav-link {
      display: block;
      padding: 10px 20px;
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    .nav-link:hover {
      background-color: #333;
    }

    .nav-link.active {
      background-color: #4CAF50;
    }

    .nav-link i {
      margin-right: 10px;
    }

    @media screen and (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .sidebar-header {
        text-align: left;
      }

      .nav-link {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-header">
    <h3>Admin Panel</h3>
  </div>
  <ul class="links">
    <li>
      <a href="/admin?id=Dashboard" id="dashboardLink" class="nav-link">
        <i class="fas fa-chart-pie"></i>
        Dashboard
      </a>
    </li>
    <li>
      <a href="/admin?id=addCar" id="AddCarLink" class="nav-link">
        <i class="fas fa-car"></i>
        Add Car
      </a>
    </li>
    <li>
      <a href="/admin?id=deleteCar" id="DeleteCar" class="nav-link">
        <i class="fas fa-trash-alt"></i>
        Delete Car
      </a>
    </li>

    <li>
      <a href="/admin?id=modifyCar" id="modifyCar" class="nav-link">
        <i class="fas fa-edit"></i>
        Update Car
      </a>
    </li>

    <li>
      <a href="/admin?id=orderlist" id="orderList" class="nav-link">
        <i class="fas fa-list"></i>
        Order List
      </a>
    </li>
    <li>
      <a href="/admin?id=neworder" id="NewOrder" class="nav-link">
        <i class="fas fa-cart-plus"></i>
        New Order
      </a>
    </li>

    <li>
  <a href="/admin?id=testimonials" id="TestimonialsLink" class="nav-link">
    <i class="fas fa-comments"></i>
    Testimonials
  </a>
</li>

  </ul>
</div>

<script>
  // Your JavaScript code here if any
</script>

</body>
</html>
 