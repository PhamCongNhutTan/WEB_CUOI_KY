<?php 
    include_once("./enities/tour.class.php");
    include_once("./config/config.php");
    class TourController{
        public function getTours() {
            global $mysqli;
            $tours = array(); // Store retrieved tours here
    
            
            $query = "SELECT * FROM Tour";
            $result = $mysqli->query($query);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tour = new Tour();
                    
                    $tour->setTourID($row["Tour_ID"]);
                    $tour->setName($row["Name"]);
                    $tour->setLocation($row["Location"]);
                    $basePrice = number_format($row["BasePrice"], 0, '', ',');
                    $tour->setBasePrice($basePrice);
                    $tour->setImagePath($row["ImagePath"]);
                    $tour->setType($row["Type"]);
                    $tour->setDescription($row["Description"]);
                    
                    $tours[] = $tour;
                }
            }
            return $tours;
        }
    }
?>