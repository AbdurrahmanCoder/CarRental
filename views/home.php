<?php
  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);
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

  <link rel="stylesheet" href="front\css\home.css">
  <link rel="stylesheet" href="front\css\navbar.css">

</head> 
<body> 
  <div id="preloader"> 

  </div>
  <img id="hero-bgImage" src="front\imgRental\hero-bgImage.png" alt="">
  <section class="Hero-Section">
    <div class="container">
      <div class="Hero-Div">

        <div class="Hero-Div-Items">
          <h4>Plan your trip now</h4>
          <h1>Save <span> big </span>with our car rental</h1>
          <p>Rent the car of your dreams. Unbeatable prices, unlimited miles, flexible pick-up options and much more.
          </p>

          <div class="Hero_butttons">
            <a class="redBlock rentBlock" href="#BookCar">Book Ride <i class="fa-solid fa-circle-check"
                style="color: #ffffff;"></i></a>

            <a class="blackBlock" href="">Learn More <i class="fa-solid fa-chevron-right"
                style="color: #ffffff;"></i></a>
          </div>

        </div>

        <div>
          <img id="mainCar" src="front\imgRental\main-car.png" alt="">
        </div>
      </div>
    </div>

  </section>

  <section class="bookCar">
    <div class="container">


      <div class="bookCarDiv">
        <h2>Book a car</h2>
        <form  method="post"   id="BookCar">

          <div class="bookCarMain">

            <div class="Form_item">
              <label for="">
                 <!-- <i class="ti ti-car"></i> -->
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" fill="currentColor" stroke-width="0"></path></svg>

              Location</label>

              <select name="locationValue" id="location">
    <option value="">Select Location</option>
 
    <?php foreach ($availableLocations as $location): ?>
        <option value="<?php echo $location['id']; ?>"><?php echo $location['City']; ?></option>
 


    <?php endforeach; ?>
</select>



              <!-- <input type="text" id="Location" name="Location" placeholder="ENTER THE CITY" required> -->
            </div>
            
            
            <div class="Form_item">
              <!-- <label for=""> <i class="ti ti-car"></i> Pick-up *</label> -->
              
              <label>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" fill="currentColor" stroke-width="0"></path></svg>  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M8 15h2v2h-2z"></path></svg>
                
                &nbsp; Pick-up <b>*</b></label>
              <input type="date" name="PickUp" id="PickUp" min="<?php echo date('Y-m-d') ?>" format="yyyy-mm-dd" required>
            </div>

            <div class="Form_item">
              <!-- <label for=""> <i class="ti ti-car"></i> Time</label> -->
              <label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" fill="currentColor" stroke-width="0"></path></svg>
                
                &nbsp; Pick-up <b>*</b></label>
               <select name="PickUpTime" required>
                <?php
                for ($hour = 0; $hour < 24; $hour++) {
                  for ($minute = 0; $minute < 60; $minute += 30) {
                    $time = sprintf("%02d:%02d", $hour, $minute);
                    echo '<option  value="' . $time . '" data-key="' . $time . '">' . $time . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="Form_item" >
              <label for=""> 
                <!-- <i class="ti ti-car"></i> -->
              
              
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M8 15h2v2h-2z"></path></svg>
Drop-of * </label>
              <input type="date" id="DropOf" name="DropOf" min="<?php if (!empty($_POST['PickUp'])) {
                echo $_POST['PickUp'];
              } ?>" format="yyyy-mm-dd" required>
            </div>

            <div class="Form_item">

            <label for=""> 
                <!-- <i class="ti ti-car"></i> -->
              
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input-icon"><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" fill="currentColor" stroke-width="0"></path></svg>
              
 Drop-of * </label>

              <select name="DropOfTime" required > 
                <?php
                for ($hour = 0; $hour < 24; $hour++) {
                  for ($minute = 0; $minute < 60; $minute += 30) {
                    $time = sprintf("%02d:%02d", $hour, $minute);
                    echo '<option  value="' . $time . '" data-key="' . $time . '">' . $time . '</option>';
                  }
                }
                ?>
              </select>
            </div>


            <div class="Form_item" id="SearchBtn">
              <button type="submit" id="submitBtn" class="redBlock Form_book_btn">search </button>
            </div>

          </div>

        </form>

      </div>

    </div>

  </section>

  <section class="plan">
    <div class="container ">

      <div class="Plan_main_Div">

        <h3>Plan your trip now</h3>
        <h2>Quick & easy car rental</h2>


        <div class="plan_Flex_items">

          <div>
            <img src="front\imgRental\image_3.jpg" alt="">
            <h3>Select Car</h3>
            <p>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet your needs
            </p>
          </div>

          <div>
            <img src="front\imgRental\image_4.jpg" alt="">
            <h3>Contact Operator</h3>
            <p>Our knowledgeable and friendly operators are always ready to help with any questions or concerns</p>
          </div>

          <div>
            <img src="front\imgRental\image_5.jpg" alt="">
            <h3>Let's Drive</h3>
            <p>Whether you're hitting the open road, we've got you covered with our wide range of cars</p>
          </div>


        </div>

      </div>
    </div>
  </section>




  <section class="save">
    <div class="container ">

      <div class="Plan_main_Div">

        <h2>Save big with our cheap car rental!</h2>
        <p>Top Airports. Local Suppliers. <span>24/7</span> Support.</p>

      </div>

    </div>
  </section>


  <section class="suv">
    <div class="container ">

      <div class="Suv_main_Div">

        <img src="imgRental/truck.png" alt="">
        <div class="suv_Content">

          <div class="SuvLeft">
            <h4>Why Choose Us</h4>
            <h2>Best valued deals you will ever find</h2>
            <p>Discover the best deals you'll ever find with our unbeatable offers. We're dedicated to providing you
              with the best value for your money, so you can enjoy top-quality services and products without breaking
              the bank. Our deals are designed to give you the ultimate renting experience, so don't miss out on your
              chance to save big.</p>
            <a href="" class="redBlock">Find Details <i class="fa-solid fa-chevron-right"
                style="color: #ffffff;"></i></a>
          </div>

          <div class="SuvRight">


            <div>
              <img src="front\imgRental\image_8.jpg" alt="">
              <div>
                <h4>Cross Country Drive</h4>
                <p>Take your driving experience to the next level with our top-notch vehicles for your cross-country
                  adventures.</p>
              </div>
            </div>


            <div>
              <img src="front\imgRental\image_9.jpg" alt="">
              <div>
                <h4>All Inclusive Pricing</h4>
                <p>Get everything you need in one convenient, transparent price with our all-inclusive pricing policy.
                </p>
              </div>
            </div>



            <div>
              <img src="front\imgRental\image_10.jpg" alt="">
              <div>
                <h4>No Hidden Charges</h4>
                <p>Enjoy peace of mind with our no hidden charges policy. We believe in transparent and honest pricing.
                </p>
              </div>
            </div>

          </div>

        </div>


      </div>

    </div>
  </section>


  <section class="Faq">
    <div class="container ">

      <div class="Faq_Div">


        <div class="Faq_Header">
          <h5> FAQ</h5>
          <h2>Frequently Asked Questions </h2>
          <p>Frequently Asked Questions About the Car Rental Booking Process on Our Website: Answers to Common Concerns
            and Inquiries.</p>
        </div>

        <div class="faq_All_questions">


          <div>
            <p class="questions">1. What is special about comparing rental car deals?</p>
            <p class="answer">Comparing rental car deals is important as it helps find the best deal that fits your
              budget and requirements, ensuring you get the most value for your money. By comparing various options, you
              can find deals that offer lower prices, additional services, or better car models. You can find car rental
              deals by researching online and comparing prices from different rental companies.</p>
          </div>



          <div>
            <p class="questions">2. How do I find the car rental deals? </p>
            <p class="answer">You can find car rental deals by researching online and comparing prices from different
              rental companies. Websites such as Expedia, Kayak, and Travelocity allow you to compare prices and view
              available rental options. It is also recommended to sign up for email newsletters and follow rental car
              companies on social media to be informed of any special deals or promotions. </p>
          </div>


          <div>
            <p class="questions">3. How do I find such low rental car prices? </p>
            <p class="answer"> Book in advance: Booking your rental car ahead of time can often result in lower prices.
              Compare prices from multiple companies: Use websites like Kayak, Expedia, or Travelocity to compare prices
              from multiple rental car companies. Look for discount codes and coupons: Search for discount codes and
              coupons that you can use to lower the rental price. Renting from an off-airport location can sometimes
              result in lower prices.</p>
          </div>
 
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">


      <div class="Footer_Div">


        <ul>


          <li><b>CAR </b>Rental </li>
          <li>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet your needs.
          </li>
          <li> (123) -456-789</li>
          <li>carrental@gmail.com</li>
        </ul>



        <ul>
          <li><b>COMPANY</b></li>
          <li>New York</li>
          <li>Careers</li>
          <li>Mobile</li>
          <li>Blog </li>
          <li>How we work </li>
        </ul>
 
        <ul>
          <li><b>WORKING HOURS</b></li>
          <li>Mon - Fri: 9:00AM - 9:00PM</li>
          <li> sat: 9:00AM - 19:00PM</li>
          <li>Sun: Closed</li>
        </ul>

        <ul>
          <li><b> SUBSCRIPTION</b></li>
          <li> Subscribe your Email address for latest news & updates.</li>
          <li><input type="text" class="SubsInput " placeholder="ENTER YOUR EMAIL"></li>
          <li><button type="submit " class="redBlock Subcription">Submit</button></li>
        </ul>

      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>


<script src="front\js\home.js"></script>

</html>