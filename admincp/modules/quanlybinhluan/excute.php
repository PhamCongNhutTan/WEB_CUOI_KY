<?php
include ('../../config/config.php');
$review_id = $_GET['review_id'];
$sql_delete = "DELETE FROM review WHERE Review_ID = '" . $review_id . "'";
mysqli_query($mysqli, $sql_delete);
header('Location:../../index.php?action=quanlybinhluan&query=xem');
?>