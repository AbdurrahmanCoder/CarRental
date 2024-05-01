<div class="links">
        <a href=" /admin?id=Dashboard" id="dashboardLink" class="nav-link">Dashboard</a>
        <a href=" /admin?id=addCar" id="AddCarLink"  class="nav-link">addCar</a>
        <a href=" /admin?id=deleteCar" class="nav-link">deleteCar</a>
        <a href=" /admin?id=orderlist" class="nav-link">Order List</a>
        <a href="/admin?id=neworder" class="nav-link">New Order</a>
      </div>
 

      <style>

.nav-link.active {
  background-color: orange;
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