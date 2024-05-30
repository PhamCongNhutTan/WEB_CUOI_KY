<?php
include("../../config/config.php");
include("../../../enities/tour.class.php");
include("../../../enities/user.class.php");
include("../../../modules/tour_controller.php");
function getSource($html)
{
    if($html == ""){
        return "";
    }
    $dom = new DOMDocument();
    // Load HTML string
    $dom->loadHTML($html);
    // Get all iframe elements
    $iframes = $dom->getElementsByTagName('iframe');
    // Iterate over each iframe element
    $src = "";
    foreach ($iframes as $iframe) {
        // Get the value of the src attribute
        $src = $iframe->getAttribute('src');
    }
    return $src;

}
if (isset($_POST["addTour"])) {
    $name = $_POST["name"];
    $location = $_POST["location"];
    $basePrice = str_replace(',', '', $_POST["basePrice"]);
    $description = $_POST["description"];
    $imagePath = $_FILES["imagePath"]["name"];
    $temp_imagePath = $_FILES["imagePath"]["tmp_name"];
    $detail = $_POST["detail"];
    $google = $_POST["google"];
    $google = getSource($google);
    if (TourController::addTour($name, $location, $description, $basePrice, $imagePath, $temp_imagePath, $detail, $google) == true) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} elseif (isset($_POST["editTour"])) {
    $tourID = $_POST["tourID"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $basePrice = str_replace(',', '', $_POST["basePrice"]);
    $description = $_POST["description"];
    $imagePath = $_FILES["imagePath"]["name"];
    $temp_imagePath = $_FILES["imagePath"]["tmp_name"];
    $type = $_POST["type"];
    $detail = $_POST["detail"];
    $google = $_POST["google"];
    $google = getSource($google);
    if (TourController::editTour($tourID, $name, $location, $description, $type, $basePrice, $imagePath, $temp_imagePath, $detail, $google) == true) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}
