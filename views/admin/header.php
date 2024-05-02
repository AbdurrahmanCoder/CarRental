<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

</head>

<div class="links">
      
<div class="LinksDiv " id="dashboardLink">
<i class="fa-solid fa-chart-pie" style="color: #ffffff;"></i>
  <a href=" /admin?id=Dashboard"  class="nav-link">Dashboard</a>
  
</div>
        
       
        <a href=" /admin?id=addCar" id="AddCarLink"  class="nav-link">addCar</a>
        <a href=" /admin?id=deleteCar" class="nav-link">deleteCar</a>
        <a href=" /admin?id=orderlist" class="nav-link">Order List</a>
        <a href="/admin?id=neworder" class="nav-link">New Order</a>
      </div>
 

      <style>

 



.nav-link.active {
  background-color: orange;
}


.links  {
  width: 15%;
  height:100vh;
  background-color: black;
}


.links a {
  text-align: center;
    width: 100%;
    padding: 20px 0px 20px 0px;
    color:white;
}


.LinksDiv {
display: flex;
justify-content: center;
}
      </style>




<script>

document.addEventListener("DOMContentLoaded", function() {
  const links = document.querySelectorAll(".nav-link");
  
  links.forEach(function(link) {
    link.addEventListener("click", function(event) {
      // Prevent default link behavior 
      // Remove active class from all links
      links.forEach(function(link) {
        link.classList.remove("active");
      });
      
      // Add active class to the clicked link
      this.classList.add("active");
    });
  });
});

</script>