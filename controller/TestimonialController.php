<?php  
 
use Database\Database;
use Testimonial\Testimonialmodel;
class TestimonialController
{
  public function testimonial()
  {
   $database = new Database();
   $pdo = $database->getConnection();
   $testimonial = new Testimonialmodel($pdo);
       $result = $testimonial->retrieveTestimonial();
      require_once 'views/navbar.php';
    require_once 'views/testimonial.php';
  }

}