<?php
    include("../../config/config.php");
    session_start();
    $emailOrPhone = $_POST['emailOrPhone'];
    $password = $_POST['password'];
    $query = $mysqli->prepare("SELECT * FROM User WHERE (Email = ? OR Phone = ?) AND Password = ? LIMIT 1");
    $query->bind_param('sss', $emailOrPhone, $emailOrPhone, $password); // Bind email/phone and password
    
    if(!$query -> execute()){
        echo "<script>alert('".$mysqli->error."')</script>";
        exit;
    }

    $result = $query->get_result();
    $count = $result->num_rows;
    if ($count >= 1) {
        $_SESSION["dangnhap"] = $emailOrPhone;
        $userData = $result->fetch_assoc();
        $_SESSION["User_ID"] = $userData["User_ID"];
        header("Location:../../index.php");
        exit;
    }else{
        echo "$emailOrPhone, $password, $count";
    }
?>
