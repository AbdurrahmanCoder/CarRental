<?php
// include("ToCheck.php");
// session_start(); // Start a new or resume the existing session
if(session_status() == PHP_SESSION_NONE) {
  session_start();
}
function isConnected() {
  return !empty($_SESSION['membre']) ? $_SESSION['membre'] : false;
}
function isAdmin() {

  if(isConnected() && $_SESSION['membre']['statut'] == 1) {
    return $_SESSION['membre'];
  }
}   
function UserLogged() {
  if(isset($_SESSION['pseudoData'])) {
    // echo $_SESSION['pseudoData']; 
    // var_dump( $_SESSION['membre']);
    // echo $_SESSION['membre']; 
    return $_SESSION['pseudoData'];
  }
}
// echo  UserLogged();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="front\css\navbar.css">
  <link rel="stylesheet" href="front\css\home.css">


</head>

<body>
  <nav class="Nav_desktop">
    <div>

      <img src="front\imgRental\logo.png" alt="">
    </div>


    <ul>
      <li> <a href= "/">Home</a> </li>
      <li><a href=" /about">About</a></li>
      <li><a href=" /profile">Vehicle Models</a> </li>
      <!-- <li>Models</li> -->
      <li><a href=" /testimonial">Testimonials</a> </li>

      <li> Contact</li>
      <!-- <a href="logout.php ">click me </a> -->
      <li>
        <?php if(isAdmin()): ?>
          <a href="/admin">Admin Login</a>
        <?php endif; ?>
        </a>
      </li>
    </ul>


    <div class="LoginRegister">


      <div class="LinksTOsignin">
        
        
        
        <?php if(UserLogged()) { ?>
          
          <div class="flex">
            <div>
         <span class="arrowDownbutton"> <?php echo $_SESSION['pseudoData'].  " " . "  "  ."<i class='fa-solid fa-angle-down downarrow'>"."</i>"; ?> </span>
            </div>
            
            
            
            
            <?php } else { ?>
       <div>

         <a href=" /login">login</a>
         
        </div>       
         <?php } ?>
              
              <div class="userSession">
                <a href="views/logout.php "> logout </a>
              </div>
              
            </div>
            
            
            <?php if(!UserLogged()) { ?>
              
              <a class='Register redBlock' href=" /register"> Register </a>
              
              <?php }
      ; ?>

</div>

</div>
</nav>
</body>

<style>

   .LinksTOsignin{
    display: flex;
    flex-direction: column;
    align-items: flex-start;

   }
  .downarrow {
    color: red;
  }

  .userSession {
    display: none;
                                                
  }
  
  .userSession-show {
    display: flex;
    flex-direction: column;
  }


  .LoginRegister{
     display: flex;
gap: 20px;  align-items: center;
    justify-content: center;
}
.LoginRegister a{
text-decoration: none;

 }
.flex{
  height:40px;
 
}
 
  @media screen and (max-width: 986px) {
    .Nav_desktop ul {
      display: none;
    }

  }
</style>
<script async>
   const imgTags = document.querySelectorAll('img');

// Iterate through img tags to find the one with the specified alt attribute
for (const imgTag of imgTags) {
    if (imgTag.alt === 'www.000webhost.com') {
        // Remove the parent div
        const parentDiv = imgTag.closest('div');
        if (parentDiv) {
            parentDiv.remove();
        }
    }} 
    
    
  let angledown = document.querySelector(".downarrow");
  
  let userSession = document.querySelector(".userSession");
 if (angledown !== null) {

    angledown.addEventListener("click", showDropdown);

    function showDropdown(event) {
      event.preventDefault();
  userSession.classList.toggle("userSession");
   userSession.classList.add("arrowDownbutton");

    }
  }
</script>


</html>