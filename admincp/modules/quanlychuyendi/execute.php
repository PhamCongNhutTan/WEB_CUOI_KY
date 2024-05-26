<?php
include("../../config/config.php");
include("../../../enities/tour.class.php");
include("../../../enities/user.class.php");
include("../../../modules/tour_controller.php");
if (isset($_POST["addTour"])) {
    $name = $_POST["name"];
    $location = $_POST["location"];
    $basePrice = $_POST["basePrice"];
    $description = $_POST["description"];
    $imagePath = $_FILES["imagePath"]["name"];
    $temp_imagePath = $_FILES["imagePath"]["tmp_name"];
    if (TourController::addTour($name, $location, $description, $basePrice, $imagePath, $temp_imagePath) == true){
        http_response_code(200);
    }
    else{
        http_response_code(500);
    }
}
if (isset($_POST["editTour"])){
    $tourID = $_POST["tourID"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $basePrice = $_POST["basePrice"];
    $description = $_POST["description"];
    $imagePath = $_FILES["imagePath"]["name"];
    $temp_imagePath = $_FILES["imagePath"]["tmp_name"];
    $type = $_POST["type"];
    if (TourController::editTour($tourID, $name, $location, $description, $type, $basePrice, $imagePath, $temp_imagePath) == true){
        http_response_code(200);
    }
    else{
        http_response_code(500);
    }
 }
