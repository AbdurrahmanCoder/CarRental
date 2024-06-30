<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front\css\carselect.css">
    <link rel="stylesheet" href="front\css\about.css"> 
        <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="header_overlay">
            <div class="container">
                <h1>Testimonial</h1>
                <p>Home / About</p>
</div>
        </div>
    </div>
    <section class="Section_Testimonial">

        <div class="container">

            <div class="Testimonial">
                <div class="testimonials-content__title">
                    <h4>Reviewed by People</h4>
                    <h2>Client's Testimonials</h2>
                    <p>Discover the positive impact we've made on the our clients by reading through their testimonials.
                        Our clients have experienced our service and results, and they're eager to share their positive
                        experiences with you.</p>


                </div> 
    </section>

    <section>
                <div class="container">

    <div class="Testimonial_Comments">
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php 
        $active = 'active';
        for($i = 0; $i < count($result); $i += 3) { ?>
            <div class="carousel-item <?php echo $active; ?>">
                <div class="row">
                    <?php for($j = $i; $j < $i + 3; $j++) { 
                        if(isset($result[$j])) { ?>
                        <div class="col-md-4">
                            <div class="testimonial-card">
                                <p>"<?php echo $result[$j]["comment"] ?>"</p> 
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
            <?php $active = ''; // Remove 'active' class after the first item ?>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    
    <!-- <div class="Persons_Testimonial">
        
        
        <?php
 foreach($result as $comments) 

 { ?>
<div>
    <p>"<?php echo $comments["comment"] ?>"</p> 
    <span> 
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="tabler-icon tabler-icon-quote">
        <path
        d="M19 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
    </path>
    <path
    d="M10 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
</path>
</svg>

</span> 

</div>



<?php } ?>
 
    </div>
    
</div>
     -->
    
</div> 
</section>
    <footer>
        <div class="container">


            <div class="Footer_Div">
                <ul>


                    <li>CAR <span><b>Rental</b></span></li>
                    <li>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet
                        your needs.</li>
                    <li> (123) -456-789</li>
                    <li>carrental@gmail.com</li>
                </ul>



                <ul>
                    <li><b>COMPANY</b></li>
                    <li>Paris</li>
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

</body> 

<style>
        .testimonial-card {
            padding: 20px;
            text-align: center;
        }
        .testimonial-card p {
            font-style: italic;
        }

        .testimonial-card {
            padding: 20px;
            text-align: center;
            background-color: #dddddd;  


            border-radius: 10px;
            margin: 10px;
            transition: background-color 0.5s ease;  
        }
        .testimonial-card p {
            font-style: italic;
        }
        /* Custom styles for the carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #000;  
            border-radius: 50%;  
            padding: 10px; 
        }
        .carousel-control-prev span,
        .carousel-control-next span {
            color: #fff; 
        }
</style>

</html>