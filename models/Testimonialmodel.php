<?php  
 namespace Testimonial;
 
    
    // session_start();      
    class Testimonialmodel{
        private $pdo;
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
    
        public function retrieveTestimonial() { 
            $requete = "SELECT * from temoignage  ";    
            $stmt = $this->pdo->prepare($requete);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        }
        public function AllTestimonial() { 
        
            $requete = "SELECT * from temoignage ";    
            $stmt = $this->pdo->prepare($requete);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        }
 
        public function TestimonialApprove($idsToApprove) { 
            if ($idsToApprove) {
                // Approve selected testimonials
                $placeholders = implode(',', array_fill(0, count($idsToApprove), '?'));
                $approveQuery = "UPDATE temoignage SET isapproved = 1 WHERE id IN ($placeholders)";
                $stmt = $this->pdo->prepare($approveQuery);   
                $stmt->execute($idsToApprove); 
                
                // Unapprove all other testimonials
                $unapproveQuery = "UPDATE temoignage SET isapproved = 0 WHERE id NOT IN ($placeholders)";
                $stmt = $this->pdo->prepare($unapproveQuery);
                $stmt->execute($idsToApprove);
            } else {
                // If no testimonials are to be approved, unapprove all
                $unapproveQuery = "UPDATE temoignage SET isapproved = 0";
                $stmt = $this->pdo->prepare($unapproveQuery);
                $stmt->execute();
                
                return true;
            }
           
        }
        
        
    }
 