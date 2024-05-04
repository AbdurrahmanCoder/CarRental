<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="links">



  <a href=" /admin?id=Dashboard" id="dashboardLink" class="nav-link">

    <i class="fa-solid fa-chart-pie" style="color: #ffffff; font-size:25px">
  
  </i>

    Dashboard</a>



 

  <a class="centered" href=" /admin?id=addCar" id="AddCarLink" class="nav-link"> <i class="fa-solid fa-car-side" style="color: #ffffff;font-size:25px" ></i> <i class="fa-solid fa-plus" style="color: #ffffff;font-size:10px"></i>Add Car</a>
   
  
  <a class="centered" href=" /admin?id=deleteCar" class="nav-link">
  <i class="fa-solid fa-car-side" style="color: #ffffff;font-size:25px" ></i>
   <i class="fa-solid fa-minus" style="color: #ffffff;font-size:10px"></i>  
  
  Delete Car</a>
  <a href=" /admin?id=orderlist" class="nav-link">Order List</a>
  <a href="/admin?id=neworder" class="nav-link">New Order</a>
</div>


<style>
.links {
  width: 100%; /* Adjusted width for responsiveness */
  height: auto; /* Changed height to auto for responsiveness */
  background-color: black;
  display: flex; /* Added flex display */
  flex-direction: column; /* Set flex direction to column for stacking links */
}

.links a {
  width: 100%;
  padding: 20px 0px; /* Adjusted padding */
  color: white;
  text-align: center; /* Centered text */
}

@media screen and (min-width: 768px) {
  .links {
    width: 15%; /* Set fixed width for larger screens */
    height: 100vh;
  }
  .links a {
    text-align: left; /* Align text to the left for larger screens */
  }
}

.centered {
  display: flex;
  justify-content: center; /* Horizontally center */
  align-items: center; /* Vertically center */
}

.fa-plus,
.fa-minus {
  align-self: flex-start;
}

.nav-link.active {
  background-color: orange;
}

.navbar {
  background-color: black;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.hamburger-menu {
  color: white;
  font-size: 25px;
  cursor: pointer;
}

.links {
  /* display: none; */
}

.links.active {
  display: block;
}

.links a {
  color: white;
  text-decoration: none;
  display: block;
  padding: 10px 0;
  text-align: center;
}

.links a:hover {
  background-color: #333;
}
</style>




<script>
document.addEventListener("DOMContentLoaded", function () {
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const links = document.querySelector(".links");

  hamburgerMenu.addEventListener("click", function () {
    links.classList.toggle("active");
  });

  document.addEventListener("click", function (event) {
    if (!links.contains(event.target) && event.target !== hamburgerMenu) {
      links.classList.remove("active");
    }
  });
});

</script>