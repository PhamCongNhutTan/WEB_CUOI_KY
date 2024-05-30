<?php
$tourID = $_GET["tour_id"];
$tour = TourController::getTourByID($tourID);
?>
<div class="container" id="tour">
    <div id="alert" class="alert">
         <span class="msg">Cập nhật chuyến đi thành công</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
    </div>
    <h6 style="text-align: left;">Quản lý chuyến đi > Cập nhật</h5>
    <h3 style="text-align: left;" class="mt-3 "><span class="bar"></span>Cập nhật chuyến đi</h3>
    <form id="editTourForm" method="POST" action="modules/quanlychuyendi/execute.php" enctype="multipart/form-data">
        <input type="text" class="d-none" name="tourID" value="<?php echo $tourID ?>">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label for="">Tên chuyến đi</label>
                    <input type="text" class="form-control" id="" name="name" value="<?php echo $tour->getName() ?>">
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label for="">Chi phí</label>
                    <input type="text" class="form-control" name="basePrice" value="<?php echo number_format($tour->getBasePrice()) ?>" oninput="formatPrice(this)">
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label style="display:block;" for="">Trạng thái</label>
                    <select class="form-select" style="width: 100%; padding: 4px;" name="type" id="">
                        <?php
                        if ($tour->getType() == "Đang mở") {
                        ?>
                            <option value="Đang mở" selected>Đang mở</option>
                            <option value="Đang đóng">Đang đóng</option>
                        <?php
                        } else {
                        ?>
                            <option value="Đang đóng">Đang đóng</option>
                            <option value="Đang mở" selected>Đang mở</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="">Địa điểm</label>
            <input type="text" class="form-control" id="" name="location" value="<?php echo $tour->getLocation() ?>">
        </div>
        <div class="form-group mt-3">
            <label for="">Mô tả</label>
            <textarea rows="2" class="form-control" id="description" name="description"><?php echo $tour->getDescription() ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="">Chi tiết chuyến đi</label>
            <textarea style="resize: none;" rows="10" class="form-control" id="detail" name="detail"><?php echo $tour->getDetail() ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="">Hình ảnh</label>
            <input style="border-bottom-left-radius: 0px ;border-bottom-right-radius: 0px;" type="file" class="form-control" id="imagePath" name="imagePath" src="<?php echo "../images/tour/" . $tour->getTourID() . "/" . $tour->getImagePath() ?>">
            <img id="currentImage" style="width: 100%; max-width: 500px; margin: 0px auto;" class="border-3 border-top-0 rounded-bottomd d-block" src="<?php echo "../images/tour/" . $tour->getTourID() . "/" . $tour->getImagePath() ?>" width="100px" alt="">
        </div>
        <button id="editTourBtn" type="submit" name="editTour" class="btn btn-success mt-3">Cập nhật chuyến đi</button>
    </form>
</div>
<script>
    function formatPrice(input) {
        let value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
        let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas
        input.value = formattedValue;
    }
    function alertSuccess(){
        $('.alert').addClass("show");
        $('.alert').removeClass("hide");
        $('.alert').addClass("showAlert");
        setTimeout(function() {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        }, 3000);
    }
    $('.close-btn').click(function() {
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    });
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("imagePath");
        const preview = document.getElementById("currentImage");
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
        const form = document.getElementById("editTourForm");
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);
            formData.append("editTour", "true");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "modules/quanlychuyendi/execute.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Success handling
                    alertSuccess();
                    setTimeout(function() {
                        document.getElementById("notification").classList.add("d-none");
                    }, 3000); // Hide notification after 3 seconds
                } else {
                    // Error handling
                    console.error(xhr.responseText);
                }
            };
            xhr.onerror = function() {
                console.error("Request failed");
            };
            xhr.send(formData);
        });
    });
</script>