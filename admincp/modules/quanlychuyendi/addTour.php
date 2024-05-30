<div class="container" id="tour">
    <h3 style="text-align: left;" class="mt-3"><span class="bar"></span>Thêm chuyến đi</h3>
    <div id="alert" class="alert">
         <span class="msg">Thêm chuyến đi thành công</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
    </div>
    <form id="addTourForm" method="POST" action="modules/quanlychuyendi/execute.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label for="">Tên chuyến đi</label>
                    <input type="text" class="form-control" id="" name="name">
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label for="">Chi phí</label>
                    <input type="text" class="form-control" name="basePrice" oninput="formatPrice(this)"></textarea>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group mt-3">
                    <label for="">Hình ảnh</label>
                    <input type="file" class="form-control" id="imagePath" name="imagePath">

                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="">Địa điểm</label>
            <input type="text" class="form-control" id="" name="location">
        </div>
        <div class="form-group mt-3">
            <label for="">Google Map</label>
            <input type="text" class="form-control" id="" name="google">
        </div>
        <div class="form-group mt-3">
            <label for="">Mô tả</label>
            <textarea rows="2" class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="">Chi tiết chuyến đi</label>
            <textarea class="form-control" id="detail" name="detail" oninput=""></textarea>
            <img id="currentImage" style="width: 300px; " class="border-3r border-top-0 rounded mt-3 text-center d-block" src="../images/tour/defaultTour.jpg" alt="test">
        </div>
        <div id="notification" class="mt-3 alert alert-success alert-dismissible d-none" role="alert">Thêm chuyến đi
            thành công</div>
        <button id="addTourBtn" type="submit" name="addTour" class="btn btn-success mt-3">Thêm chuyến đi</button>
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
        const form = document.getElementById("addTourForm");
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);
            formData.append("addTour", "true");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "modules/quanlychuyendi/execute.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alertSuccess();
                    form.reset(); // Reset the form

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