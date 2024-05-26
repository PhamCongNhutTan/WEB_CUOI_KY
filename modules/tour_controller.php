<?php
class TourController
{
    public static function getTours()
    {
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
    public static function getTourByID($tourID)
    {
        global $mysqli;
        $query = "SELECT * FROM Tour WHERE Tour_ID = " . $tourID;
        $result = $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        $tour = new Tour();

        $tour->setTourID($row["Tour_ID"]);
        $tour->setName($row["Name"]);
        $tour->setLocation($row["Location"]);
        $tour->setBasePrice($row["BasePrice"]);
        $tour->setImagePath($row["ImagePath"]);
        $tour->setType($row["Type"]);
        $tour->setDescription($row["Description"]);
        
        return $tour;
    }
    public static function addTour($name, $location, $description, $basePrice, $imagePath, $temp_imagePath)
    {
        global $mysqli;
        $type = "Đang mở";
        // Lấy số lượng Tour
        $amountQuery = "SELECT COUNT(*) as tourAmount From Tour";
        $row = mysqli_query($mysqli, $amountQuery);
        $amount = mysqli_fetch_assoc($row);
        $tourImagesPath = "../../../images/tour/" . ($amount["tourAmount"] + 1) . "/";
        if (file_exists($tourImagesPath) == false) {
            mkdir($tourImagesPath, 0777, true);
        }
        // Thêm Tour
        $query = "INSERT INTO Tour(Name, Location, BasePrice, ImagePath, Type, Description) VALUES ('" . $name . "', '" . $location . "', '" . $basePrice . "', '" . $imagePath . "', '" . $type . "', '" . $description . "');";
        $result = mysqli_query($mysqli, $query);
        $move = move_uploaded_file($temp_imagePath, $tourImagesPath . "/" . $imagePath);
        return $result && $move;
    }
    public static function editTour($tourID, $name, $location, $description, $type, $basePrice, $imagePath, $temp_imagePath){
        global $mysqli;
        $query = "UPDATE Tour SET Name='".$name."', Location='".$location."', Description='".$description."', BasePrice='".$basePrice."', ImagePath='".$imagePath."', Type='".$type."' WHERE Tour_ID = ".$tourID;
        if($temp_imagePath == ""){
            $query = "UPDATE Tour SET Name='".$name."', Location='".$location."', Description='".$description."', BasePrice='".$basePrice."', Type='".$type."' WHERE Tour_ID = ".$tourID;
        }
        $result = mysqli_query($mysqli, $query);
        $path = "../../../images/tour/".$tourID."/".$imagePath;
        $move = true;
        if($temp_imagePath != ""){
            if(file_exists($path)){
                unlink($path);
            }
            $move = move_uploaded_file($temp_imagePath,$path);
        }
        
        return $result && $move;
    }
}
