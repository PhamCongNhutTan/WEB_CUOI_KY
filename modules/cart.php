<?php
include("../config/config.php");
include("../enities/tour.class.php");
include("./tour_controller.php");
session_start();
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
if (isset($_POST["addCart"])) {
    $tourID = $_POST["tourid"];
    $exist = false;
    $amount = $_POST["amount"];
    foreach ($_SESSION["cart"] as $key => $item) {
        if ($item["tourID"] == $tourID) {
            $_SESSION["cart"][$key]["amount"] = $item["amount"] + $amount;
            $exist = true;
            echo "test";
            break;
        }
    }
    if ($exist == false) {
        $cart = array(
            "tourID" => $tourID,
            "amount" => $amount
        );
        $_SESSION["cart"][] = $cart;
    }
}
if (isset($_GET["action"]) && $_GET["action"] == "remove" && isset($_GET["tourid"])) {
    $tourID = $_GET["tourid"];
    foreach ($_SESSION["cart"] as $key => $item) {
        if ($item["tourID"] == $tourID) {
            unset($_SESSION["cart"][$key]);
            // Re-index the array to avoid potential issues with array keys
            $_SESSION["cart"] = array_values($_SESSION["cart"]);
            break;
        }
    }
    header("Location:../index.php?quanly=giohang");
    echo "3";
}
