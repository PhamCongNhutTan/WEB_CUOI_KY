<?php
include ("../config/config.php");
session_start();

$content = $_POST['noidungbinhluan'];
$user_id = $_SESSION['User_ID'];
$tour_id = $_POST['news_id'];
$rate = $_POST['rating'];
$reviewDate = date("dd-mm-YYYY");
$type = $_POST['type'];

if (isset($_POST['dangbinhluan'])) {
    $sql_insert = "INSERT INTO review (User_ID, Tour_ID, Content, Rate, Type) VALUES ('" . $user_id . "','" . $tour_id . "','" . $content . "','" . $rate . "','" . $type . "')";
    mysqli_query($mysqli, $sql_insert);
    if ($type == "chitiettintuc") {
        header("Location:../index.php?quanly=chitiettintuc&id=$tour_id");
    } else {
        header("Location:../?quanly=chitietchuyendi&tourid=$tour_id");
    }
}
?>