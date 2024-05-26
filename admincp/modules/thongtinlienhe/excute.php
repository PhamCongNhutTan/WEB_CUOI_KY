
<?php
    include('../../config/config.php');
    require('../../../mail/sendmail.php');
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];



    if (isset($_POST['guithongdiep'])){
        $sql_insert = "INSERT INTO contact(name,gmail,phone,message) VALUES 
        ('".$name."','".$gmail."','".$phone."','".$message."')";

        mysqli_query($mysqli, $sql_insert);

        $mailer = new Mailer();
        $noidung = "<div>
        <h3> Cảm ơn ".$name." đã liên hệ với chúng tôi</h3>
        <p> Chúng tôi xin xác nhận thông tin của bạn như sau:</p><br>
        <p> Tên người liên hệ: $name</p><br>
        <p> Số điện thoại: $phone</p><br>
        <p> Nội dung: $message</p><br>
        <p> Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất!</p><br>
        <p> Trân trọng! </p><br>
        </div>";
        $mailer->sendMessage($gmail, $noidung);

        header('Location: ../../../index.php?quanly=lienhe');
    
    } else {
        $id = $_GET['contact_id'];
        $sql_delete = "DELETE FROM contact WHERE contact_id = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header('Location:../../index.php?action=thongtinlienhe&query=xem');
    }
?>