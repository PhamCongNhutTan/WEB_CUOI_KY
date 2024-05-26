
<?php
    include('../../config/config.php');
    
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];



    if (isset($_POST['guithongdiep'])){
        $sql_insert = "INSERT INTO contact(name,gmail,phone,message) VALUES 
        ('".$name."','".$gmail."','".$phone."','".$message."')";

        mysqli_query($mysqli, $sql_insert);

        header('Location: ../../../index.php?quanly=lienhe');
    
    } else {
        $id = $_GET['contact_id'];
        $sql_delete = "DELETE FROM contact WHERE contact_id = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header('Location:../../index.php?action=thongtinlienhe&query=xem');
    }
?>