<?php
// include("ToCheck.php");
// session_start(); // Start a new or resume the existing session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
} 

function isConnected()
{
  return !empty($_SESSION['membre']) ? $_SESSION['membre'] : false;
}

function isAdmin()
{

  if (isConnected() && $_SESSION['membre']['statut'] == 1) {
    return $_SESSION['membre'];
  }
}

function User()
{

  if (isConnected() && $_SESSION['membre']['statut'] == 0) {
    return $_SESSION['membre'];
  }
}



function UserLogged()
{
  if (isset($_SESSION['pseudoData'])) {
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
      <li> <a href="/">Home</a> </li>
      <li><a href=" /about">About</a></li>
      <li><a href=" /vehicleModel">Vehicle Models</a> </li>
      <!-- <li>Models</li> -->
      <li><a href=" /testimonial">Testimonials</a> </li>

      <!-- <li> Contact</li> -->
      <!-- <a href="logout.php ">click me </a> -->
      <?php if (isAdmin()): ?>
        <li>
          <a href="/admin">Admin</a>
          </a>
        </li>
      <?php endif; ?>

      <li>
        <?php if (User()  ): ?>
          <a href="/user">User </a>
        <?php endif; ?>
        </a>
      </li>

    </ul>



    <div class="LoginRegister">


      <div class="LinksTOsignin">
        <?php if (User() || isAdmin()) { ?>

          <div class="flex">
            <div>
              <span class="arrowDownbutton">
                <?php echo 'Hi, ' . $_SESSION['pseudoData'] . " " . "  " . "<i class='fa-solid fa-angle-down downarrow'>" . "</i>"; ?>
              </span>
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


        <?php if (!UserLogged()) { ?>

          <a class='Register redBlock' href=" /register"> Register </a>

        <?php }
        ; ?>

      </div>


    </div>

    <div class="HamburgerMenu">

      <i class="fa-solid fa-bars" style="color: #ff4d30; font-size:25px"></i>

    </div>
  </nav>



  <div class="menuMobile    ">
    <ul>

      <li> <a href="/">Home</a> </li>
      <li><a href=" /about">About</a></li>
      <li><a href=" /vehicleModel">Vehicle Models</a> </li>

      <li><a href=" /testimonial">Testimonials</a> </li>
      <li>
        <?php if (User()): ?>
          <a href="/user">User </a>
        <?php endif; ?>
        </a>
      </li>
      <li>  
      <?php if (User()) { ?>
 
    <a href="views/logout.php "> logout </a> 
          
        <?php
      }
        ?>
</li>



    </ul>
    <div class="LinksTOsigninMobile">
      <?php if (User() || isAdmin()) { ?>

        <!-- <div class="flex">
          <div>
            <span class="arrowDownbutton">
              <?php echo 'Hi, ' . $_SESSION['pseudoData'] . " " . "  " . "<i class='fa-solid fa-angle-down downarrow'>" . "</i>"; ?>
            </span>
          </div> -->

        <?php } else { ?>
          <div>

            <a href=" /login">login</a>

          </div>
        <?php } ?>
        <div class="userSession">
          <a href="views/logout.php "> logout </a>
        </div>
      <?php if (!UserLogged()) { ?>

        <a class='Register redBlock' href=" /register"> Register </a>

      <?php }; 
      ?>

      </div>


    </div>
  </div>
</body>

<style>


.LinksTOsigninMobile{

  display: flex;
    flex-direction: column;
    align-items: center;
}


  .menuMobile {
margin-top: 8rem;
    background-color: #fff;
    /* Change background color to white */
    width: 100vw;
    height: 100vh;
    /* Change height to 100vh */
    position: fixed;
    z-index: 222;
    display: flex;
    /* Set display to flex */
    flex-direction: column;
    /* Arrange items vertically */
    justify-content: center;
    /* Center items vertically */
    align-items: center;
    /* Center items horizontally */
  }

  .menuMobile ul {
    padding: 0;
    margin: 0;
  }

  .menuMobile ul li {
    list-style: none;
    color: #010103;
    cursor: pointer;
    font-family: Rubik, sans-serif;
    font-size: 1.6rem;
    font-weight: 500;
    text-decoration: none;
    transition: all .3s;
    margin-bottom: 1rem;
    /* Add some space between menu items */
  }

  .menuMobile ul li a {
    text-decoration: none;
    color: black;
  }

  .menuMobile ul {

    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }


  .LinksTOsignin {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .userSession,
  .Register {
    margin-top: 1rem;
    /* Add some space between login/register and user session */
  }

  .Register {
 
    /* Add padding to register button */
    background-color: #ff4d30;
    /* Change background color to match the desktop version */
    color: #fff;
    /* Change text color to white */
    border: none;
    border-radius: 5px;
    font-size: 1.4rem;
  }

  .HamburgerMenu {
    display: none;
  }



 
  .LinksTOsignin {
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


  .LoginRegister {
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: center;
  }

  .LoginRegister a {
    text-decoration: none;

  }

  .flex {
    height: 40px;

  }
</style>

<style>
  /*   
  @media screen and (max-width < 986px) {
    .Nav_desktop ul {
      display: none;
    }
  }
   */


   .fa-bars
   {
    margin-top:20px;
   }

  @media screen and (width > 750px) {

    .menuMobile {
      display: none;
    }

  }


  @media screen and (width < 750px) {

    .Nav_desktop {
 position: fixed;
z-index: 22222;
 background-color:#fff; 
padding: 1rem 2rem;
}



    .menuMobile {
      
      display: none;
      margin: O;
    }


    .Nav_desktop ul {
      display: none !important;
    }

    .LoginRegister {
      display: none;
    }

    .HamburgerMenu {
       display: block;
    }

    .HamburgerMenu {
      display: block;
      position: absolute;
      top: 1rem;
      right: 1rem;
      cursor: pointer;
    }



    .menuMobile.show-menu {
      display: block;
    }





  }
</style>



<script async>
  const imgTags = document.querySelectorAll('img');

  // Iterate through img tags to find the one with the specified alt attribute
  // for (const imgTag of imgTags) {
  //     if (imgTag.alt === 'www.000webhost.com') {
  //         // Remove the parent div
  //         const parentDiv = imgTag.closest('div');
  //         if (parentDiv) {
  //             parentDiv.remove();
  //         }
  //     }} 

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



  document.addEventListener("DOMContentLoaded", function () {
    const hamburgerMenu = document.querySelector(".HamburgerMenu");
    const mobileMenu = document.querySelector(".menuMobile");

    if (hamburgerMenu !== null && mobileMenu !== null) {
      hamburgerMenu.addEventListener("click", function () {
        mobileMenu.classList.toggle("show-menu");
      });
    }
  });






</script>


</html>