<?php

$userID = $_SESSION["User_ID"];
$sql_user = "SELECT * FROM User WHERE User_ID ='$userID'";
$sql_useri4 = "SELECT * FROM User_Info WHERE User_ID ='$userID'";
$query_user = mysqli_query($mysqli, $sql_user);
$query_useri4 = mysqli_query($mysqli, $sql_useri4);
$row = mysqli_fetch_array($query_user);
$rowi4 = mysqli_fetch_assoc($query_useri4);

$birth = $rowi4['Birth'];

?>

<section class="vh-100">
    <div class="container text-black">
        <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0">Thông tin cá nhân</span>
        </div>
        <div class="align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form method="POST" action="modules/xulytaikhoan.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" value="<?php echo $row['Email']; ?>" disabled />
                            <label class="form-label">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="phone" class="form-control form-control-lg" value="<?php echo $row['Phone']; ?>" disabled />
                            <label class="form-label">Số điện thoại</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" value="<?php echo $rowi4['Username'] ? $rowi4['Username'] : ''; ?>" disabled />
                            <label class="form-label">Họ tên</label>
                        </div>
                        <div class="pt-1 mb-4">
                            <button id="editButton" class="btn btn-info btn-lg btn-block" type="button" onclick="enableFields()">Cập nhật thông tin</button>
                            <button id="saveButton" class="btn btn-success btn-lg btn-block" type="submit" name="luuthongtin" style="display:none;">Lưu thay đổi</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <select name="gender" class="form-control form-control-lg" disabled>
                                <option value="Nam" <?php if ($rowi4['Gender'] == 'Nam') echo 'selected'; ?>>Nam</option>
                                <option value="Nữ" <?php if ($rowi4['Gender'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                            </select>
                            <label class="form-label">Giới tính</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="birth" name="birth" class="form-control form-control-lg" value="<?php echo $birth; ?>" disabled>
                            <label class="form-label">Ngày sinh: Năm-Tháng-Ngày</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input id="imagePath" type="file" name="hinhanh" class="form-control form-control-lg" value="<?php echo $row['ImagePath']; ?>" disabled />
                            <label class="form-label">Ảnh đại diện</label>
                        </div>
                        <div class="avt">
                            <img id="preview" src="<?php echo './images/avatar/' . $row["User_ID"] . '/' . $row["ImagePath"] ?>" class="rounded-circle" style="width: 180px;" alt="" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    const fileInput = document.getElementById("imagePath");
    const preview = document.getElementById("preview");
    fileInput.addEventListener("change", function() {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Display the selected image
            }
            reader.readAsDataURL(file); // Convert the file to a data URL
        }
    });
    preview.addEventListener('click', function() {
        fileInput.click(); // Click on the file input element
    });

    function enableFields() {
        // Enable all the input fields and select elements
        var inputs = document.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            input.disabled = false;
        });
        // Show the save button
        document.getElementById('saveButton').style.display = 'block';
        // Hide the edit button
        document.getElementById('editButton').style.display = 'none';
    }
</script>