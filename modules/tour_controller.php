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
                $tour->setDetail($row["Detail"]);
                $tour->setGoogle($row["Google"] != "" ? $row["Google"] : "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31351.455727959274!2d106.6237642982573!3d10.816518513596376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1717052489377!5m2!1svi!2s");
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
        $tour->setDetail($row["Detail"]);
        $tour->setGoogle($row["Google"] != "" ? $row["Google"] : "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31351.455727959274!2d106.6237642982573!3d10.816518513596376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1717052489377!5m2!1svi!2s");
        return $tour;
    }
    public static function addTour($name, $location, $description, $basePrice, $imagePath, $temp_imagePath, $detail, $google)
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
        $detail = str_replace("'", '"', $detail);
        $description = str_replace("'", '"', $description);
        $query = "INSERT INTO Tour(Name, Location, BasePrice, ImagePath, Type, Description, Detail, Google) VALUES ('" . $name . "', '" . $location . "', '" . $basePrice . "', '" . $imagePath . "', '" . $type . "', '" . $description . "', '" . $detail . "', '".$google."')";
        $result = mysqli_query($mysqli, $query);
        $move = move_uploaded_file($temp_imagePath, $tourImagesPath . "/" . $imagePath);
        return $result && $move;
    }
    public static function editTour($tourID, $name, $location, $description, $type, $basePrice, $imagePath, $temp_imagePath, $detail, $google)
    {
        global $mysqli;;
        $detail = str_replace("'", '"', $detail);
        $description = str_replace("'", '"', $description);
        $query = "UPDATE Tour SET Name='" . $name . "', Location='" . $location . "', Description='" . $description . "', BasePrice='" . $basePrice . "', ImagePath='" . $imagePath . "', Type='" . $type . "', Detail='" . $detail . "', Google = '".$google."' WHERE Tour_ID = " . $tourID;
        if ($temp_imagePath == "") {
            $query = "UPDATE Tour SET Name='" . $name . "', Location='" . $location . "', Description='" . $description . "', BasePrice='" . $basePrice . "', Type='" . $type . "', Detail='" . $detail . "', Google = '".$google."' WHERE Tour_ID = " . $tourID;
        }
        $result = mysqli_query($mysqli, $query);
        $path = "../../../images/tour/" . $tourID . "/" . $imagePath;
        $move = true;
        if ($temp_imagePath != "") {
            if (file_exists($path)) {
                unlink($path);
            }
            $move = move_uploaded_file($temp_imagePath, $path);
        }

        return $result && $move;
    }
}
