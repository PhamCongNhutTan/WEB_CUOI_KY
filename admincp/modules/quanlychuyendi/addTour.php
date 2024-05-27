<div class="container" id="tour">
  <h3 class="mt-3"><span class="bar"></span>Thêm chuyến đi</h3>
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
          <input type="number" class="form-control" name="basePrice"></textarea>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="form-group mt-3">
          <label for="">Hình ảnh</label>
          <input type="file" class="form-control" id="" name="imagePath">
        </div>
      </div>
    </div>
    <div class="form-group mt-3">
      <label for="">Địa điểm</label>
      <input type="text" class="form-control" id="" name="location">
    </div>
    <div class="form-group mt-3">
      <label for="">Mô tả</label>
      <textarea style="resize: none;" rows="10" class="form-control" id="description" name="description"></textarea>
    </div>
    <div id="notification" class="mt-3 alert alert-success alert-dismissible d-none" role="alert">Thêm chuyến đi
      thành công</div>
    <button id="addTourBtn" type="submit" name="addTour" class="btn btn-success mt-3">Thêm chuyến đi</button>
  </form>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("addTourForm");
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // Prevent default form submission
      var formData = new FormData(this);
      formData.append("addTour", "true");
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "modules/quanlychuyendi/execute.php", true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          document.getElementById("notification").classList.remove("d-none");
          form.reset(); // Reset the form
          setTimeout(function () {
            document.getElementById("notification").classList.add("d-none");
          }, 3000); // Hide notification after 3 seconds
        } else {
          // Error handling
          console.error(xhr.responseText);
        }
      };
      xhr.onerror = function () {
        console.error("Request failed");
      };
      xhr.send(formData);
    });
  });
</script>