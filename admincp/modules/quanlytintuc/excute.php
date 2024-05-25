<?php
    include('../../config/config.php');

    $tieude = $_POST['tieude'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];

    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    // $hinhanh = time()."_".$hinhanh;

    if (isset($_POST['thembaiviet'])){
        $sql_insert = "INSERT INTO post(tieude,hinhanh,tomtat,noidung,tinhtrang) VALUES 
        ('".$tieude."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";

        mysqli_query($mysqli, $sql_insert);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header('Location: ../../index.php?action=quanlytintuc&query=them');
    } elseif (isset($_POST['suabaiviet'])){
        if (!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

            $sql_update = "UPDATE post SET 
            tieude='".$tieude."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."' 
            WHERE post_id ='".$_GET['post_id']."'";

            // xoa hinh anh cu
            $sql = "SELECT * FROM post WHERE post_id='".$_GET['post_id']."'";
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }
        else {
            $sql_update = "UPDATE post SET tieude ='".$tieude."',tomtat ='".$tomtat."',noidung ='".$noidung."',tinhtrang ='".$tinhtrang."' WHERE post_id='".$_GET['post_id']."'";
        }
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    } else {
        $id = $_GET['post_id'];
        $sql = "SELECT * FROM post WHERE post_id = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_delete = "DELETE FROM post WHERE post_id = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }
?>