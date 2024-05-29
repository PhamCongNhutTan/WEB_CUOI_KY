<div class="form-qltt">
  <h3 style="text-align: left;"><span class="bar"></span>Thêm bài viết</h3>
  <form method="POST" action="modules/quanlytintuc/excute.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="form-group mt-3">
          <label for="">Tiêu đề</label>
          <input type="text" class="form-control" id="" name="tieude">
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="form-group mt-3">
          <label for="">Hình ảnh</label>
          <input type="file" class="form-control" id="" name="hinhanh">
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="form-group mt-3">
          <label style="display:block;" for="">Tình trạng</label>
          <select class="form-control" name="tinhtrang" id="">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group mt-3">
      <label for="">Tóm tắt nội dung</label>
      <textarea type="text" class="form-control" id="tomtat" name="tomtat"></textarea>
    </div>
    <div class="form-group mt-3">
      <label for="">Nội dung chi tiết</label>
      <textarea type="text" class="form-control" id="noidung" name="noidung"></textarea>
    </div>
    <button type="submit" name="thembaiviet" class="btn btn-success mt-3">Thêm bài viết</button>
  </form>
</div>