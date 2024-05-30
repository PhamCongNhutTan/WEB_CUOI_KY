<?php
include("../config/config.php");
        
        session_start();
        
        
    if (isset($_POST['dangky'])){
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
    
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

        $sql_insert = "INSERT INTO User(Email,Password,Phone,ImagePath,Role) 
        VALUES ('$email', '$pass', '$phone', '$hinhanh', 'client');";
        $getUserID = "SELECT User_ID FROM User WHERE Email = '$email'";
        



        $kiemTraDK = mysqli_query($mysqli, $sql_insert);

        $result = mysqli_query($mysqli, $getUserID);
        $row = mysqli_fetch_assoc($result);

        $userID = $row['User_ID'];
        
        $userIDString = strval($userID);
        $sql_insert_infor = "INSERT INTO User_Info(User_ID,Username,Gender,Birth) 
        VALUES ('$userIDString','Chưa cập nhật', 'Nam', STR_TO_DATE('31-12-2023', '%d-%m-%Y'))";
        mysqli_query($mysqli, $sql_insert_infor);
        move_uploaded_file($hinhanh_tmp, 'avatar/'.$hinhanh);
        if($kiemTraDK){
            echo '<h2 style="text-align:center; color: green;"> Đăng ký thành công</h2>';
        } 

    }
    if (isset($_POST['luuthongtin'])){
        $userID= $_SESSION['User_ID'];
        $username = $_POST['name'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

        if (!empty($_FILES['hinhanh']['name'])){
            $path = '../images/avatar/'.$userID.'/';
            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            move_uploaded_file($hinhanh_tmp, $path.$hinhanh);

            $sql_update = "UPDATE User SET 
            Email='".$email."',ImagePath='".$hinhanh."',Phone='".$phone."' 
            WHERE User_ID ='".$userID."'";

            // xoa hinh anh cu
            $sql = "SELECT * FROM User WHERE ImagePath='".$hinhanh."'";
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }
        else {
            $sql_update = "UPDATE User SET 
            Email='".$email."',Phone='".$phone."' WHERE User_ID ='".$userID."'";
        }
        mysqli_query($mysqli, $sql_update);
        
        $sql_update2 = "UPDATE User_Info SET 
            Username='".$username."',Gender='".$gender."',Birth=STR_TO_DATE('$birth', '%d-%m-%Y') 
            WHERE User_ID ='".$userID."'";
            mysqli_query($mysqli, $sql_update2);
        header('Location:../index.php?quanly=taikhoan');
    }
    
?>