<?php
    if(isset($_POST['doimatkhau'])){
    $email = $_POST['email'];
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];

    $sql = "SELECT * FROM User WHERE Email = '$email' AND Password ='$oldPass' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0){
        $sql_update = mysqli_query($mysqli, "UPDATE User SET Password = '$newPass' WHERE Email ='$email'");
        echo '<h2 style="text-align:center; color: green;"> Thay đổi thành công</h2>';

    } else {
        echo '<h2 style="text-align:center; color: red;"> Tài khoản hoặc mật khẩu không đúng.</h2>';
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
        <H3 class="text-center">ĐỔI MẬT KHẨU</H3>
    <div class="container" style="width: 25rem;">

        <div class="form-outline mb-4">
            <input type="text" name="email" class="form-control form-control-lg" />
            <label class="form-label">Email</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" name="oldPass" class="form-control form-control-lg" />
            <label class="form-label">Mật khẩu cũ</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" name="newPass" class="form-control form-control-lg" />
            <label class="form-label">Mật khẩu mới</label>
        </div>
        <button name="doimatkhau" class="btn btn-success btn-lg btn-block mb-2" type="submit">Cập nhật</button>

    </div>
</form>