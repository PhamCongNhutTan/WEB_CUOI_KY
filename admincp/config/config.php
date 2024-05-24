<?php
$mysqli = new mysqli("localhost","root","","web");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Lỗi kết nối: " . $mysqli -> connect_error;
  exit();
}
?>